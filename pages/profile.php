<?php
    session_start();
    $email = $_SESSION['email'];
    $fichier = "../comptes.txt";

    if (file_exists($fichier) && is_readable($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lignes as $ligne) {
            list($nom, $prenom, $num, $utilisateur, $mdp_hash) = explode(" ", $ligne);

            if ($utilisateur === $email) {
                break;
            }
        }
    }
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
        <fieldset class="field_profile">
            <legend class="legend_profile">Modifications du profil</legend>
            <form class="form_profile" action="../php/modif_profile.php" method="post">
                <div class="div_profile">
                    <label for="nom">Nom :</label>
                </div>
                <div class="div_modif">
                    <input type="text" id="nom" name="nom" class="champ_inscription" placeholder="<?php echo $nom; ?>">
                    <label for="nom"><img class="modif" src="../Images/modif.png"></label>
                </div>
                
                <div class="div_profile">
                    <label for="prenom">Prénom :</label>
                </div>
                <div class="div_modif">
                    <input type="text" id="prenom" name="prenom" class="champ_inscription" placeholder="<?php echo $prenom; ?>">
                    <label for="prenom"><img class="modif" src="../Images/modif.png"></label>
                </div>
                <div class="div_profile">
                    <label for="mail">Adresse Mail :</label>
                </div>
                <div class="div_modif">
                    <input type="email" id="mail" name="mail" class="champ_inscription" placeholder="<?php echo $utilisateur; ?>">
                    <label for="mail"><img class="modif" src="../Images/modif.png"></label>
                </div>
                <div class="div_profile">
                    <label for="num">Numero :</label>
                </div>
                <div class="div_modif">
                    <input type="tel" id="num" name="num" class="champ_inscription" placeholder="<?php echo $num; ?>">
                    <label for="num"><img class="modif" src="../Images/modif.png"></label>
                </div>
                <div class="div_profile">
                    <label for="mdp2">Nouveau mot de passe :</label>
                </div>
                <div class="div_modif">
                    <input type="password" id="mdp2" name="mdp2" class="champ_inscription" placeholder="........">
                    <label for="mdp2"><img class="modif" src="../Images/modif.png"></label>
                </div>
                <div class="div_profile">
                    <label for="mdp3">Vérification du nouveau mot de passe :</label>
                </div>
                <div class="div_modif">
                    <input type="password" id="mdp3" name="mdp1" class="champ_inscription" placeholder="........">
                    <label for="mdp3"><img class="modif" src="../Images/modif.png"></label>
                </div>
                <button type="submit" class="boutton_modif">Valider Changements</button>
            </form>
            <form class="form_profile" action="../php/logout.php" method="post">
                <button type="submit" class="boutton_modif">Se Deconnecter</button>
            </form>
            <form class="form_profile" action="../php/supprimer.php" method="post">
                <button type="submit" class="boutton_modif">Effacer Compte</button>
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