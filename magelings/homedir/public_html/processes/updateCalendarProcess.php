<?php

	include "../require/header.php";
	
	session_start();
	
	if(isset($_SESSION['active']))
	{
		$_SESSION['tab'] = 'calendar';
		
		//$host="localhost"; 
		//$username="root"; 
		//$password=""; 
		//$db_name="magelings";
		
		//mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
		//mysql_select_db("$db_name")or die("Can't select the Database");
		
		$tableName = "calendar";
		
		$id = $_GET['id'];
		$name = $_POST['name'.$id];
		$details = $_POST['details'.$id];
		$day = $_POST['day'.$id];
		
		if(isset($name))
		{
			mysql_query("UPDATE $tableName SET name = '$name' WHERE id = '$id'");
		}
		if(isset($details))
		{
			mysql_query("UPDATE $tableName SET details = '$details' WHERE id = '$id'");
		}
		if(isset($day))
		{
			mysql_query("UPDATE $tableName SET day = '$day' WHERE id = '$id'");
		}
		
		header("Location: ../pageControl.php");
	}
	else
	{
		header("Location: ../admin.php");
	}

?>