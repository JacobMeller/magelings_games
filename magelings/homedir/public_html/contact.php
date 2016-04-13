<?php

	//$host="localhost"; 
	//$username="root"; 
	//$password=""; 
	//$db_name="magelings";
	
	//mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
	//mysql_select_db("$db_name")or die("Can't select the Database");
	
	include "require/header.php";
	
	$tableName = 'announcements';
	
	$data = mysql_query("SELECT * FROM $tableName");

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contact - Magelings Games</title>
    
    <!-- HTML INCLUDES -->
    <script src="js/jquery-1.10.0.min.js"></script>
	<script src="js/unslider.min.js"></script>
    
    <!-- Web Fonts & stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
    <link href="styles/magelings.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="img/ico" href="favicon.ico">
</head>

<script type="text/javascript">

	//required unslider widget javascript/jquery
	$(function() 
	{
    	$('.slider').unslider(
		{
			dots: true,
			fluid: true
		});
	});
	
	$(document).ready(function()
	{
		var unslider = $('.slider').unslider();
		
		$('.sliderArrow').click(function(event) 
		{
			event.preventDefault();
			
			if($(this).is("#rightSliderArrow")) 
			{
				unslider.data('unslider')['next']();  
			} 
			else 
			{
				unslider.data('unslider')['prev']();  
			}
		});
	});
	
</script>


<body>
	<div id="site">
    	<div id="logo">
            <div id="logoInner">
                Magelings Games
            </div>
        </div>
        <div id="nav">
            <div id="navInner">
                <a href="index.php">Home</a>
                <a href="events.php">Events</a>
                <a href="forums/index.php">Forums</a>
                <span>For Gamers. By Gamers.</span>
                <a href="blog/index.php">Blog</a>
                <a href="findus.php">Find Us</a>
                <a href="#here" class="selected">Contact</a>
            </div>
        </div>
        <div class="slider">
        	<a href="#l" class="sliderArrow" id="leftSliderArrow"> X </a>
            <a href="#r" class="sliderArrow" id="rightSliderArrow"> X </a>
        	<ul>
                <?php
					while($list = mysql_fetch_array($data))
					{
						echo '<li style="background-image:url(images/slider/'.$list['background'].');">
							      <div class="announcementBox">
								      <div class="announcementTitle">
									     '.$list['title'].'
									  </div>
									  <div class="announcementBody">
									     '.$list['body'].'
									  </div>
								  </div>
							  </li>';
					}
				?>
    		</ul>
        </div>
        <div id="secondaryNav">
        	<div id="secondaryNavInner">
            	<?php
					$tableName = 'misc';
					$data = mysql_query("SELECT * FROM $tableName");
					$list = mysql_fetch_array($data);
					echo $list['contact'];
				?>
            </div>
        </div>
        <div id="main">
            <div id="mainInner">
                <div id="mapForm">
                	<div id="mapFormIdentifiers">
                    	Subject:<br/><br/>Message:<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>Phone:<br/>
                        <br/>Email:<br/><br/>Social Media:
                    </div>
                    <div id="mapFormMain">
                    	<form action="processes/contactFormProcess.php" method="post" enctype="multipart/form-data" name="contactForm">
                    	 	<input type="text" id="mapTextInput" size="65" name="subject"/><br/><br/>  
                            <textarea style="width:617px;" id="contactMessage" name="message" cols="60" rows="7"></textarea><br/>
                            <script type="text/javascript"
							   src="http://www.google.com/recaptcha/api/challenge?k=6LdbFOMSAAAAAPVzTzkVcl9VULmBXh6b3Ay18aSL">
							</script>
							<noscript>
							   <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LdbFOMSAAAAAPVzTzkVcl9VULmBXh6b3Ay18aSL" height="300" width="500" frameborder="0"></iframe><br>
							   <textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
							   <input type="hidden" name="recaptcha_response_field" value="manual_challenge">
							</noscript>
                            <input type="submit" onClick="" value="Submit" id="mapButtonInput" class="button"/>
                        </form>
                        <p style="margin-top:37px;">
                        	(573) 639-8031<br/><br/>
                            nat@magelingsgames.com
                        </p>
                        <p style="margin-top:15px;">
                            <a href="https://twitter.com/MagelingsGames" target="_blank"><img src="images/twitterLogo.jpg" width="45"/></a>
                            <a href="https://www.facebook.com/Magelings" target="_blank"><img src="images/facebookLogo.png" width="45"/></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div id="footerInner">
            	<div id="footerLeft">
                	<a href="findus.php">
                    	1906 N Providence Rd. Suite C<br/>
                    	Columbia, MO 65203
                    </a>
                </div>
                &copy Magelings Games 2013
                <div id="footerRight">
                	(573) 416-0808<br/>
                    <a href="mailto:nat@magelingsgames.com?Subject=Magelings.com visitor message" target="_blank">nat@magelingsgames.com</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>