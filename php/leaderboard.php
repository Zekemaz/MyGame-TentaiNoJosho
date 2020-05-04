<?php
include('../include/database_connection.php');
$conn = database_connection();
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
            </tr>
                <?php
                $query = $conn->prepare(
                    "SELECT `pseudo`,`class`,`level`,`experience` FROM `character` 
                    ORDER by experience DESC, level DESC");
                // Executing the query
                $query->execute();
                $rank = 1;
                while ($row = $query->fetch())
                {
                    echo "
                         <tr>
                            <td>{$rank}</td>
                            <td>{$row['pseudo']}</td>
                            <td>{$row['class']}</td>
                            <td>{$row['level']}</td>
                            <td>{$row['experience']}</td>
                        </tr>
                            ";
                $rank++;
                }
                $conn = null;
                ?>

<?php
//
//            $result = mysql_query("SELECT pseudo, faction, level, experience FROM character ORDER BY score DESC");
//            $rank = 1;
//
//            if (mysql_num_rows($result)) {
//                while ($row = mysql_fetch_assoc($result)) {
//                    echo "<td>{$rank}</td>
//                      <td>{$row['pseudo']}</td>
//                      <td>{$row['faction']}</td>";
//                    <td>{$row['level']}</td>";
//                      <td>{$row['Experience']}</td>";
//
//                $rank++;
//            }
//            }
//            ?>
        </table>


    </div>
</section> <!-- end content section -->
    <?php include("footer.php") ?>
</section> <!-- end global section -->



</body>
</html>

