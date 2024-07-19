<?php
session_start();
include './connect/connection.php';

if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $dq=mysqli_query($connection,"delete from tbl_feedback where feedback_id='{$did}'");
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
	<title>Feedback Display</title>
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
									<li class="breadcrumb-item active" aria-current="page">Feedback Table</li>
								</ol>
							</nav>
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="feedback-add.php" role="button">
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
							<h3 class="text-blue h3">Feedback Table</h3> 
							
						</div>
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Feedback Id</th>
								<th scope="col">Date</th>
								<th scope="col">Description</th>
								<th scope="col">Vendor Name</th>    
                                <th scope="col">Client Name</th>
								<!-- <th scope="col">Action</th> -->
							</tr>
						</thead>
						<tbody>
							<?php

								
									$q=mysqli_query($connection,"select * from tbl_feedback");
									$count=mysqli_num_rows($q);
									echo "$count record found";
									while($data=mysqli_fetch_array($q))
									{
										$cq=mysqli_query($connection,"select * from tbl_client where client_id={$data['client_id']}");
										$datac=mysqli_fetch_array($cq);
										$seq=mysqli_query($connection,"select * from tbl_vendor where vendor_id={$data['vendor_id']}");
										$datav=mysqli_fetch_array($seq);
										echo "<tr>";
										echo "<td>{$data['feedback_id']}</td>";
										echo "<td>{$data['feedback_date']}</td>";
										echo "<td>{$data['feedback_description']}</td>";
										echo "<td>{$datav['vendor_name']}</td>";
                                        echo "<td>{$datac['client_name']}</td>";
										// echo "<td><a href='feedback-display.php?did={$data['feedback_id']}' onclick='return check();'> Delete</a></td>"; 
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