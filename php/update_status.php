<?php

session_start();

$fichier = "../json/comptes.json";

sleep(3);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = filter_input(INPUT_POST, 'nom');
    $nv_statut = filter_input(INPUT_POST, 'Statut');

    if (file_exists($fichier) && is_readable($fichier)) {
        $jsonData = file_get_contents($fichier);
        $users = json_decode($jsonData, true);

        if ($users === null) {
            echo json_encode(['success' => false, 'message' => 'Format JSON invalide.']);
            exit;
        }

        $found = false;
        foreach ($users as &$user) {
            if ($user['nom'] === $nom) {
                $user['statut'] = $nv_statut;
                $found = true;
                break;
            }
        }

        if ($found) {
            file_put_contents($fichier, json_encode($users, JSON_PRETTY_PRINT));
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Utilisateur non trouvé.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Impossible de lire le fichier JSON.']);
    }
    exit;
}
echo json_encode(['success' => false, 'message' => 'Requête invalide.']);
exit;
?>