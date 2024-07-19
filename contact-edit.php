<?php
session_start();
include './connect/connection.php';

$eid=$_GET['eid'];
if(!isset($_GET['eid']))
{
    header("location:contact-display.php");
}
$eq=mysqli_query($connection,"select * from tbl_contact where contact_id='{$eid}'");
$row=mysqli_fetch_array($eq);
$msg="";
if($_POST)
{   
    $name=$_POST['contactname'];
    $email=$_POST['contactemail'];
    $subject=$_POST['contactsubject'];
    $detail=$_POST['contactdetail'];	
	$eq=mysqli_query($connection,"update tbl_contact set contact_name='{$name}',contact_email='{$email}',contact_subject='{$subject}',contact_detail='{$detail}' where contact_id='{$eid}'");
	if($eq)
	{
		echo "<script>alert('Record Updated');window.location='contact-display.php';</script>";
	}

}
?>


<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Contact Page</title>

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
		// if($_POST){    
        //     $name=$_POST['contactname'];
        //     $email=$_POST['contactemail'];
        //     $subject=$_POST['contactsubject'];
        //     $detail=$_POST['contactdetail'];	
		// 	$q=mysqli_query($connection,"insert into tbl_contact(contact_name,contact_email,contact_subject,contact_detail) values('{$name}','{$email}','{$subject}','{$detail}')");
		// 	if($q){
		// 		echo "<script>alert('Registered Successfully');</script>";
		// 	}
		// }
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
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Form Basic</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									January 2022
								</a>
								<div class="dropdown-menu dropdown-menu-right">
									<a class="dropdown-item" href="#">Export List</a>
									<a class="dropdown-item" href="#">Policies</a>
									<a class="dropdown-item" href="#">View Assets</a>
								</div>
							</div>
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

					<form method="post">
                    <div class="form-group">
							<label>Contact name</label>
							<input class="form-control" type="text" name="contactname" value="<?php echo $row['contact_name'] ;?>">
						</div>
						
						<div class="form-group">
							<label>Email</label>
							<input class="form-control" name="contactemail" value="<?php echo $row['contact_email']?>" >
						</div>

						<div class="form-group">
							<label>Subject</label>
							<input class="form-control" name="contactsubject" value="<?php echo $row['contact_subject'] ;?>">

						<div class="form-group">
							<label>Detail</label>
							<input class="form-control" name="contactdetail" value="<?php echo $row['contact_detail']?>">
						</div>
						<input type="submit" class="btn btn-success " value="Edit">
						<input type="button" class="btn btn-primary pull-right " value="View" onclick="window.location='display-admin.php'">
						<input type="button" class="btn btn-danger " value="Reset">
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
</body>
</html>




