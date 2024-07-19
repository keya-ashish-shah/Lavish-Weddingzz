<?php
session_start();
include './connect/connection.php';
//Log In check
if(!isset($_SESSION['id']))
{
    echo "<script>alert('Login Required');window.location='login.php'</script>";
}
else
{
	$id = $_SESSION['id'];
}
if($_POST)
{
    $old=$_POST['oldpass'];
    $new=$_POST['newpass'];
    $confirm=$_POST['conpass'];
    $aid=$_SESSION['id'];
    //Fetch old password
    $oq=mysqli_query($connection,"select * from tbl_admin where admin_id='{$id}'");
    $olddata=mysqli_fetch_array($oq);
    if($olddata['admin_password'] == $old)
    {
        if($new == $confirm)
        {
            if($old == $new)
            {
                echo "<script>alert('New password can not be same as old Password..')</script>";
            }
            else{
                //Update new password
                $uq=mysqli_query($connection,"update tbl_admin set admin_password='{$new}' where admin_id='{$id}'");
                if($uq)
                {
                    echo "<script>alert('Password Changed Successfully');window.location='index.php'</script>";
                }     
            }
        }
        else
        {
            echo "<script>alert('New password and Confirm Password needs to be match..')</script>";
        }
    }
    else
    {
        echo "<script>alert('Old Password does not match..')</script>";
    }
}



?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Lavish Weddingz</title>

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
	<style>.bg11{
		background-color:#031E23;
	}</style>
</head>
<body>
<div class="login-header box-shadow bg11">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="./uploads/logo1.png" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li style="color:white;"><a href="login.php" style="color:white;">Login</a></li>
				</ul>
			</div>
		</div>
	</div>
			

	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<img src="vendors/images/forgot-password.png" alt="">
				</div>
				<div class="col-md-6">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Reset Password</h2>
						</div>
						<h6 class="mb-20">Enter your new password, confirm and submit</h6>
						<form method="post" id="myform">
                        <div class="input-group custom">
								<input type="password" name="oldpass"class="form-control form-control-lg" placeholder="Old Password" required><br>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="newpass" class="form-control form-control-lg" placeholder="New Password" required> <br>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="conpass" class="form-control form-control-lg" placeholder="Confirm New Password" required><br>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row align-items-center">
								<div class="col-5">
									<div class="input-group mb-0">
									
									<input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
									
										<!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Submit</a> -->
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
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