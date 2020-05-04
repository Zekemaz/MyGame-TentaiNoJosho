<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../index.php");
}
// Connect to database
include('../include/database_connection.php');
//database_connection();



$message = isset($_POST['message']) ? $_POST['message'] : null;
$username = $_SESSION['username'];
//$result = array();

$queryID_user = $conn->prepare(
    "SELECT ID_user FROM `user` WHERE user.username = '$username'");
// Executing the query
$queryID_user->execute();
$ID_user = $queryID_user->fetchColumn();



// Insert message
if(!empty($message))
{
    $queryMessage = $conn->prepare(
        " INSERT INTO `message`(`message_content`, `ID_user`) 
                    VALUES ('$message',$ID_user)");
    $queryMessage->execute();
}



header( 'location: ../php/chat.php' );
//header('Access-Control-Allow-Origin: *');
//header('Content-Type: application/json');
//echo json_encode($result);

$conn = null;
?>