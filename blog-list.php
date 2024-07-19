<?php
session_start();
include './admin/connect/connection.php';



?>
<!DOCTYPE html> 
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/blog-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:42 GMT -->
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
                        <h1 class="page-title">Blog List</h1>
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
                            <li class="breadcrumb-item active text-white" aria-current="page">Blog List</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- page breadcrumb -->
    </div>
    <!-- /.page-header -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                    <div class="row">



                    <?php
                    
                    if(isset($_GET['sbtn'])){
                        $search = $_GET['search'];
                        $q = mysqli_query($connection,"select * from tbl_blog where blog_name like '%$search%' ");
                    }
                     else
                    {
                            $q=mysqli_query($connection,"select * from tbl_blog");
                        }
                            while($data=mysqli_fetch_array($q))
                            {
                                $id=$data['blog_id'];
                                $bq=mysqli_query($connection,"SELECT SUBSTRING_INDEX(blog_detail,' ',30) AS detail FROM tbl_blog where blog_id='{$id}'");
                               $row=mysqli_fetch_assoc($bq);
                               $detail=$row['detail'];
                                

                                
                            ?>
                    <!-- blog start -->
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="post-block">
                                <!-- post vertical block -->
                                <div class="post-img zoomimg">
                                    <a href="blog-details.php?blogid=<?php echo $data['blog_id']; ?>"><img src="./admin/uploads/<?php echo $data['blog_photo_path'] ?>" alt="" class="img-fluid"></a>
                                </div>
                                <div class="post-content">
                              <h2 class="post-heading"><a href="blog-details.php?blogid=<?php echo $data['blog_id']; ?>" class="post-title"><?php echo $data['blog_name'] ?></a></h2>
                                    <p class="meta">
                                        <span class="meta-posted-by">By <a href="#">Admin</a></span>
                                        <span class="meta-date"><?php echo $data['blog_date'] ?></span>
                                    </p>

                                    <p><?php
                                    echo $detail."... ";

                                    ?></p>
                                    <a href="blog-details.php?blogid=<?php echo $data['blog_id']; ?>" class="btn-default-link">Read More</a>
                                </div>
                            </div>
                            <!-- /.post vertical block -->
                        </div>
                         <!-- blog end -->

                           
                         <?php
                            }
                            ?>



                       
                        <!-- post paginations -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="mb60 mt20">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- /.post paginations -->
                    </div>
                </div>
                <!-- /. blog post -->
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                    <div class="sidebar">
                        <div class="widget widget-search">
                            <!-- widget-search -->
                            <h3 class="widget-title">Search</h3>
                           
                            <form method="get">
                            <div class="input-group mb-3">




                                <input type="search" class="form-control" name="search" placeholder="search here" aria-label="search here" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <input class="btn btn-default" type="submit"value="Go" name="sbtn" id="button-addon2">
                                </div>





                            </div>
                            </form>
                        </div>
                        <!-- /.widget -->
                        <!-- widget-categories -->

                        <!-- widget-recent-post -->
                        <div class="widget widget-recent-post">
                            <h3 class="widget-title">Recent Post</h3>
                            <ul class="">

                            <?php
                            $rpq=mysqli_query($connection,"select * from tbl_blog LIMIT 5");
                            while($rpdata=mysqli_fetch_array($rpq))
                            {
                            ?>



                            <!-- recent-post-block -->
                                <li>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                            <div class="recent-post-img zoomimg">
                                                <a href="blog-details.php?blogid=<?php echo $rpdata['blog_id']; ?>"><img src="./admin/uploads/<?php echo $rpdata['blog_photo_path'] ?>" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8">
                                            <div class="recent-post-content">
                                                <h4 class="recent-title"><a href="blog-details.php?blogid=<?php echo $rpdata['blog_id']; ?>"><?php echo $rpdata['blog_name'] ?></a></h4>
                                                <p class="meta font-italic"><?php echo $rpdata['blog_date'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                             
                              
                                <!-- /.recent-post-block -->

                                <?php
                            }
                            ?>




                            </ul>
                        </div>
                        <!-- widget-archives -->
                        <!-- <div class="widget widget-archives">
                            <h3 class="widget-title">Archives</h3>
                            <ul class="angle">
                                <li><a href="#">September</a></li>
                                <li><a href="#">August</a></li>
                                <li><a href="#">July</a></li>
                                <li><a href="#">June</a></li>
                            </ul>
                        </div> -->
                        <!-- /.widget-archives -->
                        <!-- widget-tags -->
                        <!-- <div class="widget widget-tags">
                            <h3 class="widget-title">Tags</h3>
                            <a href="#">Wedding</a>
                            <a href="#">Wedding Venue</a>
                            <a href="#">Cakes</a>
                            <a href="#">Wedding Vendor</a>
                            <a href="#">Wedding Flowers</a>
                            <a href="#">Photography</a>
                        </div> -->
                        <!-- /.widget-tags -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- social-media-section -->
    
    <!-- /.social-media-section -->
    <!-- footer-section -->
    <?php
   include './theme/footer.php';
   ?>
    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <script src="js/custom-script.js"></script>
    <script src="js/return-to-top.js"></script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/blog-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:43 GMT -->
</html>