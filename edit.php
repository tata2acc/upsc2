<?php
session_start();
include_once ("checklogin.php");
include ("condb.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Device</title>
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


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
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
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                
                
            </nav>
            <!-- Navbar End -->
            <?php
                        include ("condb.php");
                        $sql="SELECT * FROM `devices` where d_id = '{$_GET['did']}'";
                        $rs = mysqli_query($conn,$sql); 
                        $data= mysqli_fetch_array($rs);
                        $_SESSION['ses_id']= $data['d_id'] ;
                       
                        ?>
            <div class="container-fluid pt-4 px-4" >
            <button type="button" class="btn btn-square btn-info m-2" onclick="window.location='home.php'"><i  class="fa fa-home"></i></button>
                <div class="row">
                    <center>
                    <div  class="col-sm-6 ">
                    <div class="card">
                        <div class="card-body">
                        <form method="post">
                        <div class="mb-3">
                                    <div class="form-label" aria-hidden="true" style="text-align:left;width:100%;">ID
                                    <input type="text" class="form-control" name="d_id"  value="<?php  echo $_SESSION['ses_id'];?>" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label" aria-hidden="true" style="text-align:left;width:100%;">UPS Name
                                    <input type="text" class="form-control" name="d_upsname"  value="<?php  echo $data['d_upsname'];?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label" aria-hidden="true" style="text-align:left;width:100%;">Model
                                    <input type="text" class="form-control" name="d_model" value="<?php  echo $data['d_model'];?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                <div class="form-label" aria-hidden="true" style="text-align:left;width:100%;">Company
                                    <input type="text" class="form-control" name="d_company" value="<?php  echo $data['d_company'];?>">
                                </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label" aria-hidden="true" style="text-align:left;width:100%;">Token
                                    <input type="text" class="form-control" name="d_token" value="<?php  echo $data['d_token'];?>" readonly >
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label" aria-hidden="true" style="text-align:left;width:100%;">Location
                                    <input type="text" class="form-control"  name="d_location" value="<?php  echo $data['d_location'];?>" >
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label" aria-hidden="true" style="text-align:left;width:100%;">Remark
                                    <input type="text" class="form-control" name="d_remark" value="<?php  echo $data['d_remark'];?>">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-label" aria-hidden="true" style="text-align:left;width:100%;">ID Employee
                                    <input type="text" class="form-control" name="d_idemp" value="<?php  echo $data['d_idemp'];?>" readonly>
                                    </div>
                                </div>
                                
                                <input  type="submit" class="btn btn-primary" name="submit" value="Save">



<?php
include 'condb.php';
if (isset($_POST['submit'])) {
  // รับข้อมูลจากแบบฟอร์ม
  $d_upsname = $_POST['d_upsname'];
  $d_model = $_POST['d_model'];
  $d_company = $_POST['d_company'];
  $d_token = $_POST['d_token'];
  $d_location = $_POST['d_location'];
  $d_remark = $_POST['d_remark'];
  $d_idemp = $_POST['d_idemp'];
 
// คำสั่ง SQL สำหรับการ INSERT ข้อมูลใหม่
$sql_insert = "UPDATE `devices` SET `d_upsname`= '$d_upsname',`d_model`='$d_model',`d_company`='$d_company',
`d_token`='$d_token',`d_location`='$d_location',`d_remark`='$d_remark',`d_idemp`='$d_idemp' WHERE `d_id` = '{$_GET['did']}' ";
//var_dump($sql_insert);

// ดำเนินการ INSERT ข้อมูลใหม่
if (mysqli_query($conn, $sql_insert)) { 
  echo "<script>"; 
  echo "alert('Complete');";
  echo "window.location='home.php';";
  echo "</script>"; 
} else {
  echo "<script>";
  echo "alert('Uncomplete:');". mysqli_error($conn);
  echo "window.location='insert.php';";
  echo "</script>"; 
}

mysqli_close($conn);
}
?>


                            </form>
                        </div>
                    </div>
                    </div>
                    </center>
                </div>
            </div>

</div>
</div>

            

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