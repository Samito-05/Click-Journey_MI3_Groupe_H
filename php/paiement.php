<?php
session_start();
require('getapikey.php'); // Inclure la fonction pour récupérer la clé API

// Vérification de l'utilisateur et du voyage
if (!isset($_SESSION['user_id'], $_SESSION['voyage'], $_SESSION['montant'])) {
    die("Erreur : Informations du voyage ou utilisateur manquantes.");
}

// Récupération des infos du voyage
$montant = $_SESSION['montant'];
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

// Redirection automatique vers CY Bank
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
    <?php
    echo '<p>Veuillez cliquer sur le bouton ci-dessous pour continuer.</p>';
    echo '<button type="submit" form="cybankForm">Continuer</button>';
    ?>
</body>
</html>
