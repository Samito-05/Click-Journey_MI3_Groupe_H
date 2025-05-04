<?php

    // Initialisation des variables
    $cout = 0;
    $nbr_personnes = isset($nbr_personnes) ? $nbr_personnes : 1;
    $nbr_jours = isset($nbr_jours) ? $nbr_jours : 1;

    // Calcul du coût du logement
    if ($logement == "Hotel") { 
        $cout += 75;
    } elseif ($logement == "Hotel++") { 
        $cout += 100;
    } elseif ($logement == "Auberge") {
        $cout += 35;
    } else {
        $cout += 30;
    }

    // Calcul du coût de la pension
    if ($pension == "Demi pension") {
        $cout += 15;
    } elseif ($pension == "Sans pension") {
        $cout += 0;
    } else {
        $cout += 30;
    }

    // Multiplication par la durée du séjour
    $cout *= $nbr_jours;

    // Calcul du coût de la ville
    if ($ville == "Mont Blanc" || $ville == "Pic du Midi de Bigorre" || $ville == "Puy de Dôme") {
        $cout += 150;
    } elseif ($ville == "Dolomites" || $ville == "Monte Rosa" || $ville == "Mont Etna") {
        $cout += 250;
    } else {
        $cout += 1000;
    }

    // Multiplication par le nombre de participants
    $cout *= $nbr_personnes;

?>