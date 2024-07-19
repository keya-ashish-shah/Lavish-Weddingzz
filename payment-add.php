<?php
session_start();
    include './connect/connection.php';

    if($_POST)
    {
        $bid=$_POST['bookingid'];
        $cid=$_POST['clientid'];
        $method=$_POST['paymentmethod'];
        $price=$_POST['paymentprice'];
        $status=$_POST['paymentstatus'];
        $details=$_POST['transactiondetails'];
        $q=mysqli_query($connection,"insert into tbl_payment (booking_id,client_id,payment_method,payment_price,payment_status,transaction_details) 
        values ('{$bid}','{$cid}','{$method}','{$price}','{$status}','{$details}');");
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
	<title>Payment Page</title>

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
									<li class="breadcrumb-item active" aria-current="page">Payment Form </li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
                    
					<div class="clearfix">
						<div class="pull-left">
							<h3 class="text-blue h3">Payment Form</h3>
						</div>
					</div>
					<form method="post" id="myform">
                    <div class="form-group">
							<label> Booking ID</label>
							
							<?php
							$sbq=mysqli_query($connection,"select * from tbl_booking_master");
							echo "<select class='form-control' name='bookingid' id='select' required='required'>";
							echo "<option value=''>Select</option>";
							while($rowb = mysqli_fetch_array($sbq))
							{
								echo "<option class='form-control' value='{$rowb['booking_id']}'>{$rowb['booking_id']}</option>";
							}
							echo "</select>";
							?>
						</div>
                        <div class="form-group">
							<label> Client  </label>
							 
							<?php
							$sq=mysqli_query($connection,"select * from tbl_client");
							echo "<select class='form-control' name='clientid' id='select' required='required'>";
							echo "<option value=''>Select</option>";
							while($row = mysqli_fetch_array($sq))
							{
								echo "<option class='form-control' value='{$row['client_id']}'>{$row['client_name']}</option>";
							}
							echo "</select>";
							?>
						</div>
						<div class="form-group">
							<label> Payment Method</label>
							<input class="form-control" name="paymentmethod" type="text" placeholder="Enter Payment Method.." required>
						</div>
                        <div class="form-group">
							<label> Payment Price</label>
                            <input class="form-control" name="paymentprice" type="text" placeholder="Enter Payment Price.." required>					
						</div>
                        <div class="form-group">
							<label> Payment Status</label>
                            <input class="form-control" name="paymentstatus" type="text" placeholder="Enter Payment Status.." required>						
						</div>
                        
                        <div class="form-group">
							<label> Payment Details</label>
                            <textarea class="form-control" name="transactiondetails"  placeholder="Enter Payment Details.." required></textarea>        
                        </div>
						</div>
						<div class="form-group">
						    <input type="submit"value="Add" class="btn btn-success " >  
							<input type="reset" value="Reset"class="btn btn-danger ">
							<input type="button" class="btn btn-primary pull-right" value="View" onclick="window.location='payment-display.php'">
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