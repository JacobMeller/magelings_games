<?php
	
	include "../require/header.php";
	
	session_start();
	
	if(isset($_SESSION['active']))
	{
		$_SESSION['tab'] = 'misc';
		
		//$host="localhost"; 
		//$username="root"; 
		//$password=""; 
		//$db_name="magelings";
		
		//mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
		//mysql_select_db("$db_name")or die("Can't select the Database");
		
		$tableName = "misc";
		
		$id = 1;
		$about = $_POST['about'];
		$index = $_POST['index'];
		$events = $_POST['events'];
		$findus = $_POST['findus'];
		$contact = $_POST['contact'];
		
		if(isset($about))
		{
			mysql_query("UPDATE $tableName SET about = '$about' WHERE id = '$id'");
		}
		if(isset($index))
		{
			mysql_query("UPDATE  `mageling_main`.`misc` SET  `index` = '$index' WHERE  `misc`.`id` =1;");
		}
		if(isset($events))
		{
			mysql_query("UPDATE $tableName SET events = '$events' WHERE id = '$id'");
		}
		if(isset($findus))
		{
			mysql_query("UPDATE $tableName SET findus = '$findus' WHERE id = '$id'");
		}
		if(isset($contact))
		{
			mysql_query("UPDATE $tableName SET contact = '$contact' WHERE id = '$id'");
		}
		
		header("Location: ../pageControl.php");
	}
	else
	{
		header("Location: ../admin.php");
	}
	
?>