<?php
    session_start();
    require('../php/getapikey.php');

    $status = $_GET["status"] ?? null;
    $montant = $_GET["montant"] ?? null;
    $transaction = $_GET["transaction"] ?? null;
    $vendeur = $_GET["vendeur"] ?? null;
    $control = $_GET["control"] ?? null;

    if (!$status || !$montant || !$transaction || !$vendeur || !$control) {
        die("Paramètres manquants dans la requête.");
    }

    $control_verification = getapikey($vendeur) . "#" . $transaction . "#" . $montant . "#" . $vendeur . "#" . $status . "#";
    $control_verification = md5($control_verification);

    if ($control !== $control_verification) {
        die("Erreur de vérification du contrôle.");
    }

    $sejoursFile = "../json/sejours.json";

    if (!file_exists($sejoursFile)) {
        die("Fichier des séjours introuvable.");
    }

    $sejoursData = json_decode(file_get_contents($sejoursFile), true);
    if (!is_array($sejoursData)) {
        die("Erreur lors du chargement des données JSON.");
    }

    $sejoursPayes = [];
    foreach ($sejoursData as &$sejour) {
        if ($sejour["transaction_id"] === $transaction && $sejour["utilisateur"] === $_SESSION['email']) {
            $sejour["statut"] = ($status === "accepted") ? "Payé" : "Échec";
            $sejoursPayes[] = $sejour;
        }
    }
    
    file_put_contents($sejoursFile, json_encode($sejoursData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
    // Vider le panier après le paiement
    //unset($_SESSION['panier']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmation Paiement Panier</title>
        <link rel="stylesheet" href="../style.css">
        <link id="theme-link" rel="stylesheet" href="../clair.css">
        <link rel="icon" type="image/jpg" href="../Images/logo.jpg">
    </head>
    <body>
        <?php require('../php/header.php'); ?>
        <main>
            <?php foreach ($sejoursPayes as $sejour): ?>
                <fieldset class="field_confirm">
                    <legend class="legend_profile">Confirmation de Paiement</legend>
                    <h2 class="confirm_voyage"><?php echo htmlspecialchars($sejour['ville']); ?></h2>
                    <div class="confirm_voyage"><p><strong>Statut : </strong><?php echo htmlspecialchars($sejour['statut']); ?></p></div>
                    <div class="confirm_voyage"><p><strong>Montant : </strong><?php echo htmlspecialchars($sejour['cout']); ?> €</p></div>
                    <div class="confirm_voyage"><p><strong>Référence : </strong><?php echo htmlspecialchars($sejour['transaction_id']); ?></p></div>
                    <div class="confirm_voyage"><p><strong>Date de départ : </strong><?php echo htmlspecialchars($sejour['date_debut']); ?></p></div>
                    <div class="confirm_voyage"><p><strong>Durée : </strong><?php echo htmlspecialchars($sejour['nbr_jours']); ?> jours</p></div>
                    <div class="confirm_voyage"><p><strong>Participants : </strong><?php echo htmlspecialchars($sejour['nbr_personnes']); ?></p></div>
                    <div class="confirm_voyage"><p><strong>Logement : </strong><?php echo htmlspecialchars($sejour['logement']); ?></p></div>
                    <div class="confirm_voyage"><p><strong>Pension : </strong><?php echo htmlspecialchars($sejour['pension']); ?></p></div>
                    <div class="confirm_voyage"><p><strong>Étapes : </strong></p></div>
                    <div class="confirm_voyage">
                        <ul class="confirm_voyage">
                            <?php foreach ($sejour['etapes'] as $etape): ?>
                                <li><?php echo htmlspecialchars($etape); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <form action="../index.php">
                        <input class="boutton_retour" type="submit" value="Retour à l'accueil">
                    </form>
                </fieldset>
            <?php endforeach; ?>
        </main>
        <?php require('../php/footer.php'); ?>
        <script src="../javascript/theme.js" defer></script>
    </body>
</html>
