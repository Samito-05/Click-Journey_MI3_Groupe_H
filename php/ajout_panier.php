<?php
session_start();

if (!isset($_SESSION['statut'])) {
    header('Location: ../pages/Connexion.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $voyage = [
        'ville' => $_POST['ville'],
        'nbr_personnes' => $_POST['nbr_personnes'],
        'duree_sejour' => $_POST['duree_sejour'],
        'date_depart' => $_POST['date_depart'],
        'logement' => $_POST['logement'],
        'pension' => $_POST['pension'],
        'cout' => $_POST['cout'],
        'options' => $_POST['option'] ?? []
    ];

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $_SESSION['panier'][] = $voyage;
    header("Location: ../pages/panier.php");
    exit();
}
