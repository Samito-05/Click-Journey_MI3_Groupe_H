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
        <li class="inactive"><a href="../html/Sejours.php">Séjours</a></li>
        <li class="inactive"><a href="../html/A_Propos.php">À Propos</a></li>
    </ul>

    <?php if (!isset($_SESSION['email'])): ?>
        <!-- When logged out -->
        <div class="profile">
            <abbr title="Connexion/Inscription">
                <a href="../html/Inscription.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php elseif ($_SESSION['email'] === "admin@peakexplorer.com"): ?>
        <!-- When Admin -->
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="../html/profile.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
        <div class="profile">
            <abbr title="Gestion admin">
                <a href="../html/verif_admin.php">
                    <img src="../Images/admin.png" alt="Admin">
                </a>
            </abbr>
        </div>
    <?php else: ?>
        <!-- When Logged in as normal user -->
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="../html/profile.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php endif; ?>
</header>
        <fieldset class="field_connexion">
            <legend class="legend_connexion">Connexion</legend>
            <form class="form_connexion" action="../php/connect.php" method="post">
                <div class="div_connexion">
                    <label for="email">Mon email * :</label>
                </div>
                <div>
                    <input type="email" id="email" name="email" class="champ_connexion" required>
                </div>

                <div class="div_connexion">
                    <label for="mdp_connexion">Mot de passe * :</label>
                </div>
                    <input type="password" id="mdp_connexion" name="mdp_connexion" class="champ_connexion" required>
                </div>

                <button type="submit" class="boutton_connexion">Me connecter</button>

                <p class="s_inscrire">Vous n'avez pas de compte ?<a href="Inscription.php">S'incrire</a></p>
            </form>
        </fieldset>
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