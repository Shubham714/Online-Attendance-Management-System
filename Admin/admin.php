<?php

	session_start(); 
	include_once("../connection.php");

 ?>
<?php 

	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];

		$query="select * from admin where username='$username' and password='$password' limit 1";
		$result=$link->query($query);

		if($result)
		{
			$row=$result->fetch_assoc();
			$userId= $row['Userid'];
        	$dbusername=$row['Username'];
        	$dbpassword=$row['Password'];

		}

		if($username== $dbusername && $password== $dbpassword)
		{
			$_SESSION['userid']=$userId;
			header('Location:dashboard.php');
		}
	}

 ?>




<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="../CSS/cs.css">
    </head>
    <body>
        <div class="bgimage">
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
						<li id="first"><a style="text-decoration: none;" href="../index.php">HOME</a></li>
						<li id="link"><a style="text-decoration: none;" href="#">Admin</a></li>
						<li id="link"><a style="text-decoration: none;" href="../Faculty/faculty.php">Faculty</a></li>
						<li id="link"><a style="text-decoration: none;" href="../Student/student.php">Student</a></li>
						<li id="link"><a style="text-decoration: none;" href="#">Contact</a></li>
					</ul>
				</div>
			</div>
	        
	        <div class="loginbox">
	            <img src="../Images/download.png" class="avatar">
	            <h1>Admin Login</h1>
	            <form method="post">
	                <p>Username</p>
	                <input type="text" name="username" placeholder="Enter Username" required>
	                <p>Password</p>
	                <input type="password" name="password" placeholder="Enter Password" required>
	                <input type="submit" name="login" value="Login">
	                <a href="#">Forget Password?</a><br>
	                <a href="registration.html">Don't have an account?</a>
	            </form>
	        </div>
	    </div>
    </body>
</html>