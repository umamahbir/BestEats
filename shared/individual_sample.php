<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
  	<title> Best Eats </title>
   <meta name="author" content="Birunthaa Umamahesan">
	<link href="scripts/style.css" rel="stylesheet" type="text/css">
	<link href="scripts/style_resultPg.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
   <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
   <script type="text/javascript" src="scripts/myscripts.js"> </script>
</head>
<body onload="loadMap()">
	<div id="header">
		<h1> BEST EATS </h1>
	</div>	
    <div id="menu">
		<?php include 'scripts/menu.inc.php'; ?>
	</div>
	<!--wrapper div contains all the elements apart from the footer-->
	<div id="wrapper1">
		<!--visuals div contains the map and imageGallery -->
		<div id="visuals">
			<div id="subheader"> 
            <?php
               $db = new PDO('mysql: host=localhost; dbname=best_eats_db', 'bestEat_admin', 'password');
               $db->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $locId = $_GET['ind_result'];
               try {     
                   $result = $db->query("SELECT * FROM `location` WHERE `loc_id` = '$locId'");  
               }catch(PDOException $e){ 
                  echo "Connection failed: " . $e->getMessage();
               }
              foreach($result as $row){
               echo '<h1>'.$row['store_Name'].'</h1>'; 
               echo '<h3>'.$row['address'].'</h3>';
               echo '<h3>'.$row['phone_num'].'</h3>';
               $path = "images/". $row['rating']. "star.png";
               echo "<img alt='imgRating' src=".$path.">";
               }
            ?>
			</div>	
			<!--storeManBox is a container for the map image-->
			<div id="storeMapBox"></div>
   			<!--the imageGallery contains all row of images for one particular resutruant-->
   			<div class="imageGallery">
   				<!--the img box contains the image-->
   				<div class="img">
   					<img src="images/food1.jpg" alt="foodImg">
   				</div>	
   				<div class="img">
   					<img src="images/food2.jpg" alt="foodImg">
   				</div>
   				<div class="img">
   					<img src="images/food3.jpg" alt="foodImg">
   				</div>
   			</div>
   		</div>
   		<!--the review box contains all the user reviews-->	
   		<div id="reviews">
   			<h2>User Reviews </h2>
   			<!--the userReivew box contains one users review 
   		         with an display picture img, a write up and a rating img -->

            <?php
               $db = new PDO('mysql: host=localhost; dbname=best_eats_db', 'bestEat_admin', 'password');
               $db->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $locId = $_GET['ind_result'];
               try {     
                   $reviews = $db->query("SELECT * FROM `users`, `Location` WHERE `Location`.`user_id` = `users`.`id` and  `Location`.`store_Name` 
                    IN (SELECT `store_Name` FROM `Location` WHERE `loc_id`= '$locId')");

               }catch(PDOException $e){ 
                  echo "Connection failed: " . $e->getMessage();
               }
              foreach($reviews as $row){
                  echo '<div class="userReviewBox">';
                  $dpPath = $row['dp_pic_url'];
                  echo "<img class='dpImg' alt='dp' src='".$dpPath."'>";
                  echo '<div class="writeUp">';
                  echo '<h3>'.$row['first_name']." ". $row['last_name'] .'</h3>';
                  $path = "images/".$row['rating']."star.png";
                  echo "<img class='imgRating' alt='imgRating' src=".$path.">"; 
                  echo '<p>'.$row['user_review'].'</p>'; 
                  echo '</div>';   
                  echo '</div>';   

               }
            ?>
   		</div>
   	</div>	
   	<div id="footer">
   		<img src="images/socialapps.png" alt="socialMedia" style="width:150px;height:15px;">
  	</div>
</body>
</html>