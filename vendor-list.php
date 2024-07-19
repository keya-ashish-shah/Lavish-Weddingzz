<?php

session_start();
include './admin/connect/connection.php';


?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-view-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:48 GMT -->
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        /* .page-header
        {
            background-image: url(./images/hero-image-3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        } */

    </style>
</head>

<body>
   <!-- header -->
    <?php

    include './theme/header.php';

    ?>
    <!-- /.header -->
          <!-- page-header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <!-- page caption -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="page-caption">
                        <h1 class="page-title">Vendor List</h1>
                    </div>
                </div>
                <!-- /.page caption -->
            </div>
        </div>
        <!-- page caption -->
        <div class="page-breadcrumb">
            <div class="container">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                            <li class="breadcrumb-item">Vendor</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- page breadcrumb -->
    </div>
    <!-- /.page-header -->
    <!-- vendor-section -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">

                <?php
                if(isset($_GET['category']) && isset($_GET['area']))
                {
                    $cid=$_GET['category'];
                    $aid=$_GET['area'];
                    $q=mysqli_query($connection,"select * from tbl_vendor where category_id='{$cid}' and area_id ='{$aid}' ");

                }
                else if(isset($_GET['categoryid'])){
                    $cid=$_GET['categoryid'];
                    $q=mysqli_query($connection,"select * from tbl_vendor where category_id='{$cid}'");
               
                }
                else
                {
                $q=mysqli_query($connection,"select * from tbl_vendor");
                }
                $count=mysqli_num_rows($q);
                echo "$count Records found";
                while($data = mysqli_fetch_array($q))
                {

                ?>
                <!-- Vendor Start-->
                    <div class="vendor-thumbnail list-view">
                        <!-- Vendor thumbnail -->
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 border-right pr-0">
                                <div class="vendor-img">
                                    <!-- Vendor img -->
                                    <a href="vendor-details.php?vendorid=<?php echo $data['vendor_id']; ?>"><div class="zoomimg"><img src="admin/uploads/<?php echo $data['vendor_photo']; ?>" alt="" class="img-fluid"></div></a>
                                    <div class="wishlist-sign"><a href="wishlist.php?vendorid=<?php echo $data['vendor_id'];?>" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                                </div>
                            </div>
                            <!-- /.Vendor img -->
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 pl-0">
                                <div class="vendor-content">
                                    <!-- Vendor Content -->
                                    <h2 class="vendor-title"><a href="vendor-details.php?vendorid=<?php echo $data['vendor_id']; ?>" class="title"><?php echo $data['vendor_name']; ?> </a></h2>
                                    <p class="vendor-address"><?php  $aid=$data['area_id'];
                                    $aq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$aid}'");
                                    $adata=mysqli_fetch_array($aq);
                                    echo  $adata['area_name']; ?></p>
                                    <!-- /.Vendor meta -->
                                </div>
                                <div class="vendor-meta m-0">
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">
                                        ₹<?php echo $data['vendor_price']; ?>
                                        </span>
                                        <span class="vendor-text">Start From</span>
                                    </div>

                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">
                                            ₹<?php echo $data['vendor_token'];   ?>
                                        </span>
                                        <span class="vendor-text">Token Price</span>
                                    </div>
                                    
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="rating-star">
                                            <i class="fa fa-star rated"></i>
                                            <i class="fa fa-star rated"></i>
                                            <i class="fa fa-star rated"></i>
                                            <i class="fa fa-star rated"></i>
                                            <i class="fa fa-star rate-mute"></i> 
                                        </span>
                                        <span class="rating-count vendor-text">(
                                            <?php
                                            $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id={$data['vendor_id']}");
                                            $fcount=mysqli_num_rows($fq);
                                            echo $fcount;
                                            ?>)
                                        </span>
                                    </div>
                                </div>
                                <!-- /.Vendor Content -->
                            </div>
                        </div>
                    </div>
                    <!-- Vendor End-->

                    <?php
                    }
                        
                    ?>


                   
                 
                   
                     <!-- paginations -->
            
                    
              
            <!-- /.paginations -->
                </div>
                <!-- sidebar-section -->
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                    
                    <div class="filter-form">
                    <form class="form-row" method="get">

                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h3 class="widget-title">filter</h3>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <select class="wide" name="area">
                                <option value="Venue Type">Area </option>
                                <?php
                                $aq=mysqli_query($connection,"select * from tbl_area");
                                echo "<ul>";
                                while($aqdata=mysqli_fetch_array($aq))
                                {
            
                                  echo  "<option value='{$aqdata['area_id']}'> {$aqdata['area_name']}</option>";
          
                                }
                                echo "<ul>";
                                ?>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <select class="wide" name="category">
                                <option value="Venue Type">Category </option>
                                <?php
                                $cq=mysqli_query($connection,"select * from tbl_category");
                                echo "<ul>";
                                while($cqdata=mysqli_fetch_array($cq))
                                {
            
                                  echo  "<option value='{$cqdata['category_id']}' > {$cqdata['category_name']}</option>";
          
                                }
                                echo "<ul>";
                                ?>
                                </select>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <button class="btn btn-default btn-block" type="submit" name="filter">Find Vendor</button>
                            </div>
                           
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb20">
                                <!-- aminites -->
                                <div class="aminities">
                                    <h3 class="widget-title"> Categories </h3>
                                    <ul class="angle-right list-unstyled widget ul li a">
                                        <?php
                                        $csq=mysqli_query($connection,"select * from tbl_category");
                                        while($cdata=mysqli_fetch_array($csq))
                                        {
                                            echo "<li> <a href='vendor-list.php?categoryid={$cdata['category_id']}' > {$cdata['category_name']}</a></li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <!-- /.aminites -->
                            </div>
                            
                        </form>
                    </div>
                </div>
                <!-- /.sidebar-section -->
            </div>
           
        </div>
    </div>
    <!-- social-media-section -->
    
    <!-- footer-section -->
   
    <!-- tiny-footer-section -->
        <?php

        include './theme/footer.php';

        ?>
    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/custom-script.js"></script>
    <script src="js/return-to-top.js"></script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-view-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:48 GMT -->
</html>