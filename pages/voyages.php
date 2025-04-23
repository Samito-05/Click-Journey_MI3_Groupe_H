<?php
session_start();

// Vérifiez si des résultats de recherche sont passés via GET
if (isset($_GET['resultats'])) {
    $destinations = json_decode(urldecode($_GET['resultats']), true);
} else {
    // Sinon, chargez toutes les destinations
    $destinations = json_decode(file_get_contents('../json/destination.json'), true);
}
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
        <?php require('../php/header.php'); ?>
        <main>
            <div class="voyages-container">
                <h1 class="Titre">Découvrez nos voyages</h1>
                <?php if (!empty($destinations)): ?>
                    <?php foreach ($destinations as $destination): ?>
                        <?php $prix = $destination['prix_base']; ?>
                        <div class="voyage-item">
                            <h2><?php echo htmlspecialchars($destination['lieu']); ?></h2>
                            <p>Explorez les merveilles de <?php echo htmlspecialchars($destination['lieu']); ?> avec nos randonnées et activités uniques.</p>
                            <p class="price">Prix de base : <?php echo $prix; ?> €</p>
                            <form method="get" action="Sejours.php">
                                <input type="hidden" name="ville" value="<?php echo htmlspecialchars($destination['lieu']); ?>">
                                <button type="submit">Voir les détails</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucune destination trouvée.</p>
                <?php endif; ?>
            </div>
        </main>
        <?php require('../php/footer.php'); ?>
        <script src="../javascript/theme.js"></script>
    </body>
</html>