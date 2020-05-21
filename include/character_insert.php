<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// Connect to database
require_once('../include/function.php');
$conn = dbConnection();

// initializing variables
$pseudo = "";
$class = "";
$level = 0;
$experience = 0;
$money = 0;
$strength = 0;
$intelligence = 0;
$agility = 0;
// Not declaring chance nor wisdom as they activate once the user reach level 5 and 10 respectively.
//$chance = 0;
//$wisdom = 0;
$unused_statspoint = "";
$errors = array();


// REGISTER USER
if (isset($_POST['submit'])) {
    // get input values from form
    $pseudo = htmlspecialchars($_POST['inputPseudo']);
    $radioSkillValue = htmlspecialchars($_POST['skill']);
    // check the class the user chose and assign the value to the character's variables with if statement.
    if($radioSkillValue == "Strength"){
        $class = 'Sento-in';
        $strength = 5;
        $intelligence = 0;
        $agility = 0;
    }
    else if($radioSkillValue == "Intelligence"){
        $class = 'Konjura';
        $strength = 0;
        $intelligence = 5;
        $agility = 0;
    }
    else if($radioSkillValue == "Agility"){
        $class = 'Horo-sha';
        $strength = 0;
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
    if (empty($pseudo)) { array_push($errors, "A name is required for your character"); }
    if (empty($radioSkillValue)) { array_push($errors, "A skill is required to start playing"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = $conn->prepare("SELECT * FROM `character` WHERE pseudo='".$pseudo."' LIMIT 1");
    $user_check_query->execute();
    $result_user = $user_check_query->fetch();


    if ($result_user) { // if user exists
        if ($result_user['pseudo'] === $pseudo) {
            array_push($errors, "Name already taken");
        }
    }

    $get_ID_user = $conn->prepare("SELECT ID_user FROM `user` WHERE username='".$_SESSION['username']."' LIMIT 1");
    $get_ID_user->execute();
    $result_ID = $get_ID_user->fetch();
    $ID_user = $result_ID[0];

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {

        $query = $conn->prepare("INSERT INTO `character`(`pseudo`, `class`, `level`, `experience`, `money`, `strength`, `intelligence`, `agility`, `unused_statspoint`, `ID_user`, `ID_skin`)
VALUES(:pseudo, :class, :level, :experience, :money, :strength, :intelligence, :agility, :unused_statspoint, :ID_user, :ID_skin)");

        // assigning values to variables
        $query->execute(array(
           'pseudo'=>$pseudo,
            'class'=>$class,
            'level'=>$level,
            'experience'=>$experience,
            'money'=>$money,
            'strength'=>$strength,
            'intelligence'=>$intelligence,
            'agility'=>$agility,
            'unused_statspoint'=>$unused_statspoint,
            'ID_user'=> $ID_user,
            'ID_skin'=> 1
        ));
        // assigning pseudo to session
        $_SESSION['pseudo'] = $pseudo;
        // redirection to profile
        header('location: ../php/profile.php');

    }
}
// close the connection
$conn = null;
?>