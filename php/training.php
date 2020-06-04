<?php
session_start();
$username = $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
}
require_once('../include/function.php');
$conn = dbConnection();

require_once('../include/class/Character.php');
$Character = new Character();
$Character->fetchStats();
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>
<body>
<section id="global"> <!-- global section -->

    <?php include("header3.php") ?>

    <section id="content_section_training"> <!-- content section -->

        <div id="trainingMenuDiv">
            <h1 id='trainingMenuTitle'>Training Dojo</h1>
        </div>
        <div id="explicationDiv">
            <p>Training will grant you experience and stats points. You cannot attack while you train.</p>
        </div>

        <div id="trainingDiv">

            <div id="trainBtnDiv">
                <button id="btnTrain">Train</button>
                <button id="btnStop">Stop</button>
            </div>
            <img id="traininglogo" src="../assets/images/toriilogo1.svg" alt="traininglogo">
            <div id="timeDiv">
                <span id="trainingTimeLeftSpan">Time left</span>
                <span id="trainingTimeSpan">0</span>
            </div>
        </div>
    </section> <!-- end content section -->
    <?php include("footer.php") ?>
</section> <!-- end global section -->


<script src="../js/trainingScript.js"></script>
</body>
</html>



