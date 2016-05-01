<!DOCTYPE html>
<html>
	<?php

	chdir('database');

	require '../database/info.php';

	session_start();

	$dbname = "finalproject";

	$dirtyusid = $_POST['inputUsername'];
	$dirtyuserpassword = $_POST['inputPassword'];

	try{
		$usid = htmlspecialchars($dirtyusid);
		$userpassword = htmlspecialchars($dirtyuserpassword);

		$pdoconn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$pdoconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $pdoconn->prepare("select * from users where usid = (:usid)");
		$stmt->execute(array(':usid' => $usid));

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$pulledshpassword = $row['shpassword'];
		$pulledsalt = $row['salt'];

		$hashstring = $userpassword.$pulledsalt;

		$pdoconn = null; //remove conn

		if(sha1($hashstring) == $pulledshpassword){

			session_id("loginsession");
			session_start();
			$_SESSION['user'] = "1";
			$_SESSION['username'] = $user;

			header("Location: index.php");
			exit();
		}
		else{
			$_SESSION['error'] = "The username and password combination is not valid.";
			header("Location: login.php");
			exit();
		}

	}
	catch(PDOException $e){

	$pdoconn = null;

	$_SESSION['error'] = $e->getMessage();
	header("Location: login.php");
	exit();
	}

	?>
</html>