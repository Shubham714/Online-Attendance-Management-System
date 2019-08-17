<?php 

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
		echo "password does not match";
	}
	else
	{
		echo $dept."<br>".$fname." <br> ".$mname." <br> ".$lname." <br> ".$t_id." <br> ".$contact." <br> ".$email." <br> ".$username." <br> ".$password;
	}

 ?>