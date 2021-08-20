<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tblstaff where  StaffEmail='$email' and StaffMobilenumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:reset-password.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Forgot Page</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="index.php"><strong style="color: black">Toll Tax Management System</strong></a>
  </div>
  <h2 class="form-heading">Forgot Password</h2>
  <div class="app-cam">
	  <form role="form" method="post" action="">
		<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
    <input type="text" name="email" class="text" placeholder="Email" required="true">
		<input type="text" name="contactno" class="text" placeholder="Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
		<div class="submit"><input type="submit"  value="Reset" name="submit"></div>
		
		<ul class="new">
			<li class="new_left"><p><a href="index.php">Already have an account!!</a></p></li>
			</li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <?php include_once('includes/footer.php');?>
</body>
</html>
