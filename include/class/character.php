<?php
global $conn;
class Character
{
    // Public attributes
    private $_pseudo;
    private $_experience;
    private $_wisdom;

    // Private/private attributes
    private $_money;
    private $_strength;
    private $_intelligence;
    private $_agility;
    private $_chance;

    private $_unused_statspoint;
    private $_level;

    public function Attack()
    {

    }
    public function Train()
    {

    }
    public function winExperience()
    {
        $experienceWon = 0;
        $newExperience = $this->_experience + $experienceWon;
    }
    public function levelUp()
    {

    }
    public function showPseudo()
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
        $this->_pseudo = $query->fetchColumn();

        // returning the $pseudo
        echo $this->_pseudo;
        return $this->_pseudo;

    }
    public function showLevel()
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
        $this->_level = $query->fetchColumn();

        // returning the $pseudo
        echo $this->_level;
        return $this->_level;
    }
    public function fetchStats()
    {
        global $conn;
        $username = $_SESSION['username'];

        // Preparing the SQL query
        $query = $conn->prepare(
            " SELECT pseudo, level, strength, intelligence, agility, chance,
                        wisdom, unused_statspoint, experience, money
                FROM `character`
                LEFT JOIN user ON `character`.`ID_user` = `user`.`ID_user`
                WHERE user.username = '$username'");
// Executing the query
        $query->execute();
        while ($row = $query->fetch()) {
            $this->_pseudo = $row['pseudo'];
            $this->_level = $row['level'];
            $this->_strength = $row['strength'];
            $this->_intelligence = $row['intelligence'];
            $this->_agility = $row['agility'];
            $this->_chance = $row['chance'];
            $this->_wisdom = $row['wisdom'];
            $this->_unused_statspoint = $row['unused_statspoint'];
            $this->_experience = $row['experience'];
            $this->_money = $row['money'];
        }
    }
    public function showStrength()
    {
        echo $this->_strength;
    }
    public function showIntelligence()
    {
        echo $this->_intelligence;
    }
    public function showAgility()
    {
        echo $this->_agility;
    }
    public function showChance()
    {
        echo $this->_chance;
    }
    public function showWisdom()
    {
        echo $this->_wisdom;
    }
    public function showUnusedStatsPoint()
    {
        echo $this->_unused_statspoint;
    }
    public function showExperience()
    {
        echo $this->_experience;
    }
    public function showMoney()
    {
        echo $this->_money;
    }

    public function upStrength()
    {
        if ($this->_unused_statspoint < 0)
        {
            global $conn;
            $username = $_SESSION['username'];

            // Preparing the SQL query
            $query = $conn->prepare(
                 "UPDATE `character`
                            SET `strength`= $this->_strength + 1 ,`unused_statspoint`= $this->_unused_statspoint - 1
                            WHERE `ID_character`= $username");
            // Executing the query
            $query->execute();
        }
        else if ($this->_unused_statspoint == 0)
           echo "<script>alert('You do not have enough unused points to increase your strength')</script>";

    }
    protected function LoseMoney()
    {

    }
}
