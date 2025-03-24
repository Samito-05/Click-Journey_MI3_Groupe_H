<?php
session_start();

if (isset($_SESSION['paiement_statut']) && $_SESSION['paiement_statut'] == 'success') {
    echo "<h1>Le paiement a été effectué avec succès !</h1>";


    if (isset($_SESSION['voyage'])) {
        echo "<h3>Détails de votre voyage :</h3>";
        echo "<p>Ville : " . $_SESSION['voyage']['ville'] . "</p>";
        echo "<p>Nombre de personnes : " . $_SESSION['voyage']['nbr_personnes'] . "</p>";
        echo "<p>Durée du séjour : " . $_SESSION['voyage']['duree_sejour'] . " jours</p>";
        echo "<p>Date de départ : " . $_SESSION['voyage']['date_depart'] . "</p>";
        echo "<p>Logement : " . $_SESSION['voyage']['logement'] . "</p>";
        echo "<p>Options : " . implode(", ", $_SESSION['voyage']['option']) . "</p>";
    }

    echo "<p>Votre transaction a été acceptée. Merci pour votre achat !</p>";
    echo "<p><a href='index.php'>Retour à l'accueil</a></p>";
} else {
    echo "<h1>Erreur : le paiement n'a pas été effectué avec succès.</h1>";
    echo "<p><a href='retour_paiement.php'>Réessayer le paiement</a></p>";
}
?>
