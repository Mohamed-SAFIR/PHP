<?php require_once("head.php") ?>


<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
            </div>
            <form method="POST" action="../controller/cibleInscription.php">
                <div class="modal-body">

                    <div class="mb-3 row">
                        <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nom" name="nom" required><br>
                        </div>
                        <label for="mail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="mail" name="mail" required><br>
                        </div>
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" required><br>
                        </div>
                        <button type="submit" class="btn btn-success validation">Inscription</button>
                    </div>
                    
                </div>
                
            </form>
            <div>
                <a href="connexion.php">Vous avez déjà un compte ? </a>
            </div>
        </div>
    </div>


    <?php require_once("footer.php") ?>