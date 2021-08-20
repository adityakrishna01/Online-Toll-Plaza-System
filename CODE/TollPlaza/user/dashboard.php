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
<title>Toll Tax Management System || Dashboard</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/lines.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="js/d3.v3.js"></script>
<script src="js/rickshaw.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        
            <?php include_once('includes/sidebar.php');?>
            <!-- /.navbar-static-side -->
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="graphs">
     	<div class="col_3">
       <?php
$sid=$_SESSION['ttmssid'];
$ret=mysqli_query($con,"select StaffName from tblstaff where ID='$sid'");
$row=mysqli_fetch_array($ret);
$name=$row['StaffName'];

?>  	
   <p style="text-align: center;color: blue;font-size: 25px"> Welcome <?php echo $name; ?> !!!</p>
        	<div class="clearfix"> </div>
      </div>

		<?php include_once('includes/footer.php');?>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>
<?php }  ?>