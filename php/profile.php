<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../index.php');
}
//if (isset($_GET['logout'])) {
//    session_destroy();
//    unset($_SESSION['username']);
//    header("location: ../index.php");
//}
require_once('../include/function.php');
$conn = dbConnection();

////////////////////////// Query for Stats //////////////////////////////
$username = $_SESSION['username'];

// Preparing the SQL query
$query = $conn->prepare(
    " SELECT pseudo, level, strength, intelligence, agility, chance, 
                        wisdom, unused_statspoint, experience, money
                FROM `character`
                LEFT JOIN user ON `character`.`ID_user` = `user`.`ID_user`
                WHERE user.username = '$username'");
// Executing the query
$query->execute();
while ($row = $query->fetch()) {
    $pseudo = $row['pseudo'];
    $level = $row['level'];
    $strength = $row['strength'];
    $intelligence = $row['intelligence'];
    $agility = $row['agility'];
    $chance = $row['chance'];
    $wisdom = $row['wisdom'];
    $unused_statspoint = $row['unused_statspoint'];
    $experience = $row['experience'];
    $money = $row['money'];
}

$conn = null;

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

</head>
<body>
<section id="global"> <!-- global section -->

    <?php include("header3.php") ?>

    <section id="content_section"> <!-- content section -->

        <div id="optionDiv">
            <ul id="optionNav">
                <li class="optionLi"><a href="attackmenu.php">Attack</a> </li>
                <li class="optionLi"><a href="leaderboard.php">Leaderboard</a></li>
                <?php  if (isset($_SESSION['username'])) : ?>
                    <li class="optionLi" id="yourProfile"><?php echo $_SESSION['username']; ?></li>
                <?php endif ?>
                <li class="optionLi"><a href="chat.php">Chat</a></li>
                <li class="optionLi"><a href="training.php">Training</a></li>
            </ul>
        </div>


        <div id="mainContentDiv">
            <div id="avatarDiv">
                    <span>
                        <?php
                        echo $pseudo;
                        ?>
                    </span>
                <img src="../assets/images/avatar.png" alt="avatar">
                <span>
                    <?php
                    echo 'Level '.$level;
                     ?>
                </span>
            </div>
            <div id="characteristicDiv">
                <div>
                    <span id="strengthSpan" class="characteristicSpan">Strength</span>
                    <span id="imageSpan">
                            <button class="buttonPoint" id="strengthButtonPlus">
                            </button>
                            <button class="buttonPoint" id="strengthButtonMinus">
                            </button>
                        </span>

                    <span id="strengthPointSpan" class="pointSpan">
                        <?php

                        echo "$strength"
                        ?>
                    </span>
                </div>

                <div>
                    <span id="intelligenceSpan" class="characteristicSpan">Intelligence</span>
                    <span id="imageSpan">
                            <button class="buttonPoint" id="intelligenceButtonPlus">
                            </button>
                            <button class="buttonPoint" id="intelligenceButtonMinus">
                            </button>
                        </span>

                    <span id="intelligencePointSpan" class="pointSpan"><?php echo "$intelligence"?></span>
                </div>

                <div>
                    <span id="agilitySpan" class="characteristicSpan">Agility</span>
                    <span id="imageSpan">
                            <button class="buttonPoint" id="agilityButtonPlus">
                                <!-- <img id="agilityImgPlus" src="agilityplus.svg" alt="plus"> -->
                            </button>
                            <button class="buttonPoint" id="agilityButtonMinus">
                            </button>
                        </span>

                    <span id="agilityPointSpan" class="pointSpan"><?php echo "$agility"?></span>
                </div>

                <div>
                    <span id="luckSpan" class="characteristicSpan">Luck</span>
                    <span id="imageSpan">
                            <button class="buttonPoint" id="luckButtonPlus">
                            </button>
                            <button class="buttonPoint" id="luckButtonMinus">
                            </button>
                        </span>
                    <span id="luckPointSpan" class="pointSpan"><?php echo "$chance"?></span>
                </div>

                <div>
                    <span id="wisdomSpan" class="characteristicSpan">Wisdom</span>
                    <span id="wisdomPointSpan" class="pointSpan"><?php echo "$wisdom"?></span>
                </div>


            </div>

            <div id="sideDiv">
                <span class="firstSpan">
                    Unused Stat Points
                    <span class="secondSpan">
                        <?php echo "$unused_statspoint"?>
                    </span>
                </span>
                <span class="firstSpan">
                        Experience
                        <span class="secondSpan">
                        <?php echo "$experience"?>
                        </span>
                </span>
                <span class="firstSpan">
                        Money
                        <span class="secondSpan">
                        <?php echo "$money"?>
                        </span>
                </span>

            </div>
        </div>
    </section> <!-- end content section -->

    <?php include("footer.php") ?>

</section> <!-- end global section -->



</body>
</html>