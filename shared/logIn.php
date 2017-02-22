<?php
require_once "scripts/functioncall.inc.php";
// This page is not available in private mode so verify that user is not logged in before showing.
// Redirect to home page otherwise.
if (isLoggedIn()) {
    $redirect=  'https://{$_SERVER["HTTP_HOST"]}/index.php/';
    header("Location: " . $redirect);
    exit();
}
// Define variables and set to empty values.
$username = $password = "";
// Validate login data if there is a POST request.
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // Check password and set isLoggedIn session variable to true.
    if (checkLoginInDB($_POST["username"], $_POST["password"])) {
        session_start();
        $_SESSION["isLoggedIn"] = true;
        // Redirect user to profile page.
        $redirect = preg_replace('logIn.php', 'profile.php', $_SERVER["REQUEST_URI"]);
        header("Location: " . $redirect);
    }
    else {
        //Display login failed msg
        session_start();
        $_SESSION["isLoggedIn"] = false;
        // If credentials don't work then redirect to login page (this page).
        $redirect = $_SERVER["REQUEST_URI"];
        header("Location: " . $redirect);
    }
    exit;
}
?>
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
	<!--wrapper div contains all the elements apart from the footer-->
    <div id="content">
      <div id="wrapper">
         	<div class="topBox">
            <h2 class="content-title"> Log into Best Eats</h2>
            <h4> New to Best Eats?</h4>
            <a href="registration.html">
              <h4 id ="regNew"> Register a new account today! </h4>
            </a>	
          </div>
          <!--the bottom box contains all the sideboxes for user input-->		
          <div class="bottomBox">
          <!--the side box contains all the textbox for user input-->
          <form method="POST" action="logIn.php" name="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="sidebox">
              <span> 
                <input type="text" name="username" placeholder="Email">
                <p id="userNameMissing"></p>
              </span>
				    </div>
				    <div class="sidebox">
              <span>
					     <input type="text" name="password" placeholder="Password">
                <p id="passwordMissing"></p>
               </span> 
				    </div>
				    <div class="sidebox">
              <input type ="submit" value="Login" name="login">
            </div>
          </form>
          </div>
      </div>
    </div>
   	<div id="footer"></div>   	
</body>
</html>