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
include('../include/function.php');
$conn = dbConnection();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tentai No Jōshō</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/contentstyle.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="../js/trainingScript.js"></script>
</head>
<body>
<section id="global"> <!-- global section -->

    <?php include("header3.php") ?>
    <section id="content_section"> <!-- content section -->
        <div id="chatTitle">
            <h1>Chat</h1>
        </div>

        <div id="chatDiv">
            <div id="leftDiv">
                <div>
                    <button>Moderator</button>
                    <button>General Chat</button>
                </div>

            </div>
            <div id="rightDiv">
                <div id="messageArea">
                    <?php

                        $queryAllMessages = $conn->prepare(
                            " SELECT  `user`.username, `message_content`, `message_created_at`, `message`.ID_user
                                        FROM `message`
                                        LEFT JOIN `user` ON `user`.ID_user = `message`.ID_user
                                        WHERE 1
                                        ORDER BY `message`.message_created_at ASC
                                        ");


                        $queryAllMessages->execute();
                        while ($row = $queryAllMessages->fetch())
                        {

                            $message_content = htmlspecialchars($row['message_content']);
                            $message_created_at = $row['message_created_at'];
                            $username = $row['username'];
                            $ID_user = $row['ID_user'];
                            $newTime = date("d/m, H:i:s", strtotime($message_created_at));

//                            $random1 = rand(10, 255);
//                            $random2 = rand(10, 255);
//                            $random3 = rand(10, 255);
//                            $color = 'rgb('.$random1.','.$random2.','.$random3.')';
                            echo "
                            <div class='message'>
                                <div id='messageSenderTimeDiv'>
                                    <p id='usernameSender'>{$username} : </p>
                                    <p id='messageTime'>
                                        {$newTime}
                                    </p>
                                </div>
                                <p id='messageP'>
                                    {$message_content}
                                </p>
                            </div>
                                ";
                        }

                    ?>
                </div>

                <div id="btnTxtArea">
                    <form id="messageForm" name="formChat" method="post" action="../include/message.php">
                        <button id="sendBtn">Send</button>
                        <input accesskey="enter" type="text" name="message" id="textArea" autocomplete="off" autofocus placeholder="Type your message...">
<!--                        <textarea name="message" id="textArea" cols="1" rows="5" autocomplete="off" autofocus placeholder="Type your message..."></textarea>-->
                    </form>
                </div>
            </div>
        </div>
    </section> <!-- end content section -->
    <?php include("footer.php") ?>
</section> <!-- end global section -->



</body>
</html>

