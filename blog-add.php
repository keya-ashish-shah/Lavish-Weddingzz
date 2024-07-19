
<?php
    session_start();
    include './connect/connection.php';
	$msg="";
    if(isset($_POST['btnsubmit']))
    { 
		$photo=$_FILES['file123']['name'];
		$filepath=$_FILES['file123']['tmp_name'];
		move_uploaded_file($filepath,"./uploads/".$photo);
        $detail=$_POST['blogdetail'];
        $date=$_POST['blogdate'];
        $name=$_POST['blogname'];
       
        $bq=mysqli_query($connection,"insert into tbl_blog (blog_name,blog_detail,blog_date,blog_photo_path)
        values ('{$name}','{$detail}','{$date}','{$photo}');");
        if($bq)
        {
             $msg = "
 			<div class='alert alert-success' role='alert'>
				Record Added 
			</div>
		  	";
        }
    }


	else if(isset($_GET['blogid']))
{
    $bid=$_GET['blogid'];
    $q=mysqli_query($connection,"select * from tbl_blog where blog_id='{$bid}'");
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Blog Page</title>
<!-- <title>Lavish Weddingz</title> -->

<!-- Site favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="./uploads/love.png">
<link rel="icon" type="image/png" sizes="16x16" href="./uploads/love.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<style>
	.alert{position:relative;padding:.75rem 1.25rem;margin-bottom:1rem;border:1px solid transparent;border-radius:.25rem};
	.alert-success{color:#155724;background-color:#d4edda;border-color:#c3e6cb};
	.alert-success hr{border-top-color:#b1dfbb};
	.alert-success .alert-link{color:#0b2e13};
</style>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');

	</script>
</head>
<body>
	<!-- preloader -->
    <?php
    //include './theme/loader.php';
    ?>
    <!-- end preloader -->
    <!-- header starts -->
	<?php
     include './theme/header.php';

    ?>
    <!-- header close -->
    <!-- rightside bar settings starts -->
	<?php
    include './theme/right-sidebar.php';
    ?>
    <!-- ends right side bar -->
   <!-- sidebar start -->
    <?php
    include './theme/left-sidebar.php';
    ?>

   <!--  -->
	<div class="mobile-menu-overlay"></div>
	<?php echo $msg; ?>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Basic Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item">Forms</li>
									<li class="breadcrumb-item active" aria-current="page">Blog Form</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				
				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
                    
					<div class="clearfix">
						<div class="pull-left">
							<h3 class="text-blue h3">Blog Form</h3>
						</div>
					</div>
					
                    <form method="post" enctype="multipart/form-data" id="myform">
						<div class="form-group">
							<label>Name </label>
							<input class="form-control" type="text" name="blogname" placeholder="Enter blog Name.." required>
						</div>

                        <div class="form-group">
							<label>Details</label>
                            <textarea class="form-control" name="blogdetail" placeholder="add details here..." required></textarea>
						</div>

                        <div class="form-group">
							<label>Date </label>
							<input class="form-control" name="blogdate"  type="Date"required>
						</div>

                        <div class="form-group">
							<label>Photo </label>
							<input type="file" class="form-control" name="file123" id="formFile" required>
						</div>

						<input type="submit" class="btn btn-success " value="Add" name="btnsubmit">
						<input type="button" class="btn btn-primary pull-right " value="View" onclick="window.location='blog-display.php'">
						<input type="reset" class="btn btn-danger " value="Reset">
					</form>
					
				</div>
				<!-- horizontal Basic Forms End -->
			</div>
			<!-- footer -->
        	<?php
            	include 'theme/footer.php'; 
        	?>
        	<!--  -->
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<!-- <script src="jquery-3.7.1.min.js" type="text/javascript"></script> -->
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
</html>