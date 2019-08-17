<?php

	$host="localhost";
	$user="root";
	$pass="";
	$db="practice";

	$link=new mysqli($host,$user,$pass,$db);

	if($link)
	{
	}
	else
	{
		echo "Error";
	}

?>