<?php
session_start();

include './connect/connection.php';
if($_POST)
{
   $name=$_POST['areaname'];
   $pincode=$_POST['pincode'];
   $q=mysqli_query($connection,"insert into tbl_area (area_name,pincode) values ('{$name}','{$pincode}');");
   if($q)
   {
	   echo "<script>alert('Record Inserted');</script>";
   }
}

?> 

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Area Page</title>

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

	<?php
     include './theme/header.php';
    include './theme/right-sidebar.php';
    include './theme/left-sidebar.php';
    ?>

   <!--  -->
	<div class="mobile-menu-overlay"></div>

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
									<li class="breadcrumb-item active" aria-current="page">Area Form</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				

				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30"> 
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Area Form</h4>
						</div>
						
					</div>
					<form method="post" id="myform">
						
                        <div class="form-group">
							<label>Area Name</label>
							<input class="form-control" name="areaname" type="text" placeholder="Enter Area Name" required>
						</div>
						
						<div class="form-group">
							<label>Pincode</label>
							<input class="form-control" name="pincode" placeholder="5" type="text" required>
						</div>	
                        <input type="submit" class="btn btn-success" value="Add">
						<input type="reset" class="btn btn-danger" value="Reset">
						<input type="button" onclick="window.location='area-display.php'" class="btn btn-primary pull-right" value="View">											
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