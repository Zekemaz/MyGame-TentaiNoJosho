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
require_once('../include/class/character.php');
$character = new Character;

$username = $_SESSION['username'];
$character->fetchStats();
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
    <script src="../js/profileScript.js"></script>
</head>
<body>
<section id="global"> <!-- global section -->

    <?php include("header3.php") ?>

    <section id="content_section"> <!-- content section -->

        <div id="optionDiv">
            <ul id="optionNav">
                <li class="optionLi"><a href="attackMenu.php">Attack</a> </li>
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
                        $character->showPseudo();
                        ?>
                    </span>
                <img src="../assets/images/avatar.png" alt="avatar">
                <span>
                    <?php
                    $character->showLevel();
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
                        $character->showStrength();
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

                    <span id="intelligencePointSpan" class="pointSpan">
                        <?php
                        $character->showIntelligence();
                        ?>
                    </span>
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

                    <span id="agilityPointSpan" class="pointSpan">
                        <?php
                        $character->showAgility();
                        ?>
                    </span>
                </div>

                <div>
                    <span id="luckSpan" class="characteristicSpan">Luck</span>
                    <span id="imageSpan">
                            <button class="buttonPoint" id="luckButtonPlus">
                            </button>
                            <button class="buttonPoint" id="luckButtonMinus">
                            </button>
                        </span>
                    <span id="luckPointSpan" class="pointSpan">
                        <?php
                        $character->showChance();
                        ?>
                    </span>
                </div>

                <div>
                    <span id="wisdomSpan" class="characteristicSpan">Wisdom</span>
                    <span id="wisdomPointSpan" class="pointSpan">
                        <?php
                        $character->showWisdom();
                        ?>
                    </span>
                </div>


            </div>

            <div id="sideDiv">
                <span class="firstSpan">
                    Unused Stat Points
                    <span class="secondSpan">
                        <?php
                        $character->showUnusedStatsPoint();
                        ?>
                    </span>
                </span>
                <span class="firstSpan">
                        Experience
                        <span class="secondSpan">
                        <?php
                        $character->showExperience();
                        ?>
                        </span>
                </span>
                <span class="firstSpan">
                        Money
                        <span class="secondSpan">
                        <?php
                        $character->showMoney();
                        ?>
                        </span>
                </span>

            </div>
        </div>
    </section> <!-- end content section -->

    <?php include("footer.php") ?>

</section> <!-- end global section -->



</body>
</html>

<?php
$conn = null;
?>