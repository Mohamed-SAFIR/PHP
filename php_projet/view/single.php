<?php
    require_once('../controller/BDD.php');
    require_once('enteteCir.php');
    $user = $_GET['id'];

    $infoUser= new DBAccess();
    $database=$infoUser->dbConnection();
    $circuit=$infoUser->afficherCircuit($database,$user);

    foreach($circuit as $dataCircuit){
?>

<div class="container">
        <div class="text-center">
            <h3><?php echo $dataCircuit['parcours'] ?> </h3>
        </div>
        <div>
            
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                <img src="<?php echo $dataCircuit['photo'] ?>" alt="<?php echo $dataCircuit['parcours'] ?>" width="800" height="500">                </div>
                <div class="col-sm">
                <h5><?php echo $dataCircuit['description'] ?></h5>
            </div>
            </div>
        </div>

        <div>
           <button class="btn"><a href="../controller/cibleReserv.php?circuit=<?php echo $user ?>&id=6"  class="btn btn-primary">Réserver</a></button>
       </div>
</div>



<?php
    }
?>


<?php require_once("footer.php") ?>