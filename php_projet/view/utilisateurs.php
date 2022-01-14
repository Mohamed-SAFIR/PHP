<?php
    require_once('../controller/BDD.php');
    require_once('entetAdmin.php');
    $infoUser= new DBAccess();
    $database=$infoUser->dbConnection();
    $parcours=$infoUser->afficherUsers($database)

?>


<div class="container">

<h1>Tous les utilisateurs</h1>


<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col-3">E-Mail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
       
            <?php foreach ($parcours as $ligneParcours) : 
                ?>
                <tr>
                    <td><?php echo $ligneParcours['nom']; ?></td>
                    <td><?php echo $ligneParcours['mail']; ?></td>
                    <td><a href="../controller/removeCible.php?id=<?php echo $ligneParcours['id'];?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
</svg></a></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-primary validation" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter
    </button>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajout d'un utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="../controller/cibleInscription.php">
                <div class="modal-body">

                    <div class="mb-3 row">
                        <label for="nom" class="col-sm-2 col-form-label">Nom </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="mail" class="col-sm-2 col-form-label">Email </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="mail" name="mail" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="motPasse" class="col-sm-2 col-form-label">Password </label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="motPasse" name="emmotPasseail" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success validation">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>



<?php require_once("footer.php") ?>