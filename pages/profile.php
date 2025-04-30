<?php
    session_start();
    $email = $_SESSION['email'];
    $fichier = "../json/comptes.json";

    if (file_exists($fichier) && is_readable($fichier)) {
        $contenu = file_get_contents($fichier);
        $comptes = json_decode($contenu, true);

        if (is_array($comptes)) {
            foreach ($comptes as $compte) {
                if (isset($compte['email']) && $compte['email'] === $email) {
                    $nom = $compte['nom'];
                    $prenom = $compte['prenom'];
                    $naissance = $compte['naissance'];
                    $adresse = $compte['adresse'];
                    $num = $compte['num'];
                    $utilisateur = $compte['email'];
                    break;
                }
            }
        }
    }

    
    $sejoursFile = "../json/sejours.json";
    $voyagesPayes = [];

    if (file_exists($sejoursFile) && is_readable($sejoursFile)) {
        $contenu = file_get_contents($sejoursFile);
        $voyages = json_decode($contenu, true);

        
        foreach ($voyages as $voyage) {
            if ($voyage['utilisateur'] === $email) {
                $voyagesPayes[] = $voyage;
            }
        }
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
        <script src="../JAVASCRIPT/mdp.js"></script>
        <script src="../JAVASCRIPT/profile.js"></script>
    </head>
    <body>
        <?php require('../php/header.php'); ?>
        <main>
            <fieldset class="field_profile">
                <legend class="legend_profile">Modifications du profil</legend>
                <form class="form_profile" action="../php/modif_profile.php" method="post">
                    <div class="div_profile">
                        <label for="nom">Nom :</label>
                    </div>
                    <div class="div_modif">
                        <input type="text" id="nom" name="nom" class="champ_inscription" disabled value="<?php echo $nom; ?>">
                        <label for="nom" onclick="deverouiller_input('nom')"><img class="modif" src="../Images/modif.png"></label>
                    </div>
                    
                    <div class="div_profile">
                        <label for="prenom">Prénom :</label>
                    </div>
                    <div class="div_modif">
                        <input type="text" id="prenom" name="prenom" class="champ_inscription" disabled value="<?php echo $prenom; ?>">
                        <label for="prenom" onclick="deverouiller_input('prenom')"><img class="modif" src="../Images/modif.png"></label>
                    </div>
                    <div class="div_profile">
                        <label for="naissance">Date de naissance :</label>
                    </div>
                    <div class="div_modif">
                        <input type="date" id="naissance" name="naissance" class="champ_inscription" disabled value="<?php echo $naissance; ?>">
                        <label for="naissance" onclick="deverouiller_input('naissance')"><img class="modif" src="../Images/modif.png"></label>
                    </div>
                    <div class="div_profile">
                        <label for="adresse">Adresse :</label>
                    </div>
                    <div class="div_modif">
                        <input type="text" id="adresse" name="adresse" class="champ_inscription" disabled value="<?php echo $adresse; ?>">
                        <label for="adresse" onclick="deverouiller_input('adresse')"><img class="modif" src="../Images/modif.png"></label>
                    </div>
                    <div class="div_profile">
                        <label for="mail">Adresse Mail :</label>
                    </div>
                    <div class="div_modif">
                        <input type="email" id="mail" name="mail" class="champ_inscription" disabled value="<?php echo $utilisateur; ?>">
                        <label for="mail" onclick="deverouiller_input('mail')"><img class="modif" src="../Images/modif.png"></label>
                    </div>
                    <div class="div_profile">
                        <label for="num">Numero :</label>
                    </div>
                    <div class="div_modif">
                        <input type="tel" id="num" name="num" class="champ_inscription" disabled value="<?php echo $num; ?>">
                        <label for="num" onclick="deverouiller_input('num')"><img class="modif" src="../Images/modif.png"></label>
                    </div>
                    <div class="div_profile">
                        <label for="mdp2">Nouveau mot de passe :</label>
                    </div>
                    <div class="div_modif">
                        <input type="password" id="mdp2" name="mdp2" class="champ_inscription" disabled value="........">
                        <label for="mdp2" onclick="deverouiller_input('mdp2')"><img class="modif" src="../Images/modif.png"></label>
                    </div>
                    <div class="div_modif div_visu_mdp">
                            <p class="visibilite_mdp">Afficher le mot de passe :</p>
                            <input type="checkbox" class="visu_mdp"onclick="visu_mdp('mdp2')">   
                    </div>
                    <div class="div_profile">
                        <label for="mdp3">Vérification du nouveau mot de passe :</label>
                    </div>
                    <div class="div_modif">
                        <input type="password" id="mdp3" name="mdp1" class="champ_inscription" disabled value="........">
                        <label for="mdp3" onclick="deverouiller_input('mdp3')"><img class="modif" src="../Images/modif.png"></label>
                    </div>
                    <div class="div_modif div_visu_mdp">
                            <p class="visibilite_mdp">Afficher le mot de passe :</p>
                            <input type="checkbox" class="visu_mdp"onclick="visu_mdp('mdp3')">   
                    </div>
                    <button type="submit" class="boutton_modif">Valider Changements</button>
                </form>
                <form class="form_profile" action="../php/logout.php" method="post">
                    <button type="submit" class="boutton_modif" id="deconnecter">Se Deconnecter</button>
                </form>
                <form class="form_profile" action="../php/supprimer.php" method="post">
                    <button type="submit" class="boutton_modif" id="effacer">Effacer Compte</button>
                </form>   
            </fieldset>

            <fieldset class="field_reserve">
                <legend class="legend_reserve">Mes Voyages Payés</legend>
                <?php if (!empty($voyagesPayes)): ?>
                    <table class="table_reserve">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($voyagesPayes as $voyage): ?>
                                <tr>
                                    <td><?php echo ($voyage['ville']); ?></td>
                                    <td><?php echo ($voyage['cout']); ?>€</td>
                                    <td><?php echo ($voyage['statut']); ?></td>
                                    <td>
                                        <form method="get" action="details_voyage.php">
                                            <input type="hidden" name="ville" value="<?php echo ($voyage['ville']); ?>">
                                            <button type="submit" class="boutton_reserve">Voir les détails</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Vous n'avez pas encore de voyages payés.</p>
                <?php endif; ?>
            </fieldset>
        </main>
        
        <?php require('../php/footer.php'); ?>
        <script src="../javascript/theme.js"></script>
    </body>
</html>