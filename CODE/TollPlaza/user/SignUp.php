<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
 
    if(isset($_POST['submit']))
  {
   
    $sname=$_POST['sname'];
  $smobnumb=$_POST['smobnumb'];
  $semail=$_POST['semail'];
  $gender=$_POST['gender'];
  $saddress=$_POST['saddress'];

  $spassword=md5($_POST['spassword']);
  $id = mt_rand(100000000, 999999999);
  $ret=mysqli_query($con, "select email from user where email='$semail' || mobno='$smobnumb'");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email or Contact Number already associated with another account";
    }
    else{
  
     $query=mysqli_query($con,"insert into user(ID,username,mobno,email,gender,address,password) value('$id','$sname','$smobnumb','$semail','$gender','$saddress','$spassword')");
    if ($query) {
     echo '<script>alert("Signed Up Successfully.")</script>';
echo "<script>window.location.href ='../user/index.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  }
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || User SignUp</title>

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
        
        
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>User SignUp</h3>
     

  	    <div class="well1 white">
        
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
        
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <fieldset>
            
            <div class="form-group">
              <label class="control-label">Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="sname" name="sname" value="">
            </div>
            <div class="form-group">
              <label class="control-label">Mobile Number</label>
              <input type="text" class="form-control1 ng-invalid ng-valid-email ng-invalid-required ng-touched" id="smobnumb" name="smobnumb" value="" required="true" maxlength="10" pattern="[0-9]+">
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input type="email" class="form-control1 ng-invalid ng-invalid-required ng-touched" id="semail" name="semail"value="" required="true" onblur="checkstaffemail(this.value)">
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input type="password" id="spassword" name="spassword" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" value="" required="true">
            </div>
            <div class="form-group">
              <label class="control-label">Gender: </label>
              <input type="radio" name="gender" id="gender" value="Female" checked="true">Female
              <input type="radio" name="gender" id="gender" value="Male">Male
              <input type="radio" name="gender" id="gender" value="Other">Other
              
             
            </div>
            <div class="form-group">
              <label class="control-label">Address</label>
              <textarea type="text" id="saddress" name="saddress" class="form-control1 ng-invalid ng-valid-url ng-invalid-required ng-touched" value="" required="true" rows="12" cols="4"></textarea>
            </div>
            
           
          
            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Sign Up</button></p>
             
            </div>
            <ul class="new">
			
      <li class="new_right"><p><a href="../index.php">Back to Home</a></p></li>
			</li>
			<div class="clearfix"></div>
		</ul>
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
<?php  ?>