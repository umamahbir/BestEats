<?php
      $fType = $_GET["foodType"];
      $submit = $_GET["search"];
      $db = new PDO('mysql: host=localhost; dbname=best_eats_db', 'bestEat_admin', 'password');
      $db->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      try{
         if ($fType =='' && $submit =='Submit') {
              $result = $db->query("SELECT *
               FROM `location`");
         }else{
            $result = $db->query("SELECT *
            FROM `location` WHERE `food_Type` = '$fType'");
          }
      }catch(PDOException $e){ 
         echo "Connection failed: " . $e->getMessage();
      }
   ?>
<!Doctype html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Best Eats</title>
   <meta name="author" content="Birunthaa Umamahesan">
   <link href="scripts/style.css" rel="stylesheet" type="text/css">
   <link href="scripts/style_resultPg.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.1/dist/leaflet.css" />
   <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
   <script type="text/javascript" src="scripts/myscripts.js"> </script>
</head>
<body onload="loadMapResults()">
   <div id="header">
      <h1> BEST EATS </h1>
   </div>   
    <div id="menu">
     <?php include 'scripts/menu.inc.php'; ?>
   </div> 
   <!--wrapper div contains all the elements apart from the footer--> 
   <div id="wrapper1">
      <h2> Results: </h2>
      <div id="mapBox"> </div>

      <!--the responsive container holds all the imageResults -->
      <div class="responsive">
         <!--the imageResults container holds an image of the place,
         the rating image, and a description text -->
         <?php 
            foreach($result as $row){
               echo '<div class="imgResults">';
               echo '<a href="individual_sample.php?ind_result=', $row['loc_id'],'">';
               echo "<img src='".$row['img_url']."' alt='".$row['food_type'].">";
               $path = "images/". $row['rating']."star.png";
               echo "<img class='imgRating' alt='imgRating' src=".$path.">";
               echo '<div class="desc">' .$row['store_Name'].'</div>';
               echo '</a>';
               echo '</div>';
            }
         ?>
      </div>
   </div>   
   <div id="footer">
   </div>
</body>

</html>