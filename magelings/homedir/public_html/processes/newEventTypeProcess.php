<?php
	
	include "../require/header.php";
	
	session_start();
	
	if(isset($_SESSION['active']))
	{
		$_SESSION['tab'] = 'events';
		
		//$host="localhost"; 
		//$username="root"; 
		//$password=""; 
		//$db_name="magelings";
		
		//mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
		//mysql_select_db("$db_name")or die("Can't select the Database");
		
		$tableName = "eventtypes";
		
		if(isset($_POST['submit']))
		{		
			$name = $_POST['eventname'];
	
			mysql_query("INSERT INTO $tableName (name) VALUES ('$name')");
		}
		
		header("Location: ../pageControl.php");
	}
	else
	{
		header("Location: ../admin.php");
	}
	
?>