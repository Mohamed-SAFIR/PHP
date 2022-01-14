<?php 
    session_start();
    require("enteteCon.php");
?>



<?php
    require_once('../controller/BDD.php');
    $infoUser= new DBAccess();
    $database=$infoUser->dbConnection();
    $parcours=$infoUser->afficherCircuits($database)

?>



<div class="container">

<h1>Tous les parcours</h1>


<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Parcours</th>
                <th scope="col-3">Description</th>
                <th scope="col">Durée</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
       
            <?php foreach ($parcours as $ligneParcours) : 
                ?>
                <tr>
                    <?php foreach($ligneParcours as $dataParcours) :?>
                    <td><?php echo $dataParcours; ?></td>
                    <?php endforeach; ?>
                    <td><a href="single.php?id=<?php echo $ligneParcours['id'];?>"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
  <path d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
</svg></a></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once("footer.php") ?>