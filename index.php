<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title> Best Eats </title>
	<meta name="author" content="Birunthaa Umamahesan">
	<link href="scripts/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="scripts/myscripts.js"> </script>
</head>
<body>
	<div id="header">
		<h1> BEST EATS </h1>
	</div>	
    <div id="menu">
		<?php include 'scripts/menu.inc.php'; ?>
	</div>
	<!--content div contains all the elements apart from the footer-->
	<div id="content">	
		<!--side bar is a place holder for the sidebox elements -->
        <div id="wrapper">
        	<!--side box contains all the input and text fields-->
        	<!--this box is for the text describing the function of the page-->
   			<div class="topBox">
				<h3> Find the best places to eat in town!</h3>
				<h3>Start by searching below. </h3>
			</div>
			<!--the next two boxes are for the text input items-->
			<div class="bottomBox">
   			<form action="results_sample.php" method="get">
   			<div class="sidebox">
				<label for="find">Type of Food:</label>
				<input type="text" name="foodType" id="foodType" placeholder="e.g. Italian">
			</div>
			<div class="sidebox">
				<label for="locationOption1">Find locations near you:</label>
				<span><button id="locationSearch" onclick="getLocation()"> Find </button>
				<p id="status"></p></span>
				<p>OR, type in the latitude and longitude of the location you're looking for below:</p></span>
			  <span>
			  	<input type="text" id="lat" placeholder="Latitude">
                <input type="text" id="long" placeholder="Longitude">
              </span>  
			</div>
			<!--this box is for the rating drop down-->
			<div class="sidebox">
				<label for="rating">Rating:</label>
   					<select id="rating">
     					<option value="n/a"> N/A </option>
     					<option value="5star">5 star </option>
      					<option value="4star">4 star</option>
      					<option value="3star">3 star</option>
      					<option value="2star">2 star</option>
      					<option value="1star">1 star</option>
    				</select>
			</div>
			<!--this box is for the submit button-->
			<div class ="sidebox">
				<a href="results_sample.html">
					 <input type ="submit" name="search" value="Submit">
				</a>	
			</div>
			<form>
		</div>		
   		</div>
   		<!--the mapbox is a container for the map
   		<div id="backgroundImg">
   			<img src="images/backgroundImg.jpg" alt="bgImg">
   		</div>
   		-->
   	</div>
   	<div id="footer"></div>
</body>

</html>