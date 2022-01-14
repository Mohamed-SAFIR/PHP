<?php
    require_once('BDD.php');
    session_start();


    $infoUser= new DBAccess();
    $database=$infoUser->dbConnection();
    $infoUser->addCircuit($database, $_POST['parcours'], $_POST['description'], $_POST['Durée'], $_POST['photo']);
    header('location: ../view/circuits.php');





?>