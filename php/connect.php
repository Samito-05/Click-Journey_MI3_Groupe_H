<?php
session_start();

$email = trim($_POST['email']);
$mdp = trim($_POST['mdp_connexion']);
$fichier = "../json/comptes.json";

if (file_exists($fichier) && is_readable($fichier)) {
    $utilisateurs = json_decode(file_get_contents($fichier), true);

    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['email'] === $email) {
            if ($utilisateur['statut'] === 'BanDef') {
                $message="Votre compte est banni définitivement.";
                header("location: ../pages/connexion.php?error=$message");
                exit();
            }

            if (password_verify($mdp, $utilisateur['mdp_hash'])) {
                $_SESSION['email'] = $email;
                $_SESSION['statut'] = $utilisateur['statut'];
                echo "Connexion réussie";
                header("location: ../index.php");
                exit();
            }
        }
    }
}

$message="Email ou mot de passe incorrect";
header("location: ../pages/connexion.php?error=$message");
exit();
?>