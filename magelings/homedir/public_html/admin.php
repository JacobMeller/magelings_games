<html>
<head>
    <title>Admin Login - Magelings Games</title>
    <link rel="icon" type="img/ico" href="favicon.ico">
</head>

<style type="text/css">
#recaptcha_area, #recaptcha_table
{
	margin:0 auto;
}

</style>

<body style="background-color:#E4D8C9; text-align:center; margin:0 auto; padding: 0 auto;">
	<div id="login" style="margin-top: 200px; text-align:center;">
    	<span style="font-size:36px;">Magelings Games Admin</span><br/>
    	<form action="processes/loginProcess.php" method="post" name="login" enctype="multipart/form-data" style="text-align:center;">
        	<input name="username" type="text" size="28" placeholder="username" style="margin:5px; height:28px;"><br/>
            <input name="password" type="password" size="28" placeholder="password" style="margin:5px; height:28px;"><br/>
            <script type="text/javascript"
			   src="http://www.google.com/recaptcha/api/challenge?k=6LdbFOMSAAAAAPVzTzkVcl9VULmBXh6b3Ay18aSL">
			</script>
			<noscript>
			   <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LdbFOMSAAAAAPVzTzkVcl9VULmBXh6b3Ay18aSL" height="300" width="500" frameborder="0"></iframe><br>
			   <textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
			   <input type="hidden" name="recaptcha_response_field" value="manual_challenge">
			</noscript>
            <input name="submit" type="submit" value="login" style="margin:5px; font-size:22px;">
        </form>
    </div>
</body>
</html>