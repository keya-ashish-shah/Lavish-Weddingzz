<?php
	session_start();
    include './connect/connection.php';
    $eid=$_GET['eid'];
    if(!isset($_GET['eid']))
    {
        header("location:category-display.php");
    }
    $eq=mysqli_query($connection,"select * from tbl_category where category_id='{$eid}';");
    $row=mysqli_fetch_array($eq);
    if($_POST)
    {
        
		$filename=$_FILES['categoryphoto']['name'];
		$filepath=$_FILES['categoryphoto']['tmp_name'];
		move_uploaded_file($filepath,"uploads/".$filename);
		$name=$_POST['categoryname'];
        $q=mysqli_query($connection,"update tbl_category set category_name='{$name}',category_photo='{$filename}' where category_id='{$eid}';");
        if($q)
        {
            echo "<script>alert('Record Updated Successfully..');window.location='category-display.php'</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Category Page</title>

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
								<h4> Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Category Form</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>

				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
                    
					<div class="clearfix">
						<div class="pull-left">
							<h3 class="text-blue h3">Category Edit Form</h3>
						</div>
					</div>
					<form method="post"enctype="multipart/form-data">
						<div class="form-group">
							<label> Name</label>
							<input class="form-control" name="categoryname" type="text" value="<?php echo $row['category_name']; ?>" placeholder="Enter Category Name..">
						</div>
						<div class="form-group">
							<label>Photo </label>
							<input class="form-control" name="categoryphoto"  type="file" required>
						</div>
						
						<div class="form-group">
						    <input type="submit"value="Update" class="btn btn-success " >  
							<input type="reset" value="Reset"class="btn btn-danger ">
							<input type="button" class="btn btn-primary pull-right" value="View" onclick="window.location='category-display.php'">
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
</body>
</html>