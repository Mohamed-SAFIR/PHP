<?php
    require_once('BDD.php');
    session_start();

    $user = $_GET['id'];

    $infoUser= new DBAccess();
    $database=$infoUser->dbConnection();
    $infoUser->updateCircuit($database, $user, $_POST['parcours'], $_POST['description'], $_POST['Durée']);
    header('location:../view/circuits.php');





?>