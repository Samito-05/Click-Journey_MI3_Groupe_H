<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>
<?php 

    $utilisateur = $_SESSION['email'];
    $ville = $_POST['city'];
    $nbr_personnes = $_POST['nbr_personnes'];
    $nbr_jours = $_POST['duree_sejour'];
    $date_depart = $_POST['date_depart'];
    $logement = $_POST['logement'];
    $pension = $_POST['pension'];
    $file = fopen("../sejours.txt", "a+");

?>

<fieldset class="field_sejours">
    <legend class="legend_sejours">Personaliser votre voyage</legend>
        <form method="post">

            <div class="filtre">
                <label>Lieu du voyage :</label>
                <p><?php echo $ville; ?></p>
                
            </div>

            <div class="filtre">
                <label>Nombre de participants :</label>
                <input type="number" name="nombre de personne" min="1" max="10" value="<?php echo $nbr_personnes ?>" step="1" required>
            </div>

            <div class="filtre">
                <label>Duree du sejour :</label>
                <input type="number" name="duree_sejour" min="2" max="10" value="<?php echo $nbr_jours ?>" step="1" required>
            </div>

            <div class="filtre">
                <label>Date de depart :</label>
                <input type="date" name="date_depart" value="<?php echo $date_depart ?>" required>
            </div>

            <div class="filtre">
                <label>Logement :</label>
                <p><?php echo $logement ?></p>
            </div>

            <p class="filtre">Option alimentaire :</p>
            <p class="filtre"><?php echo $pension ?></p>

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
        <button class="boutton_sejours" type="submit">Submit</button>
    </form>