<?php
session_start();

// Vérifier si des données de voyage ont été envoyées depuis `Sejours.php`
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['city'])) {
    $_SESSION['voyage'] = $_POST;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Paiement</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link rel="stylesheet" type="text/css" href="../style.css?ver=<?php echo rand(); ?>">
    </head>
    <body>
        <?php
            require('../php/header.php')
        ?>
        <main>
            <fieldset class="field_paiement">
                <legend class="legend_paiement">Paiement</legend>
                
                <!-- Affichage du résumé du voyage -->
                <p><strong>Destination :</strong> <?php echo $_SESSION['voyage']['city']; ?></p>
                <p><strong>Participants :</strong> <?php echo $_SESSION['voyage']['nbr_personnes']; ?></p>
                <p><strong>Durée :</strong> <?php echo $_SESSION['voyage']['duree_sejour']; ?> jours</p>
                <p><strong>Date de départ :</strong> <?php echo $_SESSION['voyage']['date_depart']; ?></p>
                <p><strong>Logement :</strong> <?php echo $_SESSION['voyage']['logement']; ?></p>
                <p><strong>Pension :</strong> <?php echo $_SESSION['voyage']['pension']; ?></p>

                <form class="form_paiement" action="../php/paiement.php" method="post">
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
                        <input type="text" id="numero_carte" name="numero_carte" class="champ_paiement" maxlength="16" pattern="\d{16}" required>
                    </div>
                    
                    <div class="div_paiement">
                        <label for="date_expiration">Date d'expiration :</label>
                    </div>
                    <div class="div_paiement">
                        <input type="text" id="date_expiration" name="date_expiration" placeholder="MM/AAAA" class="champ_paiement" maxlength="7" required oninput="formatDate(this)">
                    </div>
                    <!-- JavaScript pour formater la date d'expiration -->
                    <script>
                        function formatDate(input) {
                            let value = input.value.replace(/\D/g, '');
                            if (value.length > 2) {
                                value = value.substring(0, 2) + '/' + value.substring(2, 6);
                            }
                            input.value = value;
                        }
                    </script>

                    <div class="div_paiement">
                        <label for="cvv">CVV:</label>
                    </div>
                    <div>
                        <input type="text" id="cvv" name="cvv" class="champ_paiement" maxlength="3" pattern="\d{3}" placeholder="ex: 123" required>
                    </div>
                    <button type="submit" class="boutton_paiement">Payer</button>
                </form>
        </main>
        
        <?php
            require('../php/footer.php')
        ?>
    </body>
</html>