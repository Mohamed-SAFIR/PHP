<?php

    session_start();
    $errors = array(); 


    if(!email_verification($_POST['mail']))
    {
        echo "Cet e-mail est déja utilisé pour un autre compte";
        header("Location: ../view/inscription.php");
    }
    else{
        $bdd = new PDO('mysql:host=localhost;dbname=php_projet', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $passwCrypt = md5($_POST['password']); // fonction pour hacher (crypter) le mot de passe.
        
        try
        {
            $commande = $bdd->prepare('INSERT INTO user(nom,mail,motPasse) VALUES(:nom,:mail,:motPasse)');
            $commande->bindParam(':nom',$_POST['nom']);
            $commande->bindParam(':mail',$_POST['mail']);
            $commande->bindParam(':motPasse',$passwCrypt);
            $commande->execute();
            header("Location: ../view/connexion.php");
        }
        catch (PDOException $e) {
            echo ("Echec de Insertion :".$e->getMessage() . "\n");
            die();
        }
    }


    function email_verification($mail){
        $bdd = new PDO('mysql:host=localhost;dbname=php_projet', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $sql="SELECT * FROM user WHERE mail=:mail";
        try
        {
            $requete = $bdd->prepare($sql);
            $requete->bindParam(':mail',$mail);
            $requete->execute();
            $resultat = $requete->fetch();
        }
        catch (PDOException $e)
        {
            echo ("Echec d'insertion :". $e->getMessage()."\n");
            die();
        }
        return empty($resultat);
    }



?>