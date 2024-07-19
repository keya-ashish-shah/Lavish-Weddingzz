<?php
session_start();
if(isset($_SESSION['clientname']))
{
    $cname=$_SESSION['clientname'];
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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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

$que=mysqli_query($connection,"select * from tbl_client where client_name='{$cname}'");
$cdata=mysqli_fetch_array($que);

?>

   
<?php
include './theme/client-header.php';
?>

 
    <div class="dashboard-wrapper">
       <?php
        include './theme/client-sidebar.php';
       ?>
        <div class="dashboard-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="dashboard-page-header">
                            <h3 class="dashboard-page-title ">Client Profile</h3>
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
                        $q=mysqli_query($connection,"select * from tbl_client where client_name='{$cname}'");
                        $data=mysqli_fetch_array($q);


                        $cid=$data['client_id'];
                        if(isset($_POST['updateprofile']))
                        {
                           
                            
                            $clientname=$_POST['clientnames'];
                            $clientgender=$_POST['clientgender'];
                            $clientno=$_POST['clientno'];
                            $clientemail=$_POST['clientemail'];
                            $clientaddress=$_POST['clientadd'];
                            $areaid=$_POST['areaid'];
                            
                            $uq=mysqli_query($connection,"update tbl_client set client_name='{$clientname}',
                            client_gender='{$clientgender}',client_address='{$clientaddress}',
                            client_mobileno='{$clientno}',client_email='{$clientemail}',client_photo='{$filename}',
                            area_id='{$areaid}' where client_id='{$cid}'");
                            
                            if($uq)
                            {
                                $selectq=mysqli_query($connection,"select * from tbl_client where client_name='{$cname}'");
                                if($selectq)
                                {
                                    
                                    $data=mysqli_fetch_array($selectq);  
                                }
                                echo "<script>alert('Record Updated');window.location='client-profile.php';</script>";
                            } 
                        }
                        if(isset($_POST['changephoto']))
                        {
                            $filename=$_FILES['image']['name'];
                            $filepath=$_FILES['image']['tmp_name'];
                            move_uploaded_file($filepath,"./admin/uploads/".$filename);
                            $uq=mysqli_query($connection,"update tbl_client set client_photo='{$filename}' where client_id='{$cid}'");
                            if($uq)
                            {
                                $selectq=mysqli_query($connection,"select * from tbl_client where client_id='{$cid}'");
                                if($selectq)
                                {
                                    $data=mysqli_fetch_array($selectq);  
                                }
                                echo "<script>alert('Photo Updated');window.location='client-profile.php';</script>";
                            } 
                        }
                
                        
                        
                        
                    
                    ?>
                           
                            <!-- here profile start -->
                                <div class="card">
                                    <div class="card-header">Profile</div>
                                <div class="card-body">
                                            <!-- here small-profile end -->

                                        <form method="post" id="myform" enctype="multipart/form-data">
       
                                            <div class="personal-form-info">
                                                <div class="row">
                                                    <!-- Text input-->
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="vendorname">Client Name</label>
                                                            <input id="clientname" name="clientnames" value="<?php echo $data['client_name'] ?>" type="text" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" >Client Gender</label>
                                                            <input name="clientgender" value="<?php echo $data['client_gender'] ?>" type="text" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="phone">Phone</label>
                                                            <input id="phone" name="clientno" value="<?php echo $data['client_mobileno'] ?>"type="text" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="email">Email</label>
                                                            <input id="email" name="clientemail" value="<?php echo $data['client_email'] ?>" type="email" placeholder="" class="form-control " required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Address </label>
                                                            <textarea name="clientadd" class="form-control" rows="6" required><?php echo $data['client_address'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                        <div class="form-group">
                                                            <label class="control-label" for="vendorname">Area Name</label>
                                                            <!-- <input id="clientname" name="clientnames" value="<?php echo $data['client_name'] ?>" type="text" placeholder="" class="form-control "> -->
                                                            <?php
							                                    $sq=mysqli_query($connection,"select * from tbl_area");
							                                    echo "<select class='form-control' name='areaid' id='select' required='required'>";
                                                                $areaq=mysqli_query($connection,"select * from tbl_area where area_id='{$data['area_id']}'");
                                                                $areadata=mysqli_fetch_array($areaq);
							                                    echo "<option value=''>{$areadata['area_name']}</option>";
							                                    while($row = mysqli_fetch_array($sq))
							                                    {
							                                    	echo "<option class='form-control' value='{$row['area_id']}'>{$row['area_name']}</option>";
							                                    }
							                                    echo "</select>";
							                                ?>
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
                                        <form method="post"  id="myform1" enctype="multipart/form-data">
                                            <div class="profile-upload-img">
                                                <div class="col">
                                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <img id="image-preview"src="./admin/uploads/<?php echo $data['client_photo'] ?>" class="rounded-circle mb10" name="clientp" id="image-upload" alt="" required>
                                                        <input type="file" value="./admin/uploads/<?php echo $data['client_photo'] ?>" name="image"  class="upload-profile-input" required>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12 col-12">
                                                        <button class="btn btn-primary mt30" name="changephoto" type="submit">Update Photo</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </<form>
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
                                    $oq=mysqli_query($connection,"select * from tbl_client where client_id='{$cid}'");
                                    $olddata=mysqli_fetch_array($oq);
                                    if($olddata['client_password'] == $old)
                                    {
                                        if($new == $confirm)
                                        {
                                            if($old == $new)
                                            {
                                                echo "<script>alert('New password can not be same as old Password..')</script>";
                                            }
                                            else{
                                                //Update new password
                                                $uq=mysqli_query($connection,"update tbl_client set client_password='{$new}' where client_id='{$cid}'");
                                                if($uq)
                                                {
                                                    echo "<script>alert('Password Changed Successfully');window.location='client-profile.php'</script>";
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
                                
                                if(isset($_POST['deletebtn']))
                                {
                                    
                                    $did=$data['client_name'];
                                    $dq=mysqli_query($connection,"delete from tbl_client where client_name='{$did}';");
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
                                        <form class="row" id="my">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="currentpassword">Current Password</label>
                                                    <input id="currentpassword" name="oldpass" value="" type="password" class="form-control " required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="newpassword">New Password</label>
                                                    <input id="newpassword" name="newpass" value="" type="password"  class="form-control " required>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="retypepassword">Confirm Password</label>
                                                    <input id="retypepassword" name="conpass" value="" type="password"  class="form-control " required>
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
                                            </a>
                                        </form>
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
            $("#my").validate();

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