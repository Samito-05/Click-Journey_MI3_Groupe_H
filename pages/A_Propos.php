<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PeakExplorer - Randonnées en hautes montages</title>
        <link rel="stylesheet" type="text/css" href="../style.css"> 
        <link id="theme-link" rel="stylesheet" href="themes/clair.css">

        <link rel="icon" type="image/jpg" href="../Images/logo.jpg">
    </head>
    <body>
        <header class="Entete">

            <?php if (!isset($_SESSION['statut'])): ?>
                <!-- When logged out -->
                <div class="logo_petit">
                    <a href="../index.php">
                        <img src="../Images/logo.jpg" alt="PeakExplorer logo">
                    </a>
                </div>
                <ul class="Haut_Page">
                    <li class="inactive"><a href="../index.php">Accueil</a></li>
                    <li class="active"><a href="../pages/A_Propos.php">À Propos</a></li>
                </ul>
                <div class="changer_theme">
                    <button onclick="changerTheme()">🌗 Thème</button>
                </div>
                <div class="profile">
                    <abbr title="Connexion/Inscription">
                        <a href="../pages/Connexion.php">
                            <img src="../Images/profile.png" alt="Profil">
                        </a>
                    </abbr>
                </div>
            <?php elseif ($_SESSION['statut'] === "admin"): ?>
                <!-- When Admin -->
                <div class="logo_petit">
                    <a href="../index.php">
                        <img src="../Images/logo.jpg" alt="PeakExplorer logo">
                    </a>
                </div>
                <ul class="Haut_Page">
                    <li class="inactive"><a href="../index.php">Accueil</a></li>
                    <li class="inactive"><a href="../pages/Sejours.php">Séjours</a></li>
                    <li class="active"><a href="../pages/A_Propos.php">À Propos</a></li>
                </ul>
                <div class="changer_theme">
                    <button onclick="changerTheme()">🌗 Thème</button>
                </div>
                <div class="profile">
                    <abbr title="Mon Profile">
                        <a href="../pages/profile.php">
                            <img src="../Images/profile.png" alt="Profil">
                        </a>
                    </abbr>
                    <abbr title="Gestion admin">
                        <a href="../pages/admin.php">
                            <img src="../Images/admin.png" alt="Admin">
                        </a>
                    </abbr>
                </div>
            <?php else: ?>
                <!-- When Logged in as normal user -->
                <div class="logo_petit">
                    <a href="../index.php">
                        <img src="../Images/logo.jpg" alt="PeakExplorer logo">
                    </a>
                </div>
                <ul class="Haut_Page">
                    <li class="inactive"><a href="../index.php">Accueil</a></li>
                    <li class="inactive"><a href="../pages/Sejours.php">Séjours</a></li>
                    <li class="active"><a href="../pages/A_Propos.php">À Propos</a></li>
                </ul>
                <div class="changer_theme">
                    <button onclick="changerTheme()">🌗 Thème</button>
                </div>
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
            <div class="a_propos">

            <h1 class="Titre">A propos de nous et notre équipe</h1>

            <h2 class="sous_titre">Notre histoire</h2>

            <p class="a_propos">Tout a commencé par une passion commune pour les sommets et l’aventure. Sam, Jules et Hugo, amis d’enfance, ont toujours été attirés par les montagnes. Lors d’une randonnée à Chamonix, face au Lac Blanc, ils ont eu une idée : créer une agence de voyages spécialisée en exploration montagneuse. Ainsi naît PeakExplorer, une agence de voyages conçue pour partager cette passion. Après des mois de travail, ils lancent leurs premiers treks dans les Alpes, rapidement suivis d’expéditions aux quatre coins du monde. Aujourd’hui, PeakExplorer propose des expériences inoubliables aux passionnés d’aventure, avec un engagement fort pour l’exploration et la nature.</p>

            <h2 class="sous_titre">Notre équipe</h2>

            <p class="a_propos">Notre équipe est composée de guides expérimentés, passionnés par la montagne et l’aventure. Tous diplômés et spécialisés dans leur domaine, ils vous accompagneront dans vos expéditions et vous feront découvrir les plus beaux paysages du monde. Notre équipe est également composée de spécialistes en logistique, en sécurité et en communication, pour vous garantir une expérience inoubliable et en toute sécurité. Notre équipe est à votre écoute pour répondre à toutes vos questions et vous accompagner dans la préparation de votre voyage.</p>

            <h2 class="sous_titre">Nos valeurs</h2>

            <p class="a_propos">Chez PeakExplorer, nous avons à cœur de partager notre passion pour la montagne et l’aventure. Nous croyons en l’exploration comme moyen de découvrir le monde et de se dépasser. Nous sommes engagés pour la préservation de la nature et des écosystèmes, et nous veillons à minimiser notre impact sur l’environnement. Nous sommes également engagés pour le respect des populations locales et des cultures, et nous veillons à ce que nos expéditions soient éthiques et responsables. Nous croyons en la solidarité et en l’entraide, et nous veillons à ce que chacun puisse vivre une expérience inoubliable et enrichissante.</p>
        
            <h2 class="sous_titre">Contact</h2>

            <p class="a_propos">Pour toute question ou demande d’information, n’hésitez pas à nous contacter par téléphone au 01 23 45 67 89 ou par e-mail à peakexplorer@contact.com. Notre équipe est à votre disposition pour répondre à toutes vos questions et vous accompagner dans la préparation de votre voyage.</p>

            <div class="photo_equipe">
                <img src="../Images/sam.jpg" alt="Sam, Co-Fondateur de PeakExplorer">
                <img src="../Images/jules.jpg" alt="Jules, Co-Fondateur de PeakExplorer">
                <img src="../Images/hugo.jpg" alt="Hugo, Co-Fondateur de PeakExplorer">
            </div>

            <p class="co-fondateur">Sam, Jules et Hugo, co-fondateurs de PeakExplorer</p>

            </div>
        </main>
        
        <?php require('../php/footer.php') ?>
        <script src="../javascript/theme.js"></script>
    </body>
</html>
