<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $sid=$_GET['editid'];
    $sname=$_POST['sname'];
  $smobnumb=$_POST['smobnumb'];
  $semail=$_POST['semail'];
  $gender=$_POST['gender'];
  $saddress=$_POST['saddress'];
  $sdob=$_POST['sdob'];
 
  
     $query=mysqli_query($con,"update user set username='$sname',mobno='$smobnumb',email='$semail',gender='$gender',address='$saddress' where ID=$sid");
    if ($query) {
    $msg="User details has been Updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  }

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Add Staff</title>

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
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Update User Information</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
   <?php
$sid=$_GET['editid'];
$ret=mysqli_query($con,"select * from user where ID='$sid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <fieldset>
            
            <div class="form-group">
              <label class="control-label">User Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="sname" name="sname" value="<?php  echo $row['username'];?>">
            </div>
            <div class="form-group">
              <label class="control-label">User ID</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="sid" name="sid" value="<?php  echo $row['ID'];?>" readonly='true'>
            </div>
            <div class="form-group">
              <label class="control-label">Mobile Number</label>
              <input type="text" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="smobnumb" name="smobnumb" value="<?php  echo $row['mobno'];?>" required="true" maxlength="10" pattern="[0-9]+">
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input type="email" class="form-control1 ng-invalid ng-invalid-required ng-touched" id="semail" name="semail"value="<?php  echo $row['email'];?>" required="true">
            </div>
           
            <div class="form-group">
              <label class="control-label">Gender: </label>
              <?php  if($row['gender']=="Female"){ ?>
              <input type="radio" name="gender" id="gender" value="Female" checked="true">Female
              <input type="radio" name="gender" id="gender" value="male">Male
              <?php } else { ?>
              <label>
              <input type="radio" name="gender" id="gender" value="Male" checked="true">Male
              <input type="radio" name="gender" id="gender" value="Female">Female
              </label>
             <?php } ?>
            </div>
            <div class="form-group">
              <label class="control-label">Address</label>
              <textarea type="text" id="saddress" name="saddress" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" rows="12" cols="4"><?php  echo $row['address'];?></textarea>
            </div>
            
           
           <?php } ?>
          
            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Update</button></p>
             
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <?php include_once('includes/footer.php');?>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
<?php } ?>