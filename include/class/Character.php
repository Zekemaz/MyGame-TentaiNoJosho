<?php
class Character
{
    // Private attributes
    // Character name
    private $_pseudo;

    // Character stats
    private $_strength;
    private $_intelligence;
    private $_agility;
    private $_luck;
    private $_wisdom;
    private $_unused_statspoint;
    private $_money;

    // Character information and progression curve
    private $_level;
    private $_experience;
    private $_next_level_experience;
    private $_total_experience;
    private $_experience_per_training;
    private $_training_time = 1;


    public function training(){
        var_dump('training function');
        $this->setTrainingTime('training_time', 5);

    }

    public function winExperience(){
        $this->_level;
        $this->_training_time;
        $this->_required_experience;
        $this->_experience_per_training;


        $experienceWon = 0;
        $newExperience = $this->_experience + $experienceWon;}

    public function levelUp()
    {
        global $conn;
        $username = $_SESSION['username'];

        //while()
        if ($this->_experience == $this->_next_level_experience)
        {

            $this->setLevel('level', 1);
            $this->setExperience(0);
            $this->setNextLevelExperience(pow($this->_level, 3));
        }
        else if ($this->_experience > $this->_next_level_experience)
        {
            $this->setExperience(-$this->_next_level_experience);
            $this->setLevel($query);
            $this->_required_experience = $this->_level^3 ;
        }
    return $this->_level;
    }


    public function fetchStats()
    {
        global $conn;
        $username = $_SESSION['username'];

        // Preparing the SQL query
        $query = $conn->prepare(
            " SELECT pseudo, level, strength, intelligence, agility, luck,
                        wisdom, unused_statspoint, experience, money, training_time, 
                        next_level_experience, total_experience,experience_per_training
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
            $this->_training_time = $row['training_time'];
            $this->_next_level_experience = $row['next_level_experience'];
            $this->_experience_per_training = $row['experience_per_training'];
            $this->_total_experience = $row['total_experience'];

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
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->_pseudo = $pseudo;
    }



    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->_strength;
    }

    /**
     * @param mixed $strength
     */
    public function setStrength($strength): void
    {
        $this->_strength = $strength;
    }



    /**
     * @return mixed
     */
    public function getIntelligence()
    {
        return $this->_intelligence;
    }

    /**
     * @param mixed $intelligence
     */
    public function setIntelligence($intelligence): void
    {
        $this->_intelligence = $intelligence;
    }



    /**
     * @return mixed
     */
    public function getAgility()
    {
        return $this->_agility;
    }

    /**
     * @param mixed $agility
     */
    public function setAgility($agility): void
    {
        $this->_agility = $agility;
    }



    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->_luck;
    }

    /**
     * @param mixed $luck
     */
    public function setLuck($luck): void
    {
        $this->_luck = $luck;
    }



    /**
     * @return mixed
     */
    public function getWisdom()
    {
        return $this->_wisdom;
    }

    /**
     * @param mixed $wisdom
     */
    public function setWisdom($wisdom): void
    {
        $this->_wisdom = $wisdom;
    }



    /**
     * @return mixed
     */
    public function getUnusedStatspoint()
    {
        return $this->_unused_statspoint;
    }

    /**
     * @param mixed $unused_statspoint
     */
    public function setUnusedStatspoint($unused_statspoint): void
    {
        $this->_unused_statspoint = $unused_statspoint;
    }



    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->_money;
    }

    /**
     * @param mixed $money
     */
    public function setMoney($money): void
    {
        $this->_money = $money;
    }



    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->_level;
    }

    /**
     *
     * This private method allows the character stats to be modified
     * @param $name //represents the name of the stats being modified
     * @param int $value // by how much the stats will be modified (taken from the variable $_unused_statspoint)
     *
     */
    public function setLevel($name, $value): void
    {
        global $conn;
        $username = $_SESSION['username'];
        // Preparing the SQL query
        $query = $conn->prepare(
            "UPDATE `character`
                            LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                            SET `$name` = `$name` + $value
                            WHERE `user`.`username` = '$username'");

        // Executing the query
        $query->execute();
        $this->{'_' . $name} += $value;
    }



    /**
     * @return mixed
     */
    public function getExperience()
    {
        return $this->_experience;
    }

    /**
     * @param mixed $experience
     */
    public function setExperience($name, $value ): void
    {
        global $conn;
        $username = $_SESSION['username'];

        if ($this->_experience == $this->_next_level_experience)
        {
            // Preparing the SQL query
            $query = $conn->prepare(
                "UPDATE `character`
                            LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                            SET `$name` = `$name` + $value
                            WHERE `user`.`username` = '$username'");

            // Executing the query
            $query->execute();
            $this->{'_' . $name} += $value;

            $this->setNextLevelExperience(pow($this->_level, 3));
        }
        else if ($this->_experience > $this->_next_level_experience)
        {
            // Preparing the SQL query
            $query = $conn->prepare(
                "UPDATE `character`
                            LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                            SET `$name` = `$name` -$this->_next_level_experience
                            WHERE `user`.`username` = '$username'");

            // Executing the query
            $query->execute();
            $this->{'_' . $name} += $value;

        }
        return $this->_experience;
    }




    /**
     * @return mixed
     */
    public function getNextLevelExperience()
    {
        return $this->_next_level_experience;
    }

    /**
     * @param mixed $next_level_experience
     */
    public function setNextLevelExperience($name): void
    {
        global $conn;
        $username = $_SESSION['username'];
        // Preparing the SQL query
        $query = $conn->prepare(
            "UPDATE `character`
                            LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                            SET `$name` = POW(`character`.level + 1, 3)
                            WHERE `user`.`username` = '$username'");

        // Executing the query
        $query->execute();

        $query2 = $conn->prepare(
            " SELECT $name
                        FROM `character`
                        LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                        WHERE `user`.`username` = '$username'");

        // Executing the query
        $query2->execute();
        while ($row = $query->fetch()) {
            $this->$name = $row["'" . $name . "'"];
        }
    }



    /**
     * @return mixed
     */
    public function getTotalExperience()
    {
        return $this->_total_experience;
    }

    /**
     * @param mixed $total_experience
     */
    public function setTotalExperience($total_experience): void
    {
        $this->_total_experience = $total_experience;
    }



    /**
     * @return mixed
     */
    public function getTrainingTime()
    {
        return $this->_training_time;
    }

    /**
     * @param mixed $training_time
     */
    public function setTrainingTime($name, $value): void
    {
        var_dump('setTrainingTime');
        global $conn;
        $username = $_SESSION['username'];

        // Preparing the SQL query
        $query = $conn->prepare(
             "UPDATE `character`
                        LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                        SET `$name` = DATE_ADD(NOW(), INTERVAL $value minute)
                        WHERE `user`.`username` = '$username'");

        // Executing the query
        $query->execute();
    }



    /**
     * @return mixed
     */
    public function getExperiencePerTraining()
    {
        return $this->_experience_per_training;
    }

    /**
     * @param mixed $experience_per_training
     */
    public function setExperiencePerTraining($experience_per_training): void
    {
        $this->_experience_per_training = $experience_per_training;
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
     * This private method allows the character stats to be modified
     * @param $name //represents the name of the stats being modified
     * @param int $value // by how much the stats will be modified (taken from the variable $_unused_statspoint)
     */
    private function updateStat($name, $value){
        if ($this->_unused_statspoint >= $value)
        {
            global $conn;
            $username = $_SESSION['username'];
            // Preparing the SQL query
            $query = $conn->prepare(
                "UPDATE `character`
                            LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                            SET `$name` = `$name` + $value ,`unused_statspoint` = `unused_statspoint` - $value
                            WHERE `user`.`username` = '$username'");

            // Executing the query
            $query->execute();
            // test si requete execute normalement et si oui maj données
            $this->{'_' . $name} += $value;
            $this->_unused_statspoint -= $value;
        }
    }
}
