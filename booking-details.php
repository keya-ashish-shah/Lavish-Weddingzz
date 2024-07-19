<?php
    session_start();
    include './admin/connect/connection.php';
    if(!isset($_SESSION['vendorname']))
{
	header("location:log-in.php");
} 
else if($_GET['bookingid'])
{
        $vid=$_SESSION['vendorid'];
        $bid=$_GET['bookingid'];
}
else
{
        header("location:vendor-dashboard-listing.php");
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
    <link rel="shortcut icon" type="image/x-icon" href="./admin/uploads/love.png">
    <!-- Bootstrap -->
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
        .hello
        {
            height:450px;
            width:400px;
        }
        </style>
</head>

<body class="body-bg">

<!-- header starts -->
<?php
    include './theme/vendor-header.php';
?>

<!-- header ends -->
    <div class="dashboard-wrapper">

    <!-- sidebar starts-->
    <?php 
             include './theme/vendor-sidebar.php';
        ?>
 
        <div class="dashboard-content">
            
            <div class="container-fluid">
                <div class="row">
                    <div class="dashboard-page-header">
                        <h3 class="dashboard-page-title"><b>Booking Details </b></h3>
                        <p>"Welcome back! Easily access and manage your booking details with just a few clicks."</p>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-10 col-sm-10 col-10">
                        <div class="mt20">
                            <div class="card border card-shadow-none">
                                <h3 class="card-header bg-white">Booking Details</h3>
                                <div class="card-body">
                                    <!--/.vendor-details -->
                                    <!--vendor-description -->
                                    <?php
                                    $q=mysqli_query($connection,"select * from tbl_booking_master where booking_id='{$bid}'");
                                    $qdata=mysqli_fetch_array($q);
                                    $cq=mysqli_query($connection,"select * from tbl_client where client_id='{$qdata['client_id']}'");
                                    $cdata=mysqli_fetch_array($cq);
                                    ?>
                                    <div class="row"> 
                                        <div class="col">
                                            <div class="vendor-img">
                                                <img class="hello "src="./admin/uploads/<?php echo $cdata['client_photo'] ?>" alt="">
                                            </div>
                                                
                                        </div>
                                    
                                        <div class="col">

                                            <p class="lead">Name :&nbsp;<?php echo $cdata['client_name'];?></p>
                                            <p class="lead">Booking Date :&nbsp;<?php echo $qdata['booking_date'];?></p>
                                            <p class="lead">Booked Date  :&nbsp;<?php echo $qdata['booked_date'];?></p>
                                            <p class="lead">Booking Details :&nbsp;<?php echo $qdata['booking_details'];?></p>
                                            <p class="lead">Booking Place :&nbsp;<?php echo $qdata['booking_place'];?></p>
                                            <p class="lead">Mobile No :&nbsp;<?php echo $cdata['client_mobileno'];?></p>
                                            <p class="lead">Email id :&nbsp;<?php echo $cdata['client_email'];?></p> 
                                            <p class="lead"><a class='btn btn-outline-success btn-xs mr10' href='vendor-dashboard-listing.php  '> Go Back</a></p> 
                                            
                                        </div>
                                        
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
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/list-single-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:52 GMT -->
</html>