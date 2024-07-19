<?php
session_start();
include './connect/connection.php';

if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $dq=mysqli_query($connection,"delete from tbl_payment where payment_id='{$did}'");
    if($dq)
    {
        echo "<script>alert('Record Deleted');</script>";
    }   
}
?>
<script>
function check()
{
    return confirm('Are you sure?');
}
</script>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Payment Display</title>
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
	//include './theme/loader.php';
?>

<?php 
    include './theme/right-sidebar.php'; 
?>
	
<?php
    include './theme/left-sidebar.php';
?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Basic Tables</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item">Tables</li>
									<li class="breadcrumb-item active" aria-current="page">Payment Table</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="payment-add.php" role="button">
									Add
								</a>
								
							</div>
						</div>
					</div>
				</div>
			
				<!-- Striped table start --> 
				<div class="pd-20 card-box mb-30">
					<div class="clearfix mb-20">
						<div class="pull-left">
							<h3 class="text-blue h3">Payment Table</h3> 
							
						</div>
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Id</th>
                                <th scope="col">Client Name</th>
								<th scope="col">Vendor Name</th>
								<th scope="col">Category</th>
								<th scope="col">Price</th> 
                                <th scope="col">Status</th>
								<th scope="col">Payment Method</th>   
                                <!-- <th scope="col">Transaction Details</th> -->
								<!-- <th scope="col">Action</th> -->
							</tr>
						</thead>
						<tbody>
							<?php
									$q=mysqli_query($connection,"select * from tbl_payment");
									$count=mysqli_num_rows($q);
									echo "$count record found";
									while($data=mysqli_fetch_array($q))
									{
										$pq=mysqli_query($connection,"select * from tbl_booking_master where booking_id={$data['booking_id']}");
										$pdata=mysqli_fetch_array($pq);
										$cq=mysqli_query($connection,"select * from tbl_client where client_id={$data['client_id']}");
										$cdata=mysqli_fetch_array($cq);
										$vq=mysqli_query($connection,"select * from tbl_vendor where vendor_id={$pdata['vendor_id']}");
										$vdata=mysqli_fetch_array($vq);
										$catq=mysqli_query($connection,"select * from tbl_category where category_id={$vdata['category_id']}");
										$catdata=mysqli_fetch_array($catq);
										echo "<tr>";
										echo "<td>{$data['payment_id']}</td>";
                                        echo "<td>{$cdata['client_name']}</td>";
                                        echo "<td>{$vdata['vendor_name']}</td>";
										echo "<td>{$catdata['category_name']}</td>";
										echo "<td>{$data['payment_price']}</td>";
										echo "<td>{$data['payment_status']}</td>";
										echo "<td>{$data['payment_method']}</td>";
                                        // echo "<td>{$data['transaction_details']}</td>";
										echo "</tr>";		
									}
	  					 	?>
						</tbody>
					</table>
					
				</div>
				<!-- Striped table End -->
			</div>
			<?php
			include './theme/footer.php';
			?>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
</body>
</html>