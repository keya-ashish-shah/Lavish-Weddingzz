<?php 
    session_start();
    include './admin/connect/connection.php';
    if(!isset($_SESSION['vendorname']))
    {
        header("location:log-in.php");
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
</head>

<body class="body-bg">


    <?php 
        include './theme/vendor-header.php';
    ?>


    <div class="navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas">
            <span id="icon-toggle" class="fa fa-bars"></span>
        </button>
    </div>

    <div class="dashboard-wrapper">

        <?php 
            include './theme/vendor-sidebar.php';
        ?>
        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h3 class="dashboard-page-title">Manage Booking</h3>
                                    <p>Accept or Reject your Bookings Here !!</p>
                                </div>
                            </div>
                        </div>


                        <div class="card request-list-table table-responsive">
                        <table class="table">
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
								
                                    $status="Requested";
									$q=mysqli_query($connection,"select * from tbl_booking_master where vendor_id='{$_SESSION['vendorid']}' and booking_status='{$status}'");
                                    
									
									while($data=mysqli_fetch_array($q))
									{  
                                        
                                        $cldq=mysqli_query($connection,"select * from tbl_client where client_id='{$data['client_id']}'");
                                        $cldata=mysqli_fetch_array($cldq);
                                       
										
										echo "<tr>";
										echo "<td class='requester-name'>{$data['booking_id']}</td>";
                                        echo "<td class='requester-name'>{$cldata['client_name']}</td>";
										echo "<td class='requester-name'>{$cldata['client_gender']}</td>";
                                        echo "<td class='requester-phone'>{$cldata['client_mobileno']}</td>";
										echo "<td>{$cldata['client_email']}</td>";
                                        // echo "<td>{$data['client_password']}</td>";
										echo "<td class='requester-name'>{$cldata['client_address']}</td>";
                                       
                                        $aq=mysqli_query($connection,"select * from tbl_area where area_id='{$cldata['area_id']}'");
                                        $adata=mysqli_fetch_array($aq);
                                        echo "<td class='requester-name'> {$adata['area_name']}</td>";
                                        
										echo "<td class='requester-name'><a target='_blank' href='./admin/uploads/{$cldata['client_photo']}'>
										<img width='50' src='./admin/uploads/{$cldata['client_photo']}'></a></td>";

                                        if(isset($_POST['updatestatus']))
                                        {
                                            $status="Confirmed";
                                            $uq=mysqli_query($connection,"update tbl_booking_master set booking_status='{$status}' where booking_id='{$data['booking_id']}'");
                                        }


                                        echo "<form method='post'>";
										echo "<td class='requester-action'><a class='btn btn-outline-violate btn-xs mr10' href='booking-details.php?bookingid={$data['booking_id']}'> Details</a><p type='hidden'></p>
                                        <button class='btn btn-outline-success btn-xs mr10' name='updatestatus'> Accept</button> 
                                        <p type='hidden'></p><a class='btn btn-outline-pink btn-xs 'href='client-display.php?did={$data['client_id']}' onclick='return check();'> Delete</a></td>"; //delete page
                                        echo "</form>"; 
										echo "</tr>";
										echo "</tr>"; 
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