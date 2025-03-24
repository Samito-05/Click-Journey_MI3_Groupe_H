<?php

session_start();

$fichier = "../json/comptes.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = filter_input(INPUT_POST, 'nom');
    $nv_statut = filter_input(INPUT_POST, 'Statut');

    if (file_exists($fichier) && is_readable($fichier)) {
        
        $jsonData = file_get_contents($fichier);
        $users = json_decode($jsonData, true);

        if ($users === null) {
            die("Erreur : Format JSON invalide.");
        }

        
        foreach ($users as &$user) {
            if ($user['nom'] === $nom) {
                $user['statut'] = $nv_statut;
                break;
            }
        }

        file_put_contents($fichier, json_encode($users, JSON_PRETTY_PRINT));
    } else {
        die("Erreur : Impossible de lire le fichier JSON.");
    }
}

header("Location: ../pages/admin.php");
exit();

?>