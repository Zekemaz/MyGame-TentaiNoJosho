<?php
session_start();
$_SESSION['username'];

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: sign_in.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: sign_in.php");
}
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

    <?php include("header2.php") ?>

    <section id="content_section"> <!-- content section -->

        <div id="divWelcome">
            <h1 id='welcomePseudo'>Welcome Pseudo</h1>
        </div>
        <form id="form_characteristic" name="form1" method="post" action="../include/character_insert.php">
            <?php include('../include/errors.php'); ?>
            <div id="formdiv_characteristic">

<!--                <div id="presentation1">-->
<!--                    <label name="presentation1">You now have to choose between being a Ten’Nin or an Aku'No !-->
<!--                       Whatever you choose today, you cannot go back ! Choose wisely-->
<!--                    </label>-->
<!--                </div>-->
<!--                <br class="clear"/>-->
<!--                <br class="clear">-->
<!--                <div id="faction_div">-->
<!--                    <label id="label1" class="labelFaction" for="faction_0">-->
<!--                        <input type="radio" class="radioFaction" name="faction[]" value="Ten'Nin" id="faction_0">-->
<!--                        <span class="titleSpan">-->
<!--                            Ten'Nin-->
<!--                            <br><br>-->
<!--                            <span class="spanFaction">-->
<!--                                They are deities-->
<!--                                arrived from the sky. They only want good for the Chikyujin-->
<!--                                but are being killed by the relentless Aku'No clan. Choose them,-->
<!--                                train and you will maybe become a Ten'Nin.-->
<!--                            </span>-->
<!--                        </span>-->
<!--                    </label>-->
<!--                    <label id="label2" class="labelFaction" for="faction_1">-->
<!--                        <input type="radio" class="radioFaction" name="faction[]" value="Aku'No" id="faction_1">-->
<!--                        <span class="titleSpan">-->
<!--                            Aku'No-->
<!--                            <br><br>-->
<!--                            <span class="spanFaction">-->
<!--                                Chikyujin at first,-->
<!--                                turned towards evil on the arrival of the Tentai. Will you join them-->
<!--                                and help them fight off these other beings.-->
<!--                                Choose the Aku'No faction and destroy the Tentai.-->
<!--                            </span>-->
<!--                        </span>-->
<!--                    </label>-->
<!--                </div>-->
<!--                <br class="clear"/>-->
                <div id="presentation2">
                    <label name="presentation2">
                        Amongst those characteristics you will have to choose only one for now. Later on you will be able to get more
                    </label>
                </div>
                <br class="clear"/>
                <br class="clear">

                <div id="skill_div">
                    <div id="class_div">
                        <label id="label1" class="labelClass">If you choose Strength you will be part of the class of the Sento-in</label>
                        <label class="labelSkill" for="strength" id="skill_0">
                            <input class="radioSkill" type="radio" name="skill" value="Strength" id="strength"/>
                            <span class="spanSkill" id="spanSkill_0"><strong>Strength</strong></span>
                        </label>
                    </div>

                    <div id="class_div">
                        <label class="labelSkill" for="intelligence" id="skill_1">
                            <label id="label2" class="labelClass">If you choose Intelligence you will be part of the class of the Konjura</label>
                            <input class="radioSkill" type="radio" name="skill" value="Intelligence" id="intelligence"/>
                            <span class="spanSkill" id="spanSkill_1"><strong>Intelligence</strong></span>
                        </label>
                    </div>

                    <div id="class_div">
                        <label class="labelSkill" for="agility" id="skill_2">
                            <label id="label3" class="labelClass">If you choose Agility you will be part of the class of the Horo-sha</label>
                            <input class="radioSkill" type="radio" name="skill" value="Agility" id="agility"/>
                            <span class="spanSkill" id="spanSkill_2"><strong>Agility</strong></span>
                        </label>
                    </div>
                </div>

                <div id="characterPseudoDiv">
                    <label id="labelPseudo" for="inputPseudo">Choose a name for your character</label>
                    <input type="text" name="inputPseudo" id="inputPseudo" />
                </div>
                <br class="clear"/>
            </div>
            <button type="submit" name="submit" id="submit_character"/>
                Create my character
            </button>
            <br class="clear"/>
        </form>
    </section> <!-- end content section -->


    <?php include("footer.php") ?>

</section> <!-- end global section -->



</body>
</html>
