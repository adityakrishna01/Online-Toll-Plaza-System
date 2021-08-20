<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  }
  else{

    if(isset($_POST['Approve']))
    {
      $adminid=$_SESSION['ttmsaid'];
      $vid1=$_GET['viewid'];
       $query=mysqli_query($con,"UPDATE pass SET status = 'Payment Pending' WHERE ID = '$vid1'");
      if ($query) {
       echo '<script>alert("Pass has been approved.")</script>';
  echo "<script>window.location.href ='add-pass.php'</script>";
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
<title>Toll Tax Management System || View Pass</title>

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
  	    <h3>View Pass</h3>
  	    <div class="well1 white" id="exampl">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post"> 
  <?php
$vid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from pass where ID='$vid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <fieldset>
            
             <table border="1" class="table table-bordered mg-b-0" width="100%">
              <tr>
    <th>Vehicle Category</th>
    <td><?php echo $row['VehicleCat'];?></td>
  </tr>
        <tr>
    <th>Pass ID</th>
    <td><?php echo $row['ID'];?></td>
  </tr> 
  <tr>
    <th>Vehicle Name</th>
    <td><?php echo $row['VehicleName'];?></td>
  </tr> 
    <tr>
    <th>Vehicle Reg Number</th>
    <td><?php echo $row['RegNumber'];?></td>
  </tr> 
  <tr>
    <th>Validity From</th>
    <td><?php echo $row['Validityfrom'];?></td>
  </tr>   
  <tr>
    <th>Validity To</th>
    <td><?php echo $row['ValidityTo'];?></td>
  </tr> 
  <tr>
    <th>Name of Applicant</th>
    <td><?php echo $row['AppName'];?></td>
  </tr> 
  <tr>
    <th>Age of Applicant</th>
    <td><?php echo $row['AppAge'];?></td>
  </tr>
  <tr>
    <th>Pass Type</th>
    <td><?php echo $row['passtype'];?></td>
  </tr>
  <tr>
    <th>Address of Applicant</th>
    <td><?php echo $row['AppAdd'];?></td>
  </tr>
  <tr>
    <th>Cost of Pass</th>
    <td><?php echo $row['PassCost'];?></td>

  </tr>
  <tr>
    <th>Status</th>
    <td><?php echo $row['status'];?></td>
</tr>
        
         <?php } ?>
       </table>
       <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="Approve" class="btn btn-primary">Approve</button></p>
             
             
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

<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
</script>
</body>
</html>
<?php } ?>
