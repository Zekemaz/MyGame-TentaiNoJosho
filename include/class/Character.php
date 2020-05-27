<?php
global $conn;
class User
{
    protected $_id_user;
    protected $_lastname;
    protected $_firstname;
    protected $_username;
    protected $_date_of_birth;
    protected $_email;
    protected $_password;
    protected $_last_activity;
    protected $_subscription_date;

    public function __construct(/*$_id_user, $_lastname, $_firstname, */$_username/*, $_date_of_birth, $_email
    , $_password, $_last_activity, $_subscription_date*/)
    {
//        $this->_id = $_id_user;
//        $this->_lastname = $_lastname;
//        $this->_firstname = $_firstname;
        $this->_username = $_username;
//        $this->_date_of_birth = $_date_of_birth;
//        $this->_email = $_email;
//        $this->_password = $_password;
//        $this->_last_activity = $_last_activity;
//        $this->_subscription_date = $_subscription_date;
    }

    protected function getData()
    {
        global $conn;
        $username = $_SESSION['username'];

        // Preparing the SQL query
        $query = $conn->prepare(
            "SELECT `ID_user`, `lastname`, `firstname`, `username`, `date_of_birth`, 
                        `email`, `password`, `last_activity`, `subscription_date` 
                        FROM `user` WHERE username = '$username'");

// Executing the query
        $query->execute();
        while ($row = $query->fetch()) {
            $this->_id_user = $row['ID_user'];
            $this->_lastname = $row['lastname'];
            $this->_firstname = $row['firstname'];
            $this->_username = $row['username'];
            $this->_date_of_birth = $row['date_of_birth'];
            $this->_email = $row['email'];
            $this->_password = $row['password'];
            $this->_last_activity = $row['last_activity'];
            $this->_subscription_date = $row['subscription_date'];
        }
    }

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->_id_user;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->_lastname;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->_date_of_birth;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @return mixed
     */
    public function getLastActivity()
    {
        return $this->_last_activity;
    }

    /**
     * @return mixed
     */
    public function getSubscriptionDate()
    {
        return $this->_subscription_date;
    }


}




class Character extends User
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
//        $username = $_SESSION['username'];
        // Preparing the SQL query
        $query = $conn->prepare(
            " SELECT pseudo, level, strength, intelligence, agility, luck,
                        wisdom, unused_statspoint, experience, money
                FROM `character`
                LEFT JOIN user ON `character`.`ID_user` = `user`.`ID_user`
                WHERE user.username = '$this->_username'");
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
            // Preparing the SQL query
            $query = $conn->prepare(
                "UPDATE `character`
                            LEFT JOIN `user` on `character`.ID_user = `user`.ID_user
                            SET `$name` = `$name` + $val ,`unused_statspoint` = `unused_statspoint` - $val
                            WHERE `user`.`username` = '$this->_username'");

            // Executing the query
            $query->execute();
            // test si requete execute normalement et si oui maj données
            $this->{'_' . $name} += $val;
            $this->_unused_statspoint -= $val;
        }
    }
}
