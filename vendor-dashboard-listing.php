<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if(!isset($_SESSION['vendorid']))
{
    header("location:log-in.php");
}
    include './admin/connect/connection.php';
   
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:52 GMT -->
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
     <link rel="stylesheet" type="text/css" href="css/offcanvas.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        function check()
        {
            return confirm("Are you sure,you want to cancel the booking ?");
        }
    </script>
</head>

<body class="body-bg">

    <!-- header starts-->
    <?php
        include './theme/vendor-header.php'; 
    ?>
    <!-- header ends-->

    <div class="navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas">
            <span id="icon-toggle" class="fa fa-bars"></span>
        </button>
    </div>
    
    <div class="dashboard-wrapper">

        <!-- side bar starts-->
        <?php
            include 'theme/vendor-sidebar.php';
        ?>
        <!-- side bar ends-->

        <!-- main content starts-->
        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row">
                    <?php
                        $vq=mysqli_query($connection,"select * from tbl_vendor where vendor_id={$_SESSION['vendorid']} ");
                        $vdata=mysqli_fetch_array($vq); 

                        if(isset($_GET['bid']))
                        {
                            $bid=$_GET['bid'];
                            $status="Rejected";
                            $uq=mysqli_query($connection,"update tbl_booking_master set booking_status='{$status}' where booking_id={$bid}");

                            if($uq)
                            {
                                $bookingq=mysqli_query($connection,"select * from tbl_booking_master where booking_id='{$bid}'");
                                $bookingdata=mysqli_fetch_array($bookingq);
                                $clientq=mysqli_query($connection,"select * from tbl_client where client_id='{$bookingdata['client_id']}'");
                                $clientdata=mysqli_fetch_array($clientq);
                                $email=$clientdata['client_email'];
                                $vendorq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$vid}'");
                                $vendordata=mysqli_fetch_array($vendorq);

                                if($bookingq && $clientq )
                                {
                                    $msg = "<br/><h3>Hello {$clientdata['client_name']} !! </h3>
                                    <br/>Your booking has been Canceled !!
                                    <br/>We will start your Refund process soon!!<br/>
                                    
                                    <h4>Thanks For Contacting!!</h4>";
                                    //Load Composer's autoloader
                                
                            
                                    //Create an instance; passing true enables exceptions
                                    $mail = new PHPMailer(true);
                            
                                    try {
                                            $mail->isSMTP();                                            //Send using SMTP
                                            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                            $mail->Username   = 'projectdetails2023@gmail.com';                     //SMTP username
                                            $mail->Password   = 'nzlsjtndelmbamdx ';                               //SMTP password
                                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
                            
                                            //Recipients
                                            $mail->setFrom('projectdetails2023@gmail.com', 'Booking Update');
                                            $mail->addAddress("{$clientdata['client_email']}", "{$clientdata['client_name']}");     //Add a recipient
                                        
                                            //Content
                                            $mail->isHTML(true);                                  //Set email format to HTML
                                            $mail->Subject = 'Booking Cancellation';
                                            $mail->Body    = $msg;
                                            $mail->AltBody = $msg;
                            
                                            $mail->send();
                                            
                                    } 
                                    catch (Exception $e) 
                                    {
                                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                }
                                
                                echo "<script>window.location.href='vendor-dashboard-listing.php';</script>";
                            }

                        }
                    ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title"><b><?php echo $vdata['vendor_name'];?></b></h3>   <!--make it dynamic when doing login -->
                            <p><strong>"Welcome back !! Take control and manage your bookings effortlessly with just a few clicks."</strong></p>
                        </div>
                    </div>
                </div>

                






                    <!--listing starts -->
                    <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card review-summary-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Client Name</th>
                                        <th>Booked Date</th>
                                        <th>Place</th>
                                        <th>Booking details</th>
                                        <th>More</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                     
                            <?php
                             if($_SESSION['vendorid'])
                             {
                                $vid=$_SESSION['vendorid'];
                                $status="Accepted";
                                $q=mysqli_query($connection,"select * from tbl_booking_master where vendor_id='{$vid}' and booking_status='{$status}'");
                                $count=mysqli_num_rows($q);
                             }
                             echo "$count record found";
                             $i=1;
                             
                                while($data=mysqli_fetch_array($q))
                            {
                           
                                    $clientq=mysqli_query($connection,"select * from tbl_client where client_id='{$data['client_id']}'");
                                    $clientdata=mysqli_fetch_array($clientq);
									
									
                                    
									

										echo "<tr>";
                                        echo "<td>{$i}</td>";
										echo "<td>{$clientdata['client_name']}</td>";
										echo "<td>{$data['booked_date']}</td>";
                                        echo "<td>{$data['booking_place']}</td>";
										echo "<td>{$data['booking_details']}</td>";
                                        echo "<td><a class='btn btn-primary' href='booking-details.php?bookingid={$data['booking_id']}' >Details</a>
                                        <a class='btn btn-danger' href='vendor-dashboard-listing.php?bid={$data['booking_id']}'onclick='return check();' >Cancel</a></td>";
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

                            
                        

                    <!-- listing ends-->


                        




                    </ul>
                </div>
            </div>
        </div>
        <!-- main content ends-->
        
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/menumaker.min.js"></script>
    <script src="js/custom-script.js"></script>
     <script src="js/jquery.slimscroll.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
     <script src="js/offcanvas.js"></script>
    
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:55 GMT -->
</html>