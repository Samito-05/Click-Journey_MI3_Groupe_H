<?php
session_start();

$email = trim($_POST['email']);
$mdp = trim($_POST['mdp_connexion']);
$fichier = "../comptes.json";

if (file_exists($fichier) && is_readable($fichier)) {
    $utilisateurs = json_decode(file_get_contents($fichier), true);

    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['email'] === $email && password_verify($mdp, $utilisateur['mdp_hash'])) {
            $_SESSION['email'] = $email;
            $_SESSION['statut'] = $utilisateur['statut'];
            echo "Connexion réussie";
            header("location: ../index.php");
            exit();
        }
    }
}

echo "Email ou mot de passe incorrect";
header("location: ../pages/connexion.php");
exit();
?>