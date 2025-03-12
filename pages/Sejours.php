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
    <fieldset class="field_sejours">
        <form action="" method="post">

            <div class="filtre">
                <label>Lieu du voyage :</label>
                <select class="select" name="city" id="city" required>
                    <option value="default">Choisir un lieu</option>
                    <optgroup label="France">
                        <option value="mont blanc">Mont Blanc</option>
                        <option value="pyrénées">Pyrénées</option>
                        <option value="massif central">Massif Central</option>
                    </optgroup>
                    <optgroup label="Italie">
                        <option value="Dolomites">Dolomites</option>
                    </optgroup>
                    <optgroup label="Népal">
                        <option value="mont everest">Mont Everest</option>
                    </optgroup>
                    <optgroup label="Japon">
                        <option value="mont fuji">Mont Fuji</option>
                    </optgroup>
                    <optgroup label="USA">
                        <option value="Rocky Mountains">Rocky Mountains</option>
                    </optgroup>
                    <optgroup label="Tanzania">
                        <option value="Mount Kilimanjaro">Mont Kilimanjaro</option>
                    </optgroup>
                </select>
            </div>

            <div class="filtre">
                <label>Nombre de participants :</label>
                <input type="number" name="nombre de personne" min="1" max="10" value="2" step="1" required>
            </div>

            <div class="filtre">
                <label>Duree du sejour :</label>
                <input type="number" name="duree_sejour" min="2" max="10" value="3" step="1" required>
            </div>

            <div class="filtre">
                <label>Date de depart :</label>
                <input type="date" name="date_depart" value="2025/01/01" required>
            </div>

            <div class="filtre">
                <label>Logement :</label>
                <select class="select" name="logement" required>
                    <option value="Hotel">Hotel</option>
                    <option value="Auberge de Jeunnesse">Auberge de Jeunnesse</option>
                    <option value="Airbnb">Airbnb</option>
                    <option value="Clients">Aux clients de gerer</option>
                </select>
            </div>

            <p class="filtre">Options supplémentaires :</p>
            <div class="checkbox_options">
                <label><input type="checkbox" name="option" value="guide"/><p>Guide de montagne</p></label>
                <label><input type="checkbox" name="option" value="chalet"/><p>Chalet haute montagne</p></label>
            </div>

            <p class="filtre">Option alimentaire :</p>
            <div class="checkbox_options">
                <label><input type="checkbox" name="pension" value="sans pension"/><p>Sans pension</p></label>
                <label><input type="checkbox" name="pension" value="demi pension"/><p>Demi-pension</p></label>
                <label><input type="checkbox" name="pension" value="pension complète"/><p>Pension complète</p></label>
            </div>

            <button type="submit" class="boutton_recherche">Rechercher</button>
        </form>
    </fieldset>

    <?php

    require('../php/sejours.php')

    ?>
 
    </main>
        
        <?php

        require('../php/footer.php')

        ?>
    
    </body>
</html>
