<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>PeakExplorer - Randonnées en hautes montages</title>
        <link rel="stylesheet" type="text/css" href="../style.css"> 
        <link id="theme-link" rel="stylesheet" href="../clair.css">

        <link rel="icon" type="image/jpg" href="../Images/logo.jpg">
    </head>
    <?php 
        session_start();

        $utilisateur = $_SESSION['email'];
        $ville = $_POST['ville'];
        $nbr_personnes = $_POST['nbr_personnes'];
        $nbr_jours = $_POST['duree_sejour'];
        $date_depart = $_POST['date_depart'];
        $logement = $_POST['logement'];
        $pension = $_POST['pension'];
        $cout = 0;

        $destinations = json_decode(file_get_contents("../json/destination.json"), true);

        $destination = array_filter($destinations, function($d) use ($ville) {
            return $d['lieu'] === $ville;
        });

        $destination = reset($destination);
        $randos = $destination['rando'] ?? [];
        $activites = $destination['activite'] ?? [];
        $options = array_merge($randos, $activites);

        ?>
    <body>
        <?php require('../php/header.php'); ?>
        <main>
            <fieldset class="field_sejours">
                <legend class="legend_sejours">Personaliser votre voyage</legend>

                <!-- Affichage du résumé du voyage -->
                <div class="filtre">
                    <h2 class="filtre">Lieu du voyage</h2>
                    <h3 class="filtre"><?php echo $ville; ?></h3>
                </div>

                <div class="filtre">
                    <h2 class="filtre">Nombre de participants</h2>
                    <input type="number" name="nombre de personne" min="1" max="10" value="<?php echo $nbr_personnes ?>" step="1" required disabled>
                </div>

                <div class="filtre">
                    <h2 class="filtre">Duree du sejour</h2>
                    <input type="number" name="duree_sejour" min="2" max="10" value="<?php echo $nbr_jours ?>" step="1" required disabled>
                </div>

                <div class="filtre">
                    <h2 class="filtre">Date de depart</h2>
                    <input type="date" name="date_depart" value="<?php echo $date_depart ?>" required disabled>
                </div>

                <div class="filtre">
                    <h2 class="filtre">Logement</h2>
                    <h3 class="filtre"><?php echo $logement ?></h3>
                </div>

                <div class="filtre">
                    <h2 class="filtre">Option alimentaire</h2>
                    <h3 class="filtre"><?php echo $pension ?></h3>
                </div>

                <!-- <?php require('../php/calcul_cout.php'); ?> -->

                <div class="filtre">
                    <h2 class="filtre">Choisissez une activité par jour</h2>

                    <?php
                    if ($_SESSION['statut'] === "vip") {
                        $cout *= 0.9; // 10% de réduction pour les VIP
                    }
                    ?> // 10% de réduction pour les VIP
                    
                    <!-- Formulaire unique pour ajouter au panier ou payer directement -->
                    <form action="../php/paiement.php" method="post">
                        <input type="hidden" name="ville" value="<?php echo $ville; ?>">
                        <input type="hidden" name="nbr_personnes" value="<?php echo $nbr_personnes; ?>">
                        <input type="hidden" name="duree_sejour" value="<?php echo $nbr_jours; ?>">
                        <input type="hidden" name="date_depart" value="<?php echo $date_depart; ?>">
                        <input type="hidden" name="logement" value="<?php echo $logement; ?>">
                        <input type="hidden" name="pension" value="<?php echo $pension; ?>">
                        <input type="hidden" name="cout" value="<?php echo $cout; ?>">

                        <table class="table_sejours">
                            <tr>
                                <th>Jour</th>
                                <th>Option</th>
                            </tr>
                        </table>
                        <div id="options-container"></div>

                        <button class="boutton_ajout_panier" formaction="../php/ajout_panier.php" type="submit">Ajouter au panier 🛒</button>
                        <button class="boutton_sejours" formaction="../php/paiement.php" type="submit">Payer directement ce voyage</button>
                    </form>
                </div>

                <div class="filtre">
                    <h2 class="filtre">Cout du voyage</h2>
                    <h3 class="filtre" id="prix_estime"><?php echo $cout; ?> €</h3>
                </div>

            </fieldset>
        </main>

        <?php require('../php/footer.php'); ?>
        <script src="../javascript/theme.js" defer></script>
        <script src="../javascript/sejours.js" defer></script>                               
    </body>
</html>     
</html>