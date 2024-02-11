<?php
session_start();
include_once ("checklogin.php");
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


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
		 
         <!-- นำเข้า  Javascript จาก  Jquery -->
         <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <!-- นำเข้า  Javascript  จาก   dataTables -->
         <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
    
         <script type="text/javascript">
                //คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
                $(function(){
                    //กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
                    $('#devices').dataTable();
                });
      
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

        <?php
        include ("condb.php");

        $sql="SELECT * FROM `officer`";
        $rs = mysqli_query($conn,$sql); 
        $data= mysqli_fetch_array($rs);
        $_SESSION['ses_id']= $data['o_id'] ;
        $_SESSION['ses_name']= $data['o_name'] ;
        ?>

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
            <nav class="navbar navbar-expand bg-light navbar-light ">
                
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                
                
                
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            
            <div class="container-fluid pt-4 px-4" >
                <div class="row g-4">
                    <div  class="col-sm-6 col-xl-3">
                        <a href="insert.php">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-plus-circle fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">เพิ่มข้อมูล</p>
                                <h6 class="mb-0">Insert</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    
                   
                </div>
            </div>
            
            <!-- Sale & Revenue End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Devices</h6>
                    </div>
                    <div class="row">
                    <div class="col-12">
                    <form class="form-horizontal" method="POST">
                    <div class="table-responsive pt-3">
                        <table width="100%" id="devices" class="display table text-start table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th>ID</th>
                                    <th>UPS Name</th>
                                    <th>Model</th>
                                    <th>Company</th>
                                    <th>Token</th>
                                    <th>Location</th>
                                    <th>Remark</th>
                                    <th>Time</th>
                                    <th>ID Employee</th>
                                    <th>...</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                        include ("condb.php");
                        $sql1="SELECT * FROM `devices` ";
                        $rs = mysqli_query($conn,$sql1);
                        if ($rs->num_rows > 0) {
                          while($data = $rs->fetch_assoc()) {
                         ?>
                                <tr>
                                <td> <?php echo $data['d_id']; ?></td>
                                <td> <?php echo $data['d_upsname']; ?> </td>
                                <td><?php echo $data['d_model'];?> </td>
                                <td> <?php echo $data['d_company'];?></td>
                                <td> <?php 
                                $token_short = strlen($data['d_token']) > 15 ? substr($data['d_token'], 0, 15) . '...' : $data['d_token'];
                                echo $token_short;                                
                                ?></td>
                                <td> <?php echo $data['d_location'];?></td>
                                <td> <?php echo $data['d_remark'];?></td>
                                <td> <?php echo $data['d_record'];?></td>
                                <td> <?php echo $data['d_idemp'];?></td>
                                <td>
                                <input type="button" class="btn btn-warning rounded-pill m-2 btn-sm" value="Edit"  onclick="window.location='edit.php?did=<?=$data['d_id'];?>'" />
                                <a href="delete.php?did=<?=$data['d_id'];?>" type="button" class="btn btn-danger rounded-pill m-2 btn-sm" onClick="return confirm('ยืนยันการลบ ?');">Delete</a> 
                                </td>
                                </tr>
                                <?php }
                        @$conn->close(); ?>                 
                        <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    </form>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

</div>
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

    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.7.0.js">
		 
         <!-- นำเข้า  Javascript จาก  Jquery -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
         <!-- นำเข้า  Javascript  จาก   dataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>