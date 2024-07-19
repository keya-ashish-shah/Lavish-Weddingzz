<?php
session_start();
include './admin/connect/connection.php';

if(isset($_POST['client']))
{
    
    $email=$_POST['clientemail'];
    $password=$_POST['clientpassword'];
    $q = mysqli_query($connection,"select * from tbl_client where client_email='{$email}'
     and client_password='{$password}'");
     $data=mysqli_fetch_array($q);
     $count=mysqli_num_rows($q);
     if($count>0)
     {
        $_SESSION['clientid']=$data['client_id'];
        $_SESSION['clientname']=$data['client_name'];
        header("location:index.php");
     }
     else
     {
        echo "<script>alert('Invalid Username or Password');window.location='log-in.php';</script>";
        
     }
}
else if(isset($_POST['vendor']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $q = mysqli_query($connection,"select * from tbl_vendor where vendor_email='{$email}'
     and vendor_password='{$password}'");
     $data=mysqli_fetch_array($q);
     $count=mysqli_num_rows($q);
     if($count>0)
     {
        $_SESSION['vendorid']=$data['vendor_id'];
        $_SESSION['vendorname']=$data['vendor_name'];
        header("location:vendor-dashboard.php");
     }
     else
     {
        echo "<script>alert('Invalid Username or Password');";
       
     }
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
        img{
            width: 200px;
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
                        <ul class="nav nav-tabs nav-justified" id="Mytabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-1" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab-1" aria-selected="true">Client</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-2" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab-2" aria-selected="false">Vendor</a>
                            </li>
                        </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- vendor title -->
                                    <div class="vendor-form-title">
                                        <!--vendor-title -->
                                        <h3 class="mb-2">Welcome Back Client</h3>
                                        <p>Join Weddings to get your business listed or to claim your listing for FREE!</p>
                                    </div>
                                    <!-- /.vendor title -->
                                    <form method="post" id="myform">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                              <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="control-label sr-only" for="username"></label>
                                                    <input id="username" type="text" name="clientemail" placeholder="Email ID" class="form-control" required >
                                                </div>
                                            </div>
                                           <!-- Text input-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="form-group service-form-group">
                                                    <label class="control-label sr-only" for="passwordlogin"></label>
                                                    <input id="passwordlogin" type="password" name="clientpassword" placeholder="Password" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--buttons -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                             <a href ="index.php" >  <button type="submit"  name="client" class="btn btn-primary">Login</button></a>
                                            <a href= "client-forget-password.php">  <button type="button"   name="cfp" class="btn btn-default">Forgot Password</button></a>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="mt-2"> Are you new Client? Create a New Account.<a href="sign-up.php" class="wizard-form-small-text"> Click here</a></p>

                                    
                                </div>
                            </div>
                            <div class="tab-pane fade " id="tab2" role="tabpanel" aria-labelledby="tab-2">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- vendor title -->
                                    <div class="vendor-form-title">
                                        <!--vendor-title -->
                                        <h3 class="mb-2">Welcome Back Vendor</h3>
                                        <p>Join Weddings to get your business listed or to claim your listing for FREE!</p>
                                    </div>
                                    <!-- /.vendor title -->
                                    <form method="post" id="myform1">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                              <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="control-label sr-only" for="username"></label>
                                                    <input id="username" type="text" name="email" placeholder="Email ID" class="form-control" required >
                                                </div>
                                            </div>
                                           <!-- Text input-->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <div class="form-group service-form-group">
                                                    <label class="control-label sr-only" for="passwordlogin"></label>
                                                    <input id="passwordlogin" type="password" name="password" placeholder="Password" class="form-control" required>
                                                </div>
                                            </div>
                                            <!--buttons -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <a href= "vendor-dashboard.php" ><button type="submit"  name="vendor" class="btn btn-primary">Login</button></a>
                                                <a href= "vendor-forget-password.php"><button type="button"  name="vfp" class="btn btn-default">Forgot Password</button></a>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="mt-2"> Are you new Vendor? Create a New Account.<a href="sign-up.php" class="wizard-form-small-text"> Click here</a></p>

                                    
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

   <script src="jquery.validate.js" type="text/javascript"></script>
	
	<script>
		$(document).ready(function(){
            $("#myform").validate();
            $("#myform1").validate();
        });
    </script>
	<style>
		.error{
			color:red;
		}
	</style>

 
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-form.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:30:35 GMT -->
</html>