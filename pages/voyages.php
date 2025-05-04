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
        <script src="../javascript/sort_voyages.js"></script>
    </head>
    <body>
        <?php require('../php/header.php'); ?>
        <main>
            <div class="voyages-container">
                <h1 class="Titre">Découvrez nos voyages</h1>
                <div class="sort-options">
                    <label for="sort-select">Trier par :</label>
                    <select id="sort-select">
                        <option value="distance-asc">Distance (croissant)</option>
                        <option value="distance-desc">Distance (décroissant)</option>
                        <option value="price-asc">Prix (croissant)</option>
                        <option value="price-desc">Prix (décroissant)</option>
                    </select>
                </div>
                <div id="voyages-list">
                    <?php if (!empty($destinations)): ?>
                        <?php foreach ($destinations as $destination): ?>
                            <div class="voyage-item" data-distance="<?php echo $destination['distance']; ?>" data-price="<?php echo $destination['prix_base']; ?>">
                                <h2><?php echo htmlspecialchars($destination['lieu']); ?></h2>
                                <p>Explorez les merveilles de <?php echo htmlspecialchars($destination['lieu']); ?> avec nos randonnées et activités uniques.</p>
                                <p class="price">Prix de base : <?php echo $destination['prix_base']; ?> €</p>
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
            </div>
        </main>
        <?php require('../php/footer.php'); ?>
        <script src="../javascript/theme.js" defer></script>
    </body>
</html>