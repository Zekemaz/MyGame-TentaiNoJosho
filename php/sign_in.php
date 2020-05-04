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
            <h1 id='signpages_h1'>Sign in</h1>
        </div>
        <form class="form1" name="form1" method="post" action="sign_in.php">
            <?php include('../include/errors.php'); ?>
            <div class="formDiv">
                <div class="divLabelInput">
                    <label class="label" for="username">Username</label><input type="text" name="username" id="pseudo" />
                    <br class="clear" />
                </div>
                <div class="divLabelInput">
                    <label class="label" for="password">Password</label><input type="password" name="password" id="password" />
                    <br class="clear" />
                </div>
            </div>
            <button type="submit" name="submit_signin" id="submit_connect">Connect</button>
            <br class="clear" />
        </form>

    </section> <!-- end content section -->

    <?php include("footer.php") ?>

</section> <!-- end global section -->



</body>
</html>


