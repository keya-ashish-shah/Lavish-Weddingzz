<?php
session_start();
include './admin/connect/connection.php';
if(isset($_GET['categoryid']))
{
    $cid=$_GET['categoryid'];
    $q=mysqli_query($connection,"select * from tbl_vendor where category_id='{$cid}'");
}
else if(isset($_GET['catid'])){
    $catid=$_GET['catid'];
    $q=mysqli_query($connection,"select * from tbl_vendor where category_id='{$catid}'");
}
// footer category search
else if(isset($_GET['footerid'])){
    $catid=$_GET['footerid'];
    $q=mysqli_query($connection,"select * from tbl_vendor where category_id='{$catid}'");
}
else
{
    $q=mysqli_query($connection,"select * from tbl_vendor");
}
//filter 
if(isset($_GET['category']) && isset($_GET['area']))
{
    $cid=$_GET['category'];
    $aid=$_GET['area'];
    $q=mysqli_query($connection,"select * from tbl_vendor where category_id='{$cid}' and area_id ='{$aid}' ");

}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-grid-view.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:47 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any ot er head content must come *after* these tags -->
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
                        <h1 class="page-title"> Vendors</h1>
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
                            <li class="breadcrumb-item"><a href="vendor-category.php" class="breadcrumb-link">Categories</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Vendors</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- page breadcrumb -->
    </div>
    <!-- /.page-header -->
    <!-- filter-form -->
    <div class="filter-form">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <form class="form-row" method="get">
                        <!-- venue-type -->
                       
                      
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <select class="wide" name="category">
                                <option value="Venue Type">Category</option>
                                <?php 
                                    $catq=mysqli_query($connection,"select * from tbl_category");
                                    while($data=mysqli_fetch_array($catq))
                                    {
                                ?>
                                    <option value="<?php echo $data['category_id'];?>"><?php echo $data['category_name'];?></option>
                                <?php 
                                    } 
                                ?>
                            </select>
                        </div>
                        <!-- /.venue-type -->
                        <!-- distance km -->
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <select class="wide" name="area">
                                <option value="Guest">Area</option>
                                <?php 
                                        $areaq=mysqli_query($connection,"select * from tbl_area");
                                        while($areadata=mysqli_fetch_array($areaq))
                                        {
                                    ?>
                                        <option value="<?php echo $areadata['area_id'];?>"><?php echo $areadata['area_name'];?></option>
                                    <?php 

                                        }

                                    ?>
                            </select>
                        </div>
                       
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12 ">
                            <button class="btn btn-default btn-block" name="" type="submit">Find Vendor</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.filter-form -->
    <div class="content">
        <div class="container">
            <div class="row">
            <?php
            
            while($data=mysqli_fetch_array($q))
            {
            
            ?>
                
            <!--vendor start-->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="vendor-thumbnail">
                        <!-- Vendor thumbnail -->
                        <div class="vendor-img zoomimg">
                            <!-- Vendor img -->
                            <a href="vendor-details.php?vendorid=<?php echo $data['vendor_id']; ?>"><img src="admin/uploads/<?php echo $data['vendor_photo'];  ?>" alt="" class="img-fluid"></a>
                            <div class="wishlist-sign"><a href="wishlist.php?vendorid=<?php echo $data['vendor_id'];?>" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                        </div>
                        <!-- /.Vendor img -->
                        <div class="vendor-content">
                            <!-- Vendor Content -->
                            <h2 class="vendor-title"><a href="vendor-details.php?vendorid=<?php echo $data['vendor_id']; ?>" class="title"><?php echo $data['vendor_name'];  ?></a></h2>
                            <p class="vendor-address"><?php  $aid=$data['area_id'];
                                    $aq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$aid}'");
                                    $adata=mysqli_fetch_array($aq);
                                    echo  $adata['area_name']; ?></p>
                        </div>
                        <div class="vendor-meta">
                            <div class="vendor-meta-item vendor-meta-item-bordered">
                                <span class="vendor-price">
                                ₹<?php echo $data['vendor_price'];  ?>
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
                    <!-- /.Vendor thumbnail -->
                </div>
           <!--vendor end-->
            <?php
            }
            ?>
            </div>
            
        </div>
    </div>
    <!-- social-media-section -->
    
    <!-- footer-section -->
        <?php
        
        include './theme/footer.php';
        
        ?>
    <!-- tiny-footer-section -->
  
    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <!-- nice select -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/custom-script.js"></script>
    <script src="js/return-to-top.js"></script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-grid-view.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:48 GMT -->
</html>