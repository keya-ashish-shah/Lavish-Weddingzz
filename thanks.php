<?php
session_start();
include './admin/connect/connection.php';
if(!$_GET['bid'])
{
    header("location:vendor-details.php");
}

?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:35 GMT -->
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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body{
            text-align: center;
        }
        img{
            width: 200px;
        }
        .tick{
            width:50px;
        }
        .ticks{
            width:150px;
        }
       
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
	
    </style>
</head>
<!-- vendor-form -->

<body class="vendor-bg-image">
    <!-- sign up -->
    <div class=" vendor-form">
        <div class="container">
            <div class="row ">
                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12  ">
                    <!-- vendor head -->
                    <div class="vendor-head">
                        <a href="index.php"><img src="./admin/uploads/logo2.png" alt="Wedding Vendor & Supplier Directory HTML Template "></a>
                    </div>
                    <!-- /.vendor head -->
                    <div class="st-tab">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="invoice-box">
                                        <?php

                                            $bid=$_GET['bid'];
                                            $q=mysqli_query($connection,"select * from tbl_booking_master where booking_id='{$bid}'");
                                            $bdata = mysqli_fetch_array($q); 
                                            
                                            $cq=mysqli_query($connection,"select * from tbl_client where client_id='{$bdata['client_id']}'");
                                            $cdata = mysqli_fetch_array($cq); 
                                        
                                        ?>

                                        
                                        <table cellpadding="0" cellspacing="0">
                                            <tr class="top">
                                                <td colspan="2">
                                                    <table>
                                                        <tr>
                                                            <td class="title">
                                                                <img src="./admin/uploads/logo2.png" class="ticks"  />
                                                            </td>
                                                            <td>
                                                                Booking Ref. #<?php echo $bdata['booking_id']; ?><br />
                                                                Date:<?php echo $bdata['booking_date']; ?><br />
                                                                
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>

                                            <tr class="information">
                                                <td colspan="2">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                Name : <?php echo $cdata[1]; ?> <br/>
                                                                Booked Date : <?php echo $bdata['booked_date']; ?><br/> 
                                                                Details : <?php echo $bdata['booking_details']; ?><br/> 
                                                                Booking Place : <?php echo $bdata['booking_place']; ?><br/> 

                                                            </td>
                                                        </tr>  
                                                    </table>
                                                </td>
                                            </tr>

                                                

                                            <tr class="heading">
                                                <td>Vendor</td>
                                                <td>Price</td>
                                            </tr>

                                                
                                
                                            <?php 
                                                $vq = mysqli_query($connection,"select * from tbl_vendor where vendor_id ='{$bdata['vendor_id']}'");
                                            
                                                $vdata=mysqli_fetch_array($vq)
                                                //   $pq = mysqli_query($connection,"select * from tbl_menu where menu_id='{$data['menu_id']}'");
                                                //     $pdata = mysqli_fetch_array($pq);
                                            ?>
                                                    <tr class="item">
                                                        <td><?php echo $vdata['vendor_name']; ?></td>
                                                        <td>Rs.<?php echo $vdata['vendor_token']; ?></td>
                                                        
                                                    </tr>
                                                
                                                
                                        
                                            <tr class="total">
                                                    <td><strong><?php echo"Payable amount";?></strong></td>
                                                    <td>Rs.<?php  echo $vdata['vendor_token']; ?></td>
                                                        
                                            </tr>
                                        </table>
                                    </div>

                                    <br>
                                
                                    <!-- vendor title -->
                                    <div class="vendor-form-title">
                                        <!--vendor-title -->
                                        <img class= "tick" src="./admin/uploads/checkmark.png"></img></br></br>
                                        <h3 class="mb-2">Thanks For Booking!!</h3>
                                        <p>Your Booking has been Initiated!</p>
                                        <a class="btn btn-primary" href="client-booking-listing.php">Display Booking </a>
                                    </div>
                                    <!-- /.vendor title -->
                                   
                                    

                                    
                                </div>
                            </div>
                                                       <!-- vendor-login -->
                           
                            <!-- /.vendor-login -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.vendor-form -->
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
   <script src="js/custom-script.js"></script>

 
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:35 GMT -->
</html>