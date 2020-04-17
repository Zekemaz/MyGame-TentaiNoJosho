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
        <form class="form1" name="form1" method="post" action="characteristic.php">
            <div class="formDiv">
                <div class="divLabelInput">
                    <label class="label" for="lastname">Lastname</label><input type="text" name="lastname" id="lastname" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="firstname">Firstname</label><input type="text" name="firstname" id="firstname" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="dob">Date of birth</label><input type="date" name="dob" id="firstname" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="email">E-mail</label><input type="text" name="email" id="email" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="pseudo">Pseudo</label><input type="text" name="pseudo" id="pseudo" />
                </div>
                <br class="clear" />
                <div class="divLabelInput">
                    <label class="label" for="password">Password</label><input type="password" name="password" id="password" />
                </div>
            </div>
            <button type="submit" name="submit" id="submit">Create account</button>
            <br class="clear" />
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

