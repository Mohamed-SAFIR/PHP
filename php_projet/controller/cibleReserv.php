<?php
    require_once('BDD.php');
    session_start();

    $circuit = $_GET['circuit'];
    $user = $_GET['id'];


    $infoCircuit= new DBAccess();
    $database=$infoCircuit->dbConnection();
    $infoCircuit->updateCircuitReserve($database,$circuit,$user);
    header('Location:../view/main.php');

