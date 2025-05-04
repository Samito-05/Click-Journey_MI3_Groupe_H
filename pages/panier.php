<?php
    session_start();
    if (!isset($_SESSION['statut'])) {
        header('Location: Connexion.php');
        exit();
    }
    $panier = $_SESSION['panier'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mon Panier - PeakExplorer</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link id="theme-link" rel="stylesheet" href="../clair.css">
        
    <link rel="icon" type="image/jpg" href="../Images/logo.jpg">
</head>
<body>
<?php require('../php/header.php'); ?>
<main>
    <h1>Mon panier</h1>

    <?php if (empty($panier)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($panier as $index => $voyage): ?>
                <li>
                    <strong><?php echo htmlspecialchars($voyage['ville']); ?></strong><br>
                    Participants : <?php echo $voyage['nbr_personnes']; ?><br>
                    Durée : <?php echo $voyage['duree_sejour']; ?> jours<br>
                    Départ : <?php echo $voyage['date_depart']; ?><br>
                    Coût : <?php echo $voyage['cout']; ?> €<br>
                    <form method="post" action="../php/supprimer_panier.php" style="display:inline;">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>

        <form action="../php/paiement.php" method="post">
            <button type="submit">Procéder au paiement de tous les voyages</button>
        </form>
    <?php endif; ?>
</main>
<?php require('../php/footer.php'); ?>
<script src="../javascript/theme.js"></script>
</body>
</html>
