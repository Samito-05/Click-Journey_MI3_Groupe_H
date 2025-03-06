<?php
session_start();

$email = trim($_POST['email']);
$mdp = trim($_POST['mdp_connexion']);
$fichier = "../comptes.txt";

if (file_exists($fichier) && is_readable($fichier)) {
    $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lignes as $ligne) {
        $infos = explode(" ; ", $ligne);
        
        if (count($infos) >= 7) {
            list($nom, $prenom, $naissance, $adresse, $num, $utilisateur, $mdp_hash) = $infos;

            if ($utilisateur === $email && password_verify($mdp, $mdp_hash)) {
                $_SESSION['email'] = $email;
                echo "Connexion réussie";
                header("location: ../index.php");
                exit();
            }
        }
    }
}

echo "Email ou mot de passe incorrect";
header("location: ../pages/connexion.php");
exit();
?>