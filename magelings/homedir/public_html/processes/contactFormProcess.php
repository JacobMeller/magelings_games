<?php

	require_once('../require/recaptchalib.php');
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
		// What happens when the CAPTCHA was entered incorrectly
	} 
	else 
	{
		// Your code here to handle a successful verification
		$to      = 'contact@magelings.com';
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$headers = "From: ContactForm@magelings.com";
	
		mail($to, $subject, $message, $headers);
	}
	
	header("Location: ../contact.php");

?>