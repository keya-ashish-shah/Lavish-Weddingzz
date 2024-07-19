<?php
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Feedback Page</title>

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
		include './connect/connection.php';

		if($_POST){ 
			$cid=$_POST['clientid'];
			$vid=$_POST['vendorid'];
			$description=$_POST['feedbackdescription'];
            $date=$_POST['feedbackdate'];
			$q=mysqli_query($connection,"insert into tbl_feedback(feedback_description,feedback_date,vendor_id,client_id) values('{$description}','{$date}','{$vid}','{$cid}')");
			if($q){
				echo "<script>alert('Registered Successfully');</script>";
               
			}
		}
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
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item">Forms</li>
									<li class="breadcrumb-item active" aria-current="page">Feedback Form</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h3 class="text-blue h3">Feedback Form</h3>
						</div>
					</div>

					<form method="post" id="myform">
						<div class="form-group">
							<label> Client </label>
							<?php
							$seq=mysqli_query($connection,"select * from tbl_client ");
							echo "<select name='clientid' class='form-control' id='select' required='required' >";
							echo "<option value=''>Select</option>";
							while($datac=mysqli_fetch_array($seq))
							{
								echo "<option value='{$datac['client_id']}'>{$datac['client_name']}</option>";
							}	
							echo "</select>";
						
							?>
						</div>
						<div class="form-group">
							<label> Vendor</label>
							<?php
							$sq=mysqli_query($connection,"select * from tbl_vendor ");
							echo "<select name='vendorid' class='form-control' id='select' required='required'>";
							echo "<option value=''>Select</option>";
							while($datav=mysqli_fetch_array($sq))
							{
								echo "<option value='{$datav['vendor_id']}'>{$datav['vendor_name']}</option>";
							}	
							echo "</select>";
						
							?>
						</div>
						<div class="form-group">
							<label>Feedback Description</label>
							<textarea class="form-control" name="feedbackdescription" placeholder="Enter description" required></textarea>
						</div>
						
						<div class="form-group">
							<label>Date</label>
							<input class="form-control" name="feedbackdate" type="date" required>
						</div>
					
						
						<input type="submit" class="btn btn-success " value="Add">
						<input type="button" class="btn btn-primary pull-right " value="View" onclick="window.location='display-feedback.php'">
						<input type="reset" class="btn btn-danger " value="Reset">
					</form>

					<div class="collapse collapse-box" id="horizontal-basic-form1" >
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#horizontal-basic"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#horizontal-basic-form1" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>	
						</div>
					</div>

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