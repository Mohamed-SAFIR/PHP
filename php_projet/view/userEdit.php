<?php
    require_once('../controller/BDD.php');
    require_once('entetAdmin.php');

    $user = $_GET['id'];

     $infoUser= new DBAccess();
     $database=$infoUser->dbConnection();
     $result = $infoUser->Affichercircuitt($database,$user);

    foreach($result as $dataUtilisateur){


   

?>

<div class="container">
    <h1>Modification du circuit <?php echo $dataUtilisateur['parcours']; ?></h1>
    <form method="POST" action="../controller/userModifie.php?id=<?php echo $user; ?>">
        <div class="mb-3 row">
            <label for="parcours" class="col-sm-2 col-form-label">Parcours : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="parcours" name="parcours" value="<?php echo $dataUtilisateur['parcours']; ?>" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="description" class="col-sm-2 col-form-label">Description : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $dataUtilisateur['description']; ?>" required>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="Durée" class="col-sm-2 col-form-label">Durée :  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Durée" name="Durée" value="<?php echo $dataUtilisateur['Durée']; ?>" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success validation">Submit</button>
    </form>


    <?php
    }
?>


<?php require_once("footer.php") ?>