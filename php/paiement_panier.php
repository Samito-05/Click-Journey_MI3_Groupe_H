<?php
session_start();
require('getapikey.php');

if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
    header("Location: ../pages/panier.php");
    exit();
}

$panier = $_SESSION['panier'];
$utilisateur = $_SESSION['email'];
$vendeur = "MI-3_H";
$api_key = getAPIKey($vendeur);

// Calculer le montant total
$montant_total = 0;
foreach ($panier as $voyage) {
    $montant_total += $voyage['cout'];
}

// Générer un ID de transaction global pour le panier
function generateTransactionID($length = 12) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $id = '';
    for ($i = 0; $i < $length; $i++) {
        $id .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $id;
}

$transaction_id = generateTransactionID();
$retour_url = "http://localhost/Click-Journey_MI3_Groupe_H/pages/confirmation_paiement_panier.php?session=" . session_id();

$control = md5($api_key . "#" . $transaction_id . "#" . $montant_total . "#" . $vendeur . "#" . $retour_url . "#");

// Enregistrer chaque voyage dans le fichier JSON avec le même ID de transaction
$sejoursFile = "../json/sejours.json";
$sejoursData = [];

if (file_exists($sejoursFile)) {
    $sejoursData = json_decode(file_get_contents($sejoursFile), true);
}

foreach ($panier as $voyage) {
    $sejoursData[] = [
        "utilisateur" => $utilisateur,
        "ville" => $voyage['ville'],
        "nbr_personnes" => $voyage['nbr_personnes'],
        "nbr_jours" => $voyage['duree_sejour'],
        "date_debut" => $voyage['date_depart'],
        "logement" => $voyage['logement'] ?? '',
        "pension" => $voyage['pension'] ?? '',
        "etapes" => $voyage['option'] ?? [],
        "cout" => $voyage['cout'],
        "statut" => "",
        "transaction_id" => $transaction_id,
    ];
}

file_put_contents($sejoursFile, json_encode($sejoursData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paiement du Panier</title>
    <link rel="stylesheet" href="../style.css">
    <link id="theme-link" rel="stylesheet" href="../clair.css">
</head>
<body>
    <?php require('header.php'); ?>
    <main>
        <h2 class="paiement">Redirection vers CY Bank...</h2>
        <form action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
            <input type="hidden" name="transaction" value="<?= $transaction_id ?>">
            <input type="hidden" name="montant" value="<?= $montant_total ?>">
            <input type="hidden" name="vendeur" value="<?= $vendeur ?>">
            <input type="hidden" name="retour" value="<?= $retour_url ?>">
            <input type="hidden" name="control" value="<?= $control ?>">
            <input class="button-paiement" type="submit" value="Payer tout le panier">
        </form>
    </main>
    <?php require('footer.php'); ?>
    <script src="../javascript/theme.js" defer></script>
</body>
</html>
