<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Toll Tax Management System || View Receipt</title>
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
     <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	 <h3>View Receipt</h3>
 
	<div class="bs-example4" data-example-id="simple-responsive-table">
  
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>S.NO</th>
            
            <th>Receipt ID</th>
            <th>Owner ID</th>
            <th>Date of Creation</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php
$ret=mysqli_query($con,"select *from  receipt");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <tr>
            <th scope="row"><?php echo $cnt;?></th>
                <td><?php  echo $row['ID'];?></td>
                <td><?php  echo $row['OwnerId'];?></td>
                <td><?php  echo $row['CreationDate'];?></td>
                  <td><a href="view-receipt.php?viewid=<?php echo $row['ID'];?>">View Details</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
          </tr>
  
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
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
<?php }  ?>