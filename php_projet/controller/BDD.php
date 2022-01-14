<?php
// connexion avec mysqli 
class DBAccess{

    public static function dbConnection(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "php_projet";

    // création de la connexion avec la classe mysqli
    $mysqli = new mysqli($servername, $username, $password, $dbName);

    // vérification connection
        if ($mysqli->connect_error) {
            die("Echec de la connection: " . $mysqli->connect_error);
        }
        return $mysqli;
    }
    //récupération des utilisateurs en BDD
    public static function afficherCircuits($mysqli){
        $sql = "SELECT * FROM circuit";
        return $mysqli->query($sql);
    }

    //récupération d'un utilisateur en BDD
    public static function afficherCircuit($mysqli, $id){
        //requete non préparé Attention Dangereux => risque d'injection SQL
        $sql = "SELECT * FROM circuit INNER JOIN circuitDesc WHERE circuit.id = $id AND circuitDesc.id_circuit = $id";
        return $mysqli->query($sql);
    }

    public static function Affichercircuitt($mysqli, $id){
        $sql = "SELECT * FROM circuit WHERE id = $id";
        return $mysqli->query($sql);
    }


    //ajout d'un utilisateur en BDD
    public static function addUser($mysqli, $nom, $email, $password){
        // Ici requete préparé => permet d'éviter l'injection sql
        // ici je ne mets pas d'ajout id car il est auto-incrémenté en base de données
        $stmt = mysqli_prepare($mysqli, "INSERT INTO `user` (nom, mail, motPasse) VALUES (?, ?, ?)");
        //on aurait pu créer une classe user, si c'est le cas, on aurait pas utilisé la fonction
        //mysqli_stmt_bind_param() mais plutôt $stmt->bind_param()
        // 'ssis' signifie : string string integer string 
        mysqli_stmt_bind_param($stmt, 'ssis', $nomIncrement, $emailIncrement, $moPasseIncrement);
        $nomIncrement = $nom;
        $emailIncrement = $email;
        $moPasseIncrement = $password;
        // la fonction ne retourne rien car son objectif est juste d'envoyer en bdd
        $stmt->execute();
        // Fermeture de la connexion
        $mysqli->close();
        // header('location') pour renvoyer sur la page que l'on souhaite
    }


    public static function afficherUsers($mysqli){
        $sql = "SELECT * FROM user";
        return $mysqli->query($sql);
    }

    public static function afficherUser($mysqli, $id){
        $sql = "SELECT * FROM user WHERE id = $id";
        return $mysqli->query($sql);
    }



    function ajout(){   
        $infoUser= new DBAccess();
        $database=$infoUser->dbConnection();
        $infoUser->addUser($database, $_POST['nom'], $_POST['mail'], $_POST['password']);
        header('location:../index.php?page=accueil');
    }


    public static function updateUser($mysqli, $id, $nom, $email, $motPasse){
        $motCryp = md5($motPasse);
        $stmt = mysqli_prepare($mysqli,"UPDATE user SET nom = ?,  mail = ?, motPasse= ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 'sssi', $nomIncrement, $emailIncrement, $motPassIncrement, $idIncrement);
        $idIncrement=$id;
        $nomIncrement = $nom;
        $emailIncrement = $email;
        $motPassIncrement = $motCryp;
        $stmt->execute();
        $mysqli->close();
    }


    public static function updateCircuitReserve($mysqli, $circuit, $user){
        $stmt = mysqli_prepare($mysqli,"INSERT INTO `circuitReserve` (id_circuit, id_user) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, 'ii', $CircuitIncrement, $UserIncrement);
        $CircuitIncrement=$circuit;
        $UserIncrement = $user;
        $stmt->execute();
        $mysqli->close();
    }


    public static function afficherCircuitsReserves($mysqli,$id){
        $sql = "SELECT circuit.id,circuit.parcours,circuit.description, circuit.Durée FROM circuitReserve INNER JOIN circuit WHERE (circuitReserve.id_circuit=circuit.id AND circuitReserve.id_user=$id)";
        return $mysqli->query($sql);
    }

    public static function deleteUser($mysqli, $id){
        $stmt = mysqli_prepare($mysqli,"DELETE FROM `user` WHERE `id` = ?");
        mysqli_stmt_bind_param($stmt, 'i', $idIncrement);
        $idIncrement=$id;
        $stmt->execute();
        $mysqli->close();
    }

    public static function addCircuit($mysqli, $parcours, $description, $duree, $photo){
        $stmt = mysqli_prepare($mysqli,"INSERT INTO `circuit` (parcours, description, Durée) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $ParcoursIncrement, $DescriptionIncrement, $DureeIncrement);
        $ParcoursIncrement = $parcours;
        $DescriptionIncrement = $description;
        $DureeIncrement = $duree;
        $stmt->execute();
        $mysqli->close();
    }


    public static function updateCircuit($mysqli, $id, $parcours, $description, $duree){
        $stmt = mysqli_prepare($mysqli,"UPDATE circuit SET parcours = ?,  description = ?, Durée= ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, 'sssi', $parcoursIncrement, $descriptionIncrement, $dureeIncrement, $idIncrement);
        $idIncrement=$id;
        $parcoursIncrement = $parcours;
        $descriptionIncrement = $description;
        $dureeIncrement = $duree;
        $stmt->execute();
        $mysqli->close();
    }

    public static function deleteCircuit($mysqli, $id){
        $stmt = mysqli_prepare($mysqli,"DELETE FROM `circuit` WHERE `id` = ?");
        mysqli_stmt_bind_param($stmt, 'i', $idIncrement);
        $idIncrement=$id;
        $stmt->execute();
        $mysqli->close();
    }


}

?>