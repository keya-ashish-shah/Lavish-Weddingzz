<?php
    session_start();
    include './connect/connection.php';
    if(isset($_POST['btnsubmit']))
    {
		$photo=$_FILES['file123']['name'];
		$filepath=$_FILES['file123']['tmp_name'];
		move_uploaded_file($filepath,"uploads/".$photo);
        $name=$_POST['clientname'];
        $gender=$_POST['clientgender'];
        $mobile=$_POST['clientmobile'];
        $email=$_POST['clientemail'];
        $password=$_POST['clientpwd'];
        $add=$_POST['clientadd'];
        $areaid=$_POST['areaid'];
        // $photo=$_POST['clientphoto'];
        $q=mysqli_query($connection,"insert into tbl_client (client_name,client_gender,client_mobileno,client_email,client_password,client_address,area_id,client_photo) 
        values ('{$name}','{$gender}','{$mobile}','{$email}','{$password}','{$add}','{$areaid}','{$photo}');");
        if($q)
        {
            echo "<script>alert('Record Added Successfully..');</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Client Page</title>

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
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item">Forms</li>
									<li class="breadcrumb-item active" aria-current="page">Client</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
                    
					<div class="clearfix">
						<div class="pull-left">
							<h3 class="text-blue h3">Client Form</h3>
						</div>
					</div>
					
                    <form method="post" enctype="multipart/form-data" id="myform">
						<div class="form-group">
							<label>Client name</label>
							<input class="form-control" type="text" name="clientname" placeholder="Enter Client Name.." required>
						</div>

                        <div class="form-group">
							<label>Gender</label>
							<input class="form-control" name="clientgender" placeholder="Male/Female" type="text" required>
						</div>
                        <div class="form-group">
							<label>Mobile Number</label>
							<input class="form-control" name="clientmobile"  type="tel"  placeholder="1234567890" required>
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input class="form-control" name="clientemail" placeholder="abc@example.com" type="email" required>
						</div> 
						<div class="form-group">
							<label>Password</label>
							<input class="form-control" name="clientpwd"  type="password" placeholder="password" required></input>
						</div>
                        <div class="form-group">
							<label>Address</label>
                            <textarea class="form-control" name="clientadd"  placeholder="123,AbC,qwe.." required></textarea>        
                        </div>
                        <div class="form-group">
							<label> Area ID </label>
							<!-- <input class="form-control" name="areaid" type="text" > -->
							<?php
							$sq=mysqli_query($connection,"select * from tbl_area");
							echo "<select class='form-control' name='areaid' id='select' required='required'>";
							echo "<option value=''>Select</option>";
							while($row = mysqli_fetch_array($sq))
							{
								echo "<option class='form-control' value='{$row['area_id']}'>{$row['area_name']}</option>";
							}
							echo "</select>";
							?>
						</div>

                        <div class="form-group">
							<label>Photo </label>
							<!-- <input class="form-control" name="clientphoto"  type="text"> -->
							<input type="file" class="form-control"   name="file123" required>
						</div>

						<input type="submit" class="btn btn-success " value="Add" name="btnsubmit">
						<input type="button" class="btn btn-primary pull-right " value="View" onclick="window.location='client-display.php'">
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