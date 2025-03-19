<?php
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $naissance = $_POST['naissance'];
    $adresse = trim($_POST['adresse']);
    $numero = trim($_POST['numero']);
    $email = trim($_POST['email']);
    $mdp = trim($_POST['mdp_inscription']);
    $mdp_confirm = trim($_POST['mdp_confirm_inscription']);
    $statut = "client";
    $file = fopen("../comptes.txt", "a+");

    if (file_exists("../comptes.txt")){
        while (!feof($file)){
            $ligne = trim(fgets($file));
            if (empty($ligne)) continue;
            
            $infos = explode(" ; ", $ligne);
            
            if (count($infos) >= 6 && $infos[5] === $email){
                echo "Email déjà utilisé";
                fclose($file);
                exit();
            }
        }
    }

    if ($mdp !== $mdp_confirm) {       
        echo "Les mots de passe ne correspondent pas";
        fclose($file);
        exit();
    } else {
        $mdp_cache = password_hash($mdp, PASSWORD_DEFAULT);
        fwrite($file, "$nom ; $prenom ; $naissance ; $adresse ; $numero ; $email ; $mdp_cache ; $statut \n");

        fclose($file);
    }
    
    header("location: ../pages/Connexion.php");
    exit();
?>