<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PeakExplorer - Randonnées en hautes montages</title>
        <link rel="stylesheet" type="text/css" href="../style.css"> 
        <link id="theme-link" rel="stylesheet" href="../clair.css">

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
                    <li class="active"><a href="../pages/Sejours.php">Séjours</a></li>
                    <li class="inactive"><a href="../pages/A_Propos.php">À Propos</a></li>
                </ul>
                <div class="changer_theme">
                    <button onclick="changerTheme()">🌗 Thème</button>
                </div>
                <?php if (isset($_SESSION['statut'])): ?>
                    <div class="panier">
                        <abbr title="Voir mon panier" class="abbr_panier">
                            <a href="../pages/panier.php">
                                🛒 Panier
                                <?php if (!empty($_SESSION['panier'])): ?>
                                    ~ <?php echo count($_SESSION['panier']); ?>
                                <?php endif; ?>
                            </a>
                        </abbr>
                    </div>
                <?php endif; ?>
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
                    <li class="active"><a href="../pages/Sejours.php">Séjours</a></li>
                    <li class="inactive"><a href="../pages/A_Propos.php">À Propos</a></li>
                </ul>
                <div class="changer_theme">
                    <button onclick="changerTheme()">🌗 Thème</button>
                </div>
                <?php if (isset($_SESSION['statut'])): ?>
                    <div class="panier">
                        <abbr title="Voir mon panier" class="abbr_panier">
                            <a href="../pages/panier.php">
                                🛒 Panier
                                <?php if (!empty($_SESSION['panier'])): ?>
                                    ~ <?php echo count($_SESSION['panier']); ?>
                                <?php endif; ?>
                            </a>
                        </abbr>
                    </div>
                <?php endif; ?>
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
                <form action="../php/sejours.php" method="post">
                    <div class="filtre">
                        <label>Lieu du voyage :</label>
                        <select class="select" name="ville" id="ville" required>
                            <?php 
                            $ville = isset($_GET['ville']) ? trim($_GET['ville']) : '';
                            ?>
                            <?php if (!empty($ville)): ?>
                                <option value="<?php echo htmlspecialchars($ville); ?>" selected><?php echo htmlspecialchars($ville); ?></option>
                            <?php else: ?>
                                <option value="" disabled selected>Choisir un lieu</option>
                            <?php endif; ?>
                            <optgroup label="France">
                                <option value="Mont Blanc">Mont Blanc</option>
                                <option value="Pic du Midi de Bigorre">Pic du Midi de Bigorre</option>
                                <option value="Puy de Dôme">Puy de Dôme</option>
                            </optgroup>
                            <optgroup label="Italie">
                                <option value="Dolomites">Dolomites</option>
                                <option value="Monte Rosa">Monte Rosa</option>
                                <option value="Mont Etna">Sommet de l’Etna</option>
                            </optgroup>
                            <optgroup label="Népal">
                                <option value="Mont Everest">Mont Everest</option>
                            </optgroup>
                            <optgroup label="Japon">
                                <option value="Mont Fuji">Mont Fuji</option>
                            </optgroup>
                            <optgroup label="USA">
                                <option value="Rocky Mountains">Rocky Mountains</option>
                                <option value="Cadillac Mountain">Cadillac Mountain</option>
                                <option value="Mont Rushmore">Mont Rushmore</option>
                            </optgroup>
                            <optgroup label="Tanzanie">
                                <option value="Mont Kilimanjaro">Mont Kilimanjaro</option>
                            </optgroup>
                            <optgroup label="Autres">
                                <option value="Voyage 13">Voyage 13</option>
                                <option value="Voyage 14">Voyage 14</option>
                                <option value="Voyage 15">Voyage 15</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="filtre">
                        <label>Nombre de participants (max 15) :</label>
                        <input type="number" id="nbr_personnes" name="nbr_personnes" min="1" max="15" value="1" step="1" required>
                    </div>

                    <div class="filtre">
                        <label>Duree du sejour (max 15j) :</label>
                        <input type="number" id="duree_sejour" name="duree_sejour" min="2" max="15" value="1" step="1" required>
                    </div>

                    <div class="filtre">
                        <label>Date de depart :</label>
                        <input type="date" id="date_depart" name="date_depart" value="<?php echo date("Y-m-d")?>" min="<?php echo date("Y-m-d")?>" required>
                    </div>

                    <div class="filtre">
                        <label>Logement :</label>
                        <select class="select" id="logement" name="logement" required>
                            <option value="" disabled selected>Choisir un Logement</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Hotel++">Hotel haute gamme</option>
                            <option value="Auberge">Auberge</option>
                            <option value="Airbnb">Airbnb</option>
                        </select>
                    </div>

                    <p class="filtre">Option alimentaire :</p>
                    <div class="checkbox_options">
                        <label><input type="radio" id="pension_sans" name="pension" value="Sans pension" checked/><p>Sans pension</p></label>
                        <label><input type="radio" id="pension_demi" name="pension" value="Demi pension"/><p>Demi-pension</p></label>
                        <label><input type="radio" id="pension_complete" name="pension" value="Pension complète"/><p>Pension complète</p></label>
                    </div>

                    <div class="filtre">
                        <label>Prix estimé :</label>
                        <p id="prix_estime">0 €</p>
                    </div>

                    <button type="submit" class="boutton_recherche">Rechercher</button>
                </form>
            </fieldset> 
        </main>
  
        <?php require('../php/footer.php') ?>
        <script src="../javascript/theme.js" defer></script>
        <script src="../javascript/calcul_prix.js" defer></script>
    </body>
</html>
