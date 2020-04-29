<?php
$_SESSION['username'] = $username;

// initializing variables
$pseudo = "";
$class = "";
$level = "";
$experience = "";
$money = "";
$strength = "";
$intelligence = "";
$agility = "";
$chance = "";
$wisdom = "";
$unused_statspoint = "";
$errors = array();

// Connect to database
include('../include/database_connection.php');

// REGISTER USER
if (isset($_POST['submit'])) {
    // get input values from form
    $pseudo = htmlspecialchars($_POST['inputPseudo']);
    $radioSkillValue = htmlspecialchars($_POST['skill[]']);
    if($radioSkillValue == "Strength"){
        $class = 'Sento-in';
        $Strength = 5;
        $intelligence = 0;
        $agility = 0;
    }
    else if($radioSkillValue == "Intelligence"){
        $class = 'Konjura';
        $Strength = 0;
        $intelligence = 5;
        $agility = 0;
    }
    else if($radioSkillValue == "Strength"){
        $class = 'Horo-sha';
        $Strength = 0;
        $intelligence = 0;
        $agility = 5;
    }
    // Chance and wisdom are null till level 5 and 10 respectively.
    $level = 1;
    $experience = 0;
    $money = 0;
    $unused_statspoint = 0;



    // form validation to ensure that the form is filled correctly...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($pseudo)) { array_push($errors, "Pseudo is required"); }
    if (empty($radioSkillValue)) { array_push($errors, "A skill is required to start playing"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = $conn->prepare("SELECT * FROM user WHERE username='".$username."' OR email='".$email."' LIMIT 1");
    $user_check_query->execute();
    $result_user = $user_check_query->fetch();

    if ($result_user) { // if user exists
        if ($result_user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($result_user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        //encrypt the password before saving in the database
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // convert $date_of_birth to american standard YYYY-mm-dd
        // creating a new Datetime object with the desired format
        $newdob = DateTime::createFromFormat('Y-m-d', $dob);
        // changing the Datetime object to a string format
        $date_of_birth = $newdob->format('Y-m-d');

        // Preparing the query
        $query = $conn->prepare("INSERT INTO `user`(`lastname`, `firstname`, `username`, `date_of_birth`, `email`, `password`) 
VALUES('$lastname', '$firstname', '$username', '$date_of_birth', '$email', '$password_hash')");
        // Executing the query
        $query->execute();

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: ../php/characteristic.php');
        echo $errors;
        $conn = null;
    }
}
?>