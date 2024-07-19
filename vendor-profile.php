<?php
session_start();
if(isset($_SESSION['vendorname']))
{
    $vname=$_SESSION['vendorname'];
}
else
{
    header("location:log-in.php");
}
include './admin/connect/connection.php';

?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->
    <title>Lavish Weddingz</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <!-- FontAwesome icon -->
    <link href="fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <!-- Fontello icon -->
    <link href="fontello/css/fontello.css" rel="stylesheet">
    <link href="css/summernote-bs4.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="./admin/uploads/love.png">
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
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</head>

<body class="body-bg">
  
<?php

$que=mysqli_query($connection,"select * from tbl_vendor where vendor_name='{$vname}'");
$vdata=mysqli_fetch_array($que);

?>
    <div class="navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas">
            <span id="icon-toggle" class="fa fa-bars"></span>
        </button>
    </div>

<?php
include './theme/vendor-header.php';
?>

 
    <div class="dashboard-wrapper">
        <?php

        include './theme/vendor-sidebar.php';

        ?>
        
        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title ">Vendor Profile</h3>
                            <!-- <p>Change your profile image and information edit and save.</p> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Profile</a>
                            <a class="nav-link" id="v-pills-photo-tab" data-toggle="pill" href="#v-pills-photo" role="tab" aria-controls="v-pills-photo" aria-selected="false">Photo</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Password Change</a>
                            
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Delete Account</a>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8 col-sm-12 col-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                        <?php
                        $q=mysqli_query($connection,"select * from tbl_vendor where vendor_name='{$vname}'");
                        $data=mysqli_fetch_array($q); 
                        
                        $vid=$data['vendor_id'];
                       
                        if(isset($_POST['updateprofile']))
                        {
                           
                            
                            $vendorname=$_POST['vendorname'];
                            $vendorprice=$_POST['vendorprice'];
                            $vendorgender=$_POST['vendorgender'];
                            $vendorno=$_POST['vendorno'];  
                            $vendoremail=$_POST['vendoremail'];
                            $vendordescription=$_POST['vendordescription'];
                           
                            
                           
                            $upq=mysqli_query($connection,"update tbl_vendor set vendor_name='{$vendorname}',vendor_price='{$vendorprice}',vendor_gender='{$vendorgender}',vendor_email='{$vendoremail}',vendor_mobileno='{$vendorno}',vendor_description='{$vendordescription}' where vendor_id='{$vid}'");
                            
                            if($upq)
                            {
                                $selectq=mysqli_query($connection,"select * from tbl_vendor where vendor_name='{$vname}'");
                                if($selectq)
                                {
                                    $data=mysqli_fetch_array($selectq);  
                                }
                                echo "<script>alert('Record Updated');window.location='vendor-profile.php';</script>";
                            } 
                        }
                        
                        else if(isset($_POST['changephoto']))
                        {
                            $filename=$_FILES['image']['name'];
                            $filepath=$_FILES['image']['tmp_name'];
                            move_uploaded_file($filepath,"./admin/uploads/".$filename);
                            $uq=mysqli_query($connection,"update tbl_vendor set vendor_photo='{$filename}' where vendor_id='{$vid}'");
                            if($uq)
                            {
                                $selectq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$vid}'");
                                if($selectq)
                                {
                                    $data=mysqli_fetch_array($selectq);  
                                }
                                echo "<script>alert('Photo Updated');window.location='vendor-profile.php';</script>";
                            }
                        }

                        ?>
                           
                            <!-- here profile start -->
                                <div class="card">
                                    <div class="card-header">Profile</div>
                                    <div class="card-body">
                                    <form method="post" id="myform" enctype="multipart/form-data">
                                            <!-- Form Name -->

                                            <!-- here small-profile start -->
                                            <!-- <div class="profile-upload-img">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <div >
                                                        <img id="image-preview"src="admin/uploads/<?php echo $data['vendor_photo'] ?>" class="rounded-circle mb10" name="vendorphoto" id="image-upload" alt="">

                                                        </div>
                                                        <input type="file" name="image"  class="upload-profile-input">
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- here small-profile end -->

                                            
                                            <div class="personal-form-info">
                                                <div class="row">
                                                    <!-- Text input-->
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="vendorname">Vendor Name</label>
                                                            <input id="vendorname" name="vendorname" value="<?php echo $data['vendor_name'] ?>" type="text" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Vendor Price</label>
                                                            <input name="vendorprice" value="<?php echo $data['vendor_price'] ?>" type="text" placeholder="" class="form-control "required >
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" >Vendor Gender</label>
                                                            <input name="vendorgender" value="<?php echo $data['vendor_gender'] ?>" type="text" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="phone">Phone</label>
                                                            <input id="phone" name="vendorno" value="<?php echo $data['vendor_mobileno'] ?>" type="text" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="email">Email</label>
                                                            <input id="email" name="vendoremail" value="<?php echo $data['vendor_email'] ?>" type="email" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Descriptions </label>
                                                            <textarea name="vendordescription" class="form-control" rows="6" required><?php echo $data['vendor_description'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="social-form-info mb-0">
                                                <div class="row">
                                                    
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    
                                                        <button class="btn btn-default" name="updateprofile" value="update" type="submit">Update profile</button>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- here profile end -->
                                
                            </div>
                            <div class="tab-pane fade" id="v-pills-photo" role="tabpanel" aria-labelledby="v-pills-photo-tab">

                                <div class="card">
                                    <div class="card-header">Photo</div>
                                    <div class="card-body">
                                        <form method="post" id="myform1" enctype="multipart/form-data">
                                        <div class="profile-upload-img">
                                                <div class="col">
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <img id="image-preview"src="./admin/uploads/<?php echo $data['vendor_photo'] ?>" class="rounded-circle mb10" name="vendorp" id="image-upload" alt="">
                                                        <input type="file" value="./admin/uploads/<?php echo $data['vendor_photo'] ?>" name="image"  class="upload-profile-input" required>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <button class="btn btn-primary mt30" name="changephoto" type="submit">Update Photo</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                </div>
                            <?php
                                if(isset($_POST['changepass']))
                                {
                                    $old=$_POST['oldpass'];
                                    $new=$_POST['newpass'];
                                    $confirm=$_POST['conpass'];

                                    //Fetch old password
                                    $oq=mysqli_query($connection,"select * from tbl_vendor where vendor_id='{$vid}'");
                                    $olddata=mysqli_fetch_array($oq);
                                    if($olddata['vendor_password'] == $old)
                                    {
                                        if($new == $confirm)
                                        {
                                            if($old == $new)
                                            {
                                                echo "<script>alert('New password can not be same as old Password..')</script>";
                                            }
                                            else{
                                                //Update new password
                                                $uq=mysqli_query($connection,"update tbl_vendor set vendor_password='{$new}' where vendor_id='{$vid}'");
                                                if($uq)
                                                {
                                                    echo "<script>alert('Password Changed Successfully');window.location='vendor-profile.php'</script>";
                                                }     
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('New password and Confirm Password needs to be match..')</script>";
                                        }
                                    }
                                    else
                                    {
                                        echo "<script>alert('Old Password does not match..')</script>";
                                    }
                                }



                                else if(isset($_POST['deletebtn']))
                                {   
                                    $did=$data['vendor_name'];
                                    $dq=mysqli_query($connection,"delete from tbl_vendor where vendor_name='{$did}';");
                                    if($dq)
                                    {
                                        echo "<script>alert('Record Deleted');window.location='index.php';</script>";
                                    }
                                }  
                                
                            ?>
                                

                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                            
                                <div class="card">
                                    <div class="card-header">Password Change</div>
                                    <div class="card-body">
                                        <form class="row" id="myform2" method="post">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="cpassword">Current Password</label>
                                                    <input id="cpassword" name="oldpass" value="" type="password" placeholder="" class="form-control " required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="npassword">New Password</label>
                                                    <input id="npassword" name="newpass" value="" type="password" placeholder="" class="form-control "required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="retypepassword">Confirm Password</label>
                                                    <input id="retypepassword" name="conpass" value="" type="password" placeholder="" class="form-control "required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <button class="btn btn-default" name="changepass" type="submit">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                             
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="card">
                                    <div class="card-header">Account Delete</div>
                                    <div class="card-body">

                                    <form method="post">
                                            <button class="btn btn-primary mt30" onclick="return check();" name="deletebtn" type="submit">Delete My Account</button>
                                           
                                        </form>
                                      
                                        <!-- <form>
                                            
                                            // if(isset($_GET['did']))
                                            // {
                                            //     $did=$_GET['did'];
                                            //     $delq=mysqli_query($connection,"delete from tbl_vendor where vendor_id='{$did}'");
                                            //     if($uq)
                                            //     {
                                            //         echo "<script>alert('Account Deleted Successfully');window.location='index.php'</script>";
                                            //     }
                                            // }                                            
                                         -->
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/menumaker.min.js"></script>
    <script src="js/custom-script.js"></script>
    <script>
    $(document).ready(function() {
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false // Default: false
        });
    });
    </script>
    <script src="js/jquery.uploadPreview.js"></script>
   
    <script src="js/summernote-bs4.js"></script>
    <script src="js/offcanvas.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    
    <script src="jquery.validate.js" type="text/javascript"></script>
	
	<script>
		$(document).ready(function(){
            $("#myform").validate();
            $("#myform1").validate();
            $("#myform2").validate();
        });
    </script>
	<style>
		.error{
			color:red;
		}
	</style>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:57 GMT -->
</html>