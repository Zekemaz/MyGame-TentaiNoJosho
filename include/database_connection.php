<?php
// Variables login
$servername = 'localhost';
$dbusername = 'root';
$dbpassword = 'root';
$dbname = 'tentai_no_josho';

// Create new connection
$conn = new PDO('mysql:host='.$servername.';dbname='.$dbname, $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $conn;
//function database_connection() {
//
//    // Variables login
//    $servername = 'localhost';
//    $dbusername = 'root';
//    $dbpassword = 'root';
//    $dbname = 'tentai_no_josho';
//
//    // Create new connection
//    $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname, $dbusername, $dbpassword);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    return $conn;
//}

//// test if user connected
//function user_verified()
//{
//    return isset($_SESSION['id']);
//}
//// detection des links
//function urllink($content = '')
//{
//    $content = preg_replace('#(((https?://)|(w{3}\.))+[a-zA-Z0-9&;\#\.\?=_/-]+\.([a-z]{2,4})([a-zA-Z0-9&;\#\.\?=_/-]+))#i', '<a href="$0" target="_blank">$0</a>', $content);
//    // Si on capte un lien tel que www.test.com, il faut rajouter le http://
//    if (preg_match('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', $content)) {
//        $content = preg_replace('#<a href="www\.(.+)" target="_blank">(.+)<\/a>#i', '<a href="http://www.$1" target="_blank">www.$1</a>', $content);
//        //preg_replace('#<a href="www\.(.+)">#i', '<a href="http://$0">$0</a>', $content);
//    }
//
//    $content = stripslashes($content);
//    return $content;
//}


?>


