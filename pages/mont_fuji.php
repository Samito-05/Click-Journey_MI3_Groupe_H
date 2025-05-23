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
            <h1 class="Titre">Mont Fuji</h1>
            <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13015.194744497903!2d138.71706366823997!3d35.36064206243874!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019629a42fdc899%3A0xa6a1fcc916f3a4df!2sMont%20Fuji!5e0!3m2!1sfr!2sfr!4v1739277993174!5m2!1sfr!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
            <div class="description">
                <p class="description">Le <b>Mont Fuji</b>, symbole du Japon, est une destination incontournable pour les amateurs de nature, de randonnée et de culture. Culminant à <b>3 776 mètres</b>, il est accessible depuis plusieurs points de départ et offre une multitude d’expériences selon la saison et les envies des visiteurs.</p>
                <p class="description">L’activité la plus emblématique est <b>l’ascension du Mont Fuji</b>, possible de juillet à début septembre. Plusieurs sentiers permettent d’atteindre le sommet, le plus populaire étant la <b>voie Yoshida</b>, avec des refuges pour se reposer en chemin. De nombreux randonneurs choisissent de commencer l’ascension en fin d’après-midi pour atteindre le sommet au lever du soleil, une expérience magique appelée <b>"Goraiko"</b>.</p>
                <p class="description">Pour ceux qui préfèrent admirer le Mont Fuji sans le gravir, plusieurs points de vue offrent des panoramas magnifiques. <b>Le Lac Kawaguchi</b>, l’un des Cinq Lacs du Fuji, est un endroit prisé pour observer la montagne se refléter dans l’eau, notamment au printemps avec les cerisiers en fleurs ou en automne avec les érables rougeoyants. <b>Le Chureito Pagoda</b>, située sur une colline, offre une vue emblématique sur le Fuji avec une pagode rouge en premier plan.</p>
                <p class="description">Les amateurs de détente peuvent se relaxer dans un <b>onsen (bain thermal japonais)</b> avec vue sur la montagne. Des établissements comme <b>le Fuji Yurari Onsen</b> ou <b>le Hottarakashi Onsen</b> permettent de profiter des eaux chaudes tout en contemplant le paysage.</p>
                <p class="description">Côté culture, la région abrite des sites historiques et spirituels comme le <b>sanctuaire Fujisan Sengen Taisha</b>, dédié à la divinité du Mont Fuji, ou encore <b>les grottes de lave de Narusawa</b>, vestiges des anciennes éruptions volcaniques. Pour une immersion ludique, le parc d’attractions <b>Fuji-Q Highland</b> propose des montagnes russes extrêmes avec une vue spectaculaire sur le volcan.</p>
                <p class="description">Enfin, la gastronomie locale mérite aussi une découverte, notamment les <b>Hoto Noodles</b>, une spécialité de nouilles épaisses servies dans un bouillon miso, parfaite après une journée d’exploration.</p>
                <p class="description"><b>Que ce soit pour l’aventure, la contemplation ou la culture, le Mont Fuji offre une expérience unique, entre nature majestueuse et traditions japonaises</b></p>
            </div>
        </main>
        
        <?php require('../php/footer.php') ?>
        <script src="../javascript/theme.js" defer></script>
    </body>
</html>