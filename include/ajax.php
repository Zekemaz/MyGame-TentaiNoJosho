<?php
if (isset($_POST['action'])){

    switch ($_POST['action']){
        case 'updateStrength':

            session_start();

            require_once('../include/function.php');
            $conn = dbConnection();
            require_once('../include/class/Character.php');
            $Character = new Character;

            $username = $_SESSION['username'];
            $Character->fetchStats();

            //    exec methode
            $Character->updateStrength();
            //    return this strength et nombre de point restant
            echo json_encode(['strength'=> $Character->getStrength(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
        case 'updateIntelligence':

            session_start();

            require_once('../include/function.php');
            $conn = dbConnection();
            require_once('../include/class/Character.php');
            $Character = new Character;

            $username = $_SESSION['username'];
            $Character->fetchStats();

            //    exec methode
            $Character->updateIntelligence();

            //    return this intel et nombre de point restant
            echo json_encode(['intelligence'=> $Character->getIntelligence(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
        case 'updateAgility':

            session_start();

            require_once('../include/function.php');
            $conn = dbConnection();
            require_once('../include/class/Character.php');
            $Character = new Character;

            $username = $_SESSION['username'];
            $Character->fetchStats();

            //    exec methode
            $Character->updateAgility();

            //    return this agility et nombre de point restant
            echo json_encode(['agility'=> $Character->getAgility(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
        case 'updateLuck':

            session_start();

            require_once('../include/function.php');
            $conn = dbConnection();
            require_once('../include/class/Character.php');
            $Character = new Character;

            $username = $_SESSION['username'];
            $Character->fetchStats();

            //    exec methode
            $Character->updateLuck();

            //    return this luck et nombre de point restant
            echo json_encode(['luck'=> $Character->getLuck(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
        default:
            die('Hacking is not nice');
            break;

    }
}
