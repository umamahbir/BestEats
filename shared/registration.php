<?php
require_once  ('scripts/validateInfo.inc.php');
require_once  ('scripts/functioncall.inc.php');
// Variables to hold validated values.
$email = $firstName = $lastName = $password = $dob = "";
// Keep track of errors.
$emailError =$firstNameError = $lastNameError = $passwordError = $dobError = "";
// Redirect to home page otherwise.
if (isLoggedIn()){
    $redirect_page = 'https://{$_SERVER["HTTP_HOST"]}/index.php/';
    header("Location: " . $redirect_page);
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
// Validate and process posted input values here
    if(processData($_POST)){
        if (! checkUserExist($email)) {
            addUser($email, $firstName, $lastName, $password, $dob);
            echo ("<script>alert('Registration complete');</script>");
           // $redirect_page = 'https://{$_SERVER["HTTP_HOST"]}/logIn.php/';
            // $redirect_page = 'logIn.php/';
            // header("Location: " . $redirect_page);
            // exit();
        }
        else {
            echo ("<script>alert('Registration failed - user already exists');</script>");
        }
    }
}
?>

<!Doctype html>
<html>
<head>
	<meta charset="UTF-8">
   	<meta name="author" content="Birunthaa Umamahesan">
	<title> Best Eats </title>
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
	<!--wrapperLogin div contains all the elements apart from the footer-->
   	<div id="content">
        <div id="wrapper">
        	<!--the topbox contains the description header-->
            <div class="topBox">
               	<h2 class="content-title"> Sign up for Best Eats!</h2>	
            </div>		
             <!--the bottom box contains all the sideboxes for user input-->
            <div class="bottomBox">
            	 <!--the side box contains all the textbox for user input-->
              <form name="regForm" method ="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="sidebox">
                	<span>
                		<input type="email" name="email" placeholder="Email"  value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                		  <span class="error">
                            <?php
                                echo $emailError;
                            ?>
                		 </span>	
				</div>
				<div class="sidebox">
					<span>
						<input type="text" name="firstName" placeholder="First Name" value="<?php echo isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>">
						 <span class="error">
                            <?php
                                echo $firstNameError;
                            ?>
						</span>	
				</div>
				<div class="sidebox">
					<span>
						<input type="text" name="lastName" placeholder="Last Name" value="<?php echo isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>">
						 <span class="error">
                            <?php
                                echo $lastNameError;
                            ?>
						</span>	
				</div>
				<div class="sidebox">
					<span>
					     <input type="text" name="password" placeholder="Password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : '' ?>">
                		<p id="passwordField"></p>
              		</span> 
				</div>
				<!--the sidebox is for a date picker for the Date of birth-->
				<div class="sidebox">
					<label for="date">Date of Birth:</label>
					<input type="date" name ="dob" value="<?php echo isset($_POST['dob']) ? $_POST['dob'] : '' ?>">
					 <span class="error">
                            <?php
                                echo $dobError;
                            ?>
                     </span>	
				</div>
				<div class="sidebox">
            	    <input type="submit" name="signup" value="signup">
        	    </div>
              </form>
         	</div>
        </div>
    </div>
   	<div id="footer"></div> 	
</body>
</html>