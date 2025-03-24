<?php

session_start();

$fichier = "../../json/comptes.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = filter_input(INPUT_POST, 'nom');
    $nv_statut = filter_input(INPUT_POST, 'Statut');

    if (file_exists($fichier) && is_readable($fichier)) {
        // Lire le contenu du fichier JSON
        $jsonData = file_get_contents($fichier);
        $users = json_decode($jsonData, true);

        if ($users === null) {
            die("Erreur : Format JSON invalide.");
        }

        // Mettre à jour le statut de l'utilisateur
        foreach ($users as &$user) {
            if ($user['nom'] === $nom) {
                $user['statut'] = $nv_statut;
                break;
            }
        }

        // Sauvegarder les modifications dans le fichier JSON
        file_put_contents($fichier, json_encode($users, JSON_PRETTY_PRINT));
    } else {
        die("Erreur : Impossible de lire le fichier JSON.");
    }
}

// Rediriger vers la page admin
header("Location: ../pages/admin.php");
exit();

?>