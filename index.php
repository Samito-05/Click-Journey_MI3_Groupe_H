<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recherche'])) {
    if (!isset($_SESSION['statut'])) {
        $message = "Vous devez être connecté pour effectuer une recherche.";
    } else {
        $recherche = trim($_POST['recherche']);
        $file_path = 'json/destination.json';
        if (file_exists($file_path)) {
            $destinations = json_decode(file_get_contents($file_path), true);
        } else {
            $destinations = [];
            $message = "Le fichier des destinations est introuvable.";
        }

        $resultats = [];
        foreach ($destinations as $destination) {
            if (strcasecmp($destination['lieu'], $recherche) === 0 || 
                (isset($destination['mots_cles']) && in_array(strtolower($recherche), array_map('strtolower', $destination['mots_cles'])))) {
                $resultats[] = $destination;
            }
        }

        if (!empty($resultats)) {
            $resultats_json = urlencode(json_encode($resultats));
            header("Location: pages/voyages.php?resultats=$resultats_json");
            exit;
        } else {
            $message = "Aucune destination trouvée pour votre recherche.";
        }
    }
}
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

    <?php if (!isset($_SESSION['statut'])): ?>
        <!-- When logged out -->
        <div class="logo_petit">
            <a href="index.php">
                <img src="Images/logo.jpg" alt="PeakExplorer logo">
            </a>
        </div>
        <ul class="Haut_Page">
            <li class="active"><a href="index.php">Accueil</a></li>
            <li class="inactive"><a href="pages/A_Propos.php">À Propos</a></li>
        </ul>
        <div class="profile">
            <abbr title="Connexion/Inscription">
                <a href="pages/Connexion.php">
                    <img src="Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
        <?php elseif ($_SESSION['statut'] === "admin"): ?>
        <!-- When Admin -->
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
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="pages/profile.php">
                    <img src="Images/profile.png" alt="Profil">
                </a>
            </abbr>
            <abbr title="Gestion admin">
                <a href="pages/admin.php">
                    <img src="Images/admin.png" alt="Admin">
                </a>
            </abbr>
        </div>
    <?php else: ?>
        <!-- When Logged in as normal user -->
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
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="pages/profile.php">
                    <img src="Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php endif; ?>
</header>
<main>

        <div class="bande">
            <h1 class="Titre_index">PeakExplorer</h1>

            <form method="post" action="">
                <div class="recherche">
                        <div class="recherche_txt">
                            <?php if (!isset($message)): ?>
                                <input type="text" name="recherche" class="champ_recherche" placeholder="Recherchez votre destination...">
                            <?php elseif (isset($message)): ?>
                                <input type="text" name="recherche" class="champ_recherche_invalid" placeholder="<?php echo $message?>">
                            <?php endif; ?>
                        </div>
                        <div class="recherche_img">
                            <button type="submit" class="boutton_recherche_acceuil">
                                <img src="Images/loupe.png" alt="Recherche">
                            </button>
                        </div>
                </div>
            </form>
        </div>

        <div class="index_bas">
            <div class="p_index">
                <p>Découvrir</p>
            </div>
            <div class="p1_index">
                <p>Nos voyages du moment</p>
            </div>
            <hr class="hr_index">  

            <div class="toutes_destinations">

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
        </div>
        </main>
        <footer class="footer">
    
            <div class="logo_petit">
                <a href="../index.php"><img src="Images/logo.jpg" alt="PeakExplorer logo"></a>
            
                <abbr  title="Instagram"><a href="https://www.instagram.com/ssaamm_05/" target="_blank"><img src="Images/instagram.png" alt="Instagram"></a></abbr>
            
                <abbr title="Mon Profile"><a href="https://www.facebook.com/hoho.clause.79/about/" target="_blank"><img src="Images/facebook.png" alt="Profil"></a></abbr>
            </div>

        </footer>
    
</body>
</html>

