<?php
session_start();

$fichier = "../../json/comptes.json";
$email = $_SESSION['email'];

if (file_exists($fichier) && is_readable($fichier)) {
    $utilisateurs = json_decode(file_get_contents($fichier), true);

    $utilisateurs = array_filter($utilisateurs, function ($utilisateur) use ($email) {
        return $utilisateur['email'] !== $email;
    });

    file_put_contents($fichier, json_encode($utilisateurs, JSON_PRETTY_PRINT));
}

session_destroy();
header("Location: ../index.php");
exit();
?>