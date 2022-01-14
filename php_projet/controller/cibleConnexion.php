<?php
    session_start();
    $errors=array();
    $info=array();

    if(!empty($errors)){
        $_SESSION['erreurs'] = $errors;
        header("Location: ../view/connexion.php");
    }

    $bdd = new PDO('mysql:host=localhost;dbname=php_projet', 'root' , 'root' , array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    try
    {
        $commande = $bdd->prepare('SELECT * FROM user WHERE mail=:mail');
        $commande->bindParam(':mail',$_POST['mail']);
        $commande->execute();
        $resultat = $commande->fetch();
        if(empty($resultat))
        {
            $errors['emailIntrouvable']="E-mail introuvable. Veuillez saisir un autre e-mail.";
            $_SESSION['erreurs']=$errors;
            header("Location: ../view/connexion.php");
        }
        else
        {
            if( $resultat['motPasse'] == md5($_POST['password']))
            {
                $info['nom'] = $resultat['nom'];
                $info['mail'] = $resultat['mail'];
                $info['id'] = $resultat['id'];
                $info['motPasse'] = $resultat['motPasse'];
                $_SESSION['info'] = $info;
                if($resultat['motPasse'] == md5("admin"))
                {
                    header("Location: ../view/mainAdmin.php");
                }
                else
                {
                    header("Location: ../view/main.php");
                }
            }
            else
            {
                $errors['motDePasseIntrouvable']= "Mot de passe introuvable, Veuillez sisair un autre mot de passe.";
                    $_SESSION['erreurs'] = $errors;
                    header("Location: ../view/connexion.php");
            }
        }
    }
    catch (PDOException $e) 
    {
        echo ("Echec de Insertion :".$e->getMessage() . "\n");
        die();
    }


?>