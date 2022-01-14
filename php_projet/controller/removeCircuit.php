<?php
    require_once('BDD.php');
    session_start();

    $user = $_GET['id'];

    $infoUser= new DBAccess();
    $database=$infoUser->dbConnection();
    $infoUser->deleteCircuit($database, $user);
    header('location:../view/circuits.php');





?>