<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>
<?php 

    session_start();

    $utilisateur = $_SESSION['email'];
    $ville = $_POST['city'];
    $nbr_personnes = $_POST['nbr_personnes'];
    $nbr_jours = $_POST['duree_sejour'];
    $date_depart = $_POST['date_depart'];
    $logement = $_POST['logement'];
    $pension = $_POST['pension'];
    $file = fopen("../sejours.txt", "a+");

?>
<body>

    <?php

        require('../php/header.php')

    ?>

<main>

    <fieldset class="field_sejours">
        <legend class="legend_sejours">Personaliser votre voyage</legend>
            <form action="../paiement.php" method="post">

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

                <div class="filtre">
                    <h2 class="filtre">Choisissez une activité par jour</h2>

                    <table class="table_sejours">
                        <tr>
                            <th>Jour</th>
                            <th>Activité</th>
                        </tr>
            
                        <?php for ($i=1; $i < $nbr_jours+1; $i++) : ?>

                            <tr>
                                <td>Jour <?php echo $i; ?></td>
                                <td>
                                    <select name="options[<?php echo $i; ?>]">
                                        <option value="Spa Day">Journée de repos</option>
                                        <option value="Hike">Randonnée</option>
                                        <option value="Museum Visit">Visite Culturelle</option>
                                    </select>
                                </td>
                            </tr>

                        <?php endfor; ?>

                    </table>
                </div>

            <button class="boutton_sejours" type="submit">Aller au paiement</button>
        </form>
    </fieldset>

</main>
        
        <?php

        require('../php/footer.php')

        ?>
    
    </body>
</html>