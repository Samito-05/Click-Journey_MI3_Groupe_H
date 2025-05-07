<?php
session_start();
require('../php/getapikey.php');

$status = $_GET["status"] ?? null;
$montant = $_GET["montant"] ?? null;
$transaction = $_GET["transaction"] ?? null;
$vendeur = $_GET["vendeur"] ?? null;
$control = $_GET["control"] ?? null;

if (!$status || !$montant || !$transaction || !$vendeur || !$control) {
    die("Paramètres manquants.");
}

$verif = md5(getAPIKey($vendeur) . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $status . "#");

if ($verif !== $control) {
    die("Erreur de vérification.");
}

$sejoursFile = "../json/sejours.json";
$sejoursData = json_decode(file_get_contents($sejoursFile), true);
if (!is_array($sejoursData)) die("Erreur JSON");

foreach ($sejoursData as &$sejour) {
    if ($sejour["transaction_id"] === $transaction) {
        $sejour["statut"] = $status === "accepted" ? "Payé" : "Échec";
    }
}
unset($sejour);

file_put_contents($sejoursFile, json_encode($sejoursData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// Vider le panier
unset($_SESSION['panier']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation Paiement Panier</title>
    <link rel="stylesheet" href="../style.css">
    <link id="theme-link" rel="stylesheet" href="../clair.css">
</head>
<body>
<?php require('../php/header.php'); ?>
<main>
    <fieldset class="field_confirm">
        <legend class="legend_profile">Confirmation de Paiement</legend>
        <h2 class="confirm_voyage">
            Paiement <?= $status === "accepted" ? "réussi" : "échoué" ?>
        </h2>
        <p class="confirm_voyage"><strong>Montant total :</strong> <?= htmlspecialchars($montant) ?> €</p>
        <p class="confirm_voyage"><strong>Référence :</strong> <?= htmlspecialchars($transaction) ?></p>
        <form action="../index.php">
            <input class="boutton_retour" type="submit" value="Retour à l'accueil">
        </form>
    </fieldset>
</main>
<?php require('../php/footer.php'); ?>
<script src="../javascript/theme.js" defer></script>
</body>
</html>
