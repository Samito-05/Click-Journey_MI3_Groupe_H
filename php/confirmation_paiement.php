<?php
session_start();
require('getapikey.php');

$status = $_GET["status"] ?? null;
$montant = $_GET["montant"] ?? null;
$transaction = $_GET["transaction"] ?? null;
$vendeur = $_GET["vendeur"] ?? null;
$control = $_GET["control"] ?? null;

if (!$status || !$montant || !$transaction || !$vendeur || !$control) {
    die("Paramètres manquants dans la requête.");
}

$control_verification = getapikey($vendeur) . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $status . "#";
$control_verification = md5($control_verification);

if ($control !== $control_verification) {
    die("Erreur de vérification du contrôle.");
}

$sejoursFile = "../json/sejours.json";

if (!file_exists($sejoursFile)) {
    die("Fichier des séjours introuvable.");
}

$sejoursData = json_decode(file_get_contents($sejoursFile), true);
if (!is_array($sejoursData)) {
    die("Erreur lors du chargement des données JSON.");
}

$sejourTrouve = null;
foreach ($sejoursData as &$sejour) {
    if ($sejour["transaction_id"] === $transaction) {
        $sejourTrouve = &$sejour;
        break;
    }
}

if ($sejourTrouve === null) {
    die("Aucun séjour trouvé pour cet ID de transaction.");
}

if ($status === "accepted") {
    $sejourTrouve["statut"] = "Payé";
} else {
    $sejourTrouve["statut"] = "Échec";
}

file_put_contents($sejoursFile, json_encode($sejoursData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation de Paiement</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<?php require('../php/header.php'); ?>
<main>
    <fieldset class="field_confirm">
        <legend class="legend_profile">Confirmation de Paiement</legend>
        <h2 class="confirm_voyage"><?php echo htmlspecialchars($sejourTrouve['ville']); ?></h2>
        <div class="confirm_voyage"><p><strong>Statut : </strong><?php echo htmlspecialchars($sejourTrouve['statut']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Montant : </strong><?php echo htmlspecialchars($montant); ?> €</p></div>
        <div class="confirm_voyage"><p><strong>Référence : </strong><?php echo htmlspecialchars($transaction); ?></p></div>
        <div class="confirm_voyage"><p><strong>Date de départ : </strong><?php echo htmlspecialchars($sejourTrouve['date_debut']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Durée : </strong><?php echo htmlspecialchars($sejourTrouve['nbr_jours']); ?> jours</p></div>
        <div class="confirm_voyage"><p><strong>Participants : </strong><?php echo htmlspecialchars($sejourTrouve['nbr_personnes']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Logement : </strong><?php echo htmlspecialchars($sejourTrouve['logement']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Pension : </strong><?php echo htmlspecialchars($sejourTrouve['pension']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Étapes : </strong></p></div>
        <div class="confirm_voyage">
            <ul class="confirm_voyage">
                <?php foreach ($sejourTrouve['etapes'] as $etape): ?>
                    <li><?php echo htmlspecialchars($etape); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <form action="../index.php">
            <input class="boutton_retour" type="submit" value="Retour à l'accueil">
    </fieldset>
</main>
<?php require('../php/footer.php'); ?>
</body>
</html>