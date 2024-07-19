<?php
session_start();
if(isset($_SESSION['clientname']))
{
    $cname=$_SESSION['clientname'];
    $cid=$_SESSION['clientid'];
}
else
{
    header("location:log-in.php");
}
include './admin/connect/connection.php'; 
if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $dq=mysqli_query($connection,"delete from tbl_booking_master where booking_id='{$did}'");
    if($dq)
    {
        echo "<script>alert('Booking Canceled');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:52 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lavish Weddingz</title>
    <link rel="shortcut icon" type="image/x-icon" href="./admin/uploads/love.png">    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">
     
        <!-- Favicon icon -->
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
     <link rel="stylesheet" type="text/css" href="css/offcanvas.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .climg{
            height: 280px;
            width:250px;
        }
        .btn
        {
            margin-top:30px;
        }
        
        </style>
        <script>
            function check()
            {
                return confirm("Are you sure you want to Cancel the booking?");
            }
        </script>
</head>

<body class="body-bg">

    <!-- header starts-->
    <?php
        include './theme/client-header.php'; 
    ?>
    <!-- header ends-->

    <div class="navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas">
            <span id="icon-toggle" class="fa fa-bars"></span>
        </button>
    </div>
    
    <div class="dashboard-wrapper">

        <!-- side bar starts-->
        <?php
            include 'theme/client-sidebar.php';
        ?>
        <!-- side bar ends-->

        <!-- main content starts-->
        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h2 class="dashboard-page-title"><b><?php echo $cname;?></b></h2>   <!--make it dynamic when doing login -->
                            <p><strong>"Welcome back !! Take control and manage your bookings effortlessly with just a few clicks."</strong></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-right mb20">
                        <a href="vendor-dashboard-add-listing.html" class="btn btn-default btn-sm">add new Listing</a>
                    </div> -->
                </div>

                <div class="dashboard-vendor-list">
                    <ul class="list-unstyled">


                    <!--listing starts -->

                        <li>
                            <?php
                                $q=mysqli_query($connection,"select * from tbl_booking_master where client_id='{$cid}'");
                             
                                while($data=mysqli_fetch_array($q))
                                {
                                    $vq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$data['vendor_id']}'");
                                    $vdata=mysqli_fetch_array($vq); 
                                
                            ?>
                             <div class="vendor-thumbnail list-view">
                        <!-- Vendor thumbnail -->
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-10 col-sm-10 col-10 border-right pr-0 ">
                                <div class="vendor-img ">
                                    <!-- Vendor img -->
                                    <a href="vendor-details.php?vendorid=<?php echo $vdata['vendor_id']; ?>"><div class="zoomimg"><img class="climg" src="admin/uploads/<?php echo $vdata['vendor_photo']; ?>" alt="" class="img-fluid"></div></a>
                                    <div class="wishlist-sign"><a href="vendor-details.php?vendorid=<?php echo $vdata['vendor_id']; ?>" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                                </div>
                            </div>
                            <!-- /.Vendor img -->
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 pl-0">
                                <div class="vendor-content">
                                    <!-- Vendor Content -->
                                    <h2 class="dashboard-page-title"><a href="#" class="title"><b><?php echo $vdata['vendor_name']; ?></b> </a></h2>
                                    <p class="vendor-address"><?php  $aid=$vdata['area_id'];
                                    $aq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$aid}'");
                                    $adata=mysqli_fetch_array($aq);
                                    echo  $adata['area_name']; ?></p>
                                    <!-- /.Vendor meta -->
                                </div>
                                <div class="vendor-meta m-0">
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-guest">
                                              <?php echo $data['booked_date'] ?>
                                         </span>
                                        <span class="vendor-text">Booked Date</span>
                                    </div>
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">
                                        ₹<?php echo $vdata['vendor_price']; ?>
                                        </span>
                                        <span class="vendor-text">Price</span>
                                    </div>
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">
                                        <?php echo $data['booking_status']; ?>
                                        </span>
                                        <span class="vendor-text">Status</span>
                                    </div>
                                </div>
                                <div class="vendor-meta m-0">
                                     <div class="vendor-meta-item vendor-meta-item">
                                    </div>
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <a href="client-booking-listing.php?did=<?php echo $data['booking_id']; ?>" onclick="return check();" class="btn btn-danger col-8">Cancel Booking</a>                                   
                                    </div>
                                </div>
                               
                                <!-- /.Vendor Content -->
                            </div>
                        </div>
                    </div>

                            <?php 
                                }
                            ?>
                        </li>

                    <!-- listing ends-->


                        




                    </ul>
                </div>
            </div>
        </div>
        <!-- main content ends-->
        
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/menumaker.min.js"></script>
    <script src="js/custom-script.js"></script>
     <script src="js/jquery.slimscroll.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
     <script src="js/offcanvas.js"></script>
    
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:55 GMT -->
</html>