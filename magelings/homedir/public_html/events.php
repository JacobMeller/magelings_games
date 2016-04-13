<?php

	//$host="localhost"; 
	//$username="root"; 
	//$password=""; 
	//$db_name="magelings";
	
	//mysql_connect("$host", "$username", "$password")or die("Can't connect to the Server");
	//mysql_select_db("$db_name")or die("Can't select the Database");
	
	include "require/header.php";
	
	$tableName = 'eventtypes';
	
	$data = mysql_query("SELECT * FROM $tableName");

?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Events - Magelings Games</title>
    
    <!-- HTML INCLUDES -->
    <script src="js/jquery-1.10.0.min.js"></script>
	<script src="js/unslider.min.js"></script>
    
    <!-- Web Fonts & stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'/>
    <link href="styles/magelings.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" type="img/ico" href="favicon.ico">
</head>

<style type="text/css">
</style>

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
	
	function shiftEvents(direction)
	{
		if(direction == 'right')
		{	
			var prevDiv = '';
			var currentDiv = '';
			for(var i = 7; i >= 1; i--)
			{
				if(i == 7)
				{
					nextPosition = 1;
					prevDiv = $("#day" + nextPosition.toString()).html();
					
				}
				else
				{
					nextPosition = i - 1;
					prevDiv = currentDiv;
				}
				
				currentDiv = $("#day" + i.toString()).html();
			
				$("#day" +i.toString()).html(prevDiv);
			}
		}
		else if(direction == 'left')
		{
			var prevDiv = '';
			var currentDiv = '';
			for(var i = 1; i <= 7; i++)
			{
				if(i == 1)
				{
					prevPosition = 7;
					prevDiv = $("#day" + prevPosition.toString()).html();
					
				}
				else
				{
					prevPosition = i - 1;
					prevDiv = currentDiv;
				}
				
				currentDiv = $("#day" + i.toString()).html();
			
				$("#day" +i.toString()).html(prevDiv);
			}
		}
	}
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
                <a href="#here" class="selected">Events</a>
                <!--<a href="forums/index.php">Forums</a>-->
                <span>For Gamers. By Gamers.</span>
                <a href="blog/index.php">Blog</a>
                <a href="findus.php">Find Us</a>
                <!--<a href="contact.php">Contact</a>-->
            </div>
        </div>
        <div id="events">
        	<img id="eventLeft" onClick="shiftEvents('left')" width="40" src="images/left.png"/>
            <img id="eventRight" onClick="shiftEvents('right')" width="40" src="images/right.png"/>
<!-- ---------------------------------------WEEKLY EVENTS SECTION START HERE--------------------------------------- -->
            <div id="eventSlider">
            	<?php
					$tableNameCal = 'calendar';
					
					//monday
					$dataCal = mysql_query("SELECT * FROM $tableNameCal WHERE day='1'");
					echo '<div class="event" id="day1">
                    		<span class="eventHeader">Monday</span>
                    		<table>';
					while($listCal = mysql_fetch_array($dataCal))
					{
						echo '<tr><td>'.$listCal['name'].'</td><td>'.$listCal['details'].'</td></tr>';
					}
					echo '</table></div>';
					
					//tuesday
					$dataCal = mysql_query("SELECT * FROM $tableNameCal WHERE day='2'");
					echo '<div class="event" id="day2">
                    		<span class="eventHeader">Tuesday</span>
                    		<table>';
					while($listCal = mysql_fetch_array($dataCal))
					{
						echo '<tr><td>'.$listCal['name'].'</td><td>'.$listCal['details'].'</td></tr>';
					}
					echo '</table></div>';
					
					//wednesday
					$dataCal = mysql_query("SELECT * FROM $tableNameCal WHERE day='3'");
					echo '<div class="event" id="day3">
                    		<span class="eventHeader">Wednesday</span>
                    		<table>';
					while($listCal = mysql_fetch_array($dataCal))
					{
						echo '<tr><td>'.$listCal['name'].'</td><td>'.$listCal['details'].'</td></tr>';
					}
					echo '</table></div>';
					
					//thursday
					$dataCal = mysql_query("SELECT * FROM $tableNameCal WHERE day='4'");
					echo '<div class="event" id="day4">
                    		<span class="eventHeader">Thursday</span>
                    		<table>';
					while($listCal = mysql_fetch_array($dataCal))
					{
						echo '<tr><td>'.$listCal['name'].'</td><td>'.$listCal['details'].'</td></tr>';
					}
					echo '</table></div>';
					
					//friday
					$dataCal = mysql_query("SELECT * FROM $tableNameCal WHERE day='5'");
					echo '<div class="event" id="day5">
                    		<span class="eventHeader">Friday</span>
                    		<table>';
					while($listCal = mysql_fetch_array($dataCal))
					{
						echo '<tr><td>'.$listCal['name'].'</td><td>'.$listCal['details'].'</td></tr>';
					}
					echo '</table></div>';
					
					//saturday
					$dataCal = mysql_query("SELECT * FROM $tableNameCal WHERE day='6'");
					echo '<div class="event" id="day6">
                    		<span class="eventHeader">Saturday</span>
                    		<table>';
					while($listCal = mysql_fetch_array($dataCal))
					{
						echo '<tr><td>'.$listCal['name'].'</td><td>'.$listCal['details'].'</td></tr>';
					}
					echo '</table></div>';
					
					//sunday
					$dataCal = mysql_query("SELECT * FROM $tableNameCal WHERE day='7'");
					echo '<div class="event" id="day7">
                    		<span class="eventHeader">Sunday</span>
                    		<table>';
					while($listCal = mysql_fetch_array($dataCal))
					{
						echo '<tr><td>'.$listCal['name'].'</td><td>'.$listCal['details'].'</td></tr>';
					}
					echo '</table></div>';
					
				?>
            </div>
<!-- ---------------------------------------WEEKLY EVENTS SECTION END HERE--------------------------------------- -->
        </div>
        <div id="secondaryNav">
        </div>
        <div id="main">
            <div id="mainInner">
            	<?php
					while($list = mysql_fetch_array($data))
					{
						echo '<div class="mainEventBlock">
							     <div class="mainEventHeader">
								 '.$list['name'].'
								 </div>
								 <table>
								     <thead>
									     <th>Date</th><th>Time</th><th>Name</th><th>Details</th>
									 </thead>';
								 
						$eventType = $list['name'];
						$data2 = mysql_query("SELECT * FROM events WHERE eventtype = '$eventType' ORDER BY id ASC") or die;
						
						while($list2 = mysql_fetch_array($data2))
						{
							echo '<tr">
							         <td>'.$list2['date'].'</td>
									 <td>'.$list2['time'].'</td>
									 <td>'.$list2['name'].'</td>
									 <td>'.$list2['details'].'</td>
								  </tr>';
						}
						
						echo '</table></div>';
					}
				?>
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
                    <a href="mailto:nat@magelingsgames.com?Subject=Magelings.com visitor message" target="_blank">nat@magelingsgamess.com</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>