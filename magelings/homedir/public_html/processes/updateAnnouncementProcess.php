<?php

	include "../require/header.php";

	session_start();
	
	if(isset($_SESSION['active']))
	{
		$_SESSION['tab'] = 'slider';
/*
		$host="localhost"; 
		$username="root"; 
		$password=""; 
		$db_name="magelings";
		
		mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
		mysql_select_db("$db_name")or die("Can't select the Database");
*/		
		$tableName = "announcements";
		
		if(isset($_POST['submit']))
		{		
			$background = str_replace(' ', '_', basename($_FILES['background']['name']));
			$title = $_POST['title'];
			$body = $_POST['body'];
			$editId = $_POST['id'];
			
			mysql_query("UPDATE $tableName SET title = '$title', body = '$body' WHERE id = '$editId'");
			
			if(move_uploaded_file($_FILES['background']['tmp_name'], "../images/slider/".$background)) 
			{	
				$data = mysql_query("SELECT * FROM $tableName WHERE id=$editId");
				$list = mysql_fetch_array($data);
				
				unlink($list['background']);
				mysql_query("UPDATE $tableName SET background = '$background' WHERE id = '$editId'");	
			}
		}
		
		header("Location: ../pageControl.php");
	}
	else
	{
		header("Location: ../admin.php");
	}
	
?>