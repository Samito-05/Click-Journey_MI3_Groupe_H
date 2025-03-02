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