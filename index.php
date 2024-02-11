<?php
session_start();
include 'condb.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon2.ico" rel="icon">

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


        <!-- Sign In Start -->
        <div class="container-fluid">
        <form class="pt-3" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            
                            <h3>Ablerex UPS-Sign In</h3>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="o_usr" placeholder="Username" autofocus>
                            <label>Username</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="o_pwd" placeholder="Password">
                            <label>Password</label>
                        </div>
                        
                        <input type="submit" class="btn btn-primary py-3 w-100 mb-4" name="Submit" value="Sign In">
                        
                    </div>
                </div>
            </div>
            <?php
                        if(isset($_POST['Submit'])){
	                        include("condb.php");
	                        $sql = "SELECT  * FROM `officer` where o_usr ='{$_POST['o_usr']}' and o_pwd = '".md5($_POST['o_pwd'])."' ";
                            //var_dump($sql2); exit; //`member`
	                        $rs = mysqli_query($conn, $sql) or die ("select ไม่ได้");
	                        $num = mysqli_num_rows($rs) ;
		                    //นับจำนวนว่าเจอการล็อกอินกี่แถวถ้าเจอจะเป็น1ไม่เจอเป็น0
	                    //    var_dump($num); exit;
                        if ($num == 1 ){
		                   $data = mysqli_fetch_array($rs);
                           $_SESSION['ses_id']= $data['o_id'] ;
                           $_SESSION['ses_name']= $data['o_name'] ;
		
                           echo "<script>";
                           echo "window.location='home.php';";
                           echo "</script>";
                        } else {
                            echo "<script>";
                            echo "alert('Username หรือ Password ไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง');";
                            echo "window.location='index.php';";
                            echo "</script>";
                        }
                        }

                        ?>



        </form>
        </div>
        <!-- Sign In End -->
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