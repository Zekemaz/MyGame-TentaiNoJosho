<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tentai No Jōshō</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../styles/contentstyle.css">

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
                <button id="btnTrain">Stop</button>
            </div>
            <img id="traininglogo" src="../assets/images/toriilogo1.svg" alt="traininglogo">
            <div id="timeDiv">
                <span id="span1">Time left</span>
                <span id="span2">0</span>
            </div>
        </div>
    </section> <!-- end content section -->
    <?php include("footer.php") ?>
</section> <!-- end global section -->


<script src="../js/script.js"></script>
</body>
</html>



