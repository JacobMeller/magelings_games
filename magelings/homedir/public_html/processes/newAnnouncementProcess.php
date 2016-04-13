<?php
	
	include "../require/header.php";
	
	session_start();
	
	if(isset($_SESSION['active']))
	{
		$_SESSION['tab'] = 'slider';
		
		//$host="localhost"; 
		//$username="root"; 
		//$password=""; 
		//$db_name="magelings";
		
		//mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
		//mysql_select_db("$db_name")or die("Can't select the Database");
		
		$tableName = "announcements";
		
		if(isset($_POST['submit']))
		{		
			$background = str_replace(' ', '_', basename($_FILES['newbackground']['name']));
			$title = $_POST['newtitle'];
			$body = $_POST['newbody'];
			
			move_uploaded_file($_FILES['newbackground']['tmp_name'], "../images/slider/".$background);
			mysql_query("INSERT INTO $tableName (background, title, body) VALUES ('$background',  '$title', '$body')");
		}
		
		header("Location: ../pageControl.php");
	}
	else
	{
		header("Location: ../admin.php");
	}
	
?>