<?php
session_start();
require('getapikey.php'); 

// Vérifier si l'utilisateur et le voyage sont bien en session
if (!isset($_SESSION['email'], $_SESSION['voyage'])) {
    die("Erreur : Informations du voyage ou utilisateur manquantes.");
}

$vendeur = "MI-3_H"; 
$api_key = getAPIKey($vendeur);

// Calcul du montant (nombre abritraire)
$montant = number_format(100 * $_SESSION['voyage']['nbr_personnes'], 2, '.', '');

// Génération de l'ID de transaction
$transaction_id = uniqid(); 

// URL de retour
$retour_url = "http://localhost/retour_paiement.php?session=" . session_id();

// Génération de la valeur de contrôle
$control = md5($api_key . "#" . $transaction_id . "#" . $montant . "#" . $vendeur . "#" . $retour_url . "#");

// Stocker les infos en session
$_SESSION['transaction_id'] = $transaction_id;
$_SESSION['montant'] = $montant;
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
