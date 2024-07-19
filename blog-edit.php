<?php
	session_start();
    include './connect/connection.php';

    $eid=$_GET['eid'];
    if(!isset($_GET['eid']))
    {
        header("location:blog-display.php");
    }

    $sq=mysqli_query($connection,"select * from tbl_blog where blog_id='{$eid}'");
    $data=mysqli_fetch_array($sq);

    if($_POST)
    {
		$photo=$_FILES['blogphoto']['name'];
		$filepath=$_FILES['blogphoto']['tmp_name'];
		move_uploaded_file($filepath,"./uploads/".$photo);
    	$name=$_POST['blogname'];
    	$details=$_POST['detail'];
    	$date=$_POST['dates'];
	
    
    $uq=mysqli_query($connection,"update tbl_blog set blog_name='{$name}',blog_detail='{$details}',blog_photo_path='{$photo}' where blog_id='{$eid}'");
    if($uq)
    {
            echo "<script>alert('Record Updated');window.location='blog-display.php';</script>";
    }
}
?> 

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Blog Page</title>

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
		include './theme/right-sidebar.php';
		include './theme/left-sidebar.php';
	?>

   <!--  -->
<div class="mobile-menu-overlay">
</div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Form</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Blog Form</li>
								</ol>
							</nav>
						</div>
						
					</div>
				</div>
				
				<!-- horizontal Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Blog Form</h4>
						</div>
						
					</div>
					
						
                    <form method="post" enctype="multipart/form-data" id="myform">
						<div class="form-group">
							<label>Name </label>
							<input class="form-control" name="blogname" value="<?php echo $data['blog_name']; ?>" type="text" placeholder="Enter Blog Name">
						</div>

                        <div class="form-group">
							<label>Details</label>
                            <textarea class="form-control" name="detail" placeholder="add details here..." required><?php echo $data['blog_detail']; ?></textarea>
						</div>

                        <div class="form-group">
							<label>Date </label>
							<input class="form-control" name="dates" value="<?php echo $data['blog_date']; ?>" type="Date"required>
						</div>

                        <div class="form-group">
							<label>Photo </label>
							<input class="form-control" type="file" name="blogphoto" value="<?php echo $data['blog_photo_path']?>"required>
						</div>

						<input type="submit" class="btn btn-success" value="Update"">
						<input type="reset" class="btn btn-danger" value="Reset">
						<input type="button" onclick="window.location='blog-display.php'" class="btn btn-primary pull-right" value="View">
					</form>
					
				</div>
				<!-- horizontal Basic Forms End -->
			</div>
			<!-- footer -->
            <?php
            include './theme/footer.php'; 
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