<?php
session_start();
include ("condb.php");

    $sql="SELECT *  FROM `logs` WHERE `device_id` = '{$_GET['did']}' ORDER BY `id` DESC LIMIT 1";
    $rs = mysqli_query($conn,$sql);
    $data = mysqli_fetch_array($rs);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChartInputValtage);

      function drawChartInputValtage() {

        var data_input_voltage = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Input Voltage', <?=$data['input_voltage'];?>],
        ]);

        var options = {
                width: 1300,
                height: 260,
                redFrom: 280,
                redTo: 300,
                yellowFrom: 250,
                yellowTo: 280,
                minorTicks: 5,
                max: 300
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data_input_voltage, options);
      }


      google.charts.setOnLoadCallback(drawChartOutputLoad);

        function drawChartOutputLoad() {
            var dataChart = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Output Load', <?=$data['output_load'];?>],
            ]);

            var options = {
                width: 1300,
                height: 260,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div1'));

            chart.draw(dataChart, options);

        }
        // end drawChartOutputLoad


        google.charts.setOnLoadCallback(drawChartOutputVoltage);

        function drawChartOutputVoltage() {
            var dataChart = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Output Voltage', <?=$data['output_voltage'];?>],
            ]);

            var options = {
                width: 1300,
                height: 260,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div2'));

            chart.draw(dataChart, options);

        }
        // end drawChartOutputVoltage


        google.charts.setOnLoadCallback(drawChartInputFrequency);
        function drawChartInputFrequency() {
            var dataChart = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Input Frequency', <?=$data['input_frequency'];?>],
                // ['UPS Load', 55],
                // ['Output voltage', 68]
            ]);

            var options = {
                width: 1300,
                height: 260,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div3'));

            chart.draw(dataChart, options);

        }
        // end drawChartInputFrequency


        google.charts.setOnLoadCallback(drawChartTempRoom);
        function drawChartTempRoom() {
            var data_temp_room = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Temperature Room', <?=$data['temp_room'];?>],
            ]);

            var options = {
                width: 1300,
                height: 260,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div4'));

            chart.draw(data_temp_room, options);

        }
        // end drawChartTempRoom


        google.charts.setOnLoadCallback(drawChartDataHumidRoom);
        function drawChartDataHumidRoom() {

            var data_humid_room = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Humidity Room', <?=$data['humid_room'];?>],
            ]);

            var options = {
                width: 1300,
                height: 260,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div5'));

            chart.draw(data_humid_room, options);
        }
        // end drawChartDataHumidRoom


        google.charts.setOnLoadCallback(drawChartupstemperature);
        function drawChartupstemperature() {

            var dataChart = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['UPS Temperature', <?=$data['ups_temperature'];?>],
            ]);

            var options = {
                width: 1300,
                height: 260,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div6'));

            chart.draw(dataChart, options);
        }
        // end drawChartupstemperature

        google.charts.setOnLoadCallback(drawChartbatterycharge);
        function drawChartbatterycharge() {
            var dataChart = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Battery Charge', <?=$data['battery_charge'];?>],
            ]);

            var options = {
                width: 1300,
                height: 260,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div7'));

            chart.draw(dataChart, options);
        }
        // end drawChartbetterycharge

        google.charts.setOnLoadCallback(drawChartbatteryvoltage);
        function drawChartbatteryvoltage() {
            var dataChart = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Battery Voltage', <?=$data['battery_voltage'];?>],
            ]);

            var options = {
                width: 1300,
                height: 260,
                redFrom: 90,
                redTo: 100,
                yellowFrom: 75,
                yellowTo: 90,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div8'));

            chart.draw(dataChart, options);
        }
        // end drawChartbetteryvoltage

    </script>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="home.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">Ablerex UPS</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['ses_name'] ;?></h6>
                        <span>Officer</span>
                    </div>
                    
                </div>
                <div class="navbar-nav w-100">
                <a href="home.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Devices</a> <br>
                <a href="logs.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Logs</a> <br>
                <a href="logout.php" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Logout</a> 
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                </form>
                <div class="navbar-nav align-items-center ms-auto"></div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4"></div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start --><!-- Sales Chart End -->


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-0 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="mb-0">Dashboard</h6>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div" style="width: 600px; height: 260px;"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div1" style="width: 600px; height: 260px;"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div2" style="width: 600px; height: 260px;"></div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div3" style="width: 600px; height: 260px;"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div4" style="width: 600px; height: 260px;"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div5" style="width: 600px; height: 260px;"></div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div6" style="width: 600px; height: 260px;"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div7" style="width: 600px; height: 260px;"></div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-4">
                        <div id="chart_div8" style="width: 600px; height: 260px;"></div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; Ablerex, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            
                        </br>
                        
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>