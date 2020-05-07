<?php
//include('../include/function.php');
//$conn = database_connection();
//////////////////////////// Query for Stats //////////////////////////////
//$username = $_SESSION['username'];
//// Preparing the SQL query
//$query = $conn->prepare(
//    " SELECT pseudo, level, strength, intelligence, agility, chance,
//                        wisdom, unused_statspoint, experience, money
//                FROM `character`
//                LEFT JOIN user ON `character`.`ID_user` = `user`.`ID_user`
//                WHERE user.username = '$username'");
//// Executing the query
//$query->execute();
//while ($row = $query->fetch()) {
//    $pseudo = $row['pseudo'];
//    $level = $row['level'];
//    $strength = $row['strength'];
//    $intelligence = $row['intelligence'];
//    $agility = $row['agility'];
//    $chance = $row['chance'];
//    $wisdom = $row['wisdom'];
//    $unused_statspoint = $row['unused_statspoint'];
//    $experience = $row['experience'];
//    $money = $row['money'];
//}

class Message
{
    // Public attributes
    public $_content;
    public $_created_at;
    public $_author;

    // Private/protected attributes
    private $_id_message;


    // Methods
    public function attack()
    {

    }
    public function train()
    {

    }
    protected function GetExperience()
    {

    }
    protected function GetMoney()
    {

    }

    //idk if necessary as i could subtract the money from the other character in the GetMoney() function
    protected function LoseMoney()
    {

    }
}



$conn = null;