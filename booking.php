<?php 
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    include './admin/connect/connection.php'; 
    if(isset($_SESSION['clientname']))
    {
        $cname=$_SESSION['clientname'];
        $cid=$_SESSION['clientid'];
    }
    else
    {
        header("location:log-in.php");
    }
   
    if(isset($_GET['vedid']))
    {
        $vid=$_GET['vedid'];
    }
    else
    {
        header("location:vendor-grid.php");
    }
    if(isset($_POST['bookbtn']))
    {
        $ven=$vid;
        $clt=$cid;
        $bkingdate=date('y-m-d');
        $booked=$_POST['bookeddate'];
        $bstatus="Accepted";
        $details=$_POST['bookingdetails'];
        $place=$_POST['bookingplace'];
        $paymentmode=$_POST['paymentoption'];
        $price=$_POST['vendortocken'];

        $bq=mysqli_query($connection,"insert into tbl_booking_master (vendor_id,client_id,booking_date,
        booked_date,booking_status,booking_details,booking_place) 
        values ('{$ven}','{$clt}','{$bkingdate}','{$booked}','{$bstatus}','{$details}','{$place}')");

        $bid = mysqli_insert_id($connection);
        $bq=mysqli_query($connection,"insert into tbl_payment(booking_id,client_id,payment_method,
        payment_price,payment_status,transaction_details) 
        values ('{$bid}','{$clt}','{$paymentmode}','{$price}','Paid','*****')");
        
        if($bq)
        {
            
                $emailq=mysqli_query($connection,"select * from tbl_client where client_id='{$cid}'");
                $emaildata=mysqli_fetch_array($emailq);
                $email=$emaildata['client_email'];
                $vendorq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$vid}'");
                $vendordata=mysqli_fetch_array($vendorq);

                if($emailq && $vendorq)
                {
                       $msg = "<br/><h1>Hello $cname !! </h1>Your booking has been Initiated !!
                     <br/>Booking details are := <br/>
                    Your Booking id is : $bid <br/>
                    Booking Date : $bkingdate<br/><br/>
                    Booked Vendor : {$vendordata['vendor_name']}<br/>
                    Booking token price: $price <br/>
                    Booked Date : $booked<br/> 
                    Booking Place : $place<br/>
                    Details : $details<br/></br>
                    <h2>Thanks For Booking!!</h2>";
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
                            $mail->setFrom('projectdetails2023@gmail.com', 'Booking');
                            $mail->addAddress("{$emaildata['client_email']}", "$cname");     //Add a recipient
                        
                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Booking Details';
                            $mail->Body    = $msg;
                            $mail->AltBody = $msg;
            
                            $mail->send();
                            
                    } 
                    catch (Exception $e) 
                    {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
                  
                
            
            echo "<script>alert('Your booking is successfully done..');window.location='thanks.php?bid={$bid}';</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:48 GMT -->
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
    <!--jquery-ui  -->
    <link href="css/jquery-ui.css" rel="stylesheet">
    <!--jquery-rateyo  -->
    <link href="css/jquery.rateyo.css" rel="stylesheet">
    <!-- Template magnific popup gallery -->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
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
        input[type=radio] {
        border: 0px;
        width: 100%;
        height: 2em;
}
    </style>
  
</head>

<body class="body-bg vendor-bg-image">

<!-- header starts -->
<?php
    include './theme/header.php';
?>

    <div class="dashboard-wrapper">

        <div class="vendor-content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-10 col-sm-20 col-20">
                        <div class="mt20">
                            <div class="card border card-shadow-none">
                                <b><h2 class="card-header bg-white">Book Vendor</h2></b>
                                <div class="card-body">
                                    <!--/.vendor-details -->
                                    <!--vendor-description -->
                                    <?php
                                    $vq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$vid}'");
                                    $vdata=mysqli_fetch_array($vq);
                                    $cq=mysqli_query($connection,"select * from tbl_client where client_id='{$cid}'");
                                    $cdata=mysqli_fetch_array($cq);
                                    ?>
                                    <div class="row"> 
                                        <div class="col">
                                                <div class="vendor-img">
                                                    <img src="./admin/uploads/<?php echo $vdata['vendor_photo'] ?>" alt="">
                                                </div>
                                                
                                        </div>
                                    
                                        <div class="col">
                                            <form method="post" id="myform" action="" class="">

                                            	
                                                <div class="form-group">
                                                <label class="lead">Vendor </label>
                                                <input class="form-control" type="input" name="vendorname" value="<?php echo $vdata['vendor_name'] ?>" readonly>
                                                </div>
                                                
                                                <div class="form-group">
                                                <label class="lead">Token Price </label>
                                                <input class="form-control" type="input" name="vendortocken" value="<?php echo $vdata['vendor_token'] ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                <label class="lead">Booked Date</label>
                                                    <input name="bookingdate" type="hidden" value="<?php echo date("y/m/d"); ?>"class="control-label" for="email" required>
                                                    <input name="bookingstatus" type="hidden" value="Accepted"class="control-label" for="email" required>
                                                    <input class="form-control" min="<?php echo date('Y-m-d') ?>" type="date" name="bookeddate" placeholder="Enter Booked Date" required>
                                                </div>
                                            
                                                
                                                <div class="form-group">
                                                <label class="lead">Booking Details</label>
                                                    <textarea class="form-control"  name="bookingdetails" placeholder="Enter Booking Details" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                <label class="lead">Booking Place</label>
                                                <textarea class="form-control"  name="bookingplace" placeholder="Enter Booking Place" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label class="lead" for="payment">Payment Mode</label>
                                                    <select class="wide mb20" id="payment" name="paymentoption" required >
                                                    <option  value="">Select Mode</option>
                                                    <option id="pcash" value="Cash"> Cash </option>
                                                    <!-- <option id="pupi" value="UPI">UPI</option> -->
                                                    <option id="pcard" value="Credit/Debit Card"> Credit / Debit Card</option>
                                                    </select>
                                                </div>

                                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                                <i class="fa fa-cc-discover" style="color:orange;"></i>

                                                
                                                    <!-- <div id="upiimg">
                                                        <img src="./admin/uploads/qrcode.png" style="width:100px;height:100px;" >
                                                        Either Scan Image or Enter UPI No
                                                    </div> -->

                                                    <!-- <div class="form-group" id="upitxt">
                                                        <label for="">UPI<span>*</span></label>
                                                        <input class="form-control"   type="varchar" name="txt1" id="name" placeholder="Name" required>
                                                    </div> -->
                                                    
                                                    <div class="form-group" id="txt1">
                                                    
                                                        <label for="">Name<span>*</span></label>
                                                        <input class="form-control" type="varchar" name="txt1" placeholder="Name" required>
                                                    </div>

                                                    <div class="form-group" id="txt2">
                                                        <label for="">Card No<span>*</span></label>
                                                        <input class="form-control" type="number"  name="txt2" placeholder="4134 - 1024 - 3640" required>
                                                    </div>

                                                    <div class="form-group" id="txt3">
                                                        <label for="">CVV<span>*</span></label>
                                                        <input class="form-control" type="number" name="txt3" placeholder="Card No" required>
                                                    </div>
                                                
                                                
                                                <div class="form-group">
                                                
                                                    <button name="bookbtn" class="btn btn-primary col-4">Book Now!</a>
                                                
                                                </div>

                                            </form>
                                            
                                        </div>
                                        
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        
                    
                </div>
                    <!-- /.location -->
                    <!-- list-sidebar -->
                    
            </div>
                <!-- /.list-sidebar -->
        </div>
    </div>
        <?php
            include './theme/footer.php';
        ?>
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/fastclick.js"></script>
    <!-- popup gallery -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.js"></script>
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
      <script>
$(function () {
    $("#payment").on('change',function () {
        var selectedOption = $(this).val();
        if (selectedOption === "Credit/Debit Card") {
            $("#txt1").show();
            $("#txt2").show();
            $("#txt3").show();
            // $("#upitxt").hide();
            // $("#upiimg").hide();
        } else if (selectedOption === "UPI") {
            $("#txt1").hide();
            $("#txt2").hide();
            $("#txt3").hide();
            // $("#upitxt").show();
            // $("#upiimg").show();
        } else {
            $("#txt1").hide();
            $("#txt2").hide();
            $("#txt3").hide();
            // $("#upitxt").hide();
            // $("#upiimg").hide();
        }
    });
});


  $(document).ready(function () {
	$("#txt1").hide();
	$("#txt2").hide();
	$("#txt3").hide();
	// $("#upitxt").hide();
	// $("#upiimg").hide();
  });
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvZiQwPXkkIeXfAn-Cki9RZBj69mg-95M&amp;callback=initMap">
    </script>
    <script src="js/jquery.rateyo.min.js"></script>
    <script>
    $(function() {

        $("#rateYo1, #rateYo2, #rateYo3, #rateYo4, #rateYo5 ").rateYo({
            rating: 3.6
        });

    });
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


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:52 GMT -->
</html>