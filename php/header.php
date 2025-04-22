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
            <li class="inactive"><a href="../pages/A_Propos.php">À Propos</a></li>
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
            <li class="inactive"><a href="../pages/A_Propos.php">À Propos</a></li>
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
            <li class="inactive"><a href="../pages/A_Propos.php">À Propos</a></li>
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