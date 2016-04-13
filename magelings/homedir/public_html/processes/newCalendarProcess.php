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
		
		$name = $_POST['name'];
		$details = $_POST['details'];
		$day = $_POST['day'];
	
		mysql_query("INSERT INTO $tableName (name, details, day) VALUES ('$name', '$details', '$day')");
		
		header("Location: ../pageControl.php");
	}
	else
	{
		header("Location: ../admin.php");
	}
	
?>