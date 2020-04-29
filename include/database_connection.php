<?php
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = 'root';
$dbname = 'tentai_no_josho';

// Create new connection
//$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
//$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname, $dbusername, $dbpassword);
$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname, $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}
?>