<?php
session_start();
include './connect/connection.php';
if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $dq=mysqli_query($connection,"delete from tbl_vendor where vendor_id='{$did}'");
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
	<title>Vendor Display</title>
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
			<div class="min-height-200px"  width="50px">
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
									<li class="breadcrumb-item active" aria-current="page">Vendor Table</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="vendor-add.php" role="button">
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
							<h3 class="text-blue h3">Vendor Table</h3> 
							<!-- <p>Admin Data</p> -->
						</div>
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Vendor Id</th>
                                <th scope="col">Name</th>
								<th scope="col">Price</th>
                                <!-- <th scope="col">Gender</th> -->
								<th scope="col">Email</th>
								<!-- <th scope="col">Password</th> -->
								<!-- <th scope="col">Mobile number</th> -->
                                <!-- <th scope="col">Service</th> -->
                                <th scope="col">Area </th>
								<th scope="col">Photo</th>
								<th scope="col">Category</th>
								<th scope="col">Action</th>

							</tr>
						</thead>
						<tbody>
							<?php
									$q=mysqli_query($connection,"select * from tbl_vendor");
									$count=mysqli_num_rows($q);
									echo "$count record found";
									while($data=mysqli_fetch_array($q))
									{
										$sq=mysqli_query($connection,"select * from tbl_category where category_id={$data['category_id']}");
										$datac=mysqli_fetch_array($sq);
										$seq=mysqli_query($connection,"select * from tbl_area where area_id={$data['area_id']}");
										$dataa=mysqli_fetch_array($seq);
										echo "<tr>";
										echo "<td>{$data['vendor_id']}</td>";
										echo "<td>{$data['vendor_name']}</td>";
										echo "<td>{$data['vendor_price']}</td>";
                                        // echo "<td>{$data['vendor_gender']}</td>";
										echo "<td>{$data['vendor_email']}</td>";
										// echo "<td>{$data['vendor_password']}</td>";
                                        // echo "<td>{$data['vendor_mobileno']}</td>";
                                        // echo "<td>{$data['vendor_service']}</td>";
                                        echo "<td>{$dataa['area_name']}</td>";
										echo "<td><a href='uploads/{$data['vendor_photo']}' target='_blank'><img src='uploads/{$data['vendor_photo']}'></img></a></td>";
										echo "<td>{$datac['category_name']}</td>";
										echo "<td><a href='vendor-edit.php?eid={$data['vendor_id']}'> Edit </a>|
										 <a href='vendor-display.php?did={$data['vendor_id']}' onclick='return check();'> Delete</a></td>"; 
										echo "</tr>";
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