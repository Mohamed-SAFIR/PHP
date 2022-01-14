<?php
    session_start();
    require_once("head.php") 
?>


<?php if (!empty($_SESSION['erreurs']) ){?>
    <div class="alert alert-danger">
        <p>Le mail ou le mot de passe est incorrect.</p>
        <p>Veuillez réessayer.</p>
        <ul>  
              <?php foreach($_SESSION['erreurs'] as $error){
                  ?>
                  <li><?= $error; ?></li>
              <?php
              } ?>
          </ul>
    </div>
<?php }?>
<?php session_destroy(); ?>



<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
            </div>
            <form method="POST" action="../controller/cibleConnexion.php">
                <div class="modal-body">

                    <div class="mb-3 row">
                        <label for="mail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="mail" name="mail" required><br>
                        </div>
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" required><br>
                        </div>
                        <button type="submit" class="btn btn-success validation">Connexion</button>
                    </div>
                    
                </div>
                
            </form>
            <div>
                <a href="inscription.php">Vous n'avez pas de compte ? </a>
            </div>
        </div>
    </div>



    <?php require_once("footer.php") ?>