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
		
		$deleteId = $_GET['id'];
		
		mysql_query("DELETE FROM $tableName WHERE id=$deleteId");
		
		header("Location: ../pageControl.php");
	}
	else
	{
		header("Location: ../admin.php");
	}

?>