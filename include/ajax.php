<?php
if (isset($_POST['action'])){

    switch ($_POST['action']){
        case 'updateStrength':

            session_start();

            require_once('../include/function.php');
            $conn = dbConnection();
            require_once('../include/class/Character.php');
            $Character = new Character();

            $username = $_SESSION['username'];
            $Character->fetchStats();

            //    exec methode
            $Character->upStrength();
            var_dump('ajax console log');

            //    return this strength et nombre de point restant
            echo json_encode(['strength'=> $Character->getStrength(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
//        case 'updateIntelligence':
//
//            session_start();
//
//            require_once('../include/function.php');
//            $conn = dbConnection();
//            require_once('../include/class/Character.php');
//            $Character = new Character;
//
//            $username = $_SESSION['username'];
//            $Character->fetchStats();
//
//            //    exec methode
//            $Character->upIntelligence();
//
//            //    return this strength et nombre de point restant
//            echo json_encode(['intelligence'=> $Character->getIntelligence(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
//            break;
//        case 'updateAgility':
//
//            session_start();
//
//            require_once('../include/function.php');
//            $conn = dbConnection();
//            require_once('../include/class/Character.php');
//            $Character = new Character;
//
//            $username = $_SESSION['username'];
//            $Character->fetchStats();
//
//            //    exec methode
//            $Character->upAgility();
//
//            //    return this strength et nombre de point restant
//            echo json_encode(['agility'=> $Character->getAgility(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
//            break;
//        case 'updateLuck':
//
//            session_start();
//
//            require_once('../include/function.php');
//            $conn = dbConnection();
//            require_once('../include/class/Character.php');
//            $Character = new Character;
//
//            $username = $_SESSION['username'];
//            $Character->fetchStats();
//
//            //    exec methode
//            $Character->upLuck();
//
//            //    return this strength et nombre de point restant
//            echo json_encode(['luck'=> $Character->getLuck(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
//            break;
        default:
            die('Hacking is not nice');
            break;

    }
}
