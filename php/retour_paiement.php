<?php
session_start();
require('getapikey.php');

if (!isset($_GET['transaction'], $_GET['montant'], $_GET['vendeur'], $_GET['statut'], $_GET['control'])) {
    die("Erreur : Informations manquantes dans le retour du paiement.");
}

$transaction_id = $_GET['transaction'];
$montant = $_GET['montant'];
$vendeur = $_GET['vendeur'];
$statut = $_GET['statut'];
$control = $_GET['control'];

// Vérification de l'intégrité des données
$api_key = getAPIKey($vendeur);
$expected_control = md5($api_key . "#" . $transaction_id . "#" . $montant . "#" . $vendeur . "#" . $statut . "#");

if ($control !== $expected_control) {
    die("Erreur : Données de paiement corrompues.");
}

// Récupérer les coordonnées bancaires (celles envoyées depuis le formulaire de paiement)
if (isset($_SESSION['coordonnees_bancaires'])) {
    $coordonnees_bancaires = $_SESSION['coordonnees_bancaires'];
} else {
    die("Erreur : Informations bancaires manquantes.");
}

// Enregistrement des données dans le fichier JSON
$transaction_data = [
    'transaction_id' => $transaction_id,
    'montant' => $montant,
    'vendeur' => $vendeur,
    'statut' => $statut,
    'coordonnees_bancaires' => [
        'nom' => $coordonnees_bancaires['nom'],
        'carte' => $coordonnees_bancaires['carte'],
        'expiration' => $coordonnees_bancaires['expiration'],
        'cvv' => $coordonnees_bancaires['cvv']
    ],
    'voyage' => [
        'ville' => $voyage['ville'],
        'nbr_personnes' => $voyage['nbr_personnes'],
        'duree_sejour' => $voyage['duree_sejour'],
        'date_depart' => $voyage['date_depart'],
        'logement' => $voyage['logement'],
        'option' => $voyage['option']
    ]
];

// Sauvegarder la transaction dans un fichier JSON
$transactions_file = 'transactions.json';
$current_transactions = file_exists($transactions_file) ? json_decode(file_get_contents($transactions_file), true) : [];
$current_transactions[] = $transaction_data;
file_put_contents($transactions_file, json_encode($current_transactions, JSON_PRETTY_PRINT) . PHP_EOL);

// Vérifier si le paiement est accepté
if ($statut === "accepted") {
    $_SESSION['paiement_statut'] = "success";
    header("Location: confirmation_paiement.php");
    exit();
} else {
    $_SESSION['paiement_statut'] = "failed";
    header("Location: echec_paiement.php");
    exit();
}
