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
                <a href="../pages/Inscription.php">
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
        </div>
        <div class="profile">
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
        
        
        <footer class="footer">
        <div class="logo_petit">
            <a href="../index.php">
                <img src="../Images/logo.jpg" alt="PeakExplorer logo">
            </a>
        </div>
        <div class="instagram">
            <abbr  title="Instagram">
                <a href="https://www.instagram.com/ssaamm_05/">
                    <img src="../Images/instagram.png" alt="Instagram">
                </a>
            </abbr>
        </div>
        <div class="facebook">
            <abbr title="Mon Profile">
                <a href="https://www.facebook.com/hoho.clause.79/about/">
                    <img src="../Images/facebook.png" alt="Profil">
                </a>
            </abbr>
        </div>

    </footer>
    
</body>
</html>