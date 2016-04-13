<?php
/*
	$host="localhost"; 
	$username="root"; 
	$password=""; 
	$db_name="magelings";
	
	mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
	mysql_select_db("$db_name")or die("Can't select the Database");
*/	
	include "require/header.php";
	
	$tableName = 'announcements';
	
	$data = mysql_query("SELECT * FROM $tableName");

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Home - Magelings Games</title>
    <meta description="Columbia's newest hobby &amp; gaming store, featuring an ever-expanding variety of board games, CCGs and more. Feature Products include Magic: The Gathering, Yu-Gi-Oh, and many more!" />
	<meta keywords="Magic: The Gathering, Board Games, Table Top Gaming, CCGs, Warhammer, Pokemon, Columbia, MO, Columbia MO, Hobby, Gaming" />
    
    <!-- HTML INCLUDES -->
    <script src="js/jquery-1.10.0.min.js"></script>
	<script src="js/unslider.min.js"></script>
    
    <!-- Web Fonts & stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
    <link href="styles/magelings.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="img/ico" href="favicon.ico">
</head>

<style type="text/css">
</style>

<script type="text/javascript">
	
	//required unslider widget javascript/jquery
    //JMR: This appears to be declaring a function that then isn't used.
	$(function() 
	{
    	$('.slider').unslider(
		{
			fluid: false,
            delay: 5000
		});
	});
	
	//required twitter widget javascript
	!function(d,s,id)
	{
		var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
		if(!d.getElementById(id))
		{
			js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);
		}
	}(document,"script","twitter-wjs");
	
	$(document).ready(function()
	{
        // JMR: This is the slider we care about
		var unslider = $('.slider').unslider(
            {
                delay: 10000
            });
		
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
                <a href="#here" class="selected">Home</a>
                <a href="events.php">Events</a>
                <!--<a href="forums/index.php">Forums</a>-->
                <span>For Gamers. By Gamers.</span>
                <a href="blog/index.php">Blog</a>
                <a href="findus.php">Find Us</a>
                <!--<a href="contact.php">Contact</a>-->
            </div>
        </div>
        <!--
        <div id="frontpage">
            <img src="images/frontpage.jpg" />
             width="635px;""
        </div>
        -->
        <div class="slider">
            <a href="#l" class="sliderArrow" id="leftSliderArrow"> X </a>
            <a href="#r" class="sliderArrow" id="rightSliderArrow"> X </a>
        	<ul>
                <li style="background: transparent url(images/frontpage00.jpg) no-repeat center center;background-size: cover;"></li>
                <li style="background: transparent url(images/frontpage01.jpg) no-repeat center center;background-size: cover;"></li>
                <li style="background: transparent url(images/frontpage02.jpg) no-repeat center center;background-size: cover;"></li>
                <li style="background: transparent url(images/frontpage03.jpg) no-repeat center center;background-size: cover;"></li>

                <!-- 
                Old slider code
            	<?php
					while($list = mysql_fetch_array($data))
					{
						echo '<li style="background: transparent url(images/slider/'.$list['background'].') no-repeat center center;background-size: cover;">
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
                -->
    		</ul>
        </div>
        <div id="secondaryNav">
            <!--
        	<div id="secondaryNavInner">
            	<?php
					$tableName = 'misc';
					$data = mysql_query("SELECT * FROM $tableName");
					$list = mysql_fetch_array($data);
					echo $list['index'];
				?>
            </div>
            -->
        </div>
        <div id="main">
            <div id="mainInner">
                <div class="mainBlock">
                    <span class="mainBlockHeader">HOURS</span>
                    <p>
                        <table id="hoursTable">
                            <tr><td>Monday</td><td class="tdAlignRight">Closed</td></tr>
                            <tr><td>Tuesday</td><td class="tdAlignRight">5:30pm - 9:30pm</td></tr>
                            <tr><td>Wednesday</td><td class="tdAlignRight">5:30pm - 9:30pm</td></tr>
                            <tr><td>Thursday</td><td class="tdAlignRight">5:30pm - 11:00pm</td></tr>
                            <tr><td>Friday</td><td class="tdAlignRight">5:30pm - 12:00am</td></tr>
                            <tr><td>Saturday</td><td class="tdAlignRight">10:00am - 6:00pm</td></tr>
                            <tr><td>Sunday</td><td class="tdAlignRight">12:00pm - 6:00pm</td></tr>
                        </table>
                    </p>
                </div>
                <div class="mainBlock">
                    <span class="mainBlockHeader">Upcoming Events</span>
<!-- -------------------------------------------------Upcoming Events SECTION START HERE------------------------------------------- -->
                 
                   
                    	
<iframe src="https://www.google.com/calendar/embed?title=Upcoming%20Events&amp;showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=AGENDA&amp;height=386&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=ut7sv2hq3kpqmffkkpbeeu2iis%40group.calendar.google.com&amp;color=%236B3304&amp;ctz=America%2FChicago" style=" border-width:0 " width="288" height="386" frameborder="0" scrolling="no"></iframe>
                 
<!-- -------------------------------------------------Upcoming Events SECTION HERE------------------------------------------- -->
                </div>
                <div class="mainBlock">
                	<span class="mainBlockHeader">SOCIAL</span>
                    <a class="twitter-timeline" href="https://twitter.com/MagelingsGames" data-chrome="transparent" width="288" height="388" data-widget-id="336700849998942208">
                        Tweets by @MagelingsGames
                    </a>
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
                &copy Magelings Games 2015
                <div id="footerRight">
                	(573) 639-8031<br/>
                    <a href="mailto:nat@magelingsgames.com?Subject=Magelings.com visitor message" target="_blank">nat@magelingsgames.com</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>