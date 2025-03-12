<?php 

    $utilisateur = $_SESSION['email'];
    $ville = $_POST['city'];
    $nbr_personnes = $_POST['nombre de personne'];
    $nbr_jours = $_POST['duree_sejour'];
    $date_depart = $_POST['date_depart'];
    $logement = $_POST['logement'];
    $options = $_POST['option'];
    $pension = $_POST['pension'];
    $file = fopen("../sejours.txt", "a+");

?>

<fieldset class="field_sejours">
    <legend class="legend_sejours">Personaliser votre voyage</legend>
    <form method="post">
        <table class="table_sejours">
            <tr>
                <th>Jour</th>
                <th>Activité</th>
            </tr>
    
<?php for ($i=1; $i < $nbr_jours+1; $i++) : ?>

    <tr>
        <td>Day <?php echo $i; ?></td>
        <td>
            <select name="options[<?php echo $i; ?>]">
                <option value="Spa Day">Spa Day</option>
                <option value="Hike">Hike</option>
                <option value="Museum Visit">Museum Visit</option>
            </select>
        </td>
    </tr>

<?php endfor; ?>

        </table>
        <button class="boutton_sejours" type="submit">Submit</button>
    </form>