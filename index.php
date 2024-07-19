<?php 
session_start();
include './connect/connection.php';
if(!isset($_SESSION['name']))
{
	header("location:login.php");
}


$cc=mysqli_query($connection,"select * from tbl_category");
$ccount=0;
while($cdata=mysqli_fetch_array($cc))
{
	$ccount++;
}

$vc=mysqli_query($connection,"select * from tbl_vendor");
$vcount=0;
while($vdata=mysqli_fetch_array($vc))
{
	$vcount++;
}

$clc=mysqli_query($connection,"select * from tbl_client");
$clcount=0;
while($cldata=mysqli_fetch_array($clc))
{
	$clcount++;
}

$fc=mysqli_query($connection,"select * from tbl_feedback");
$fcount=0;
while($fdata=mysqli_fetch_array($fc))
{
	$fcount++;
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
	<link rel="stylesheet" type="text/css" href="src/plugin	s/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/datatables/css/responsive.bootstrap4.min.css">
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
    //include './theme/loader.php';
    ?>
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
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							<b>Welcome back !!</b> <div class="weight-600 font-30 text-blue">
								<?php
								echo $_SESSION['name'];
								?>
							</div>
						</h4>
						<p class="font-18 max-width-600">"Efficiency fuels thriving businesses, igniting success through streamlined processes, and innovative strides. It's the cornerstone of  guiding every purpose-driven action towards unparalleled efficiency."</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $ccount;?>+</div>
								<div class="weight-600 font-14">Category</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $vcount;?>+</div>
								<div class="weight-600 font-14">Vendor</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $clcount;?>+</div>
								<div class="weight-600 font-14">Client</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $fcount;?>+</div>
								<div class="weight-600 font-14">Feedback</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div> -->
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">Best Vendors</h2>
				<table class="data-table table nowrap">
				<thead>
							<tr>
								<th scope="col">Vendor Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Service</th>
                                <th scope="col">Area </th>
								<th scope="col">Photo</th>
								<th scope="col">Category</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
					<tbody>
					<?php
									$q=mysqli_query($connection,"select * from tbl_vendor LIMIT 10");
									$count=mysqli_num_rows($q);
									
									while($data=mysqli_fetch_array($q))
									{
										$sq=mysqli_query($connection,"select * from tbl_category where category_id={$data['category_id']}");
										$datac=mysqli_fetch_array($sq);
										$seq=mysqli_query($connection,"select * from tbl_area where area_id={$data['area_id']}");
										$adata=mysqli_fetch_array($seq);
										echo "<tr>";
										echo "<td>{$data['vendor_id']}</td>";
										echo "<td>{$data['vendor_name']}</td>";
                                        echo "<td>{$data['vendor_gender']}</td>";
										
                                        
                                        echo "<td>{$data['vendor_service']}</td>";
                                        echo "<td>{$adata['area_name']}</td>";
										echo "<td><a href='uploads/{$data['vendor_photo']}' target='_blank'><img  width='70px' src='uploads/{$data['vendor_photo']}'></img></a></td>";
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
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard.js"></script>
</body>
</html>