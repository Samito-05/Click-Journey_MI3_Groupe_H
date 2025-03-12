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

    <?php if (!isset($_SESSION['email'])): ?>
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
        <div class="profile">
            <abbr title="Connexion/Inscription">
                <a href="../pages/Connexion.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php elseif ($_SESSION['email'] === "admin@peakexplorer.com"): ?>
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
        <fieldset class="field_inscription">
            <legend class="legend_inscription">Création de mon compte</legend>
            <form class="form_inscription" method="post" action="../php/cree_compte.php">                
                <div class="div_ins">
                    <label for="nom">Nom * :</label>
                </div>
                <div>
                    <input type="text" id="nom" name="nom" class="champ_inscription" placeholder="Entrer votre nom" required>
                </div>
                
                <div class="div_ins">
                    <label for="prenom">Prénom * :</label>
                </div>
                <div>
                    <input type="text" id="prenom" name="prenom" class="champ_inscription" placeholder="Entrer votre prénom"required>
                </div>

                <div class="div_ins">
                    <label for="naissance">Date de naissance * :</label>
                </div>
                <div>
                    <input type="date" id="naissance" name="naissance" class="champ_inscription" required>
                </div>

                <div class="div_ins">
                    <label for="adresse">Adresse * :</label>
                </div>
                <div>
                    <input type="text" id="adresse" name="adresse" class="champ_inscription" placeholder="Entrer votre adresse" required>
                
                <div class="div_ins">
                    <label for="numero">Téléphone * :</label>
                </div>
                <div>
                    <input type="tel" id="numero" name="numero" class="champ_inscription" placeholder="Entrer votre numéro"required>
                </div>
            
                <div class="div_ins">
                    <label for="email">Email * :</label>
                </div>
                <div>
                    <input type="email" id="email" name="email" class="champ_inscription" placeholder="Entrer votre email"required>
                </div>
                
                <div class="div_ins">
                    <label for="mdp_inscription">Mot de passe * :</label>
                </div>
                <div>
                    <input type="password" id="mdp_inscription" name="mdp_inscription" class="champ_inscription" placeholder="Entrer votre mot de passe"required>
                </div>
                
                <div class="div_ins">
                    <label for="mdp_confirm_inscription">Confirmation du mot de passe * :</label>
                </div>
                <div>
                    <input type="password" id="mdp_confirm_inscription" name="mdp_confirm_inscription" class="champ_inscription" placeholder="Confirmation du mot de passe"required>
                </div>
                <p class="saisie_obligatoire"><i>*Saisie obligatoire</i></p>
                <button type="submit" class="boutton_inscription">Créer mon compte</button>

                <hr class="hr_inscription">
                <p class="deja_inscrit">Vous avez déjà un compte ?<a href="Connexion.php">Me connecter</a></p>
            </form>
        </fieldset>
        
        </main>
        
        <?php

        require('../php/footer.php')

        ?>
    
    </body>
</html>