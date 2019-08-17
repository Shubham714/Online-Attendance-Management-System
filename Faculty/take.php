<?php 

	session_start(); 
	include_once("../connection.php");

 ?>

 <?php 

 		if(isset($_POST['take']))
 		{
 			$dept=$_SESSION['dept'];
 			$class=$_SESSION['class'];
 			$att=$_POST['attendance'];
 			$sem=$_SESSION['sem'];
 			$date=$_SESSION['date'];
 			$userid=$_SESSION['userid'];
 			$sub_id=$_SESSION['sub_id'];

 			foreach ($att as $key => $value)
			{
				if($value=="1")
				{
					$query4="insert into attendance(Academic_year,Dept,Class,Sem,Date,T_id,Sub_id,Roll,Status)values('2018-19','$dept','$class',$sem,'$date',$userid,$sub_id,$key,1)";
					$insertResult=$link->query($query4);
				}
				elseif ($value=="0") 
				{
					$query4="insert into attendance(Academic_year,Dept,Class,Sem,Date,T_id,Sub_id,Roll,Status)values('2018-19','$dept','$class',$sem,'$date',$userid,$sub_id,$key,0)";
					$insertResult=$link->query($query4);
				}
			}
			if($insertResult)
			{
				echo " <div class='alert alert-success alert-dismissible'>
    					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    					<strong>Attendance</strong> Taken Successfully.
  					</div>  ";
			}
 		}


  ?>



<!DOCTYPE html>
<html>
<head>
	<title>Take Attendance</title>
	<link rel="stylesheet" type="text/css" href="../CSS/take.css">
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
				<li id="first"><a style="text-decoration: none;" href="dashboard.php">Back</a></li>
			</ul>
		</div>
	</div>
	<form action="" method="post">
		<div class="selection">
			<center>
			<label id="lable" for="class">Class</label>
			<select name="class" required>
				<option value="">select class</option>
				<option value="SE">SE</option>
				<option value="TE">TE</option>
				<option value="BE">BE</option>
			</select>
			<label id="lable" for="date" style="margin-left: 50px">Date</label>
			<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" required>
			<label id="lable" for="class" style="margin-left: 50px">Subject</label>
			<select name="subject" required>
				<option value="">select Subject</option>
				<option value="TOC">TOC</option>
				<option value="SEPM">SEPM</option>
				<option value="HCI">HCI</option>
				<option value="OS">OS</option>
				<option value="DBMS">DBMS</option>
			</select>
			<input class="btn btn-success" style="margin-left: 50px" type="submit" name="gets" value="get attendance sheet">
		</div>
		</center>
	</form>
	 <div class="panel panel-default container">
    	<div class="panel-heading">
			<h1 style="text-align: center">Attendance Sheet</h1>
		</div>
			<div class="panel-body">
				<form  method="post">
					<table class="table">
						<thead>
							<tr>
								<th><input type="hidden"></th>
								<th><input type="checkbox" id="checkall"></th>
								<th>Roll</th>
								<th>Name</th>
							</tr>
						</thead>
						<tbody>
							
							<?php

								if(isset($_POST['gets']))
								{
									$class=$_POST['class'];
									$_SESSION['class']=$class;
									$dept=$_SESSION['dept'];
									$date=$_POST['date'];
									$_SESSION['date']=$date;
									$sub=$_POST['subject'];

									$sql1="select * from subject where Sub_name='$sub'";
									$result1=$link->query($sql1);
									$data=$result1->fetch_assoc();
									$sub_id=$data['Sub_id'];
									$sem=$data['Sem'];
									$_SESSION['sem']=$sem;
									$_SESSION['sub_id']=$sub_id;

									$sql2="select distinct Date from attendance where Date='$date' and Sub_id='$sub_id'";
									$result2=$link->query($sql2);
									$data2=$result2->fetch_assoc();
									$date2=$data2['Date'];

									if($date == $date2)
									{
										echo " <div class='alert alert-danger alert-dismissible'>
    										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    										<strong>Attendance!</strong> already Taken.
  											</div>  ";
									}
									else
									{
								
								$query="select * from student where Class='$class' and Dept='$dept'";
								$result=$link->query($query);
								while ($show=$result->fetch_assoc()){
							?>
						<tr>
							<td><input type="hidden" name="attendance[<?php echo $show['Roll']; ?>]" value="0"></td>
							<td><input type="checkbox" name="attendance[<?php echo $show['Roll']; ?>]" value="1"></td>
							<td><?php echo $show['Roll']; ?></td>
							<td><?php echo $show['Lname']." ".$show['Fname']." ".$show['Mname']; ?></td>
						</tr>
						<script>
							$("#checkall").change(function(){
								$("input:checkbox").prop("checked",$(this).prop("checked"))
							})
						</script>
						<?php }  ?>
						</tbody>
					</table>
					<center>
						<input class="btn btn-primary" type="submit" name="take" value="Take Attendance">
					</center>
				<?php } }?>
				</form>
			</div>
	</div>
</body>
</html>