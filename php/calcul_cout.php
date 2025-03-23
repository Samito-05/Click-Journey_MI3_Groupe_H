<?php
    // Vérification des variables
    if (!isset($ville, $logement, $pension, $nbr_personnes, $nbr_jours)) {
        die("Erreur : certaines variables nécessaires ne sont pas définies.");
    }

    if ($ville == "Mont Blanc" || $ville == "Pic du Midi de Bigorre" || $ville == "Puy de Dôme") {
        $cout = 150;
    } elseif ($ville == "Dolomites" || $ville == "Monte Rosa" || $ville == "Mont Etna") {
        $cout = 250;
    } else {
        $cout = 1000;
    }

    if ($logement == "Hotel" || $logement == "Hotel++") {
        $cout += 75;
    } elseif ($logement == "Auberge") {
        $cout += 35;
    } else {
        $cout += 30;
    }

    if ($pension == "Sans pension" || $pension == "Demi pension") {
        $cout += 15;
    } else {
        $cout += 30;
    }

    $cout *= $nbr_personnes * $nbr_jours;
?>

<!-- Affichage du coût total -->
<div class="filtre">
    <h2 class="filtre">Cout total</h2>
    <h3 class="filtre"><?php echo $cout; ?> €</h3>
</div>