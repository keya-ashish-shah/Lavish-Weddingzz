<?php
    session_start();
    if(!isset($_SESSION['clientid']))
    {
        header("location:log-in.php");
    }
    else{
        $cid=$_SESSION['clientid'];
        $cname=$_SESSION['clientname'];
    }
    include './admin/connect/connection.php';
    if(isset($_GET['did']))
    {
        $did=$_GET['did'];
        $dq=mysqli_query($connection,"delete from tbl_feedback where feedback_id = '{$did}'");
        if($dq)
        {
            header("location:client-feedback-listing.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-reviews.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:56 GMT -->
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
        function check(){
            return confirm("Are you sure you want to delete feedback?");
        }
    </script>
</head>

<body class="body-bg">

<!-- header starts-->
<?php 
    include './theme/client-header.php';
?>
<!-- header ends-->

    <div class="navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="offcanvas">
            <span id="icon-toggle" class="fa fa-bars"></span>
        </button>
    </div>
    <div class="dashboard-wrapper">
<?php 
    include './theme/client-sidebar.php';
?>
        <div class="dashboard-content">


            <div class="container-fluid">
                <div class="dashboard-page-header">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h3 class="dashboard-page-title"><b>Feedbacks</b></h3>
                        </div>
                    </div>
                </div>

                
                
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card review-summary-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Vendor Name</th>
                                        <th>Date</th>
                                        <th> Feedback Description</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
							<?php
                           
                                if($_SESSION['clientid'])
                                {
                                    $cid=$_SESSION['clientid'];
                                    $q=mysqli_query($connection,"select * from tbl_feedback where client_id='{$cid}'");
                                }
                                else
                                {
									$q=mysqli_query($connection,"select * from tbl_feedback");
                                }
									$count=mysqli_num_rows($q);
									echo "$count record found";
                                    $i=1;
									while($data=mysqli_fetch_array($q))
									{
										$vq=mysqli_query($connection,"select * from tbl_vendor where vendor_id={$data['vendor_id']}");
										$datav=mysqli_fetch_array($vq);
										echo "<tr>";
                                        echo "<td>{$i}</td>";
										echo "<td>{$datav['vendor_name']}</td>";
										echo "<td>{$data['feedback_date']}</td>";
										echo "<td>{$data['feedback_description']}</td>";
                                        echo "<td><a class='btn btn-danger'href='client-feedback-listing.php?did={$data['feedback_id']}' onclick='return check();'> Delete</a></td>";
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
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/menumaker.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/offcanvas.js"></script>
        <script src="js/jquery.nice-select.min.js"></script>
        <script src="js/custom-script.js"></script>
        <script src="js/fastclick.js"></script>
         <script src="js/jquery.slimscroll.js"></script>
    <script>
        $("#example-one, #example-two, #example-three, #example-four, #example-five, #example-six  ").on("click", function() {
            var el = $(this);
            el.text() == el.data("text-swap") ?
                el.text(el.data("text-original")) :
                el.text(el.data("text-swap"));
        });
        </script>
</body>


<!-- Mirrored from jituchauhan.com/real-wed/realwed/vendor-dashboard-reviews.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 06:31:56 GMT -->
</html>