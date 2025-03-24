<?php
session_start();


$destinations = json_decode(file_get_contents('../json/destination.json'), true);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>
<body>
    
    <?php

        require('../php/header.php')

    ?>
<main>
    <div class="voyages-container">
        <h1 class="Titre">Découvrez nos voyages</h1>
        <?php foreach ($destinations as $destination): ?>
            <?php 
                
                $prix = rand(100, 5000); 
            ?>
            <div class="voyage-item">
                <h2><?php echo ($destination['lieu']); ?></h2>
                <p>Explorez les merveilles de <?php echo ($destination['lieu']); ?> avec nos randonnées et activités uniques.</p>
                <p class="price">Prix de base : <?php echo $prix; ?> €</p>
                <form method="get" action="Sejours.php">
                    <input type="hidden" name="ville" value="<?php echo ($destination['lieu']); ?>">
                    <button type="submit">Voir les détails</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

</main>
    <?php

        require('../php/footer.php')

    ?>
    
    </body>
</html>