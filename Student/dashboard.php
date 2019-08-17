<?php 

	session_start(); 
	include_once("../connection.php");

 ?>

<?php 

	if(isset($_SESSION['userid']))
	{
		$userid = $_SESSION['userid'];
		$query="select Fname,Lname from student where Roll=$userid limit 1";
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
</body>
</html>