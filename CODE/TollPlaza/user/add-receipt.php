<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmssid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
   $sid=$_SESSION['ttmssid'];
    $catname=$_POST['catname'];
    $lanename=$_POST['lanename'];
    $vname=$_POST['vname'];
    $oname=$_POST['oname'];
    $vehno=$_POST['vehno'];
    $evcity=$_POST['evcity'];
    $trip=$_POST['trip'];
    $cost=$_POST['cost'];
     $receiptid = mt_rand(100000000, 999999999);
 
   
       $query=mysqli_query($con, "insert into  tblreceipt(Staffid,Receiptid,VehicleCat,LaneNumber,VehicleName,OwnerName,VehicleNumber,EnterVehiclecity,Trip,Cost) value('$sid','$receiptid','$catname','$lanename','$vname','$oname','$vehno','$evcity','$trip','$cost')");
    if ($query) {
     echo '<script>alert("Receipt has been created.")</script>';
echo "<script>window.location.href ='add-receipt.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Add Receipt</title>

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
  	    <h3>Add Receipt</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
          <fieldset>
            
            <div class="form-group">
              <label class="control-label">Vehicle Category</label>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="catname" name="catname" value="">
                <option value="">Choose Category</option>
                                <?php $query=mysqli_query($con,"select * from tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                </select>
            </div>
            <div class="form-group">
              <label class="control-label">Name of lane</label>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="lanename" name="lanename" value="">
                <option value="">Choose Lane Number</option>
                  <option value="Lane1">Lane Number 1</option>              
              <option value="Lane2">Lane Number 2</option>
                 <option value="Lane3">Lane Number 3</option>
                 <option value="Lane4">Lane Number 4</option>
                </select>
            </div>
            <div class="form-group">
              <label class="control-label">Vehicle Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vname" name="vname" value="">
            </div>
            <div class="form-group">
              <label class="control-label">Owner Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="oname" name="oname" value="">
            </div>
            <div class="form-group">
              <label class="control-label">Vehicle Number</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vehno" name="vehno" value="">
            </div>

            <div class="form-group">
              <label class="control-label">Enter Vehicle City</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="evcity" name="evcity" value="">
            </div>
            <div class="form-group">
              <label class="control-label">Trip</label>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="trip" name="trip" value="">
                <option value="">Choose Trip</option>
                  <option value="One Way Trip">One Way Trip</option>              
              <option value="Two Way Trip">Two Way Trip</option>
                 
                </select>
            </div>
            <div class="form-group">
              <label class="control-label">Cost</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="cost" name="cost" value="">
            </div>
           
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