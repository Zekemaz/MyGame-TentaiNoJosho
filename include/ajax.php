<?php

function getCurrentuser(){
    global $conn;
    session_start();

    require_once('../include/function.php');
    $conn = dbConnection();
    require_once('../include/class/Character.php');
    $Character = new Character;
    $username = $_SESSION['username'];

    $Character->fetchStats();

    return $Character;
}
if (isset($_POST['action'])){

    switch ($_POST['action']){
        case 'updateStrength':


            $Character = getCurrentuser();

            //    exec methode
            $Character->updateStrength();
            //    return this strength et nombre de point restant
            echo json_encode(['strength'=> $Character->getStrength(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
        case 'updateIntelligence':

            $Character = getCurrentuser();

            //    exec methode
            $Character->updateIntelligence();

            //    return this intel et nombre de point restant
            echo json_encode(['intelligence'=> $Character->getIntelligence(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
        case 'updateAgility':

            $Character = getCurrentuser();

            //    exec methode
            $Character->updateAgility();

            //    return this agility et nombre de point restant
            echo json_encode(['agility'=> $Character->getAgility(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
        case 'updateLuck':

            $Character = getCurrentuser();
            //    exec methode
            $Character->updateLuck();

            //    return this luck et nombre de point restant
            echo json_encode(['luck'=> $Character->getLuck(),'unused_statspoint'=> $Character->getUnusedStatspoint()]);
            break;
        case 'training':

            $Character = getCurrentuser();

            echo json_encode(['timeLeft'=> $Character->training()]);
            break;
        default:
            die('Hacking is not nice');
            break;

    }
}
