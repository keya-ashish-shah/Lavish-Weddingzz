<?php
	session_start();

    include './connect/connection.php';
    
    if($_POST)
    {
        $name=$_POST['adminname']; 
        $email=$_POST['adminemail'];
        $password=$_POST['adminpwd'];

        $q=mysqli_query($connection,"insert into tbl_admin (admin_name,admin_email,admin_password) values ('{$name}','{$email}','{$password}');");
        if($q)
        {	
            echo "<script>alert('Record Adeed Successfully..');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>


	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Admin Page</title>

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
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item " aria-current="page">Forms</li>
									<li class="breadcrumb-item active" aria-current="page">Admin Form</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
                    
					<div class="clearfix">
						<div class="pull-left">
							<h3 class="text-blue h3">Admin Form</h3>
						</div>
					</div>
					<form method="post" id="myform">
						<div class="form-group">
							<label>Admin Name</label>
							<input class="form-control" name="adminname" type="text" placeholder="Enter Admin Name.." required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" name="adminemail" type="email" placeholder="Enter Email.." required>
						</div>
						
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" name="adminpwd" type="password" placeholder="Enter Password.." required>
						</div>
						<div class="form-group">
						    <input type="submit"value="Add" class="btn btn-success " >  
							<input type="reset" value="Reset"class="btn btn-danger ">
							<input type="button" class="btn btn-primary pull-right" value="View" onclick="window.location='admin-display.php'">
						</div>
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