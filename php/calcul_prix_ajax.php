<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cout = 0;
    $nbr_personnes = isset($_POST['nbr_personnes']) ? intval($_POST['nbr_personnes']) : 1;
    $nbr_jours = isset($_POST['duree_sejour']) ? intval($_POST['duree_sejour']) : 1;
    $logement = $_POST['logement'] ?? '';
    $pension = $_POST['pension'] ?? '';
    $ville = $_POST['ville'] ?? '';

    $prixData = json_decode(file_get_contents("../json/prix.json"), true);
    $prix_logement = $prixData['prix_logement'] ?? [];
    $prix_pension = $prixData['prix_pension'] ?? [];
    $prix_ville = $prixData['prix_ville'] ?? [];

    if ($logement == "Hotel") { 
        $cout += $prix_logement["Hotel"] ?? 0;
    } elseif ($logement == "Hotel++") { 
        $cout += $prix_logement["Hotel++"] ?? 0;
    } elseif ($logement == "Auberge") {
        $cout += $prix_logement["Auberge"] ?? 0;
    } else {
        $cout += $prix_logement["Airbnb"] ?? 0;
    }

    if ($pension == "Demi pension") {
        $cout += $prix_pension["Demi pension"] ?? 0;
    } elseif ($pension == "Sans pension") {
        $cout += $prix_pension["Sans pension"] ?? 0;
    } else {
        $cout += $prix_pension["Pension complète"] ?? 0;
    }

    $cout *= $nbr_jours;

    if ($ville == "Mont Blanc" || $ville == "Pic du Midi de Bigorre" || $ville == "Puy de Dôme") {
        $cout += $prix_ville["Mont Blanc"] ?? 0;
    } elseif ($ville == "Dolomites" || $ville == "Monte Rosa" || $ville == "Mont Etna") {
        $cout += $prix_ville["Dolomites"] ?? 0;
    } else {
        $cout += $prix_ville["default"] ?? 0;
    }

    $cout *= $nbr_personnes;

    echo json_encode(['cout' => $cout]);
    exit;
}
http_response_code(400);
echo json_encode(['cout' => 0]);
exit;
?>