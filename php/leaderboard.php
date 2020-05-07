<?php
require_once('../include/function.php');
$conn = dbConnection();
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
    <div id="leaderboardTitle">
        <h1>Leaderboard</h1>
    </div>

    <div id="leaderboardTable">
        <table>
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Class</th>
                <th scope="col">Level</th>
                <th scope="col">Experience</th>
                <th scope="col">Wisdom Streak</th>
            </tr>
                <?php
                    echo showLeaderboard();
                ?>
        </table>
    </div>
</section> <!-- end content section -->
    <?php include("footer.php") ?>
</section> <!-- end global section -->



</body>
</html>

<?php
$conn = null;
?>