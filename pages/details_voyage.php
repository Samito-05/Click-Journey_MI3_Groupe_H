<?php
session_start();

$ville = $_GET['ville'] ?? '';
$email = $_SESSION['email'];
$sejoursFile = "../sejours.json";
$detailsVoyage = null;

if (file_exists($sejoursFile) && is_readable($sejoursFile)) {
    $contenu = file_get_contents($sejoursFile);
    $voyages = json_decode($contenu, true);

    // Rechercher les détails du voyage pour l'utilisateur connecté
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
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
<?php require('../php/header.php'); ?>
<main>
    <fieldset class="field_profile">
        <legend class="legend_profile">Détails du Voyage</legend>
        <?php if ($detailsVoyage): ?>
            <h2><?php echo ($detailsVoyage['ville']); ?></h2>
            <p><strong>Prix :</strong> <?php echo (int)$detailsVoyage['cout']; ?> €</p>
            <p><strong>Date de départ :</strong> <?php echo ($detailsVoyage['date_debut']); ?></p>
            <p><strong>Durée :</strong> <?php echo ($detailsVoyage['nbr_jours']); ?> jours</p>
            <p><strong>Participants :</strong> <?php echo ($detailsVoyage['nbr_personnes']); ?></p>
            <p><strong>Logement :</strong> <?php echo ($detailsVoyage['logement']); ?></p>
            <p><strong>Pension :</strong> <?php echo ($detailsVoyage['pension']); ?></p>
            <p><strong>Étapes :</strong></p>
            <ul>
                <?php foreach ($detailsVoyage['etapes'] as $etape): ?>
                    <li><?php echo ($etape); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Les détails de ce voyage ne sont pas disponibles.</p>
        <?php endif; ?>
    </fieldset>
</main>
<?php require('../php/footer.php'); ?>
</body>
</html>