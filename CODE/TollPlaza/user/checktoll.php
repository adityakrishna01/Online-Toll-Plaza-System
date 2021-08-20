<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmssid']==0)) {
  header('location:logout.php');
  } else{

    
   
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || Check Toll</title>

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
  	    <h3>Check Toll</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">
          <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  
          <fieldset>
          <div class="form-group">
              <label class="control-label">Source</label>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="source" name="source" value="">
                <option value="">Choose Source</option>
                                <?php $query=mysqli_query($con,"select distinct(source) from toll");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['source'];?>"><?php echo $row['source'];?></option>
                  <?php } ?> 
                </select>
            </div>


            <div class="form-group">
              <label class="control-label">Destination</label>
              <select type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="destination" name="destination" value="">
                <option value="">Choose Destination</option>
                                <?php $query=mysqli_query($con,"select distinct(destn) from toll");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['destn'];?>"><?php echo $row['destn'];?></option>
                  <?php } ?> 
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
             <p style="text-align: center;"> <button type="submit" name="check" class="btn btn-primary">Check</button></p>
             
             
            </div>

            


          
          
            
        

             
          </fieldset>
        </form>
        </div>
    </div>
        <?php 
        $n=0;
 if (isset($_POST['check'])) { 
 $source = $_POST["source"]; 
 $destination = $_POST["destination"]; 
 $catname=$_POST["catname"];
 $q1="select number from toll where source='$source' && destn='$destination'";
 $ret=mysqli_query($con,$q1);
 if (mysqli_num_rows($ret) > 0) {
  while($row = mysqli_fetch_assoc($ret)) {
    $n=$row["number"];
     echo "Number of tolls : " . $n. "<br>";
     
  }

} else {
  echo "Number of tolls : " . $n. "<br>";
}
$row = mysqli_fetch_assoc($ret);
$q2="select cost from category where VehicleCat='$catname'";
$ret1=mysqli_query($con,$q2);
if (mysqli_num_rows($ret1) > 0) {
  while($row1= mysqli_fetch_assoc($ret1)) {
      $total=$row1["cost"] * $n;
      echo "Estimated Cost : Rs. ". $total. "<br>";
    
  }

} else {
  echo "Estimated Cost : 0 <br>";
}

  
 } 
 ?> 
        
        
      
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