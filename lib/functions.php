<?php 

function checkLanConnect(){ 
 
    exec("ip link show eth0", $output, $returnCode);

    // Check the return code to see if the command executed successfully
    if ($returnCode === 0) {
        // Command executed successfully, analyze the output
        $outputString = implode("\n", $output); 
        // Check if the output contains information about the interface being up
        if (strpos($outputString, 'state UP') !== false) {
            // echo "LAN is connected.\n";
            return 1;
        } else {
            // echo "LAN is not connected.\n";
            return 0; 
        }
    } else {
        // Command failed to execute
        // echo "Error executing the command.\n";
            return 0;
    }
 
}

function updateIpAddressDB($conn){ 
    $ipAddressOnline='Null'; 
        $sql="UPDATE `devices` SET `ip_address` = '$ipAddressOnline' 
              WHERE `devices`.`d_id` = 1;";
 
    if (preg_match('/inet (\d+\.\d+\.\d+\.\d+)/', shell_exec('ifconfig eth0'), $matches)) {
        $ipAddressOnline = $matches[1];  


            $dnsConfig = shell_exec('cat /etc/resolv.conf');  
            $netmaskLan="";
            $defaultGatewayLan="";
            $dnsServerLan="";

            $ipRouteOutput = shell_exec('ip route');

 
            if (preg_match('/netmask (\d+\.\d+\.\d+\.\d+)/',  shell_exec('ifconfig eth0'), $matches)) {
                $netmaskLan = $matches[1]; 
            }
  
            if (preg_match('/default via (\d+\.\d+\.\d+\.\d+)/', $ipRouteOutput, $matches)) {
                    $defaultGatewayLan = trim($matches[1]); 
            }
            if (preg_match('/nameserver\s+(\d+\.\d+\.\d+\.\d+)/', $dnsConfig, $matches)) {
                    $dnsServerLan = $matches[1]; 
            }

            $sql="UPDATE `devices` SET `ip_address` = '$ipAddressOnline',  
                    devices_config_lan_ip='$ipAddressOnline',
                    devices_config_lan_subnet_mask='$netmaskLan',
                    devices_config_lan_default_gateway='$defaultGatewayLan',
                    devices_config_lan_dns_server='$dnsServerLan' 
                    WHERE `devices`.`d_id` = 1;";

    }else if(preg_match('/inet (\d+\.\d+\.\d+\.\d+)/',shell_exec('ifconfig wlan0'), $matches)) {
        
        $ipAddressOnline = $matches[1]; 
        wifiSSIDName($conn,$ipAddressOnline);

    } else{
        $ipAddressOnline="127.0.0.1"; 
    }

    $result = mysqli_query($conn,$sql);
    // if ($result) {
    //    echo "Record updated successfully";
    // } else {
    //    echo "Error updating record: " . mysqli_error($conn);
    // }
    
    return $ipAddressOnline;
}


function wifiSSIDName($conn,$ipAddressOnline){  
    $ssidName=Null; 
    // Execute the command to get the currently connected WiFi network name
    $output = shell_exec("nmcli -t -f active,ssid dev wifi | grep yes | cut -d':' -f2");
    // Trim any whitespace from the output
    $connectedWiFi = trim($output);
 
    if (!empty($connectedWiFi)) {
        // echo "Connected to WiFi: $connectedWiFi";
        $sqlCheck="SELECT devices_config_wifi_ip,devices_config_wifi_name,devices_config_wifi_password FROM devices
                   WHERE d_id=1";
        $resultCheck=mysqli_query($conn,$sqlCheck);
        $dataSSID = mysqli_fetch_assoc($resultCheck);
        $sql="UPDATE `devices` SET `devices_config_wifi_name` = '$connectedWiFi',
                `devices_config_wifi_ip` = '{$ipAddressOnline}'
                 WHERE `devices`.`d_id` = 1;";
        if($dataSSID["devices_config_wifi_name"] == $connectedWiFi){ 
            $sql="UPDATE `devices` SET `devices_config_wifi_ip` = '{$ipAddressOnline}' ,
                 `devices_config_wifi_name` = '$connectedWiFi',
                 `devices_config_wifi_password` = '{$dataSSID["devices_config_wifi_password"]}' 
                 WHERE `devices`.`d_id` = 1;";
        }

        $result = mysqli_query($conn,$sql);
        $ssidName=$connectedWiFi;
    } else {
        // echo "Not connected to any WiFi network";
        $sql="UPDATE `devices` SET 
             `devices_config_wifi_name` = '' ,
             'devices_config_wifi_ip'='',
             'devices_config_wifi_password'=''
             WHERE `devices`.`d_id` = 1;";
        $result = mysqli_query($conn,$sql);
        $ssidName="";
    }
    
    return $ssidName;
}