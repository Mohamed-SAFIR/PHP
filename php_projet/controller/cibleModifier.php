<?php
    require_once('BDD.php');
    session_start();

    $user = $_GET['id'];

    $infoUser= new DBAccess();
    $database=$infoUser->dbConnection();
    $infoUser->updateUser($database, $user, $_POST['nom'], $_POST['mail'], $_POST['motPasse']);
    header('location:../view/main.php');





?>