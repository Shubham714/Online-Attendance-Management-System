<?php 

	session_start(); 
	include_once("../connection.php");

 ?>

<?php 

	if(isset($_SESSION['userid']))
	{
		$userid = $_SESSION['userid'];
		$query="select Fname,Lname from teacher where T_id=$userid limit 1";
		$result=$link->query($query);

		if($result)
		{

			$data=$result->fetch_assoc();
			$fname= $data['Fname'];
        	$lname=$data['Lname'];
		}
	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="../CSS/dash2.css">
    <link rel="stylesheet" type="text/css" href="../Bootstrap/bootstrap.min.css">
	<script src="../Bootstrap/bootstrap.min.js"></script>
	<script src="../Bootstrap/jquery.min.js"></script>
</head>
<body>
	<div class="menu">
		<div class="leftmenu">
			<div class="img">
				<img src="../Images/vpcoe_white_transparent.png">
			</div>
			<div class="h4">
				<h4>Vidya Pratishthan's<br>Kamalnayan Bajaj Institute of<br>Engineering and Technology, Baramati</h4>
			</div>
		</div>
		<div class="rightmenu">
			<ul>
				<li id="first"><h3>Welcome, <?php echo $fname." ".$lname; ?></h3></li>
				<li id="link"><a style="text-decoration: none;" href="../logout.php">( LogOut )</a></li>
			</ul>
		</div>
	</div>
	<br>
    <div class="panel panel-default container">
    	<div class="panel-heading">
			<h1 style="text-align: center">Faculty Menu</h1>
		</div>
			<div class="panel-body">
				<center>
					<a href="#" class="btn btn-primary">Manage Profile</a><br><br><br>
					<a href="take.php" class="btn btn-success">Take Attendance</a><br><br>
					<a href="#" class="btn btn-success">Calculate Monthly Report</a><br><br>
					<a href="#" class="btn btn-success">Classwise Daily Report</a><br><br>
					<a href="#" class="btn btn-success">Datewise Report</a><br><br>
					<a href="#" class="btn btn-danger">Delete Record</a>
				</center>
			</div>
		<div class="panel-footer">
			<center>
				&copy Copyright. All Rights are reserved to VPKBIET, Baramati.
			</center>
		</div>
	</div>
</body>
</html>