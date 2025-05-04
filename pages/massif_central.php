<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PeakExplorer - Randonnées en hautes montages</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link id="theme-link" rel="stylesheet" href="../clair.css">
        
        <link rel="icon" type="image/jpg" href="../Images/logo.jpg"> 
    </head>
    <body>
        <?php require('../php/header.php') ?>
        <main>
            <h1 class="Titre">Puy de Dôme</h1>
            <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22263.659180695653!2d2.941851040749558!3d45.77204403337511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f7113e6544facd%3A0x940431e190d1c42f!2sPuy%20de%20D%C3%B4me!5e0!3m2!1sfr!2sfr!4v1739531409613!5m2!1sfr!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
            <div class="description">
                <p class="description"><b>Le Puy de Dôme</b>, emblème des volcans d’Auvergne, est une destination incontournable pour les amateurs de nature, de panoramas époustouflants et d’expériences uniques en altitude. Situé à 1 465 mètres d’altitude, il offre une vue imprenable sur la chaîne des Puys, inscrite au patrimoine mondial de l’UNESCO, ainsi que sur les paysages vallonnés de l’Auvergne</p>
                <p class="description">L’accès au sommet se fait facilement grâce au <b>Panoramique des Dômes</b>, un train à crémaillère qui serpente à travers les flancs du volcan. Pour les plus sportifs, plusieurs sentiers de randonnée, notamment le <b>chemin des Muletiers</b> ou le <b>chemin des Chèvres</b>, permettent d’atteindre le sommet à pied en profitant d’un cadre naturel exceptionnel.</p>
                <p class="description">Au sommet, la <b>table d’orientation</b> permet de repérer les volcans environnants, tandis que les amateurs de sensations fortes peuvent s’élancer en parapente pour survoler cet incroyable paysage. Le site abrite également le <b>temple de Mercure</b>, vestige gallo-romain témoignant de l’histoire sacrée du lieu.</p>
                <p class="description">Les passionnés de sciences et de météorologie peuvent visiter l’espace dédié à l’observation atmosphérique et volcanologique, qui explique l’importance du site pour l’étude du climat et des phénomènes naturels.</p>
                <p class="description">En hiver, le sommet se pare d’un manteau neigeux, offrant des panoramas encore plus impressionnants et des randonnées en raquettes accessibles aux marcheurs motivés.</p>
                <p class="description">Après une journée en altitude, rien de tel qu’une pause détente aux <b>thermes de Royat</b>, où l’on peut profiter des bienfaits des eaux thermales. Côté gastronomie, la région regorge de spécialités à découvrir, comme la truffade, le Saint-Nectaire ou encore la célèbre pompe aux pommes, parfaite pour conclure une belle journée en montagne.</p>
                <p class="description"><b>Que ce soit pour une excursion d’une journée ou un séjour prolongé, le Puy de Dôme offre une expérience inoubliable entre aventure, contemplation et découverte scientifique.</b></p>
            </div> 
        </main>
            
        <?php require('../php/footer.php') ?>
        <script src="../javascript/theme.js" defer></script>
    </body>
</html>