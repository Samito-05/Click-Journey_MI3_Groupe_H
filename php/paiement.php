<?php
session_start();
require('getapikey.php');

$ville = $_POST['ville'];
$nbr_personnes = $_POST['nbr_personnes'];
$duree_sejour = $_POST['duree_sejour'];
$date_depart = $_POST['date_depart'];
$logement = $_POST['logement'];
$pension = $_POST['pension'];
$options = $_POST['option'] ?? [];
$cout = $_POST['cout'];
$montant = $cout; // Initialize $montant with the value of $cout

$nouveauSejour = [
    "utilisateur" => $_SESSION['email'], // Utilisateur connecté
    "ville" => $ville,
    "nbr_personnes" => $nbr_personnes,
    "nbr_jours" => $duree_sejour,
    "date_debut" => $date_depart,
    "logement" => $logement,
    "pension" => $pension,
    "etapes" => $options,
    "cout" => $cout
];

$sejoursFile = "../sejours.json";
$sejoursData = [];

if (file_exists($sejoursFile)) {
    $sejoursData = json_decode(file_get_contents($sejoursFile), true);
}

$sejoursData[] = $nouveauSejour;

file_put_contents($sejoursFile, json_encode($sejoursData, JSON_PRETTY_PRINT));

$vendeur = "MI-3_H"; 
$api_key = getAPIKey($vendeur);

// Génération de l'ID de transaction
$transaction_id = uniqid(); 

// URL de retour
$retour_url = "http://localhost/retour_paiement.php?session=" . session_id();

// Génération de la valeur de contrôle
$control = md5($api_key . "#" . $transaction_id . "#" . $montant . "#" . $vendeur . "#" . $retour_url . "#");

// Stocker les infos en session
$_SESSION['transaction_id'] = $transaction_id;
$_SESSION['cout'] = $cout;
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
        <input type="hidden" name="montant" value="<?php echo $cout; ?>">
        <input type="hidden" name="vendeur" value="<?php echo $vendeur; ?>">
        <input type="hidden" name="retour" value="<?php echo $retour_url; ?>">
        <input type="hidden" name="control" value="<?php echo $control; ?>">
    </form>
    <p>Veuillez cliquer sur le bouton ci-dessous pour continuer.</p>
    <button type="submit" form="cybankForm">Continuer</button>
</body>
</html>
