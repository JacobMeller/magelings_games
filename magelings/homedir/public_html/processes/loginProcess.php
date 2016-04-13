<?php
	
	require_once('../require/recaptchalib.php');
	include "../require/header.php";
	
	$privatekey = "6LdbFOMSAAAAAK4Xz6k80fcy4lDLtovbPQ8YzCe7";
	
	$resp = recaptcha_check_answer
	(
		$privatekey,
		$_SERVER["REMOTE_ADDR"],
		$_POST["recaptcha_challenge_field"],
		$_POST["recaptcha_response_field"]
	);
	
	if (!$resp->is_valid) 
	{
		header("Location: ../admin.php");
	} 
	else 
	{
/*
		$host="localhost"; 
		$username="root"; 
		$password=""; 
		$db_name="magelings";
		
		mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
		mysql_select_db("$db_name")or die("Can't select the Database");
*/		
		$tableName = "admin";
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		//$hashed = encrypt($password);
		$hashed = $password;
		
		//Get Username	
		$data = mysql_query("SELECT * FROM $tableName WHERE username = '$username'");
		$list = mysql_fetch_array($data);
		
		if($hashed == $list['password'])
		{
			session_start();
			$_SESSION['active'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $hashed;
			
			header("Location: ../pageControl.php");
		}
		else
		{	
			header("Location: ../admin.php");
		}
	}
	
?>