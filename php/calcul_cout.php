<?php

    if (!isset($ville, $logement, $pension, $nbr_personnes, $nbr_jours)) {
        die("Erreur : certaines variables nécessaires ne sont pas définies.");
    }

    if ($logement == "Hotel") { 
        $cout += 75;
    }elseif ($logement == "Hotel++") { 
        $cout += 100;
    }elseif ($logement == "Auberge") {
        $cout += 35;
    } else {
        $cout += 30;
    }

    if ($pension == "Sans pension" ){
        $cout += 15;
    } elseif ($pension == "Demi pension"){
        $cout += 0;
    } else {
        $cout += 30;
    }

    $cout *= $nbr_jours;

    if ($ville == "Mont Blanc" || $ville == "Pic du Midi de Bigorre" || $ville == "Puy de Dôme") {
        $cout += 150;
    } elseif ($ville == "Dolomites" || $ville == "Monte Rosa" || $ville == "Mont Etna") {
        $cout += 250;
    } else {
        $cout += 1000;
    }

    if ($nbr_personnes > 1) {
        $cout *= $nbr_personnes;
    }
    
?>