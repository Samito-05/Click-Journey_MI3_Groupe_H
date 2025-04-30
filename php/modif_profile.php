<?php
session_start();

$fichier = "../json/comptes.json";
$email = $_SESSION['email'];

$nv_nom = isset($_POST['nom']) ? trim($_POST['nom']) : "";
$nv_prenom = isset($_POST['prenom']) ? trim($_POST['prenom']) : "";
$nv_naissance = isset($_POST['naissance']) ? $_POST['naissance'] : "";
$nv_adresse = isset($_POST['adresse']) ? trim($_POST['adresse']) : "";
$nv_mail = isset($_POST['mail']) ? trim($_POST['mail']) : "";
$nv_num = isset($_POST['num']) ? trim($_POST['num']) : "";
$nv_mdp = isset($_POST['mdp1']) ? trim($_POST['mdp1']) : "";
$nv_mdp_confirm = isset($_POST['mdp2']) ? trim($_POST['mdp2']) : "";

if (file_exists($fichier) && is_readable($fichier)) {
    $utilisateurs = json_decode(file_get_contents($fichier), true);

    foreach ($utilisateurs as &$utilisateur) {
        if ($utilisateur['email'] === $email) {
            if ($nv_nom !== "") $utilisateur['nom'] = $nv_nom;
            if ($nv_prenom !== "") $utilisateur['prenom'] = $nv_prenom;
            if ($nv_naissance !== "") $utilisateur['naissance'] = $nv_naissance;
            if ($nv_adresse !== "") $utilisateur['adresse'] = $nv_adresse;
            if ($nv_mail !== "") $utilisateur['email'] = $nv_mail;
            if ($nv_num !== "") $utilisateur['num'] = $nv_num;
            if ($nv_mdp !== "" && $nv_mdp === $nv_mdp_confirm) {
                $utilisateur['mdp_hash'] = password_hash($nv_mdp, PASSWORD_DEFAULT);
            }

            $_SESSION['email'] = $utilisateur['email'];
            break;
        }
    }

    file_put_contents($fichier, json_encode($utilisateurs, JSON_PRETTY_PRINT));
}

header("location: ../pages/profile.php");
exit();
?>