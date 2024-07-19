<?php 
    session_start();
    if(isset($_SESSION['clientname']))
    {
        $cname=$_SESSION['clientname'];
        $cid=$_SESSION['clientid'];
    }
    else
    {
        header("location:log-in.php");
    }
    include './admin/connect/connection.php'; 
    
    if(isset($_GET['vendorid']))
    {
        $vid=$_GET['vendorid'];
        $wishq=mysqli_query($connection,"select * from tbl_wishlist where client_id='{$cid}' and vendor_id='{$vid}'");
        $wishdata=mysqli_fetch_array($wishq);
        if($vid == $wishdata['vendor_id'])
        {
            echo "<script>alert('Vendor is already in your wishlist..');window.location.assign('wishlist.php');</script>";
        }
        else
        {
            $vq=mysqli_query($connection,"insert into tbl_wishlist (client_id,vendor_id) values ('{$cid}','{$vid}')");
            if($vq)
            {
                echo "<script>alert('Added to your wishlist..');</script>";
                $q=mysqli_query($connection,"select * from tbl_wishlist where client_id='{$_SESSION['clientid']}'");
                echo "<script>window.location='wishlist.php';</script>";
            }
        }
    }
    if(isset($_GET['did']))
   {
    $did=$_GET['did'];
    $dq=mysqli_query($connection,"delete from tbl_wishlist where wishlist_id='{$did}';");
    if($dq)
    {
        
        header("location:wishlist.php");
    }
    }
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-request-quote.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Lavish Weddingz</title>
    <link rel="shortcut icon" type="image/x-icon" href="./admin/uploads/love.png">    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">

    <!-- Favicon icon -->
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
        <link href="css/offcanvas.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        function check()
        {
            return confirm("Are you sure,you want to remove vendor?");
        }
    </script>
    <style>
        .a{

            height:200px;
        }
        
    </style>
</head>

<body class="body-bg">

<?php
include './theme/client-header.php';
?>
    <div class="navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas">
            <span id="icon-toggle" class="fa fa-bars"></span>
        </button>
    </div>

    <div class="dashboard-wrapper">

        <?php 
            include './theme/client-sidebar.php';
        ?>
        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h3 class="dashboard-page-title">My Wishlist</h3>
                                    <p>Add your favourites here !!</p>
                                </div>
                            </div>
                        </div>


                        <div class="card request-list-table table-responsive">
                        <table class="table">
						<thead>
							<tr>
								<th scope="col"> Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Mobile number</th>
								<th scope="col">Email</th>
								<th scope="col">Area </th>
                                <th scope="col">Photo</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								
									$q=mysqli_query($connection,"select * from tbl_wishlist where client_id='{$_SESSION['clientid']}'");
									$i=1;
									while($data=mysqli_fetch_array($q))
									{  
                                        
                                        $vq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$data['vendor_id']}'");
                                        $vdata=mysqli_fetch_array($vq);
                                       
										
										echo "<tr>";
                                        echo "<td class='requester-name'>{$i}</td>";
                                        echo "<td class='requester-name'>{$vdata['vendor_name']}</td>";
                                        $categoryq=mysqli_query($connection,"select * from tbl_category where category_id='{$vdata['category_id']}'");
                                        $categorydata=mysqli_fetch_array($categoryq);
										echo "<td class='requester-name'>{$categorydata['category_name']}</td>";
                                        echo "<td class='requester-phone'>{$vdata['vendor_mobileno']}</td>";
										echo "<td>{$vdata['vendor_email']}</td>";
                                       
                                        $aq=mysqli_query($connection,"select * from tbl_area where area_id='{$vdata['area_id']}'");
                                        $adata=mysqli_fetch_array($aq);
                                        echo "<td class='requester-name'> {$adata['area_name']}</td>";
                                        
										echo "<td class='requester-name'><a target='_blank' href='./admin/uploads/{$vdata['vendor_photo']}'>
										<img  class='a' src='./admin/uploads/{$vdata['vendor_photo']}'></a></td>";

										echo "<td class='requester-action'><a class='btn btn-outline-violate btn-xs mr10' href='vendor-details.php?itemid={$data['vendor_id']}'> Details</a><p type='hidden'></p>
                                       
                                        <p type='hidden'></p><a class='btn btn-outline-pink btn-xs 'href='wishlist.php?did={$data['wishlist_id']}' onclick='return check();'> Delete</a></td>"; //delete page 
										echo "</tr>";
                                        $i++;
									}
								
	  					 	?>
						</tbody>
					</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/menumaker.min.js"></script>
    <script src="js/custom-script.js"></script>
     <!-- nice-select js -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/offcanvas.js"></script>
     <script src="js/jquery.slimscroll.js"></script>
    
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-request-quote.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:56 GMT -->
</html>