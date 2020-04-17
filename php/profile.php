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
                <li class="optionLi" id="yourProfile">Your Profile</li>
                <li class="optionLi"><a href="chat.php">Chat</a></li>
                <li class="optionLi"><a href="training.php">Training</a></li>
            </ul>
        </div>

        <div id="mainContentDiv">
            <div id="avatarDiv">
                    <span>
                        Avatar
                    </span>
                <img src="../assets/images/avatar.png" alt="avatar">
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

                    <span id="strengthPointSpan" class="pointSpan">0</span>
                </div>

                <div>
                    <span id="intelligenceSpan" class="characteristicSpan">Intelligence</span>
                    <span id="imageSpan">
                            <button class="buttonPoint" id="intelligenceButtonPlus">
                            </button>
                            <button class="buttonPoint" id="intelligenceButtonMinus">
                            </button>
                        </span>

                    <span id="intelligencePointSpan" class="pointSpan">0</span>
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

                    <span id="agilityPointSpan" class="pointSpan">0</span>
                </div>

                <div>
                    <span id="chanceSpan" class="characteristicSpan">Chance</span>
                    <span id="imageSpan">
                            <button class="buttonPoint" id="chanceButtonPlus">
                            </button>
                            <button class="buttonPoint" id="chanceButtonMinus">
                            </button>
                        </span>

                    <span id="chancePointSpan" class="pointSpan">0</span>
                </div>

                <div>
                    <span id="wisdomSpan" class="characteristicSpan">Wisdom</span>
                    <span id="wisdomPointSpan" class="pointSpan">0</span>
                </div>


            </div>

            <div id="unusedPointDiv">
                    <span class="firstSpan">
                        Unused Stat Points
                        <span class="secondSpan">
                            0
                        </span>
                    </span>
                <span class="firstSpan">
                        Experience
                        <span class="secondSpan">
                            0
                        </span>
                    </span>
                <span class="firstSpan">
                        Taimupīsu
                        <span class="secondSpan">
                            0
                        </span>
                    </span>

            </div>
        </div>
    </section> <!-- end content section -->

    <?php include("footer.php") ?>

</section> <!-- end global section -->



</body>
</html>


