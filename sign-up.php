<?php
session_start();
include './admin/connect/connection.php';

if(isset($_POST['client']))
{
    $cname=$_POST['clientname'];
    $cmobile=$_POST['clientmobile'];
    $cemail=$_POST['clientemail'];
    $cpassword=$_POST['clientpassword'];
    $cphoto="add-user.png";
    $q=mysqli_query($connection,"insert into tbl_client (client_name,client_mobileno,client_email,client_password,client_photo) 
    values('{$cname}','{$cmobile}','{$cemail}','{$cpassword}','{$cphoto}')");
    if($q)
    {
        echo "<script>alert('Registerd Successfully');</script>";
        $_SESSION['clientname']=$cname;
        header("location:client-profile.php");
        
    }    
    
}
else if(isset($_POST['vendor']))
{
    $vname=$_POST['vendorname'];
    $vcategory=$_POST['vendorcategory'];
    $vemail=$_POST['vendoremail'];
    $vpassword=$_POST['vendorpassword'];
    $vphoto="add-user.png";
    $q=mysqli_query($connection,"insert into tbl_vendor (vendor_name,vendor_mobileno,vendor_email,vendor_password,vendor_photo) 
    values('{$vname}','{$vmobile}','{$vemail}','{$vpassword}','{$vphoto})");
    if($q)
    {
        echo "<script>alert('Registerd Successfully');</script>";
        $_SESSION['vendorname']=$vname;
        header("location:vendor-profile.php");
        
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
                            <div class="tab-pane fade show active " id="tab1" role="tabpanel" aria-labelledby="tab-1">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- client title -->
                                    <div class="vendor-form-title">
                                        <h3 class="mb-2">Client Register</h3>
                                        <p>We don't post anything without your permission.</p>
                                    </div>
                                    <!-- /.client title -->
                                    <form method="post" id="myform">
                                            <!-- form -->
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <!-- Text input-->
                                                    <div class="form-group">
                                                        <label class="control-label sr-only" for="name"></label>
                                                        <input id="name" type="text" name="clientname" placeholder="Name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <!-- Text input-->
                                                    <div class="form-group service-form-group">
                                                        <label class="control-label sr-only" for="phoneno"></label>
                                                        <input id="phoneno" name="clientmobile" type="number" placeholder="Phone Number" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <!-- Text input-->
                                                    <div class="form-group service-form-group">
                                                        <label class="control-label sr-only" for="email"></label>
                                                        <input id="email"name="clientemail" type="email" placeholder="Email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <!-- Text input-->
                                                    <div class="form-group service-form-group">
                                                        <label class="control-label sr-only" for="passwordregister"></label>
                                                        <input id="passwordregister" type="password" name="clientpassword" placeholder="Password" pattern="^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,14}$" class="form-control" required>
                                                    </div>  
                                                </div>
                                                
                                                <!-- Button -->
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                    <button type="submit" name="client" class="btn btn-default">Sign up</button>
                                                </div>
                                            </div>
                                        </form>
                                    <p class="mt-2"> Have you already Registered? <a href="log-in.php"> Login</a></p>
                                </div>
                            </div>
                            <!-- vendor-login -->
                            <div class="tab-pane fade " id="tab2" role="tabpanel" aria-labelledby="tab-2">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- vendor title -->
                                    <div class="vendor-form-title">
                                        <h3 class="mb-2">Vendor Register</h3>
                                        <p>Join Weddings to get your business listed or to claim your listing for FREE!</p>
                                    </div>
                                    <!-- /.vendor title -->
                                    <form id="myform1">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                               <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="control-label sr-only" for="bussinessname"></label>
                                                    <input id="bussinessname" type="text" name="vendorname" placeholder="Bussiness Name" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <!-- select -->
                                                <div class="form-group">
                                                    <select class="wide mb20" name="vendorcategory">
                                                        <option value="">Vendor Purpose</option>
                                                        <?php
                                                        $categoryq=mysqli_query($connection,"select * from tbl_category");
                                                        while($categorydata = mysqli_fetch_array($categoryq))
                                                        {
                                                        ?>
                                                        <option value="<?php echo $categorydata['category_id']; ?>"><?php echo $categorydata['category_name']; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                               <!-- Text input-->
                                                <div class="form-group service-form-group">
                                                    <label class="control-label sr-only" for="email"></label>
                                                    <input id="email" type="email" name="vendoeremail" placeholder="Email" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                              <!-- Text input-->
                                                <div class="form-group service-form-group">
                                                    <label class="control-label sr-only" for="passwordregister"></label>
                                                    <input id="passwordregister" type="password" pattern="^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,14}$" name="vendorpassword" placeholder="Password" class="form-control" required>
                                                </div>
                                            </div>
                                          
                                            <!-- buttons -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                                <button type="submit" name="vendor" class="btn btn-default">Sign up</button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="mt-2"> Have you already Registered? <a href="log-in.php"> Login</a></p>
                                </div>
                            </div>
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