<?php 

	session_start(); 
	include_once("../connection.php");

 ?>

<?php 

	if(isset($_SESSION['userid']))
	{
		$t_id = $_SESSION['userid'];
		$query="select Fname,Lname from teacher where T_id=$t_id limit 1";
		$result=$link->query($query);

		if($result)
		{

			$data=$result->fetch_assoc();
			$fname= $data['Fname'];
        	$lname=$data['Lname'];
		}
		else
		{
			echo "query not exicuted";
		}
	}
	else
	{
		echo "session not set";
	}

 ?>
<?php echo $fname." ".$lname; ?>