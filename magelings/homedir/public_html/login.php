<!DOCTYPE html>
<html>
	<head>
		<title> Magelings Games </title>
		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel ="stylesheet">
		
		
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		-->
	</head>
	<body>

		<?php
				session_start();
		?>

		<div class = "navbar navbar-default navbar-static-top">
			<div class = "container">
			
				<a href = "#" class = "navbar-brand">Home Page</a>

			</div>
		</div>

<div class="wrapper">
    <form class="form-signin" action="loginaction.php" method="post">       
      <h2 class="form-signin-heading">Magelings Games</h2>
      <input type="text" class="form-control" name="inputUsername" placeholder="Email Address" widthrequired="" autofocus="" />
      <input type="password" class="form-control" name="inputPassword" placeholder="Password" required=""/>      

      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
           <a href="createaccount.php" class="text-center new-account">Create an account </a>
    </form>

  </div>
  
  	<?php
		echo "<center><div>" . $_SESSION['error'] . "</div></center>";
		session_unset();
	?>

	</body>
</html>