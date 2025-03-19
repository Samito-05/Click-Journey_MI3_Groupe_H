<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Paiement</title>
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
            <fieldset class="field_paiement">
                <legend class="legend_paiement">Paiement</legend>
                <form class="form_paiement" method="post" action="../php/paiement.php">
                    <div class="div_paiement">
                        <label for="prenom">Prénom:</label>
                    </div>
                    <div>
                        <input type="text" id="prenom" name="prenom" class="champ_paiement" required>
                    </div>
                    
                    <div class="div_paiement">
                        <label for="nom">Nom:</label> 
                    </div>
                    <div>
                        <input type="text" id="nom" name="nom" class="champ_paiement" required>
                    </div>
                    
                    <div class="div_paiement">
                        <label for="numero_carte">Numéro de carte:</label>
                    </div>
                    <div>
                        <input type="text" id="numero_carte" name="numero_carte" class="champ_paiement" required>
                    </div>
                    
                    <div class="div_paiement">
                        <label for="date_expiration">Date d'expiration:</label>
                    </div>
                    <div>
                        <input type="text" id="date_expiration" name="date_expiration" placeholder="MM/AAAA" class="champ_paiement" maxlength="7" pattern="(0[1-9]|1[0-2])/20(2[5-9]|[3-9][0-9]|100)" required oninput="formatDate(this)">
                    </div>
                    <script>
                        function formatDate(input) {
                            let value = input.value.replace(/\D/g, '');
                            if (value.length > 2) {
                                value = value.slice(0, 2) + '/' + value.slice(2, 6);
                            }
                            input.value = value;
                        }
                    </script>

                    <div class="div_paiement">
                        <label for="cvv">CVV:</label>
                    </div>
                    <div>
                        <input type="text" id="cvv" name="cvv" class="champ_paiement" required>
                    </div>
                    <button type="submit" class="boutton_paiement">Payer</button>
                </form>
        </main>
        
        <?php

            require('../php/footer.php')

        ?>
    </body>
</html>