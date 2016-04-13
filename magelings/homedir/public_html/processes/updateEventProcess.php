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
		
		$tableName = "events";
		
		if(isset($_POST['submit']))
		{		
			$eventTypeName = $_POST['hiddenname'];
			if($_POST['submit'] === "Add")
			{
				$date = $_POST['newdate'];
				$time = $_POST['newtime'];
				$name = $_POST['newname'];
				$details = $_POST['newdetails'];
				mysql_query("INSERT INTO $tableName (date, time, name, details, eventtype) VALUES ('$date', '$time', '$name', '$details', '$eventTypeName')");
			}
			else
			{
				$editId = $_POST['submit'];
				$editId = filter_var($editId, FILTER_SANITIZE_NUMBER_INT);
				
				$date = $_POST['date'];
				$time = $_POST['time'];
				$name = $_POST['name'];
				$details = $_POST['details'];
				
				mysql_query("UPDATE $tableName SET date = '$date', time = '$time', name = '$name', details = '$details' WHERE id = '$editId'");
			} 
		}
		
		header("Location: ../pageControl.php");
	}
	else
	{
		header("Location: ../admin.php");
	}
	
?>