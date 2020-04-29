<?php
session_start();

// initializing variables
$lastname = "";
$firstname = "";
$username = "";
$dob = "";
$email = "";
$errors = array();

// Connect to database
include('../include/database_connection.php');

// REGISTER USER
if (isset($_POST['submit'])) {
    // get input values from form
    $lastname = htmlspecialchars($_POST['lastname']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $username = htmlspecialchars($_POST['username']);
    $dob = htmlspecialchars($_POST['dob']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);


    // form validation to ensure that the form is filled correctly...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if ($password != $password2) {
        array_push($errors, "The two passwords do not match");
    }

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