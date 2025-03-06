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

        <fieldset class="field_verification">
            <legend class="legend_verif_admin">Verication Admin</legend>
            <form class="form_verification" action="" method="post">
                <div class="div_verification">
                    <label for="email">Mon email * :</label>
                </div>
                <div>
                    <input type="email" id="email" name="email" class="champ_verification" required>
                </div>

                <div class="div_verification">
                    <label for="mp_verif">Mot de passe * :</label>
                </div>
                <div>
                    <input type="password" id="mp_verif" name="mp_verif" class="champ_verification" required>
                </div>

                <button type="submit" class="boutton_verif">Acces admin</button>

                <p class="s_inscrire">(Mot de passe bon)<a href="admin.php">Acces provisoire</a></p>
            </form>
        </fieldset>
        
        </main>
        
        <?php

        require('../php/footer.php')

        ?>
    
    </body>
</html>