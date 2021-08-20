<?php
session_start();


error_reporting(0);
include('includes/dbconnection.php');




if (strlen($_SESSION['ttmssid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    echo $passtype;
    $passid = mt_rand(100000000, 999999999);
    $catname=$_POST['catname'];
    $vehname=$_POST['vehname'];
    $regname=$_POST['regname'];
    $vfrom=$_POST['vfrom'];
    $passtype=$_POST['passtype'];
    $appname=$_POST['appname'];
    $appgender=$_POST['appgender'];
     $appage=$_POST['appage'];
     $EnterVehiclecity=$_POST['EnterVehiclecity'];
    $appadd=$_POST['appadd'];
    $reason=$_POST['costpass'];
    
    $sid=$_SESSION['ttmssid'];
    if ($passtype=="Monthly"){
      $date = new DateTime($vfrom);
$date->add(new DateInterval('P30D')); // P1D means a period of 1 day
$vto = $date->format('Y-m-d');
    }
    else
    {
      $date = new DateTime($vfrom);
$date->add(new DateInterval('P1D')); // P1D means a period of 1 day
$vto = $date->format('Y-m-d');

    }
    
    if ($passtype=="Single Journey")
    {
     $ret=mysqli_query($con,"select * from category where VehicleCat='$catname'");
     while ($row=mysqli_fetch_array($ret)) {
      
      $cost=$row['cost'];
 

  
           
  }
    
}
else if ($passtype=='Return Journey')
{
 $ret=mysqli_query($con,"select * from category where VehicleCat='$catname'");
 while ($row=mysqli_fetch_array($ret)) {
  
  $cost=$row['returncost'];



       
}

}
else 
{
$ret=mysqli_query($con,"select * from category where VehicleCat='$catname'");
while ($row=mysqli_fetch_array($ret)) {

$cost=$row['monthlycost'];



   
}

}
       $query=mysqli_query($con, "insert into  pass(ID,UserId,VehicleCat,VehicleName,RegNumber,passtype,Validityfrom,ValidityTo,AppName,AppAge,AppAdd,PassCost,EnterVehiclecity) value('$passid','$sid','$catname','$vehname','$regname','$passtype','$vfrom','$vto','$appname','$appage','$appadd','$cost','$EnterVehiclecity')");
    if ($query) {
      
     echo '<script>alert("Applied for Pass successfully.")</script>';
     
echo "<script>window.location.href ='apply-pass.php'</script>";
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
<title>Toll Tax Management System || Apply Pass</title>

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
  	    <h3>Apply Pass</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
    
  }  ?> </p>
          <fieldset>
          
            <div class="form-group">
              <label class="control-label">Name of Applicant</label>
              <?php
              $ssid=$_SESSION['ttmssid'];
               $ret=mysqli_query($con,"select * from user where ID='$ssid'");
               while ($row=mysqli_fetch_array($ret)) {
                $name=$row['username'];
                $address=$row['address'];
           

            
                     
            }
            

               ?>
               
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="appname" name="appname" value='<?php echo $name;?>'>
              
              
            </div>
            <div class="form-group">
              <label class="control-label">Age of Applicant</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="appage" name="appage" value="">
            </div>
            
            <div class="form-group">
            <label for="passtype">Choose passtype:</label>

            <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="passtype" name="passtype" value="">
           <option value="Single Journey">Single Journey</option>
           <option value="Return Journey">Return Journey</option>
           <option value="Monthly">Monthly</option>
           
 
</select>
            </div>

            <div class="form-group">
              <label class="control-label">Vehicle Category</label>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="catname" name="catname" value="">
                <option value="">Choose Category</option>
                                <?php $query=mysqli_query($con,"select * from category");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['VehicleCat'];?>"><?php echo $row['VehicleCat'];?></option>
                  <?php } ?> 
                </select>
            </div>
            <div class="form-group">
              <label class="control-label">Vehicle Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vehname" name="vehname" value="">
            </div>
            <div class="form-group">
              <label class="control-label">Vehicle Reg Number</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="regname" name="regname" value="">
            </div>
            <div class="form-group">
              <label class="control-label">Validity From</label>
              <input type="date" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="vfrom" name="vfrom" value="">
            </div>
           

           
           
            <div class="form-group">
              <label class="control-label">Address of Applicant</label>
              <?php
              $ssid=$_SESSION['ttmssid'];
               $ret=mysqli_query($con,"select * from user where ID='$ssid'");
               while ($row=mysqli_fetch_array($ret)) {
                
                $address=$row['address'];
           

            
                 
                
            }
            

               ?>
               
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="appadd" name="appadd" value='<?php echo $address;?>'>
            </div>
            <div class="form-group">
              <label class="control-label">Enter City</label>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="EnterVehiclecity" name="EnterVehiclecity" value="">
                <option value="">Choose city</option>
                                <?php $query=mysqli_query($con,"select distinct source from toll");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['source'];?>"><?php echo $row['source'];?></option>
                  <?php } ?> 
                </select>
            </div>

            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Apply Pass</button></p>
             
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