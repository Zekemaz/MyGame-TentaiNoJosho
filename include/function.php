<?php
function dbConnection()
{
    // Variables login
    $servername = 'localhost';
    $dbusername = 'root';
    $dbpassword = 'root';
    $dbname = 'tentai_no_josho';

    $pdo_attribute[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    // Create new connection
    return new PDO('mysql:host='.$servername.';dbname='.$dbname, $dbusername, $dbpassword, $pdo_attribute);
}


function showLeaderboard()
{
    global $conn;
    $query = $conn->prepare(
        "SELECT `pseudo`,`class`,`level`,`experience`, `wisdom` FROM `character` 
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
                            <td>{$row['wisdom']}</td>
                            
                        </tr>
                            ";
        $rank++;
    }
}




