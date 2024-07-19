<?php
session_start();
include './admin/connect/connection.php';
if(isset($_GET['vendorid']))
{
    $vid=$_GET['vendorid'];
    $pq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$vid}'");
    $pdata=mysqli_fetch_array($pq);
}
else if(isset($_GET['smvendorid']))
{
    $vid=$_GET['smvendorid'];
    $pq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$vid}'");
    $pdata=mysqli_fetch_array($pq);
}
else if(isset($_GET['itemid'])){
    $iid=$_GET['itemid'];
    $pq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$iid}'");
    $pdata=mysqli_fetch_array($pq);
}
else{
    header('location:vendor-grid.php');
}


if(isset($_POST['feedbackbtn']))
{ 
    if(isset($_SESSION['clientid']))
    {
        $cid=$_SESSION['clientid'];
        $vid=$_POST['venid'];
        $description=$_POST['feedbackdescription'];
        $date=$_POST['feedbackdate'];
        $que=mysqli_query($connection,"insert into tbl_feedback(feedback_date,feedback_description,vendor_id,client_id) values ('{$date}','{$description}','{$vid}','{$cid}')");
        if($que)
        {
            echo "<script>alert('Your review is successfully submitted...');window.location='vendor-details.php?vendorid={$pdata['vendor_id']}'</script>";
        
        }
    }
    else
    {
        echo "<script>alert('Log-in Required!!!');window.location='log-in.php';</script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:48 GMT -->
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
    <!--jquery-ui  -->
    <link href="css/jquery-ui.css" rel="stylesheet">
    <!--jquery-rateyo  -->
    <link href="css/jquery.rateyo.css" rel="stylesheet">
    <!-- Template magnific popup gallery -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
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
        .venue-pageheader
        {
            background: url(./admin/uploads/<?php echo $pdata['vendor_photo'] ; ?>) no-repeat center; background-size: cover; 
           
        }
        .img1{
            width:150px;
            border-radius: 50%;
        }
        .img2{
            width:70px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
  <!-- header -->
    <?php
    include './theme/header.php';
    ?>
    <!-- /.header -->
    <!-- page-header -->
    <div class="venue-pageheader">
        <div class="container">
            <div class="row align-items-end page-section">
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="">
                        <h1 class="vendor-heading"><p><?php echo $pdata['vendor_name'];   ?></p></h1>
                        <p class="text-white"><span class="mr-2"><i class="fas fa-fw fa-map-marker-alt "></i></span><?php  $aid=$pdata['area_id'];
                                    $aq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$aid}'");
                                    $adata=mysqli_fetch_array($aq);
                                    echo  $adata['area_name']; ?> &nbsp;<a href="#view-map" class="btn-default-link">view map</a></p>
                    </div>
                </div>
                <div class="col-xl-5 text-lg-right">
                     <div class="mt-xl-4">
                        <a href="booking.php?vedid=<?php echo $pdata['vendor_id']; ?>" class="btn btn-primary col-4">Book Now!</a>
                        <a href="wishlist.php?vendorid=<?php echo $pdata['vendor_id']; ?>" class="btn btn-danger col-6"><i class="fa fa-heart"></i> <span class="pl-1">Add To Wishlist</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page-header -->
    <!-- page-header -->
 
    <div class="vendor-content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-12">
                    <!--vendor-details -->
                    <div class="vendor-meta bg-white border m-0">
                        <div class="vendor-meta-item vendor-meta-item-bordered">
                            <span class="vendor-price">
                            ₹<?php echo $pdata['vendor_price'];   ?>
                                </span>
                            <span class="vendor-text">Start From</span>
                        </div>

                        <div class="vendor-meta-item vendor-meta-item-bordered">
                            <span class="vendor-price">
                            ₹<?php echo $pdata['vendor_token'];   ?>
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
                                            $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id={$pdata['vendor_id']}");
                                            $fcount=mysqli_num_rows($fq);
                                            echo $fcount;
                                            ?>)</span>
                        </div>
                    </div>
                    <div class="mt20">
                        <div class="card border card-shadow-none">
                            <h3 class="card-header bg-white lead">About Vendor</h3>
                            <div class="card-body">
                                <!--/.vendor-details -->
                                <!--vendor-description -->
                                <?php
                                $catq=mysqli_query($connection,"select * from tbl_category where category_id='{$pdata['category_id']}'");
                                $catdata=mysqli_fetch_array($catq); 
                                ?>
                                <p ><label class="lead">Category : </label>&nbsp;<?php echo $catdata['category_name']; ?></p>
                                <!-- <p ><label class="lead">Email : </label>&nbsp;<?php echo $pdata['vendor_email']; ?></p> -->
                                <p ><label class="lead"> Description : </label></p><p><?php echo $pdata['vendor_description']; ?></p>
                                <!--venue-highlights -->
                                <div class="venue-highlights">
                                    
                                   

                                </div>
                                <a href="booking.php?vedid=<?php echo $pdata['vendor_id']; ?>" class="btn btn-primary col-5">Book Now!</a>
                                <a href="wishlist.php?vendorid=<?php echo $pdata['vendor_id']; ?>" class="btn btn-danger col-5"><i class="fa fa-heart"></i> <span class="pl-1">Add To Wishlist</span></a>

                                <!-- /.venue-highlights -->
                            </div>
                        </div>
                        <!--vendor-description -->
                        <!-- aminities-block -->
                
                        <!-- /.aminities-block -->
                        <!-- review-block -->
                        

                         <!--Review close -->

                        <!-- /.review-block -->

                        <?php

                        $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id='{$pdata['vendor_id']}'");
                        while($fdata=mysqli_fetch_array($fq))
                        {
                            $clientq=mysqli_query($connection,"select * from tbl_client where client_id='{$fdata['client_id']}'");
                            $clientdata=mysqli_fetch_array($clientq);
                        ?>
                        <div class="card border card-shadow-none ">
                            <!-- review-user -->
                            <div class="card-header bg-white mb0">
                                <div class="review-user">
                                    <div class="user-img"> <img class="img2"  src="./admin/uploads/<?php echo $clientdata['client_photo'];   ?>" alt="star rating jquery" class="rounded-circle"></div>
                                    <div class="user-meta">
                                        <h5 class="user-name mb-0"><?php  echo $clientdata['client_name'];   ?><span class="user-review-date"><?php echo $fdata['feedback_date'];  ?></span></h5>
                                        <div class="given-review">
                                            <span class="rated"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far  fa-star"></i> <i class="far  fa-star"></i></span></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.review-user -->
                            <div class="card-body">
                                <!-- review-descripttions -->
                                <div class="review-descriptions">
                                    <p><?php echo $fdata['feedback_description'];   ?></p>
                                </div>
                                <!-- /.review-descripttions -->
                            </div>
                        </div>


                        <?php
                        }
                        ?>
                        <!--Review close -->

                    </div>
                    <!-- /.review-content -->
                    <!-- review-form -->
                    <!-- /.review-block -->
                    <div class="card border card-shadow-none leave-review" id="review-form">
                        <div class="card-header bg-white mb0">
                            <h3 class="mb0">Write Your Reviews</h3>
                        </div>
                        <div class="card-body">
                       
                            
                            <form method="post" id="myform">
                                <div class="row">
                                    <!-- Textarea -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt30">
                                        <div class="form-group">
                                            <label class="control-label" for="review">Write Your Review</label>
                                            <textarea class="form-control" id="review" name="feedbackdescription" rows="5" placeholder="Write Review" required></textarea>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="name">Name</label>
                                            <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email</label>
                                            <input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required>
                                        </div>
                                    </div>
                                    
                                    <!-- Button -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                        <input name="feedbackdate" type="hidden" value="<?php echo date("y/m/d"); ?>"class="control-label"  required>
                                        <input name="venid" type="hidden" value="<?php echo $pdata['vendor_id']; ?>" required></input>

                                            <button id="submit"type="submit" name="feedbackbtn" class="btn btn-default">Submit review</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </div>
                    
                    <!-- /.review-form -->
                    <!-- location -->
                    
                </div>
                <!-- /.location -->
                <!-- list-sidebar -->
                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-12">
                    <div class="sidebar-venue" >
                       
                        <!-- venue-admin -->
                        <div class="vendor-owner-profile mb30">
                            <div class="vendor-owner-profile-head">
                                <div class="vendor-owner-profile-img"><img  class="img1" src="./admin/uploads/<?php echo $pdata['vendor_photo'] ; ?>" class="rounded-circle" alt=""></div>
                                <h4 class="vendor-owner-name mb0"><?php echo $pdata['vendor_name'];  ?></h4>
                            </div>
                            <div class="vendor-owner-profile-content">
                                <ul class="list-group list-group-flush">
                                <li class="list-group-item"><span class="mr-2"><img class="fas fa-fw" src="./admin/uploads/category.png"></span>&nbsp;<?php  echo $pdata['vendor_service'];?></li>
                                    <li class="list-group-item"><span class="mr-2"><i class="fas fa-fw fa-map-marker-alt"></i></span><?php  echo $adata['area_name'];  ?></li>
                                    <!-- <li class="list-group-item"><span class="mr-2"><i class="fas fa-fw fa-envelope"></i></span><?php  echo $pdata['vendor_email'];  ?></li> -->

                                </ul>
                            </div>
                        </div>
                        <!-- /.venue-admin -->
                        <!-- social-media -->
                        <div class="widget">
                            <h4 class="widget-title">Share this </h4>
                            <div class="social-icons">
                                <a href="#" class="icon-square-outline facebook-outline"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="icon-square-outline twitter-outline"><i class="fab fa-twitter"></i> </a>
                                <a href="#" class="icon-square-outline googleplus-outline"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="icon-square-outline instagram-outline"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="icon-square-outline linkedin-outline"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="icon-square-outline pinterest-outline"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                        <!-- /.social-media -->
                    </div>
                </div>
            </div>
            <!-- /.list-sidebar -->
        </div>
    </div>
    <!-- vendor-thumbnail section -->
    <div class="space-small">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h2>Similar Vendor</h2>
                </div>
            </div>
            <div class="row">

                <?php
                $smq=mysqli_query($connection,"select * from tbl_vendor where category_id='{$pdata['category_id']}' LIMIT 3");
                while($smdata=mysqli_fetch_array($smq))
                {
                ?>

                <!--Similar Vendor-->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="vendor-thumbnail">
                        <!-- Vendor thumbnail -->
                        <div class="vendor-img zoomimg">
                            <!-- Vendor img -->
                            <a href="vendor-details.php?smvendorid=<?php echo $smdata['vendor_id'];?>"><img src="./admin/uploads/<?php echo $smdata['vendor_photo'];  ?>" alt="" class="img-fluid"></a>
                            <div class="wishlist-sign"><a href="#" class="btn-wishlist"><i class="fa fa-heart"></i></a></div>
                        </div>
                        <!-- /.Vendor img -->
                        <div class="vendor-content">
                            <!-- Vendor Content -->
                            <h2 class="vendor-title"><a href="vendor-details.php?smvendorid=<?php echo $smdata['vendor_id'];?>" class="title"><?php echo $smdata['vendor_name'];  ?></a></h2>
                            <p class="vendor-address"><?php  $adid=$smdata['area_id'];
                                    $adq=mysqli_query($connection,"select area_name from tbl_area where area_id='{$adid}'");
                                    $addata=mysqli_fetch_array($adq);
                                    echo  $addata['area_name']; ?></p>
                        </div>
                        <div class="vendor-meta">
                            <div class="vendor-meta-item vendor-meta-item-bordered">
                                <span class="vendor-price">
                                <?php echo $smdata['vendor_price'];  ?>
                                </span>
                                <span class="vendor-text">Start From</span>
                            </div>
                            
                            <div class="vendor-meta-item vendor-meta-item-bordered">
                            <span class="vendor-price">
                            ₹<?php echo $smdata['vendor_token'];   ?>
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
                                            $fq=mysqli_query($connection,"select * from tbl_feedback where vendor_id={$smdata['vendor_id']}");
                                            $fcount=mysqli_num_rows($fq);
                                            echo $fcount;
                                            ?>)</span>
                            </div>
                        </div>
                        <!-- /.Vendor Content -->
                    </div>
                    <!-- /.Vendor thumbnail -->
                </div>
                <?php 
                } 
                ?>
               
            </div>
        </div>
    </div>
    
    <!-- /.vendor-thumbnail section -->
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
    <!-- popup gallery -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/custom-script.js"></script>
   
    <script>
    function initMap() {
        var uluru = {
            lat: 23.0732195,
            lng: 72.5646902
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: 'images/map-pin.png'
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvZiQwPXkkIeXfAn-Cki9RZBj69mg-95M&amp;callback=initMap">
    </script>
    <script src="js/jquery.rateyo.min.js"></script>
    <script>
    $(function() {

        $("#rateYo1, #rateYo2, #rateYo3, #rateYo4, #rateYo5 ").rateYo({
            rating: 3.6
        });

    });
    </script>
    <script src="js/return-to-top.js"></script>

    
<script src="jquery.validate.js" type="text/javascript"></script>
	
	<script>
		$(document).ready(function(){
            $("#myform").validate();
        });
    </script>
	<style>
		.error{
			color:red;
		}
	</style>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:52 GMT -->
</html>