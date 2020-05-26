<?php
include('../include/registration.php');
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

        <div id="signupdiv">
            <h1 id='signpages_h1'>Sign up</h1>
        </div>
        <form class="form1" name="form1" method="post" action="signUp.php">
            <?php include('../include/errors.php'); ?>
            <div class="formDiv">
                <div class="divLabelInput">
                    <label class="label" for="firstname">Firstname</label><input type="text" name="firstname" id="firstname" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="lastname">Lastname</label><input type="text" name="lastname" id="lastname" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="username">Username</label><input type="text" name="username" id="username" value="<?php echo $username; ?>" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="dob">Date of birth</label><input type="date" name="dob" id="dob" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="email">E-mail</label><input type="text" name="email" id="email" value="<?php echo $email; ?>" />
                </div>
<!--                <br class="clear" />-->
<!--                <div class="divLabelInput">-->
<!--                    <label class="label" for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" />-->
<!--                </div>-->
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="password">Password</label><input type="password" name="password" id="password"/>
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="password2">Password verification</label><input type="password" name="password2" id="password" />
                </div>
            </div>
            <button type="submit" name="submit_signup" id="submit">Create account</button>
            <br class="clear" />
        </form>
    </section> <!-- end content section -->

    <?php include("footer.php") ?>

</section> <!-- end global section -->



</body>
</html>

