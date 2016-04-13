<?php
	include "require/header.php";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Find Us - Magelings Games</title>
    
    <!-- HTML INCLUDES -->
    <script src="js/jquery-1.10.0.min.js"></script>
	<script src="js/unslider.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.8&sensor=false"></script>
    
    <!-- Web Fonts - From: Google Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
    <link href="styles/magelings.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="img/ico" href="favicon.ico">
</head>

<script type="text/javascript">
	
	var map;
	var directionsDisplay;
	var directionsService;
	var stepDisplay;
	var markerArray = [];
	
	function initialize() 
	{
		// Instantiate a directions service.
		directionsService = new google.maps.DirectionsService();

		// Create a map and center it on magelings.
		var magelings = new google.maps.LatLng(38.9728387, -92.3334598);
		var mapOptions = 
		{
			zoom: 17,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center: magelings
		};
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		
		//put a marker on store
		var marker = new google.maps.Marker(
		{
			position: new google.maps.LatLng(38.9728387, -92.3334598),
			map: map,
			title: 'Magelings Games',
			optimized: false
		});

		// Create a renderer for directions and bind it to the map.
		var rendererOptions = 
		{
			map: map
		};
		directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions)

		// Instantiate an info window to hold step text.
		stepDisplay = new google.maps.InfoWindow();
	}

	function calcRoute() 
	{
		//remove any existing markers from the map.
		for (var i = 0; i < markerArray.length; i++) 
		{
			markerArray[i].setMap(null);
		}

		markerArray = [];

		// create a DirectionsRequest using DRIVING directions.
		var start = document.getElementById('mapTextInput').value;
		var end = "1906 N Providence Rd. Suite C, Columbia, MO 65202";
		var request = 
		{
			origin: start,
			destination: end,
			travelMode: google.maps.TravelMode.DRIVING,
		};

		//route directions and create markers and warnings
		directionsService.route(request, function(response, status) 
		{
			if (status == google.maps.DirectionsStatus.OK) 
			{
				/////////////////////////////////////////////////////////////////////////////////////////
				//UNCOMMENT IF YOU WANT WARNINGS
				/////////////////////////////////////////////////////////////////////////////////////////
				//var warnings = document.getElementById('warnings_panel');
				//warnings.innerHTML = '<b>' + response.routes[0].warnings + '</b>';
				directionsDisplay.setDirections(response);
				showSteps(response);
			}
		});
		return false;
	}

	function showSteps(directionResult) 
	{
		//add markers to steps in route
		var myRoute = directionResult.routes[0].legs[0];

		for (var i = 0; i < myRoute.steps.length; i++) 
		{
			var marker = new google.maps.Marker(
			{
				position: myRoute.steps[i].start_point,
				map: map,
				optimized: false
			});
			attachInstructionText(marker, myRoute.steps[i].instructions);
			markerArray[i] = marker;
		}
	}

	function attachInstructionText(marker, text) 
	{
		google.maps.event.addListener(marker, 'click', function() 
		{
			// Open an info window when the marker is clicked on
			stepDisplay.setContent(text);
			stepDisplay.open(map, marker);
		});
	}
	
	google.maps.event.addDomListener(window, 'load', initialize);
	
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
                <!--<a href="forums/index.php">Forums</a>-->
                <span>For Gamers. By Gamers.</span>
                <a href="blog/index.php">Blog</a>
                <a href="#here" class="selected">Find Us</a>
                <!--<a href="contact.php">Contact</a>-->
            </div>
        </div>
        <div class="slider">
        	<div id="map-canvas"></div>
    		<!-- <div id="warnings_panel" style="width:100%;height:0%;text-align:center"></div> -->
        </div>
        <div id="secondaryNav">
        </div>
        <div id="main">
            <div id="mainInner">
            	<div id="mapForm">
                	<div id="mapFormIdentifiers">Where:<br/><br/>From:</div>
                    <div id="mapFormMain">
                    	1906 N Providence Rd. Suite C, Columbia, MO 65202 <br/><br/> 
                        <form>
                            <input type="text" id="mapTextInput" size="50"/>
                            <input type="submit" value="Get Directions" id="mapButtonInput" class="button" onClick="return calcRoute();"/>
                        </form><br/><br/>
                        <p>
                        	We are located at <a href="https://maps.google.com/maps?q=1906+N+Providence+Road,+Columbia,+MO+&hl=en&ll=38.972456,-92.332363&spn=0.004396,0.010214&sll=37.0625,-95.677068&sspn=36.642161,83.671875&t=h&hnear=1906+N+Providence+Rd,+Columbia,+Missouri+65202&z=17">1906 N. Providence Rd. Suite C, Columbia, MO 65202</a>,
                            <br/> right below The Music Suite, and across the street from McKnight Plaza
                            <br/> and Itchy's Flea Market.<br/>
                            <img src="images/magelings_sign_from_north.jpg" width="635px;"/>
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