<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['ttmsaid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Online Toll Plaza System || Dashboard</title>

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
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
              <?php $query1=mysqli_query($con,"Select * from  user");
$totalstaff=mysqli_num_rows($query1);
?>
                    <i class="pull-left fa fa-users icon-rounded"></i>
                    <div class="stats">
                      <h5><strong> <?php echo $totalstaff;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-staff.php">Total Users</a></span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
              <?php $query2=mysqli_query($con,"Select * from  category");
$totalcat=mysqli_num_rows($query2);
?>
                    <i class="pull-left fa fa-thumbs-up user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $totalcat;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-vehicle-cat.php">Total Vehicle Category</a></span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
              <?php $query3=mysqli_query($con,"Select * from  pass  ");
$totalpass=mysqli_num_rows($query3);
?>
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $totalpass;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-pass.php">Total Pass</a></span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget">
        		<div class="r3_counter_box">
              <?php $query4=mysqli_query($con,"Select * from  receipt");
$totalreceipt=mysqli_num_rows($query4);
?>
                    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $totalreceipt;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-receipt.php">Total Receipt</a></span>
                    </div>
                </div>
        	 </div>
        	<div class="clearfix"> </div>
      </div>
            <div class="col_3">
          <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
              <?php
//todays number of vehicle
 $query5=mysqli_query($con,"select ID from receipt where date(CreationDate)=CURDATE();");
$count_today_vehicle=mysqli_num_rows($query5);
 ?>
                    <i class="pull-left fa fa-car icon-rounded"></i>
                    <div class="stats">
                      <h5><strong> <?php echo $count_today_vehicle;?></strong></h5>
                      <span>Today's Number of Vehicles</span>
                    </div>
                </div>
          </div>
          <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
              <?php
//yesterdays number of vehicle
 $query6=mysqli_query($con,"select ID from receipt where date(CreationDate)=CURDATE()-1;");
$count_yesterdays_vehicle=mysqli_num_rows($query6);
 ?>
                    <i class="pull-left fa fa-thumbs-up user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $count_yesterdays_vehicle;?></strong></h5>
                      <span>Yesterdays Number of Vehicles</span>
                    </div>
                </div>
          </div>
          <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
              <?php
//last seven days number of vehicle
 $query7=mysqli_query($con,"select ID from receipt where date(CreationDate)=(DATE(NOW()) - INTERVAL 7 DAY);");
$count_sevendays_vehicle=mysqli_num_rows($query7);
 ?>
                    <i class="pull-left fa fa-comment user2 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $count_sevendays_vehicle;?></strong></h5>
                      <span>Last 7 Days Number of Vehicles</span>
                    </div>
                </div>
          </div>
          <div class="col-md-3 widget">
            <div class="r3_counter_box">
                <?php
//total number of vehicle
 $query7=mysqli_query($con,"select ID from receipt");
$count_total_vehicle=mysqli_num_rows($query7);
 ?>
                    <i class="pull-left fa fa-dollar dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $count_total_vehicle;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-receipt.php">Total vehicles Enter  Till Date</a></span>
                    </div>
                </div>
           </div>
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
