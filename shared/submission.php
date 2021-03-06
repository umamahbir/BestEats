<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
   	<meta name="author" content="Birunthaa Umamahesan">
	<title> Best Eats </title>
	<link href="scripts/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="header">
		<h1> BEST EATS </h1>
	</div>	
  <div id="menu">
		    <?php include 'scripts/menu.inc.php'; ?>
	</div>
	<!--wrapperLogin div contains all the elements apart from the footer-->
  <div id="content">
    <div id= "wrapper">
      <!--the topbox contains the description header-->
      <form name="submissionForm" action="#0">
        <div class="topBox">
            <h2 class="content-title"> Sign up for Best Eats!</h2>	
        </div>		
        <form method ="POST" action="../scripts/submit_file.php" enctype="multipart/form-data">
        <!--the bottom box contains all the sideboxes for user input-->
        <div class="bottomBox">
        <!--this box is for the upload image button-->
          <div class="sidebox">
            <input type="file" name="profilePic" value="Upload">
        	</div>
          <div class="sidebox">
             <label class="subFormLabel" for="locationName">Name of location:</label>
					   <input type="text" id="locationname" class="validation" placeholder="e.g. IQ Food">
             <p class="requirement"> Missing location.</p>
				  </div>
           <div class="sidebox">
             <label class="subFormLabel" for="foodType">Type of food:</label>
             <input type="text" id="typeFood" class="validation" placeholder="e.g. Italian">
             <p class="requirement"> Missing food type. </p>
          </div>
           <div class="sidebox">
                <label class="subFormLabel" for="foodType">Location coordinates:</label>
                <input type="text" id="lat" class="validation" placeholder="Latitude"  pattern="[\[0-9]+(\.\[0-9]*)?" title="Six or more numbers">
                <input type="text" id="long" class="validation" placeholder="Longitude" pattern="[0-8]?[0-9]|90)\.[0-9]{1,6}" title="must be ##.####">   
                <p class="requirement"> Missing Coordinate points. </p>  
          </div>
				  <!--this box is for the rating drop down-->
				  <div class="sidebox">
					  <label class="subFormLabel" for="rating">Rating:</label>
   					<select id="rating">
     					<option value="n/a"> N/A </option>
     					<option value="5star">5 star </option>
      				<option value="4star">4 star</option>
      				<option value="3star">3 star</option>
      				<option value="2star">2 star</option>
      				<option value="1star">1 star</option>
    				</select>
				  </div>
				  <!--this box is for the user comments-->
				  <div class="sidebox">
             <label class="subFormLabel" for="Comments">Comments:</label>
					   <input type="text" class="validation" id="comments" placeholder="Comments">
				  </div>
				  <div class="sidebox">
             <input type ="submit" value="Submit">
        	</div>
         </form> 
        </div>
      </form>  
    </div>
  </div>
  <div id="footer"></div>   	
</body>
</html>