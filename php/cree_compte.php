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
$fichier = "../../json/comptes.json";

if (file_exists($fichier)) {
    $utilisateurs = json_decode(file_get_contents($fichier), true);

    foreach ($utilisateurs as $utilisateur) {
        if ($utilisateur['email'] === $email) {
            echo "Email déjà utilisé";
            exit();
        }
    }

    if ($mdp !== $mdp_confirm) {
        echo "Les mots de passe ne correspondent pas";
        exit();
    } else {
        $nouvel_utilisateur = [
            "nom" => $nom,
            "prenom" => $prenom,
            "naissance" => $naissance,
            "adresse" => $adresse,
            "num" => $numero,
            "email" => $email,
            "mdp_hash" => password_hash($mdp, PASSWORD_DEFAULT),
            "statut" => $statut
        ];

        $utilisateurs[] = $nouvel_utilisateur;
        file_put_contents($fichier, json_encode($utilisateurs, JSON_PRETTY_PRINT));
    }
}

header("location: ../pages/Connexion.php");
exit();
?>