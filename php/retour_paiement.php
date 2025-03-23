<?php
session_start();
require('getapikey.php');

if (!isset($_GET['transaction'], $_GET['montant'], $_GET['vendeur'], $_GET['status'], $_GET['control'])) {
    die("Erreur : Paramètres manquants.");
}

// Récupérer les données du retour
$transaction_id = $_GET['transaction'];
$montant = $_GET['montant'];
$vendeur = $_GET['vendeur'];
$status = $_GET['status'];
$control = $_GET['control'];

// Vérifier l'intégrité des données
$api_key = getAPIKey($vendeur);
$control_check = md5($api_key . "#" . $transaction_id . "#" . $montant . "#" . $vendeur . "#" . $status . "#");

if ($control !== $control_check) {
    die("Erreur : Données de paiement invalides.");
}

if ($status === "accepted") {
    // Enregistrer la transaction
    $fichier_transactions = "../transactions.json";
    $transactions = file_exists($fichier_transactions) ? json_decode(file_get_contents($fichier_transactions), true) : [];

    $transactions[] = [
        'user_id'        => $_SESSION['user_id'],
        'montant'        => $montant,
        'transaction_id' => $transaction_id,
        'voyage'         => isset($_SESSION['voyage']) ? $_SESSION['voyage'] : null,
        'date_paiement'  => date("Y-m-d H:i:s")
    ];

    file_put_contents($fichier_transactions, json_encode($transactions, JSON_PRETTY_PRINT));

    echo "<h2>Paiement réussi !</h2>";
    echo "<p>Votre paiement de " . htmlspecialchars($montant) . " € a été accepté.</p>";
    echo "<a href='profil.php'>Voir mes voyages</a>";
} else {
    echo "<h2>Paiement refusé</h2>";
    echo "<p>Votre paiement a été refusé. Veuillez essayer une autre carte ou vérifier votre solde.</p>";
    echo "<a href='paiement.php'>Réessayer</a> | <a href='recapitulatif.php'>Modifier le voyage</a>";
}
?>