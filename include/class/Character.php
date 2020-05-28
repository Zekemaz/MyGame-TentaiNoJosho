<?php
class Character
{
    // Private attributes
    private $_pseudo;
    private $_experience;
    private $_wisdom;
    private $_money;
    private $_strength;
    private $_intelligence;
    private $_agility;
    private $_luck;
    private $_unused_statspoint;
    private $_level;


    public function Train(){}
    public function winExperience(){
        $experienceWon = 0;
        $newExperience = $this->_experience + $experienceWon;}

    public function fetchStats()
    {
        global $conn;
        $username = $_SESSION['username'];

        // Preparing the SQL query
        $query = $conn->prepare(
            " SELECT pseudo, level, strength, intelligence, agility, luck,
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
            $this->_luck = $row['luck'];
            $this->_wisdom = $row['wisdom'];
            $this->_unused_statspoint = $row['unused_statspoint'];
            $this->_experience = $row['experience'];
            $this->_money = $row['money'];
        }
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->_pseudo;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->_level;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->_strength;
    }

    /**
     * @return mixed
     */
    public function getIntelligence()
    {
        return $this->_intelligence;
    }

    /**
     * @return mixed
     */
    public function getAgility()
    {
        return $this->_agility;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->_luck;
    }

    /**
     * @return mixed
     */
    public function getWisdom()
    {
        return $this->_wisdom;
    }

    /**
     * @return mixed
     */
    public function getUnusedStatspoint()
    {
        return $this->_unused_statspoint;
    }

    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->_money;
    }


    /**
     * This section is for Stats modification
     * Uses the method upStats
     */

    public function updateStrength()
    {
        $this->updateStat('strength', 1);
    }
    public function updateIntelligence()
    {
        $this->updateStat('intelligence', 1);
    }
    public function updateAgility()
    {
        $this->updateStat('agility', 1);
    }
    public function updateLuck()
    {
        $this->updateStat('luck', 2);
    }

    /**
     *
     * This private method allows the character stats to be modified
     * @param $name //represents the name of the stats being modified
     * @param int $val // by how much the stats will be modified (taken from the variable $_unused_statspoint)
     *
     */
    private function updateStat($name, $val){
        if ($this->_unused_statspoint >= $val)
        {
            global $conn;
            $username = $_SESSION['username'];
            // Preparing the SQL query
            $query = $conn->prepare(
                "UPDATE `character`
                            LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                            SET `$name` = `$name` + $val ,`unused_statspoint` = `unused_statspoint` - $val
                            WHERE `user`.`username` = '$username'");

            // Executing the query
            $query->execute();
            // test si requete execute normalement et si oui maj données
            $this->{'_' . $name} += $val;
            $this->_unused_statspoint -= $val;
        }
    }
}
