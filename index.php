<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
<header class="Entete">
    <div class="logo_petit">
        <a href="index.php">
            <img src="Images/logo.jpg" alt="PeakExplorer logo">
        </a>
    </div>
    <ul class="Haut_Page">
        <li class="active"><a href="index.php">Accueil</a></li>
        <li class="inactive"><a href="pages/Sejours.php">Séjours</a></li>
        <li class="inactive"><a href="pages/A_Propos.php">À Propos</a></li>
    </ul>

    <?php if (!isset($_SESSION['email'])): ?>
        <!-- When logged out -->
        <div class="profile">
            <abbr title="Connexion/Inscription">
                <a href="pages/Connexion.php">
                    <img src="Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php elseif ($_SESSION['email'] === "admin@peakexplorer.com"): ?>
        <!-- When Admin -->
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="pages/profile.php">
                    <img src="Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
        <div class="profile">
            <abbr title="Gestion admin">
                <a href="pages/verif_admin.php">
                    <img src="Images/admin.png" alt="Admin">
                </a>
            </abbr>
        </div>
    <?php else: ?>
        <!-- When Logged in as normal user -->
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="pages/profile.php">
                    <img src="Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php endif; ?>
</header>
</body>
</html>


        <div class="bande">
            <h1 class="h1_index">PeakExplorer</h1>

            <form method="post" action="">
                <div class="recherche">
                        <div class="recherche_txt">
                            <input type="text" name="recherche" class="champ_recherche" placeholder="Recherchez votre destination...">
                        </div>
                        <div class="recherche_img">
                            <button type="submit" class="boutton_recherche_acceuil">
                                <img src="Images/loupe.png" alt="Recherche">
                            </button>
                        </div>
                </div>
            </form>
        </div>

        <div class="toutes_destinations">
            <div class="p_index">
                <p>Découvrir</p>
            </div>
            <div class="p1_index">
                <p>Nos voyages du moment</p>
            </div>
            <hr class="hr_index">
            <div class="destination">
                <a href="pages/mont_blanc.php"><img src="Images/Mont_Blanc.jpg" alt="Mont Blanc"><p>Mont Blanc</p></a>
            </div>
            <div class="destination">
                <a href="pages/pyrenees.php"><img src="Images/Pyrenees.jpg" alt="Pic du Midi de Bigorre"><p>Pic du Midi de Bigorre</p></a>
            </div>
            <div class="destination">
                <a href="pages/mont_everest.php"><img src="Images/Mont_Everest.jpeg" alt="Mont Everest"><p>Mont Everest</p></a>
            </div>
            <div class="destination">
                <a href="pages/massif_central.php"><img src="Images/Massif_Central.jpg" alt="Pic du Midi de Bigorre"><p>Puy de Dôme</p></a>
            </div>
            <div class="destination">
                <a href="pages/mont_fuji.php"><img src="Images/Mont_Fuji.jpg" alt="Mont Fuji"><p>Mont Fuji</p></a>
            </div>
            <div class="destination">
                <a href="pages/mount_kilimandjaro.php"><img src="Images/Kilimanjaro.webp" alt="Mont Kilimandjaro"><p> Mont Kilimandjaro</p></a>
            </div>
        </div>
        
        <footer class="footer">
        <div class="logo_petit">
            <a href="index.php">
                <img src="Images/logo.jpg" alt="PeakExplorer logo">
            </a>
        </div>
        <div class="instagram">
            <abbr  title="Instagram">
                <a href="https://www.instagram.com/ssaamm_05/">
                    <img src="Images/instagram.png" alt="Instagram">
                </a>
            </abbr>
        </div>
        <div class="facebook">
            <abbr title="Mon Profile">
                <a href="https://www.facebook.com/hoho.clause.79/about/">
                    <img src="Images/facebook.png" alt="Profil">
                </a>
            </abbr>
        </div>

    </footer>
    
</body>
</html>

