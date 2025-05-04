<?php
    session_start();

    if (isset($_POST['index']) && isset($_SESSION['panier'])) {
        $index = (int)$_POST['index'];
        if (isset($_SESSION['panier'][$index])) {
            unset($_SESSION['panier'][$index]);
            $_SESSION['panier'] = array_values($_SESSION['panier']); // Réindexe
        }
    }
    header("Location: ../pages/panier.php"); // Redirige vers la page panier et évite une page blanche
    exit(); // évite l'exécution de code supplémentaire
?>
