<?php

session_start();
include './connect/connection.php';

if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $dq=mysqli_query($connection,"delete from tbl_client where client_id='{$did}'");
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
	<title>Client Display</title>

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
	//include './theme/loader.php';
    include './theme/header.php';
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
									<li class="breadcrumb-item active" aria-current="page">Client Table</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="client-add.php" role="button">
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
							<h3 class="text-blue h3">Client Table</h3> 
							<!-- <p>Admin Data</p> -->
						</div>
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col"> Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Mobile number</th>
								<th scope="col">Email</th>
								<!-- <th scope="col">Password</th> -->
                                <th scope="col"> Address</th>
                                <th scope="col">Area </th>
                                <th scope="col">Photo</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								
									$q=mysqli_query($connection,"select * from tbl_client");
									$count=mysqli_num_rows($q);
									echo "$count record found";
									while($data=mysqli_fetch_array($q))
									{
										$sq=mysqli_query($connection,"select * from tbl_area where area_id={$data['area_id']}");
										$adata=mysqli_fetch_array($sq);
										echo "<tr>";
										echo "<td>{$data['client_id']}</td>";
                                        echo "<td>{$data['client_name']}</td>";
										echo "<td>{$data['client_gender']}</td>";
                                        echo "<td>{$data['client_mobileno']}</td>";
										echo "<td>{$data['client_email']}</td>";
                                        // echo "<td>{$data['client_password']}</td>";
										echo "<td>{$data['client_address']}</td>";
                                        echo "<td>{$adata['area_name']}</td>";
                                        
										echo "<td><a target='_blank' href='uploads/{$data['client_photo']}'>
										<img width='50' src='uploads/{$data['client_photo']}'></a></td>";

										echo "<td><a href='client-display.php?did={$data['client_id']}' onclick='return check();'> Delete</a></td>"; 
										echo "</tr>";
										echo "</tr>"; 
									}
								
	  					 	?>
						</tbody>
					</table>
					<div class="collapse collapse-box" id="striped-table">
						<div class="code-box">
							<div class="clearfix">
								<a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"  data-clipboard-target="#striped-table-code"><i class="fa fa-clipboard"></i> Copy Code</a>
								<a href="#striped-table" class="btn btn-primary btn-sm pull-right" rel="content-y"  data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
							</div>

							<pre>
								<code class="xml copy-pre" id="striped-table-code">
									<table class="table table-striped">
										<thead>
											<tr>
												<th scope="col">#</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
											</tr>
										</tbody>
									</table>
								</code>
							</pre>

						</div>
					</div>
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