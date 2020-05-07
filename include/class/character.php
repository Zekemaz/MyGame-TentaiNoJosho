<?php
session_start();
require_once('../function.php');
$conn = dbConnection();
global $conn;
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

class Character
{
    // Public attributes
    public $_pseudo;
    public $_experience;
    public $_wisdom;

    // Private/protected attributes
    protected $_money;
    protected $_strength;
    protected $_intelligence;
    protected $_agility;
    protected $_chance;

    // Public Methods
//    public function Connect_db()
//    {
//
//    }
    public function Attack()
    {

    }
    public function Train()
    {

    }
    public function getPseudo()
    {
        global $conn;
        $username = $_SESSION['username'];
        // Preparing the SQL query
        $query = $conn->prepare(
            " SELECT pseudo
                        FROM `character`
                        LEFT JOIN user ON `character`.`ID_user` = `user`.`ID_user`
                        WHERE user.username = '$username'");
        // Executing the query
        $query->execute();

        // Assigning the result to the $pseudo variable
        $pseudo = $query->fetchColumn();

        // returning the $pseudo
        echo $pseudo;

    }
    public function getLevel()
    {
        global $conn;
        $username = $_SESSION['username'];
        // Preparing the SQL query
        $query = $conn->prepare(
            " SELECT level
                        FROM `character`
                        LEFT JOIN user ON `character`.`ID_user` = `user`.`ID_user`
                        WHERE user.username = '$username'");
        // Executing the query
        $query->execute();

        // Assigning the result to the $pseudo variable
        $level = $query->fetchColumn();

        // returning the $pseudo
        echo $level;

    }

    // Protected Methods
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

    // Private Methods
}
//include('../include/class/character.php');
//$character = new Character();
//$character->GetPseudo();


