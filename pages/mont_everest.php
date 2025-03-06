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
<header class="Entete">
    <div class="logo_petit">
        <a href="../index.php">
            <img src="../Images/logo.jpg" alt="PeakExplorer logo">
        </a>
    </div>
    <ul class="Haut_Page">
        <li class="inactive"><a href="../index.php">Accueil</a></li>
        <li class="inactive"><a href="../pages/Sejours.php">Séjours</a></li>
        <li class="inactive"><a href="../pages/A_Propos.php">À Propos</a></li>
    </ul>

    <?php if (!isset($_SESSION['email'])): ?>
        <!-- When logged out -->
        <div class="profile">
            <abbr title="Connexion/Inscription">
                <a href="../pages/Connexion.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php elseif ($_SESSION['email'] === "admin@peakexplorer.com"): ?>
        <!-- When Admin -->
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="../pages/profile.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
            <abbr title="Gestion admin">
                <a href="../pages/verif_admin.php">
                    <img src="../Images/admin.png" alt="Admin">
                </a>
            </abbr>
        </div>
    <?php else: ?>
        <!-- When Logged in as normal user -->
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="../pages/profile.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php endif; ?>
</header>
<main>
        <h1 class="Titre">Mont Everest</h1>
        <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14092.752696067731!2d86.91467536475912!3d27.98813871454328!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e854a215bd9ebd%3A0x576dcf806abbab2!2sEverest!5e0!3m2!1sfr!2sfr!4v1739349214566!5m2!1sfr!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        <div class="description">
            <p class="description">Le <b>Mont Everest</b>, toit du monde culminant à <b>8 849 mètres</b>, est une destination mythique pour les passionnés de haute montagne, d’aventure extrême et de panoramas à couper le souffle. Situé à la frontière entre le Népal et le Tibet, il fait partie de l’Himalaya et attire chaque année des alpinistes du monde entier, venus relever le défi ultime de son ascension.</p>
            <p class="description">Depuis ses flancs et son sommet, l’Everest offre une vue vertigineuse sur les montagnes environnantes, dont le Lhotse, le Makalu et le Cho Oyu. Même les trekkeurs qui ne visent pas le sommet peuvent admirer des paysages grandioses en atteignant le <b>camp de base de l’Everest</b>, à 5 364 mètres d’altitude, un objectif en soi pour de nombreux aventuriers.</p>
            <p class="description">Gravir l’Everest est une aventure périlleuse nécessitant une préparation physique et mentale exceptionnelle. L’ascension se fait généralement par la voie népalaise, en passant par le <b>camp de base</b>, puis une série de camps d’altitude avant d’atteindre le sommet, où l’oxygène est extrêmement rare. Les alpinistes doivent affronter le froid extrême, les vents violents et la célèbre <b>zone de la mort</b> au-delà de 8 000 mètres, où le manque d’oxygène met leur endurance à rude épreuve.</p>
            <p class="description">Pour ceux qui ne visent pas l’ascension complète, le <b>trek jusqu’au camp de base</b> depuis Lukla est une alternative populaire. Ce parcours, qui traverse le <b>Parc national de Sagarmatha</b>, permet de découvrir la culture sherpa, les monastères bouddhistes et des panoramas exceptionnels sur l’Himalaya. Le point de vue de <b>Kala Patthar (5 643 m)</b> est notamment réputé pour offrir l’une des plus belles vues sur l’Everest.</p>
            <p class="description">L’Everest est un site sacré pour les Sherpas et les bouddhistes tibétains, qui le nomment <b>Chomolungma</b>, "Déesse Mère du Monde". Avant toute ascension, il est de tradition d’effectuer une cérémonie de prière appelée <b>puja</b>, demandant la protection des esprits de la montagne.</p>
            <p class="description">Après une expédition exigeante, une halte à <b>Kathmandu</b> permet de se reposer et de découvrir la richesse culturelle du Népal, avec ses temples hindous et bouddhistes, son ambiance vibrante et sa gastronomie locale, dont le célèbre <b>dal bhat</b> (plat traditionnel à base de riz et de lentilles).</p>
            <p class="description"><b>Que ce soit pour une expédition vers le sommet ou un trek à travers la vallée du Khumbu, le Mont Everest offre une aventure inoubliable, mêlant dépassement de soi, contemplation et immersion dans l’une des régions les plus spectaculaires du monde.</b></p>
        </div>
        
        
        </main>
        
        <?php

        require('../php/footer.php')

        ?>
    
    </body>
</html>
