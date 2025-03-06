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
        <h1 class="Titre">Mont Blanc</h1>
        <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11119.729466150024!2d6.85487517456719!3d45.83263628815274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4789459fb534be51%3A0xa908728c5dcec4c0!2sMont%20Blanc!5e0!3m2!1sfr!2sfr!4v1739277754758!5m2!1sfr!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        
        <div class="description">
            <p class="description">Chamonix est une destination idéale pour une immersion en pleine nature, entre montagnes majestueuses, glaciers impressionnants et forêts paisibles. Plusieurs randonnées permettent de découvrir des paysages exceptionnels, comme celle menant au <b>Lac Blanc</b>, offrant une vue panoramique sur le massif du Mont-Blanc. Pour une expérience plus facile mais tout aussi spectaculaire, il est possible de prendre le téléphérique de <b>l’Aiguille du Midi</b>, qui monte à 3 842 mètres d’altitude, avec l’incontournable <b>"Pas dans le Vide"</b>, une cabine en verre suspendue au-dessus du vide.</p>
            <p class="description">Les amateurs de sensations fortes pourront s’essayer au <b>parapente</b>, avec un décollage depuis Planpraz pour survoler la vallée de Chamonix. Il est également possible de s’initier à <b>l’alpinisme</b> avec un guide, ou de faire une <b>via ferrata</b> aux Contamines. En hiver, le ski et le snowboard sont évidemment à l’honneur, avec plusieurs domaines comme <b>les Grands Montets</b> ou <b>Brévent-Flégère</b>.</p>
            <p class="description">Pour une expérience plus tranquille, une excursion à la <b>Mer de Glace</b> en train à crémaillère permet de découvrir l’un des plus grands glaciers des Alpes et de visiter une <b>grotte de glace sculptée</b> chaque année. Ceux qui préfèrent la détente pourront profiter des <b>spas et bains thermaux</b>, comme le <b>QC Terme à Chamonix</b> ou le <b>Deep Nature Spa aux Houches</b>.</p>
            <p class="description">Côté culture, le <b>Musée Alpin</b> retrace l’histoire de l’alpinisme et du développement de la vallée, tandis que le <b>parc animalier de Merlet</b> offre une belle promenade au milieu des chamois, bouquetins et marmottes. Enfin, la gastronomie locale est un incontournable, avec des plats savoyards typiques comme <b>la fondue, la raclette</b> ou encore les <b>croûtes savoyardes</b>, à déguster dans un chalet d’altitude ou en centre-ville.</p>
            <p class="description"><b>Que ce soit pour un séjour sportif, détente ou une découverte culturelle, Chamonix offre une multitude d’expériences adaptées à tous les goûts et toutes les saisons ! </b></p>
        </div>
        
        
        </main>
        
        <?php

        require('../php/footer.php')

        ?>
    
    </body>
</html>