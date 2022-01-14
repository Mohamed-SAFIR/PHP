<?php
    require_once('../controller/BDD.php');
    require_once('enteteCir.php');

    $user = $_GET['id'];

     $infoUser= new DBAccess();
     $database=$infoUser->dbConnection();
     $result = $infoUser->afficherUser($database,$user);

    foreach($result as $dataUtilisateur){


    

?>

<div class="container">
    <h1>Modification de l'utilisateur <?php echo $dataUtilisateur['nom']; ?></h1>
    <form method="POST" action="../controller/cibleModifier.php?id=<?php echo $user; ?>">
        <div class="mb-3 row">
            <label for="nom" class="col-sm-2 col-form-label">Nom : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $dataUtilisateur['nom']; ?>" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="mail" class="col-sm-2 col-form-label">E-Mail : </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $dataUtilisateur['mail']; ?>" required>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="motPasse" class="col-sm-2 col-form-label">Nouveau mot de passe : </label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="motPasse" name="motPasse"  required>
            </div>
        </div>
        <button type="submit" class="btn btn-success validation">Submit</button>
    </form>
    <?php
    }
?>
    <br><br><br><br><br>

<?php
     $infoUser= new DBAccess();
     $database=$infoUser->dbConnection();
     $result = $infoUser->afficherCircuitsReserves($database,$user);



?>


    <h1>Parcours réservés</h1>
    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Parcours</th>
                    <th scope="col-3">Description</th>
                    <th scope="col">Durée</th>
                </tr>
            </thead>
            <tbody>
        
                <?php foreach ($result as $ligneParcours) : 
                    ?>
                    <tr>
                        <?php foreach($ligneParcours as $dataParcours) :?>
                        <td><?php echo $dataParcours; ?></td>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>













<?php require_once("footer.php") ?>