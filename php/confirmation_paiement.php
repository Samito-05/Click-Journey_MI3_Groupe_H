<?php
session_start();
require('getapikey.php');

// Récupération des paramètres GET
$status = $_GET["status"] ?? null;
$montant = $_GET["montant"] ?? null;
$transaction = $_GET["transaction"] ?? null;
$vendeur = $_GET["vendeur"] ?? null;
$control = $_GET["control"] ?? null;

// Vérification des paramètres obligatoires
if (!$status || !$montant || !$transaction || !$vendeur || !$control) {
    die("Paramètres manquants dans la requête.");
}

// Génération du contrôle attendu
$control_verification = getapikey($vendeur) . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $status . "#";
$control_verification = md5($control_verification);

// Vérification du contrôle
if ($control !== $control_verification) {
    die("Erreur de vérification du contrôle.");
}

// Chemin vers le fichier JSON
$sejoursFile = "../sejours.json";

// Vérifiez si le fichier existe
if (!file_exists($sejoursFile)) {
    die("Fichier des séjours introuvable.");
}

// Charger les données JSON
$sejoursData = json_decode(file_get_contents($sejoursFile), true);
if (!is_array($sejoursData)) {
    die("Erreur lors du chargement des données JSON.");
}

// Rechercher le séjour correspondant au transaction ID
$sejourTrouve = null;
foreach ($sejoursData as &$sejour) {
    if ($sejour["transaction_id"] === $transaction) {
        $sejourTrouve = &$sejour;
        break;
    }
}

// Si aucun séjour n'est trouvé
if ($sejourTrouve === null) {
    die("Aucun séjour trouvé pour cet ID de transaction.");
}

// Mettre à jour le statut du séjour en fonction du statut du paiement
if ($status === "accepted") {
    $sejourTrouve["statut"] = "Payé";
} else {
    $sejourTrouve["statut"] = "Échec";
}

// Sauvegarder les données mises à jour dans le fichier JSON
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
        <div class="confirm_voyage"><p><strong>Statut : </strong></p><p><?php echo htmlspecialchars($sejourTrouve['statut']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Montant : </strong></p><p><?php echo htmlspecialchars($montant); ?> €</p></div>
        <div class="confirm_voyage"><p><strong>Référence : </strong></p><p><?php echo htmlspecialchars($transaction); ?></p></div>
        <div class="confirm_voyage"><p><strong>Date de départ : </strong></p><p><?php echo htmlspecialchars($sejourTrouve['date_debut']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Durée : </strong></p><p><?php echo htmlspecialchars($sejourTrouve['nbr_jours']); ?> jours</p></div>
        <div class="confirm_voyage"><p><strong>Participants : </strong></p><p><?php echo htmlspecialchars($sejourTrouve['nbr_personnes']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Logement : </strong></p><p><?php echo htmlspecialchars($sejourTrouve['logement']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Pension : </strong></p><p><?php echo htmlspecialchars($sejourTrouve['pension']); ?></p></div>
        <div class="confirm_voyage"><p><strong>Étapes : </strong></p></div>
        <div class="confirm_voyage">
            <ul>
                <?php foreach ($sejourTrouve['etapes'] as $etape): ?>
                    <li><?php echo htmlspecialchars($etape); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <form action="../index.php">
            <input class="button_retour" type="submit" value="Retour à l'accueil">
    </fieldset>
</main>
<?php require('../php/footer.php'); ?>
</body>
</html>