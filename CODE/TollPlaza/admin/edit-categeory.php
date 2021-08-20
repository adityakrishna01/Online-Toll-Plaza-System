<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
   
    $catname=$_POST['catname'];
    $cost=$_POST['cost'];
    $returncost=$_POST['returncost'];
    $monthlycost=$_POST['monthlycost'];
   $sid=$_GET['editid'];
       $query=mysqli_query($con, "update category set VehicleCat= '$catname' where ID='$sid' ");
       $query1=mysqli_query($con, "update category set cost= '$cost' where ID='$sid' ");
       $query2=mysqli_query($con, "update category set returncost= '$returncost' where ID='$sid' ");
       $query3=mysqli_query($con, "update category set monthlycost= '$monthlycost' where ID='$sid' ");
    if ($query) {
    $msg="Category has been Updated.";
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
<title>Toll Tax Management System || Update Category</title>

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
  	    <h3>Update Category</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  
  <?php
$sid=$_GET['editid'];
$ret=mysqli_query($con,"select * from category where ID='$sid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <fieldset>
            
            <div class="form-group">
              <label class="control-label">Vehicle Category</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="catname" name="catname" value="<?php  echo $row['VehicleCat'];?>">
            </div>

            <div class="form-group">
              <label class="control-label">Single Journey Cost</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="cost" name="cost" value="<?php  echo $row['cost'];?>">
            </div>

            <div class="form-group">
              <label class="control-label">Return Journey Cost</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="=returncost" name="returncost" value="<?php  echo $row['returncost'];?>">
            </div>

            <div class="form-group">
              <label class="control-label">Monthly Pass Cost</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="monthlycost" name="monthlycost" value="<?php  echo $row['monthlycost'];?>">
            </div>
         <?php } ?>
            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Add</button></p>
             
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