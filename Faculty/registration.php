<?php 

    include_once("../connection.php");

 ?>
<?php 

    if(isset($_POST['register']))
    {
        $dept=$_POST['dept'];
        $name=$_POST['name'];
        $result=explode(" ", $name);
        $fname=$result[1];
        $mname=$result[2];
        $lname=$result[0];
        $t_id=$_POST['t_id'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $username=$_POST['username'];
        $pass1=$_POST['pass1'];
        $pass2=$_POST['pass2'];
        if($pass1 != $pass2)
        {
            echo '<script language="javascript">';
            echo 'alert("Password Does not Match")';
            echo '</script>';
        }
        else if($pass1 == $pass2)
        {
            $query1="insert into teacher(T_id,Fname,Mname,Lname,Dept,Email,Username,Password) values ('$t_id','$fname','$mname','$lname','$dept','$email','$username','$pass1')";
            $result1=$link->query($query1);
            $query2="insert into teacher_contact(T_id,Contact) values ('$t_id','$contact')";
            $result2=$link->query($query2);
            if($result1 && $result2)
            {
                echo '<script language="javascript">';
                echo 'alert("Successfully Registered! Back to login")';
                echo '</script>';
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("Something wents to wrong")';
                echo '</script>';
            }
        }
    }

 ?>


<html>
    <head>
        <title>Registration Page</title>
        <link rel="stylesheet" type="text/css" href="../CSS/cs1.css">
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
				<li id="first"><a style="text-decoration: none;" href="faculty.php">Back</a></li>
			</ul>
		</div>
	</div>
        <div class="registration">
            <h1>Faculty Registration</h1>
            <form method="post">
            	 <select name="dept" required>
                	<option value="">Select Department</option>
                	<option value="Mechanical"<?php  if((isset($_POST['register'])) && $dept == 'Mechanical'){ ?> selected <?php } ?>>Mechanical</option>
                	<option value="Civil"<?php  if((isset($_POST['register'])) && $dept == 'Civil'){ ?> selected <?php } ?>>Civil</option>
                	<option value="Electical"<?php  if((isset($_POST['register'])) && $dept == 'Electrical'){ ?> selected <?php } ?>>Electrical</option>
                	<option value="ENTC"<?php  if((isset($_POST['register'])) && $dept == 'ENTC'){ ?> selected <?php } ?>>ENTC</option>
                	<option value="IT"<?php  if((isset($_POST['register'])) && $dept == 'IT'){ ?> selected <?php } ?>>IT</option>
                	<option value="Computer"<?php  if((isset($_POST['register'])) && $dept == 'Computer'){ ?> selected <?php } ?>>Computer</option>
                </select>
                <p>Name</p>
                <input type="text" name="name" placeholder="Lastname Firstname Middlename" value="<?php if(isset($_POST['register']) && ($pass1 != $pass2) ) { echo $lname." ".$fname." ".$mname; }?>" required>
                <p>Teacher ID</p>
                <input type="text" name="t_id" placeholder="Enter Your Teacher ID" value="<?php if(isset($_POST['register']) && ($pass1 != $pass2) ) { echo $t_id; }?>" required>
                <p>Contact Number</p>
                <input type="text" name="contact" maxlength="10" placeholder="Enter Contact Number" value="<?php if(isset($_POST['register']) && ($pass1 != $pass2) ) { echo $contact; }?>" required>
                <p>Email Address</p>
                <input type="email" name="email" placeholder="Enter Your Email ID" value="<?php if(isset($_POST['register']) && ($pass1 != $pass2) ) { echo $email; }?>" required>
                <p>Username</p>
                <input type="text" name="username" placeholder="Enter Username" required>
                <p>Password</p>
                <input type="password" name="pass1" placeholder="Enter Password" required>
                <p>Confirm Password</p>
                <input type="password" name="pass2" placeholder="Confirm Password" required>
                <input type="submit" name="register" value="Register">
            </form>
        </div><br><br>
    </body>
</html>