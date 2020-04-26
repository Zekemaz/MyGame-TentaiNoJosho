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
        <form id="form_characteristic" name="form1" method="post" action="profile.php">
            <div id="formdiv_characteristic">
                <div id="presentation1">
                    <label name="presentation1">You now have to choose between being a Ten’Nin or an Aku'No !
                       Whatever you choose today, you cannot go back ! Choose wisely
                    </label>
                </div>
                <br class="clear"/>
                <br class="clear">
                <div id="faction_div">
                    <label id="label1" class="labelFaction" for="faction_0">
                        <input type="radio" class="radioFaction" name="faction[]" value="Ten'Nin" id="faction_0">
                        <span class="titleSpan">
                            Ten'Nin
                            <br><br>
                            <span class="spanFaction">
                                They are deities
                                arrived from the sky. They only want good for the Chikyujin
                                but are being killed by the relentless Aku'No clan. Choose them,
                                train and you will maybe become a Ten'Nin.
                            </span>
                        </span>
                    </label>
                    <label id="label2" class="labelFaction" for="faction_1">
                        <input type="radio" class="radioFaction" name="faction[]" value="Aku'No" id="faction_1">
                        <span class="titleSpan">
                            Aku'No
                            <br><br>
                            <span class="spanFaction">
                                Chikyujin at first,
                                turned towards evil on the arrival of the Tentai. Will you join them
                                and help them fight off these other beings.
                                Choose the Aku'No faction and destroy the Tentai.
                            </span>
                        </span>
                    </label>
                </div>
                <br class="clear"/>
                <div id="presentation2">
                    <label name="presentation2">
                        Amongst those characteristics you will have to choose only one for now. Later on you will be able to get more
                    </label>
                </div>
                <br class="clear"/>
                <br class="clear">
                <div id="skill_div">
                    <label class="labelSkill" for="strength" id="skill_0">
                        <input class="radioSkill" type="radio" name="skill[]" value="Strength" id="strength"/>
                        <span class="spanSkill" id="spanSkill_0"><strong>Strength</strong></span>
                    </label>

                    <label class="labelSkill" for="intelligence" id="skill_1">
                        <input class="radioSkill" type="radio" name="skill[]" value="Intelligence" id="intelligence"/>
                        <span class="spanSkill" id="spanSkill_1"><strong>Intelligence</strong></span>
                    </label>

                    <label class="labelSkill" for="agility" id="skill_2">
                        <input class="radioSkill" type="radio" name="skill[]" value="Agility" id="agility"/>
                        <span class="spanSkill" id="spanSkill_2"><strong>Agility</strong></span>
                    </label>

<!--                    <label class="labelSkill" for="chance" id="skill_3">-->
<!--                        <input class="radioSkill" type="radio" name="skill[]" value="Chance" id="chance"/>-->
<!--                        <span class="spanSkill" id="spanSkill_3"><strong>Chance</strong></span>-->
<!--                    </label>-->

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

<?php
/* //Post Params
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$email = $_POST['email'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

<?php //Query

//INSERT
$query = " INSERT INTO joueur ( lastname, firstname, email, pseudo, password )  VALUES ( '$lastname', '$firstname', '$email', '$pseudo', '$password' ) ";
$result = mysql_query($query);

if( $result )
{
 echo 'Success';
}
else
{
 echo 'Query Failed';
}

?>



*/
?>

