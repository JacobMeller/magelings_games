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
	
	$tableName = 'admin';
	
	session_start();
	
	if(!isset($_SESSION['tab']))
	{
		$_SESSION['tab'] = "slider";
	}
	
	if(isset($_SESSION['active']))
	{
		$loggedInActivity = $_SESSION['active'];
		if($loggedInActivity == true)
		{
			if(isset($_SESSION['username'])  && isset($_SESSION['password']))
			{	
				$loggedInUsername = $_SESSION['username'];
				
				$data = mysql_query("SELECT * FROM $tableName WHERE username = '$loggedInUsername'");
				$list = mysql_fetch_array($data);
				
				if($list['password'] == $_SESSION['password'])
				{					
					//logged in successfully
				}
				else
				{
					header("Location: admin.php");
				}
			}
			else
			{
				header("Location: admin.php");
			}
		}
		else
		{
			header("Location: admin.php");
		}
	}
	else
	{
		header("Location: admin.php");
	}

	$tab = $_SESSION['tab'];
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Page Control - Magelings Games</title>
    
    <!-- HTML INCLUDES -->
    <script src="js/jquery-1.10.0.min.js"></script>
	<script src="js/unslider.min.js"></script>
    
    <!-- Web Fonts & stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
    <link href="styles/magelings.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="img/ico" href="favicon.ico">
</head>

<script type="application/javascript">
	
	var currentTabName = '<?php echo($tab); ?>';
	
	window.onload=function()
	{
		if(currentTabName == "slider")
		{
			document.getElementById("editEvents").style.display = "none";
			document.getElementById("editMisc").style.display = "none";
			document.getElementById("editSlider").style.display = "block";
			document.getElementById("editEventsSelect").className = "";
			document.getElementById("editSliderSelect").className = "selected";
			document.getElementById("editMiscSelect").className = "";
			document.getElementById("editCalendar").style.display = "none";
			document.getElementById("editCalendarSelect").className = "";
		}
		else if(currentTabName == "events")
		{
			document.getElementById("editSlider").style.display = "none";
			document.getElementById("editMisc").style.display = "none";
			document.getElementById("editEvents").style.display = "block";
			document.getElementById("editSliderSelect").className = "";
			document.getElementById("editEventsSelect").className = "selected";
			document.getElementById("editMiscSelect").className = "";
			document.getElementById("editCalendar").style.display = "none";
			document.getElementById("editCalendarSelect").className = "";
		}
		else if(currentTabName == "misc")
		{
			document.getElementById("editSlider").style.display = "none";
			document.getElementById("editEvents").style.display = "none";
			document.getElementById("editMisc").style.display = "block";
			document.getElementById("editSliderSelect").className = "";
			document.getElementById("editEventsSelect").className = "";
			document.getElementById("editMiscSelect").className = "selected";
			document.getElementById("editCalendar").style.display = "none";
			document.getElementById("editCalendarSelect").className = "";
		}
		else if(currentTabName == 'calendar')
		{
			document.getElementById("editSlider").style.display = "none";
			document.getElementById("editEvents").style.display = "none";
			document.getElementById("editMisc").style.display = "none";
			document.getElementById("editSliderSelect").className = "";
			document.getElementById("editEventsSelect").className = "";
			document.getElementById("editMiscSelect").className = "";
			document.getElementById("editCalendar").style.display = "block";
			document.getElementById("editCalendarSelect").className = "selected";
			
		}
	};
	
	function switchTab(tabName)
	{
		if(tabName == 'slider')
		{
			currentTabName = tabName;
			document.getElementById("editEvents").style.display = "none";
			document.getElementById("editSlider").style.display = "block";
			document.getElementById("editEventsSelect").className = "";
			document.getElementById("editSliderSelect").className = "selected";
			document.getElementById("editMisc").style.display = "none";
			document.getElementById("editMiscSelect").className = "";
			document.getElementById("editCalendar").style.display = "none";
			document.getElementById("editCalendarSelect").className = "";
		}
		else if(tabName == 'events')
		{
			currentTabName = tabName;
			document.getElementById("editSlider").style.display = "none";
			document.getElementById("editEvents").style.display = "block";
			document.getElementById("editSliderSelect").className = "";
			document.getElementById("editEventsSelect").className = "selected";
			document.getElementById("editMisc").style.display = "none";
			document.getElementById("editMiscSelect").className = "";
			document.getElementById("editCalendar").style.display = "none";
			document.getElementById("editCalendarSelect").className = "";
		}
		else if(tabName == 'misc')
		{
			currentTabName = tabName;
			document.getElementById("editSlider").style.display = "none";
			document.getElementById("editEvents").style.display = "none";
			document.getElementById("editSliderSelect").className = "";
			document.getElementById("editEventsSelect").className = "";
			document.getElementById("editMisc").style.display = "block";
			document.getElementById("editMiscSelect").className = "selected";
			document.getElementById("editCalendar").style.display = "none";
			document.getElementById("editCalendarSelect").className = "";
		}
		else if(tabName == 'calendar')
		{
			currentTabName = tabName;
			document.getElementById("editSlider").style.display = "none";
			document.getElementById("editEvents").style.display = "none";
			document.getElementById("editSliderSelect").className = "";
			document.getElementById("editEventsSelect").className = "";
			document.getElementById("editMisc").style.display = "none";
			document.getElementById("editMiscSelect").className = "";
			document.getElementById("editCalendar").style.display = "block";
			document.getElementById("editCalendarSelect").className = "selected";
			
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
                <a href="events.php">Events</a>
                <a href="forums/index.php">Forums</a>
                <span>For Gamers. By Gamers.</span>
                <a href="blog/index.php">Blog</a>
                <a href="findus.php">Find Us</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
        <div id="secondaryNav">
        	<div id="secondaryNavInner">
            	<a href="#slider" id="editSliderSelect" class="selected" onClick="switchTab('slider')">Slider</a>
                <a href="#misc" id="editMiscSelect" onClick="switchTab('misc')">Misc</a>
                <a href="#events" id="editEventsSelect" onClick="switchTab('events')">Events</a>
                <a href="#calendar" id="editCalendarSelect" onClick="switchTab('calendar')">Calendar</a>
            </div>
        </div>
        <div id="main">
            <div id="mainInner">
            	<div id="editSlider" class="mainBox" style="display:block;">
                	<?php
						$tableName = 'announcements';
						$data = mysql_query("SELECT * FROM $tableName");
						
						$counter = 0;
						while($list = mysql_fetch_array($data))
						{
							echo '<form action="processes/updateAnnouncementProcess.php" method="post" enctype="multipart/form-data" name="announcement'.$counter.'">
								      <fieldset>
									  	  <legend>Announcement '.$counter.'  --  <a href="processes/deleteAnnouncementProcess.php?id='.$list['id'].'">Delete</a></legend><br/>
										  <label>Title: </label><input name="title" type="text" class="textInput" size="65" value="'.$list['title'].'"><br/><br/>
										  <label>Body: </label><textarea style="width:617px;" name="body" cols="60" rows="7">'.$list['body'].'</textarea><br/><br/>
										  <label>Background: </label><input name="background" type="file"><br/>
										  <input name="id" type="hidden" value="'.$list['id'].'">
										  <input name="submit" type="submit" class="button" value="Submit"><br/><br/>
									  </fieldset>
								  </form>';
							$counter++;
						}
						
						echo '<form action="processes/newAnnouncementProcess.php" method="post" enctype="multipart/form-data" name="newannouncement">
								  <fieldset>
									  <legend><strong>New Announcement</strong></legend><br/>
									  <label>Title: </label><input name="newtitle" type="text" class="textInput" size="65"><br/><br/>
									  <label>Body: </label><textarea style="width:617px;" name="newbody" cols="60" rows="7"></textarea><br/><br/>
									  <label>Background: </label><input name="newbackground" type="file"><br/>
									  <input name="submit" type="submit" class="button" value="Submit"><br/><br/>
								  </fieldset>
							  </form>';
					?>
                </div>
                <div id="editEvents" class="mainBox" style="display:none;">
                	<?php
						$tableName = 'eventtypes';
						$data = mysql_query("SELECT * FROM $tableName");
						
						while($list = mysql_fetch_array($data))
						{
							$eventType = $list['name'];
							$data2 = mysql_query("SELECT * FROM events WHERE eventtype='$eventType' ORDER BY id ASC");
							
							echo '<form action="processes/updateEventProcess.php" method="post" enctype="multipart/form-data" name="eventtype'.$counter.'">
								      <fieldset>
									  	  <legend>'.$list['name'].'  --  <a href="processes/deleteEventTypeProcess.php?id='.$list['id'].'">Delete</a></legend><br/>';
							
							while($list2 = mysql_fetch_array($data2))
							{
								echo '<label>Event: </label><input name="date" class="textInput" type="text" value="'.$list2['date'].'">
								      <input name="time" class="textInput" type="text" value="'.$list2['time'].'">
									  <input name="name" class="textInput" type="text" value="'.$list2['name'].'">
									  <input name="details" class="textInput" type="text" value="'.$list2['details'].'">
									  <input name="submit" type="submit" value="Update'.$list2['id'].'" class="button">
									  <a href="processes/deleteEventProcess.php?id='.$list2['id'].'">Delete</a><br/><br/>';
							}
							
							echo '<label>New Event: </label><input name="newdate" class="textInput" type="text" placeholder="date">
								  <input name="newtime" class="textInput" type="text" placeholder="time">
								  <input name="newname" class="textInput" type="text" placeholder="name">
								  <input name="newdetails" class="textInput" type="text" placeholder="details">
								  <input name="submit" type="submit" value="Add" class="button"><br/><br/>';
							
							echo '<input name="hiddenname" type="hidden" value="'.$list['name'].'"></fieldset></form><br/><br/>';
						}
						
						echo '<form action="processes/newEventTypeProcess.php" method="post" enctype="multipart/form-data" name="neweventtype">
							      <input name="eventname" type="text" class="textInput" placeholder="New Event Type Name" size="65">
								  <input name="submit" type="submit" value="&gt;" class="button">
						      </form>';
					?>
                </div>
                <div id="editMisc" class="mainBox" style="display:none;">
                	<?php
						$tableName = 'misc';
						$data = mysql_query("SELECT * FROM $tableName");
						$list = mysql_fetch_array($data);
						
						echo '<form action="processes/updateMiscProcess.php" method="post" enctype="multipart/form-data" name="misc">
								  <fieldset>
									  <legend>Miscellaneous Text</legend>
									  <fieldset>
									  	<legend>About</legend>
										<textarea name="about" style="width:617px;" cols="60" rows="15">'.$list['about'].'</textarea>
									  </fieldset>
									  <fieldset>
									  	<legend>Index</legend>
										<textarea name="index" style="width:617px;" cols="60" rows="3">'.$list['index'].'</textarea>
									  </fieldset>
									  <fieldset>
									  	<legend>Events</legend>
										<textarea name="events" style="width:617px;" cols="60" rows="3">'.$list['events'].'</textarea>
									  </fieldset>
									  <fieldset>
									  	<legend>Find Us</legend>
										<textarea name="findus" style="width:617px;" cols="60" rows="3">'.$list['findus'].'</textarea>
									  </fieldset>
									  <fieldset>
									  	<legend>Contact</legend>
										<textarea name="contact" style="width:617px;" cols="60" rows="3">'.$list['contact'].'</textarea>
									  </fieldset>
									  <input name="submitMisc" class="button" type="submit" value="Submit">
								  </fieldset>
							  </form>';
					?>
                </div>
                <div id="editCalendar" class="mainBox" style="display:none;">
                	<?php
						$tableName = 'calendar';
						$data = mysql_query("SELECT * FROM $tableName ORDER BY day ASC");
						
						while($list = mysql_fetch_array($data))
						{
							echo '<form action="processes/updateCalendarProcess.php?id='.$list['id'].'" method="post" enctype="multipart/form-data" name="calendar'.$list['id'].'">
									  <input placeholder="day" name="day'.$list['id'].'" type="text" class="textInput" size="20" value="'.$list['day'].'">
									  <input placeholder="name" name="name'.$list['id'].'" type="text" class="textInput" size="20" value="'.$list['name'].'">
									  <input placeholder="details" name="details'.$list['id'].'" type="text" class="textInput" size="20" value="'.$list['details'].'">
									  <input name="submit" type="submit" class="button" value="Update">
									  <a href="processes/deleteCalendarProcess.php?id='.$list['id'].'">DELETE</a><br/><br/>
								  </form>';
						}
						
						echo '<form action="processes/newCalendarProcess.php" method="post" enctype="multipart/form-data" name="newcalendar">
								  <fieldset>
									  <legend><strong>New Calendar Event</strong></legend><br/>
									  <input placeholder="day" name="day" type="text" class="textInput" size="65"><br/>
									  <input placeholder="name" name="name" type="text" class="textInput" size="65"><br/>
									  <input placeholder="details" name="details" type="text" class="textInput" size="65"><br/>
									  <input name="submit" type="submit" class="button" value="Submit"><br/>
								  </fieldset>
							  </form>';
					?>
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
                    <a href="mailto:contact@magelings.com?Subject=Magelings.com visitor message" target="_blank">contact@magelings.com</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>