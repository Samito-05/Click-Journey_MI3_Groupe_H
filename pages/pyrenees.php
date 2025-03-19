<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>
<body>
    
    <?php

        require('../php/header.php')

    ?>
    
<main>
        <h1 class="Titre">Le Pic du Midi de Bigorre</h1>
        <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d23367.706035143274!2d0.12049273710369594!3d42.93690152193442!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a8235749919997%3A0x136b76e1ff9b200!2sPic%20du%20Midi%20de%20Bigorre!5e0!3m2!1sfr!2sfr!4v1739531253504!5m2!1sfr!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        <div class="description">
            <p class="description"><b>L’Pic du Midi de Bigorre</b>, situé dans les Pyrénées, est une destination incontournable pour les amoureux de la montagne, des panoramas à couper le souffle et des expériences insolites en altitude. Accessible en téléphérique depuis La Mongie, il culmine à <b>2 877</b> mètres, offrant une vue spectaculaire sur toute la chaîne des Pyrénées.</p>
            <p class="description">L’une des principales attractions est la <b>terrasse panoramique</b>, où l’on peut admirer un paysage à <b>360°</b>, parfois jusqu’aux sommets des Alpes par temps clair. Pour une expérience encore plus impressionnante, le <b>Ponton dans le Ciel</b> propose une avancée vertigineuse au-dessus du vide.</p>
            <p class="description">Les passionnés d’astronomie peuvent visiter <b>l’Observatoire du Pic du Midi</b>, un centre scientifique réputé, où l’on découvre l’histoire des recherches menées sur place et l’importance du site pour l’étude des étoiles. Il est même possible de <b>passer la nuit sur place</b>, en profitant d’un dîner sous les étoiles et d’une observation nocturne avec les télescopes de l’observatoire.</p>
            <p class="description">Pour les amateurs de randonnée, plusieurs itinéraires permettent de monter à pied jusqu’au sommet, notamment depuis le col du Tourmalet ou le lac d’Oncet. En hiver, le site est aussi accessible aux skieurs via des <b>descente en freeride</b>, réservées aux skieurs expérimentés, offrant un parcours exceptionnel en pleine nature.</p>
            <p class="description">Enfin, après une journée en altitude, il est agréable de se détendre dans les <b>thermes de Bagnères-de-Bigorre</b>, où l’on peut profiter de bains chauds et de soins bien-être. La région regorge également de spécialités gastronomiques à découvrir, comme <b>le garbure</b>, <b>le fromage des Pyrénées</b>, ou encore <b>le gâteau à la broche</b>, parfait pour terminer une belle journée en montagne.</p>
            <p class="description"><b>Que ce soit pour une excursion d’une journée ou un séjour prolongé, le Pic du Midi offre une expérience inoubliable entre aventure, contemplation et découverte scientifique.</b></p>
        </div>
        
        
        </main>
        
        <?php

        require('../php/footer.php')

        ?>
    
    </body>
</html>