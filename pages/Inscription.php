<?php
session_start();
$error = $_GET['error'] ?? null;
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
    <?php require('../php/header.php') ?>
        <main>
            <fieldset class="field_inscription">
                <legend class="legend_inscription">Création de mon compte</legend>
                <form class="form_inscription" method="post" action="../php/cree_compte.php">                
                    <div class="div_ins">
                        <label for="nom">Nom * :</label>
                    </div>
                    <div>
                        <input type="text" id="nom" name="nom" class="champ_inscription" placeholder="Entrer votre nom" required>
                    </div>
                    
                    <div class="div_ins">
                        <label for="prenom">Prénom * :</label>
                    </div>
                    <div>
                        <input type="text" id="prenom" name="prenom" class="champ_inscription" placeholder="Entrer votre prénom"required>
                    </div>

                    <div class="div_ins">
                        <label for="naissance">Date de naissance * :</label>
                    </div>
                    <div>
                        <input type="date" id="naissance" name="naissance" class="champ_inscription" required>
                    </div>

                    <div class="div_ins">
                        <label for="adresse">Adresse * :</label>
                    </div>
                    <div>
                        <input type="text" id="adresse" name="adresse" class="champ_inscription" placeholder="Entrer votre adresse" required>
                    
                    <div class="div_ins">
                        <label for="numero">Téléphone * :</label>
                    </div>
                    <div>
                        <input type="tel" id="numero" name="numero" class="champ_inscription" placeholder="Entrer votre numéro"required>
                    </div>
                    <?php if ($error == 1): ?>
                        <div class="div_ins">
                            <label for="email">Email * :</label>
                        </div>
                        <div>
                            <input type="email" id="email" name="email" class="champ_inscription champ_error" placeholder="Email déjà utilisé"required>
                        </div>
                    <?php else: ?>
                        <div class="div_ins">
                            <label for="email">Email * :</label>
                            </div>
                        <div>
                            <input type="email" id="email" name="email" class="champ_inscription" placeholder="Entrer votre email"required>
                        </div>
                    <?php endif; ?>
                    <?php if ($error == 2): ?>
                        <div class="div_ins">
                            <label for="mdp_inscription">Mot de passe * :</label>
                        </div>
                        <div>
                            <input type="password" id="mdp_inscription" name="mdp_inscription" class="champ_inscription champ_error" placeholder="Les mots de passe ne correspondent pas"required>
                        </div>
                        
                        <div class="div_ins">
                            <label for="mdp_confirm_inscription">Confirmation du mot de passe * :</label>
                        </div>
                        <div>
                            <input type="password" id="mdp_confirm_inscription" name="mdp_confirm_inscription" class="champ_inscription champ_error" placeholder="Les mots de passe ne correspondent pas"required>
                        </div>
                    <?php else: ?>
                        <div class="div_ins">
                            <label for="mdp_inscription">Mot de passe * :</label>
                        </div>
                        <div>
                            <input type="password" id="mdp_inscription" name="mdp_inscription" class="champ_inscription" placeholder="Entrer votre mot de passe"required>
                        </div>
                        
                        <div class="div_ins">
                            <label for="mdp_confirm_inscription">Confirmation du mot de passe * :</label>
                        </div>
                        <div>
                            <input type="password" id="mdp_confirm_inscription" name="mdp_confirm_inscription" class="champ_inscription" placeholder="Confirmer votre mot de passe"required>
                        </div>
                    <?php endif; ?>
                    <p class="saisie_obligatoire"><i>*Saisie obligatoire</i></p>
                    <button type="submit" class="boutton_inscription">Créer mon compte</button>

                    <hr class="hr_inscription">
                    <p class="deja_inscrit">Vous avez déjà un compte ?<a href="Connexion.php">Me connecter</a></p>
                </form>
            </fieldset>
        </main>
        <?php require('../php/footer.php') ?>
        <script src="../javascript/theme.js"></script>
    </body>
</html>