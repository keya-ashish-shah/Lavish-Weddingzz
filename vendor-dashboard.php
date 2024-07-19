<?php
    session_start();
    include './admin/connect/connection.php';
    if(!isset($_SESSION['vendorname']))
{
	header("location:log-in.php");
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-overview.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:50 GMT -->
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
    <link href="css/offcanvas.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="body-bg">

<!-- header starts -->
<?php
    include './theme/vendor-header.php';
?>
<!-- header ends -->


    <div class="navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas">
            <span id="icon-toggle" class="fa fa-bars"></span>
        </button>
    </div>
    <div class="dashboard-wrapper">

<!-- sidebar starts-->
<?php 
    include './theme/vendor-sidebar.php';
?>
<!-- sidebar ends-->

        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-10 col-md-9 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                        
                        

                            <h3 class="dashboard-page-title"><b>Hi, <?php echo $_SESSION['vendorname'];?> !!</b></h3>
                            <p class="d-block"><strong>Here’s what’s happening with your wedding venue business today.</strong></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card card-summary">
                            <div class="card-body">
                                <div class="float-left">
                                <?php
                                    $status="Accepted";
                                    $q=mysqli_query($connection,"select * from tbl_booking_master where vendor_id='{$_SESSION['vendorid']}' and booking_status='{$status}'");
                                    $count1=0;
                                    while($data=mysqli_fetch_array($q)){$count1++;}
                                ?>
                                <div class="summary-count"><?php echo $count1;?></div>
                                <p>Booking Count</p>
                            </div>
                                  <div class="summary-icon"><i class="icon-051-wedding-arch"></i></div>

                            </div>
                              <div class="card-footer text-center"><a href="vendor-dashboard-listing.php?vid=<?php echo $_SESSION['vendorid']  ?>">View All</a></div>
                           
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card card-summary">
                        <?php
                            $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id='{$_SESSION['vendorid']}'");
                            $fcount=0;
                            while($fdata=mysqli_fetch_array($fq)){$fcount++;}
                        ?>
                            <div class="card-body">
                                <div class="float-left">
                                <div class="summary-count"><?php echo $fcount;?></div>
                                <p>Feedback Count</p>

                            </div>
                              <div class="summary-icon"><i class="icon-004-chat"></i></div>
                            </div>
                            <div class="card-footer text-center"><a href="vendor-feedback-listings.php?vid=<?php echo $_SESSION['vendorid']  ?>">View All</a></div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="card card-summary">
                            <div class="card-body">
                                <div class="float-left">
                                <?php
                                    // $status="Requested";
                                    $q=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$_SESSION['vendorid']}'");
                                    
                                    $data=mysqli_fetch_array($q)
                                ?>
                                <div class="summary-count"><?php echo $data['vendor_token']; ?></div>
                                <p>Token Amount</p>
                                </div>
                                <div class="summary-icon"><i class="icon-021-love-1"></i></div>
                            </div>
                            <div class="card-footer text-center"><a href="#">Platform Token</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-overview.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:52 GMT -->
</html>