<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=md5($_POST['newpassword']);

        $query=mysqli_query($con,"update tblstaff set StaffPassword='$password'  where  StaffEmail='$email' && StaffMobilenumber='$contactno' ");
   if($query)
   {
echo "<script>alert('Password successfully changed');</script>";
session_destroy();
   }
  
  }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Reset Page</title>
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
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>
<body id="login">
  <div class="login-logo">
    <a href="index.php"><strong style="color: black">Toll Tax Management System</strong></a>
  </div>
  <h2 class="form-heading">Reset Password</h2>
  <div class="app-cam">
	  <form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
		<p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <input type="password" name="newpassword" class="text" placeholder="New Password" required="true">
    <input type="password" name="confirmpassword" class="text" placeholder="Confirm Password" required="true">
		<div class="submit"><input type="submit"  value="Reset" name="submit"></div>
		
		<ul class="new">
			<li class="new_left"><p><a href="index.php">Allready have an account!!</a></p></li>
			</li>
			<div class="clearfix"></div>
		</ul>
	</form>
  </div>
   <?php include_once('includes/footer.php');?>
</body>
</html>
