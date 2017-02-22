<?php

require_once ("dbAccess.inc.php");

// function cal to check that the user is logged in for.
function isLoggedIn() {
    // Start a new session if doesnt exisit.
    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }
    // Return false if no user isLoggedIn session
    if (!isset($_SESSION['isLoggedIn'])){
        return false;
    }
    //returns true if logged in, false otherwise
    return ($_SESSION['isLoggedIn']);
}


// function queries the db for passwordhash associated with a username.
function checkLoginInDB($email, $password) {
    try {
        // connect to the database.
        $db = getDBAccess();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Prepare the query.
        $result = $db->prepare('SELECT * FROM users
            WHERE email = :email and passwordHash = SHA2(CONCAT( :password , `salt`), 0)');
        $result->execute(array(':email' => $username, ':password' => $password));
        // return true if one match is found in the db.
        return $result->rowCount() === 1;
    }catch (PDOException $e) {
    }    
    return false;
}

// This function returns true if user's email already exists in the dbf database; returns false otherwise.
function checkUserExist($email) {
	 $db = new PDO('mysql: host=localhost; dbname=best_eats_db', 'bestEat_admin', 'password');
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        // Prepare the query.
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        $query->execute(array(':email' => $email));
        // return true if one match is found in db.
        return $query->rowCount() === 1;
    }
    catch (PDOException $e) {
    }
    return false;
}

// This function adds a user to the db best_eats users after successful registration.
function addUser($email, $firstname, $lastname,$password, $dob) {
        $db = new PDO('mysql: host=localhost; dbname=best_eats_db', 'bestEat_admin', 'password');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try {
        // Prepare the query.
       $sql = $db->prepare('INSERT INTO users (first_name, last_name, email, dob, salt, passwordHash)
            VALUES(:firstname, :lastname, :email, :dob, `salt`, SHA2(CONCAT(:password, `salt`), 0)');
        // Execute the query using passed in values as parameters.
        $sql->execute(array(':firstname' => $firstname, ':lastname' => $lastname,':email' => $email, ':password' => $password, ':dob' => $dob));
    }
    catch (PDOException $e) {
    }
}

?>