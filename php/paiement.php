<?php
session_start();
require('getapikey.php'); 

// Vérifier que l'utilisateur est connecté et que les infos du voyage existent
if (!isset($_SESSION['user_id'], $_SESSION['voyage'])) {
    die("Erreur : Informations du voyage ou utilisateur manquantes.");
}

// Si le montant n'est pas déjà défini, on le calcule (exemple : 100 € par participant)
if (!isset($_SESSION['montant'])) {
    $montant = 100 * $_SESSION['voyage']['nbr_personnes'];
    $_SESSION['montant'] = $montant;
} else {
    $montant = $_SESSION['montant'];
}

$transaction_id = uniqid(); // Générer un ID de transaction unique
$vendeur = "MI-3_H"; 
$retour_url = "http://localhost/retour_paiement.php?session=" . session_id();

// Récupérer la clé API
$api_key = getAPIKey($vendeur);

// Générer la valeur de contrôle
$control = md5($api_key . "#" . $transaction_id . "#" . $montant . "#" . $vendeur . "#" . $retour_url . "#");

// Stocker les infos de paiement dans la session
$_SESSION['transaction_id'] = $transaction_id;
$_SESSION['vendeur'] = $vendeur;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Redirection vers CY Bank</title>
</head>
<body>
    <h2>Redirection vers CY Bank...</h2>
    <form id="cybankForm" action="https://www.plateforme-smc.fr/cybank/index.php" method="POST">
        <input type="hidden" name="transaction" value="<?php echo $transaction_id; ?>">
        <input type="hidden" name="montant" value="<?php echo $montant; ?>">
        <input type="hidden" name="vendeur" value="<?php echo $vendeur; ?>">
        <input type="hidden" name="retour" value="<?php echo $retour_url; ?>">
        <input type="hidden" name="control" value="<?php echo $control; ?>">
    </form>
    <p>Veuillez cliquer sur le bouton ci-dessous pour continuer.</p>
    <button type="submit" form="cybankForm">Continuer</button>
</body>
</html>
