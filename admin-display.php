<?php
session_start();

include './connect/connection.php';

if(isset($_GET['did']))
{
    $did=$_GET['did'];
    $dq=mysqli_query($connection,"delete from tbl_admin where admin_id='{$did}';");
    if($dq)
    {
        echo "<script>alert('Record Deleted');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Admin Display</title>

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
        function check()
        {
            return confirm("Are you sure you want to delete this record?");
        }
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
								<h4>Basic Tables</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item">Tables</li>
									<li class="breadcrumb-item active" aria-current="page">Admin Table</li>
								</ol>
							</nav>
							
						</div>
						<div class="col-md-6 col-sm-12 text-right">
							<div class="dropdown">
								<a class="btn btn-primary " href="admin-add.php" role="button">
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
							<h3 class="text-blue h3">Admin table</h3>
						</div>
						
					</div>
					<table class="table table-striped">
						<thead>
							<tr>
								<th >ID</th>
								<th >Name</th>
								<th >Email</th>
								<!-- <th >Password</th> -->
                                <th >Action</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            $sq=mysqli_query($connection,"select * from tbl_admin ;");
                            $count=mysqli_num_rows($sq);
                            echo "$count records found";
                            while($data=mysqli_fetch_array($sq))
                            {
                                echo "<tr>";
								echo "<th scope='row'>{$data['admin_id']}</th>";
								echo "<td>{$data['admin_name']}</td>";
								echo "<td>{$data['admin_email']}</td>";
								// echo "<td>{$data['admin_password']}</td>";
								echo "<td><a href='admin-edit.php?eid={$data['admin_id']}'>Edit </a>|
                                <a href='admin-display.php?did={$data['admin_id']}' onclick='return check();'> Delete </a></td>";
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