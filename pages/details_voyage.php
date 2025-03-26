<?php
session_start();

$ville = $_GET['ville'] ?? '';
$email = $_SESSION['email'];
$sejoursFile = "../json/sejours.json";
$detailsVoyage = null;

if (file_exists($sejoursFile) && is_readable($sejoursFile)) {
    $contenu = file_get_contents($sejoursFile);
    $voyages = json_decode($contenu, true);

    foreach ($voyages as $voyage) {
        if ($voyage['utilisateur'] === $email && $voyage['ville'] === $ville) {
            $detailsVoyage = $voyage;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Détails du Voyage - <?php echo ($ville); ?></title>
    <link rel="icon" type="image/png" href="../Images/peak_explorer_logo.png">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<?php require('../php/header.php'); ?>
<main>
    <fieldset class="field_profile">
        <legend class="legend_profile">Détails du Voyage</legend>
        <?php if ($detailsVoyage): ?>
            <h2 class="details_voyage"><?php echo ($detailsVoyage['ville']); ?></h2>
            <div class="details_voyage"><p><strong>Prix :</strong> <?php echo (int)$detailsVoyage['cout']; ?> €</p></div>
            <div class="details_voyage"><p><strong>Date de départ :</strong> <?php echo ($detailsVoyage['date_debut']); ?></p></div>
            <div class="details_voyage"><p><strong>Durée :</strong> <?php echo ($detailsVoyage['nbr_jours']); ?> jours</p></div>
            <div class="details_voyage"><p><strong>Participants :</strong> <?php echo ($detailsVoyage['nbr_personnes']); ?></p></div>
            <div class="details_voyage"><p><strong>Logement :</strong> <?php echo ($detailsVoyage['logement']); ?></p></div>
            <div class="details_voyage"><p><strong>Pension :</strong> <?php echo ($detailsVoyage['pension']); ?></p></div>
            <div class="details_voyage"><p><strong>Statut :</strong> <?php echo ($detailsVoyage['statut']); ?> </p></div>
            <div class="details_voyage"><p><strong>Étapes :</strong></p></div>
            <div class="details_voyage"><ul>
                <?php foreach ($detailsVoyage['etapes'] as $etape): ?>
                    <li><?php echo ($etape); ?></li>
                <?php endforeach; ?>
            </ul></div>
        <?php else: ?>
            <p>Les détails de ce voyage ne sont pas disponibles.</p>
        <?php endif; ?>
    </fieldset>
</main>
<?php require('../php/footer.php'); ?>
</body>
</html>