<?php
session_start();

include './admin/connect/connection.php';

if(isset($_POST['submit'])){

        header("location:vendor-grid.php");
    
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:38 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lavish Weddingz</title>
    <link rel="shortcut icon" type="image/x-icon" href="./admin/uploads/love.png">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">
    <!-- OwlCarosuel CSS -->
    <link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
    <link href="css/owl.theme.default.css" type="text/css" rel="stylesheet">
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
        .hero-section-third
        {
            background: url(./admin/uploads/bg1111.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        </style>
</head>

<body>
     <!-- header -->
<?php
    include './theme/header.php'; 
?>
    <!-- /.header -->
    <!-- hero-section -->
    <div class="hero-section-third">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 col-md-12 col-sm-12 col-12">
                    <!-- search-block -->
                    <div class="">
                        <div class="text-center search-head">
                            <h1 class="search-head-title text-white">Find Local Wedding Vendors</h1>
                            <p class="d-none d-xl-block d-lg-block d-sm-block text-white">Discover top-notch wedding experts nearby – including lovely venues, talented photographers, helpful planners, delicious caterers, beautiful florists, and more – make your search deluxe and delightful</p>
                        </div>
                        <!-- /.search-block -->
                        <!-- search-form -->
                        <div class="search-form" >
                            <form class="form-row" action="vendor-list.php" method="get">
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <!-- select -->
                                    <select class="wide" id="category" name="category">
                                        <option value="">Select Category</option>


                                    <?php 
                                        $q=mysqli_query($connection,"select * from tbl_category");
                                        while($data=mysqli_fetch_array($q)){
                                    ?>


                                        <option value="<?php echo $data['category_id'];?>"><?php echo $data['category_name'];?></option>


                                    <?php 

                                        }

                                    ?>
                                    </select>
                                </div>
                                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-12">
                                    <!-- select -->
                                    <select class="wide" id="area" name="area">
                                         <option value="">Select Area</option>

                                    <?php 
                                        $areaq=mysqli_query($connection,"select * from tbl_area LIMIT 11");
                                        while($areadata=mysqli_fetch_array($areaq)){
                                    ?>


                                        <option value="<?php echo $areadata['area_id'];?>"><?php echo $areadata['area_name'];?></option>


                                    <?php 

                                        }

                                    ?>
                                    </select>
                                </div>
                                <!-- button -->
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-12 col-12">
                                    <button class="btn btn-default btn-block"  type="submit"   >Search</button>
                                </div>
                              
                            </form>
                        </div>
                        <!-- /.search-form -->
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-section">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-clipboard-list"></i>
                            </div>
                            <div class="feature-content">
                                <?php
                                $countvq=mysqli_query($connection,"select * from tbl_vendor ");
                                $vendorcount=mysqli_num_rows($countvq);
                                ?>
                                <h3 class="text-white mb-1"><?php echo $vendorcount;  ?>+</h3>
                                <p class="text-white">Vendor Listing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-smile"></i>
                            </div>
                            <div class="feature-content">
                            <?php
                                $countcq=mysqli_query($connection,"select * from tbl_client ");
                                $clientcount=mysqli_num_rows($countcq);
                                ?>
                                <h3 class="text-white mb-1"><?php echo $clientcount; ?>+</h3>
                                <p class="text-white">Happy Users</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="feature-content">
                            <?php
                                $countaq=mysqli_query($connection,"select * from tbl_area ");
                                $areacount=mysqli_num_rows($countaq);
                                ?>
                                <h3 class="text-white mb-1"><?php echo $areacount ?>+</h3>
                                <p class="text-white"> Cities</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                        <div class="feature-left">
                            <div class="feature-icon">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="feature-content">
                            <?php
                                $countfq=mysqli_query($connection,"select * from tbl_feedback ");
                                $feedbackcount=mysqli_num_rows($countfq);
                                ?>
                                <h3 class="text-white mb-1"><?php echo $feedbackcount; ?>+</h3>
                                <p class="text-white">Feedbacks</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.hero-section -->
    <!-- venue-categoris-section-->
    <div class="space-medium bg-white">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center">
                        <!-- section title start-->
                        <h2 class="mb10">Browse Vendors by Category</h2>
                        <p>
"Discover All Venues: Dive into our diverse categories! From serene parks to bustling cafes, each venue awaits with its own unique charm. Explore with ease as you navigate through enticing thumbnail images and category names, beckoning you to embark on your next adventure. Let curiosity be your guide and uncover the perfect spot for every occasion!".</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <!-- venue-categoris-block-->
                <?php
                $q=mysqli_query($connection,"select * from tbl_category LIMIT 3");
                while($data=mysqli_fetch_array($q)){
                ?>

                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="vendor-categories-block zoomimg">
                        <div class="vendor-categories-img"> <a href="vendor-grid.php?catid=<?php echo $data['category_id']; ?>"><img src="./admin/uploads/<?php echo $data['category_photo'];?>" alt="" class="img-fluid"></a></div>
                        <div class="vendor-categories-overlay">
                            <div class="vendor-categories-text">
                                <h4 class="mb0"><a href="vendor-grid.php?catid=<?php echo $data['category_id']; ?>" class="vendor-categories-title"><?php echo $data['category_name']; ?></a></h4>
                                <p class="vendor-categories-numbers">
                                    <?php
                                    $vcq=mysqli_query($connection,"select * from tbl_vendor where category_id='{$data['category_id']}'");
                                    $count=mysqli_num_rows($vcq);
                                    echo $count;
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.venue-categoris-block-->
                </div>

                <?php 
                    }
                ?>


            </div>
            <!-- venue-categoris-btn -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center mt20"><a href="vendor-category.php" class="btn btn-primary btn-lg">Browse all category</a></div>
            </div>
            <!-- /.venue-categoris-btn -->
        </div>
    </div>
    <!-- /.venue-categoris-section-->
    <div class="space-medium">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center">
                        <!-- section title start-->
                        <h2 class="mb10">Latest Wedding Vendors</h2>
                        <p>A short description for showcase of latest wedding venue. </p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="venue-thumbnail-carousel">
                <div class="owl-carousel owl-theme owl-venue-thumb">


                    <?php 
                    $iq=mysqli_query($connection,"select * from tbl_vendor ");
                    $iqdata=mysqli_fetch_array($iq);
                
                    ?>


                    <div class="item">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="vendor-thumbnail">
                                <!-- Vendor thumbnail -->
                                <div class="vendor-img zoomimg">
                                    <!-- Vendor img -->
                                    <a href="vendor-details.php?itemid=<?php echo $iqdata['vendor_id'];?>"><img src="./admin/uploads/<?php echo $iqdata['vendor_photo']; ?>" alt=""  class="img-fluid"></a>
                                    <div class="wi0shlist-sign"><a href="wishlist.php?vendorid=<?php echo $iqdata['vendor_id'];?>" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                                </div>
                                <!-- /.Vendor img -->
                                <div class="vendor-content">
                                    <!-- Vendor Content -->
                                    <h2 class="vendor-title"><a href="vendor-details.php?itemid=<?php echo $iqdata['vendor_id'];?>" class="title"><?php echo $iqdata['vendor_name'];?></a></h2>
                                    <p class="vendor-address"><span class="vendor-address-icon"><i class="fa fa-map-marker-alt"></i> </span><?php  $adid=$iqdata['area_id'];
                                    $adq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$adid}'");
                                    $addata=mysqli_fetch_array($adq);
                                    echo  $addata['area_name']; ?></p></p>
                                </div>
                                <!-- /.Vendor Content -->
                                <div class="vendor-meta">
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">₹
                                            <?php echo $iqdata['vendor_price'];?>
                                        </span>
                                        <span class="vendor-text">Start From</span>
                                    </div>
                                    
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">
                                            ₹<?php echo $iqdata['vendor_token'];   ?>
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
                                        <span class="rating-count vendor-text">
                                            
                                            (<?php
                                            $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id={$iqdata['vendor_id']}");
                                            $fcount=mysqli_num_rows($fq);
                                            echo $fcount;
                                            ?>)
                                        </span></div>
                                </div>
                            </div>
                            <!-- /.Vendor thumbnail -->
                        </div>
                    </div>
                    

                    <?php 
                    $iq=mysqli_query($connection,"select * from tbl_vendor where vendor_id=57");
                    $iqdata=mysqli_fetch_array($iq);
                
                    ?>
                    <div class="item">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="vendor-thumbnail">
                                <!-- Vendor thumbnail -->
                                <div class="vendor-img zoomimg">
                                    <!-- Vendor img -->
                                    <a href="vendor-details.php?itemid=<?php echo $iqdata['vendor_id'];?>"><img src="./admin/uploads/<?php echo $iqdata['vendor_photo']; ?>" alt=""  class="img-fluid"></a>
                                    <div class="wi0shlist-sign"><a href="wishlist.php?vendorid=<?php echo $iqdata['vendor_id'];?>" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                                </div>
                                <!-- /.Vendor img -->
                                <div class="vendor-content">
                                    <!-- Vendor Content -->
                                    <h2 class="vendor-title"><a href="vendor-details.php?itemid=<?php echo $iqdata['vendor_id'];?>" class="title"><?php echo $iqdata['vendor_name'];?></a></h2>
                                    <p class="vendor-address"><span class="vendor-address-icon"><i class="fa fa-map-marker-alt"></i> </span><?php  $adid=$iqdata['area_id'];
                                    $adq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$adid}'");
                                    $addata=mysqli_fetch_array($adq);
                                    echo  $addata['area_name']; ?></p></p>
                                </div>
                                <!-- /.Vendor Content -->
                                <div class="vendor-meta">
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">₹
                                    <?php echo $iqdata['vendor_price'];?>
                                </span>
                                        <span class="vendor-text">Start From</span>
                                    </div>
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">
                                            ₹<?php echo $iqdata['vendor_token'];   ?>
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
                                            $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id={$iqdata['vendor_id']}");
                                            $fcount=mysqli_num_rows($fq);
                                            echo $fcount;
                                            ?>
                                            )</span></div>
                                </div>
                            </div>
                            <!-- /.Vendor thumbnail -->
                        </div>
                    </div>


                    <?php 
                    $iq=mysqli_query($connection,"select * from tbl_vendor where vendor_id=15");
                    $iqdata=mysqli_fetch_array($iq);
                
                    ?>

                    <div class="item">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="vendor-thumbnail">
                                <!-- Vendor thumbnail -->
                                <div class="vendor-img zoomimg">
                                    <!-- Vendor img -->
                                    <a href="vendor-details.php?itemid=<?php echo $iqdata['vendor_id'];?>"><img src="./admin/uploads/<?php echo $iqdata['vendor_photo']; ?>" alt=""  class="img-fluid"></a>
                                    <div class="wi0shlist-sign"><a href="wishlist.php?vendorid=<?php echo $iqdata['vendor_id'];?>" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                                </div>
                                <!-- /.Vendor img -->
                                <div class="vendor-content">
                                    <!-- Vendor Content -->
                                    <h2 class="vendor-title"><a href="vendor-details.php?itemid=<?php echo $iqdata['vendor_id'];?>" class="title"><?php echo $iqdata['vendor_name'];?></a></h2>
                                    <p class="vendor-address"><span class="vendor-address-icon"><i class="fa fa-map-marker-alt"></i> </span><?php  $adid=$iqdata['area_id'];
                                    $adq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$adid}'");
                                    $addata=mysqli_fetch_array($adq);
                                    echo  $addata['area_name']; ?></p></p>
                                </div>
                                <!-- /.Vendor Content -->
                                <div class="vendor-meta">
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">₹
                                    <?php echo $iqdata['vendor_price'];?>
                                        </span>
                                        <span class="vendor-text">Start From</span>
                                    </div>

                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">
                                            ₹<?php echo $iqdata['vendor_token'];   ?>
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
                                            $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id={$iqdata['vendor_id']}");
                                            $fcount=mysqli_num_rows($fq);
                                            echo $fcount;
                                            ?>)</span></div>
                                </div>
                            </div>
                            <!-- /.Vendor thumbnail -->
                        </div>
                    </div>

                    <?php 
                    $iq=mysqli_query($connection,"select * from tbl_vendor where vendor_id=11");
                    $iqdata=mysqli_fetch_array($iq);
                
                    ?>
                    <div class="item">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="vendor-thumbnail">
                                <!-- Vendor thumbnail -->
                                <div class="vendor-img zoomimg">
                                    <!-- Vendor img -->
                                    <a href="vendor-details.php?itemid=<?php echo $iqdata['vendor_id'];?>"><img src="./admin/uploads/<?php echo $iqdata['vendor_photo']; ?>" alt=""  class="img-fluid"></a>
                                    <div class="wi0shlist-sign"><a href="wishlist.php?vendorid=<?php echo $iqdata['vendor_id'];?>" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                                </div>
                                <!-- /.Vendor img -->
                                <div class="vendor-content">
                                    <!-- Vendor Content -->
                                    <h2 class="vendor-title"><a href="vendor-details.php?itemid=<?php echo $iqdata['vendor_id'];?>" class="title"><?php echo $iqdata['vendor_name'];?></a></h2>
                                    <p class="vendor-address"><span class="vendor-address-icon"><i class="fa fa-map-marker-alt"></i> </span><?php  $adid=$iqdata['area_id'];
                                    $adq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$adid}'");
                                    $addata=mysqli_fetch_array($adq);
                                    echo  $addata['area_name']; ?></p></p>
                                </div>
                                <!-- /.Vendor Content -->
                                <div class="vendor-meta">
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">₹
                                    <?php echo $iqdata['vendor_price'];?>
                                    </span>
                                        <span class="vendor-text">Start From</span>
                                    </div>
                                    
                                    <div class="vendor-meta-item vendor-meta-item-bordered">
                                        <span class="vendor-price">
                                            ₹<?php echo $iqdata['vendor_token'];   ?>
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
                                            $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id={$iqdata['vendor_id']}");
                                            $fcount=mysqli_num_rows($fq);
                                            echo $fcount;
                                            ?>)</span></div>
                                </div>
                            </div>
                            <!-- /.Vendor thumbnail -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- /. venue-thumbnail-section-->
   
    <!-- real-wedding-section-->

    <!-- /.real-wedding-section-->
    <!-- Testimonial-section -->
    <div class="space-medium bg-white">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center">
                        <!-- section title start-->
                        <h2 class="mb10">Real Testimonials</h2>
                        <p>Find out what about real couple have to say about related.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                <?php 
                $fq=mysqli_query($connection,"select * from tbl_feedback LIMIT 2");
                while($fdata=mysqli_fetch_array($fq)){
                ?>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="testimonial-block testimonial-second">
                        <!-- testimonial block -->
                        <div class="testimonial-content">
                            <?php
                            $cdata=$fdata['client_id'];
                            $cq=mysqli_query($connection,"select * from tbl_client where client_id=$cdata");
                            $clientdata=mysqli_fetch_array($cq);
                            ?>
                            <h3 class="testimonial-name"><?php echo $clientdata['client_name'];?></h3>
                            <p class="testimonial-text">“ <?php echo $fdata['feedback_description'];?>”</p>
                        </div>
                        <div class="testimonial-meta">
                            <?php 
                                 $vdata=$fdata['vendor_id'];
                                 $vq=mysqli_query($connection,"select * from tbl_vendor where vendor_id=$vdata");
                                 $vendordata=mysqli_fetch_array($vq);
                                 $adata=$vendordata['area_id'];
                                 $aq=mysqli_query($connection,"select * from tbl_area where area_id=$adata");
                                 $areadata=mysqli_fetch_array($aq);
                            ?>
                            <div class="testimonial-pic circle-lg"><img src="./admin/uploads/<?php echo$vendordata['vendor_photo'];?>" class="rounded-circle" alt=""></div>
                            <div class="testimonial-meta-text">
                                <h5 class="mb0"><?php echo $vendordata['vendor_name'];?> </h5>
                                <p class="testimonial-small-text mb0"> <?php echo $areadata['area_name'];?></p>
                            </div>
                            <div class="rating-star">
                                <i class="fa fa-star rated"></i>
                                <i class="fa fa-star rated"></i>
                                <i class="fa fa-star rated"></i>
                                <i class="fa fa-star rated"></i>
                                <i class="fa fa-star rated"></i>
                            </div>
                        </div>
                        <!-- /.testimonial block -->
                    </div>
                </div>


                <?php 
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- /.Testimonial-section -->
    <!-- blog-post-section -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center">
                        <!-- section title start-->
                        <h2 class="mb10">Latest Wedding Blogs</h2>
                        <p> The ultimate wedding news  for wedding couples.</p>
                    </div>
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">

            <!-- Blog Start -->

            <?php
            $blq=mysqli_query($connection,"select * from tbl_blog LIMIT 3");
            while($bldata=mysqli_fetch_array($blq))
            {
                $id=$bldata['blog_id'];
                $blogq=mysqli_query($connection,"SELECT SUBSTRING_INDEX(blog_detail,' ',35) AS detail FROM tbl_blog where blog_id='{$id}'");
                $row=mysqli_fetch_assoc($blogq);
                $detail=$row['detail'];
            ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="post-block">
                        <!-- post vertical block -->
                        <div class="post-img zoomimg">
                            <a href="blog-details.php?blogid=<?php echo $bldata['blog_id'] ?>"><img src="./admin/uploads/<?php echo $bldata['blog_photo_path']; ?>" alt="" class="img-fluid"></a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-heading"><a href="blog-details.php?blogid=<?php echo $bldata['blog_id'] ?>" class="post-title"><?php echo $bldata['blog_name']; ?> </a></h3>
                            <p class="meta">
                                <span class="meta-posted-by">By <a href="#">Admin</a></span>
                                <span class="meta-date"><?php echo $bldata['blog_date']; ?></span>
                            </p>
                            <p><?php echo $detail ?></p>
                            <p><a href="blog-details.php?blogid=<?php echo $bldata['blog_id']; ?>" class="btn-default-link">Read More</a></p>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>
              <!--Blog End  -->
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <a href="blog-list.php" class="btn btn-default btn-lg">View all Blogs</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.blog-post-section -->
 
    <!-- social-media-section -->
  
    <!-- footer-section -->

    <?php 
        include './theme/footer.php';
    ?>

    <!--footer ends -->
    <!-- tiny-footer-section -->
    <!-- /.tiny-footer-section -->



    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <!-- owl-carousel js -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- nice-select js -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/custom-script.js"></script>
    <script src="js/return-to-top.js"></script>
    <script>
    //jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        if ($(".header-transparent").offset().top > 200) {
            $(".fixed-top").addClass("top-nav-collapse");
        } else {
            $(".fixed-top").removeClass("top-nav-collapse");    
        }
    });
    </script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:38 GMT -->
</html>