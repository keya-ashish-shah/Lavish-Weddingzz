<?php 
session_start();
include './admin/connect/connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if(isset($_POST['singlebutton']))
{
    $name=$_POST['fname'].$_POST['lname'];
    $email=$_POST['cemail'];
    $phone=$_POST['cphone'];
    $select=$_POST['selectvendor'];
    $des=$_POST['message'];

    $query=mysqli_query($connection,"insert into tbl_contact (contact_name,contact_email,contact_subject,contact_detail)
    values ('{$name}','{$email}','{$select}','{$des}');");
    if ($query)
    {
        $msg = "<br/><h1>Hello Admin!! </h1>I am $name <br/>My details are :<br/>Email :$email <br/>Phone :$phone <br/>Purpose :$select <br/>Description :$des <br/>";
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
                $mail->setFrom('projectdetails2023@gmail.com', 'Contact Us Request');
                $mail->addAddress("khushirdarji2003@gmail.com", 'Khushi');     //Add a recipient
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Contact Request';
                $mail->Body    = $msg;
                $mail->AltBody = $msg;

                $mail->send();
                echo "<script>alert('Thanks for contacting');window.location='contact-us.php';</script>";
        } 
        catch (Exception $e) 
        {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:42 GMT -->
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
</head>

<body>
  <!-- header -->
<?php 
    include "./theme/header.php";
?>
    <!-- /.header -->
    <!-- page-header -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <!-- page caption -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div class="page-caption">
                        <h1 class="page-title">Contact us</h1>
                    </div>
                </div>
                <!-- /.page caption -->
            </div>
        </div>
        <!-- page caption -->
        <div class="page-breadcrumb">
            <div class="container">
                <div class="row">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Contact us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- page breadcrumb -->
    </div>
    <!-- /.page-header -->
    <!-- contact-form -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12 mb60">
                    <!-- contact-section-title -->
                    <div class="text-center">
                        <p class="lead">We would like to talk with you, Talk to us and we'll show you what we’ve done, and what we can do for you.
                        </p>
                    </div>
                    <!-- /.contact-section-title -->
                </div>
                <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 col-md-12 col-sm-12 col-12">
                    <form action="" id="myform" method="post">
                        <!-- form -->
                        <div class="contact-form">
                            <div class="row">
                              
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="fname"></label>
                                        <input id="fname" type="text" name="fname" placeholder="First Name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12  ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="lname"></label>
                                        <input id="lname" type="text" name="lname" placeholder="Last Name" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="email"></label>
                                        <input id="email" type="email" name="cemail" placeholder="Email" class="form-control" required>
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="phone"></label>
                                        <input id="phone" type="text" name="cphone" placeholder="Phone" class="form-control" required>
                                    </div>
                                </div>
                                <!-- select -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <!-- <select name="programmingLang" id="programmingLang" required> -->
                                        <select class="wide mb20" name="selectvendor" id="selectvendor" required>
                                            <option value="">Vendor Purpose</option>
                                            <option value="Photograpy">Photograpy</option>
                                            <option value="Choreography">Choreography</option>
                                            <option value="Vendor_Services">Vendor Services</option>
                                            <option value="Vendor_Pricing">Vendor Pricing</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label class="control-label sr-only" for="message"></label>
                                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Messages" required></textarea>
                                    </div>
                                </div>
                                <!--button -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button type="submit" name="singlebutton" class="btn btn-default">submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.contact-form -->
    <!-- contact-map -->
    <div id="map"></div>
    <!-- /.contact-map -->
    <!-- contact-block-section -->
    <div class="space-medium bg-white">
        <div class="container">
            <div class="row">
                <!-- contact-block -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-block">
                        <div class="contact-icon"><i class="far fa-user-circle"></i></div>
                        <div class="contact-content">
                            <h3>Customer Support</h3>
                            <p>Call our 24-hour helpline.</p>
                            <p><strong>Phone number:</strong><span class="text-default"> +91 89634-56754</span>
                                <br> <strong>Email Us:</strong><span class="text-default">  info@lavishweddingz.com</span></p>
                        </div>
                    </div>
                </div>
                <!-- /.contact-block -->
                <!-- contact-block -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-block">
                        <div class="contact-icon"><i class="fa fa-map-marker-alt"></i></div>
                        <div class="contact-content">
                            <h3>Our Address</h3>
                            <p>Our offices are located in the Ahmedabad. </p>
                            <p><strong>Address:</strong><span class="text-default"> Gujarat, India.</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.contact-block -->
                <!-- contact-block -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-block">
                        <div class="contact-icon"><i class="far fa-envelope"></i></div>
                        <div class="contact-content">
                            <h3>Other Enquiries</h3>
                            <p>Please contact us at the email below for all other inquiries.</p>
                            <p><strong>Email Us:</strong> <span class="text-default">info@lavishweddingz.com</span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /.contact-block -->
            </div>
        </div>
    </div>
    <!-- /.contact-block-section -->
    <!-- social-media-section -->

    <!-- /.social-media-section -->
    <!-- footer-section -->
    <?php 
    include "./theme/footer.php";
?>
    <!-- tiny-footer-section -->

    <!-- /.tiny-footer-section -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <!-- nice-select -->
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <script src="js/custom-script.js"></script>
    <script>
    function initMap() {
        var uluru = {
            lat: 23.0732195,
            lng: 72.5646902
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            icon: 'images/map-pin.png'
        });
    }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvZiQwPXkkIeXfAn-Cki9RZBj69mg-95M&amp;callback=initMap">
    </script>
    <script src="js/return-to-top.js"></script>

    <script src="jquery.validate.js" type="text/javascript"></script>
	
	<script>
		$(document).ready(function(){
            $("#myform").validate();
        });
    </script>
	<style>
		.error{
			color:red;
		}
	</style>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:42 GMT -->
</html>