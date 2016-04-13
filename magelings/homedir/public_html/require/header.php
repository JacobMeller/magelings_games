<?php
	
	/*
	$host="localhost"; 
	$username="root"; 
	$password=""; 
	$db_name="magelings";
	
	mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
	mysql_select_db("$db_name")or die("Can't select the Database");
	*/

	$host="localhost"; 
	$username="mageling_admin"; 
	$password="Mrgrahamisadmin#01"; 
	$db_name="mageling_main";
	
	mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
	mysql_select_db("$db_name")or die("Can't select the Database");
?>