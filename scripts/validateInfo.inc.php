<?php
// This checks to validate the data entered 
// Returns true if all validations pass. False otherwise.
function processData($data) {
    $result = true;
    foreach ($data as $key => $value) {
        if(! checkData($key, clean_inputData($value))) {
            $result = false;
        }
    }
    return $result;
}

// This function contains form validation code.
function checkData($key, $value) {
    switch ($key) {
        // Return true if email is valid, false otherwise.
        case "email":
        // Email is required so return false if it is unset.
            $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
            if (!isset($_POST[$key])){
                $GLOBALS[$emailError] = "Email is required";
            }else if (preg_match($pattern, $value) === 1) {
                $GLOBALS[$key] = $value;
            }
            else {
                $GLOBALS["emailError"] = "Email is incorrect, must look like xxx@xxx.xx";
                return false;
            }
            break;
        // Check if first/last name field is not empty.
        case "firstName":
            if (isset($_POST[$key])) {
                if ($value == "") {
                    $GLOBALS["firstNameError"] = "First name is required";
                    return false;
                }
                else {
                    $GLOBALS[$key] = $value;
                    $GLOBALS["firstNameError"] = "";
                }
            }
            break;
        case "lastName":
            if (isset($_POST[$key])) {
                if ($value == "") {
                    $GLOBALS["lastNameError"] = "Last name is required";
                    return false;
                }
                else {
                    $GLOBALS[$key] = $value;
                    $GLOBALS["lastNameError"] = "";
                }
            }
            break;
            // Password is required.
        case "password":
            if (!isset($_POST[$key]))
                $GLOBALS[$passwordError] = "Password is required";
            // Check if password field is at least 8 characters long and there are no spaces or special characters.
            else if (strlen($value) >= 8 && strlen($_POST[$key]) == strlen($value))
                $GLOBALS[$key] = $value;
            else {
                $GLOBALS["passwordError"] = "Password must be 8 or more characters";
                return false;
            }
            break;
        case "dob":
            if (!isset($_POST[$key]) || $_POST[$key] == "") {
                $dob = NULL;
                break;
            }
    }
// Return true if you get to this point without issues.
    return true;
}
// Clean_inputData function prevent injections all inputs  used in all pages containing a form.
function clean_inputData($value) {
  $value = htmlspecialchars($value);
  $value = trim($value);
  $value = stripslashes($value);
  return $value;
}

?>