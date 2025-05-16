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
        <script src="../JAVASCRIPT/mdp.js" defer></script>
        <script src="../JAVASCRIPT/verif_entrees_inscription.js" defer></script>
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
                        <input type="text" id="nom" name="nom" class="champ_inscription" placeholder="Entrer votre nom" maxlength="50" required>
                        <span class="char-count" id="nom-count">50</span>
                    </div>
                    
                    <div class="div_ins">
                        <label for="prenom">Prénom * :</label>
                    </div>
                    <div>
                        <input type="text" id="prenom" name="prenom" class="champ_inscription" placeholder="Entrer votre prénom" maxlength="50" required>
                        <span class="char-count" id="prenom-count">50</span>
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
                        <input type="text" id="adresse" name="adresse" class="champ_inscription" placeholder="Entrer votre adresse" maxlength="100" required>
                        <span class="char-count" id="adresse-count">100</span>
                    </div>
                    
                    <div class="div_ins">
                        <label for="numero">Téléphone * :</label>
                    </div>
                    <div>
                        <input type="tel" id="numero" name="numero" class="champ_inscription" placeholder="Entrer votre numéro" maxlength="10" required>
                        <span class="char-count" id="numero-count">10</span>
                    </div>
                    
                    <?php if ($error == 1): ?>
                        <div class="div_ins">
                            <label for="email">Email * :</label>
                        </div>
                        <div>
                            <input type="email" id="email" name="email" class="champ_inscription champ_error" placeholder="Email déjà utilisé" maxlength="50" required>
                            <span class="char-count" id="email-count">50</span>
                        </div>
                    <?php else: ?>
                        <div class="div_ins">
                            <label for="email">Email * :</label>
                        </div>
                        <div>
                            <input type="email" id="email" name="email" class="champ_inscription" placeholder="Entrer votre email" maxlength="50" required>
                            <span class="char-count" id="email-count">50</span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($error == 2): ?>
                        <div class="div_ins">
                            <label for="mdp_inscription">Mot de passe * :</label>
                        </div>
                        <div>
                            <input type="password" id="mdp_inscription" name="mdp_inscription" class="champ_inscription champ_error" placeholder="Les mots de passe ne correspondent pas" maxlength="20" required>
                            <span class="char-count" id="mdp_inscription-count">20</span>
                        </div>
                        
                        <div class="div_ins">
                            <label for="mdp_confirm_inscription">Confirmation du mot de passe * :</label>
                        </div>
                        <div>
                            <input type="password" id="mdp_confirm_inscription" name="mdp_confirm_inscription" class="champ_inscription champ_error" placeholder="Les mots de passe ne correspondent pas" maxlength="20" required>
                            <span class="char-count" id="mdp_confirm_inscription-count">20</span>
                        </div>
                    <?php else: ?>
                        <div class="div_ins">
                            <label for="mdp_inscription">Mot de passe * :</label>
                        </div>
                        <div>
                            <input type="password" id="mdp_inscription" name="mdp_inscription" class="champ_inscription" placeholder="Entrer votre mot de passe" maxlength="20" required>
                            <span class="char-count" id="mdp_inscription-count">20</span>
                        </div>
                        <div class="div_ins div_visu_mdp">
                            <p class="visibilite_mdp">Afficher le mot de passe :</p>
                            <input type="checkbox" class="visu_mdp" onclick="visu_mdp('mdp_inscription')">   
                        </div>
                        
                        <div class="div_ins">
                            <label for="mdp_confirm_inscription">Confirmation du mot de passe * :</label>
                        </div>
                        <div>
                            <input type="password" id="mdp_confirm_inscription" name="mdp_confirm_inscription" class="champ_inscription" placeholder="Confirmer votre mot de passe" maxlength="20" required>
                            <span class="char-count" id="mdp_confirm_inscription-count">20</span>
                        </div>
                        <div class="div_connexion div_visu_mdp">
                            <p class="visibilite_mdp">Afficher le mot de passe :</p>
                            <input type="checkbox" class="visu_mdp" onclick="visu_mdp('mdp_confirm_inscription')">   
                        </div>
                    <?php endif; ?>
                    
                    <p class="saisie_obligatoire"><i>*Saisie obligatoire</i></p>
                    <button type="submit" class="boutton_inscription" id="btn_inscription">Créer mon compte</button>

                    <hr class="hr_inscription">
                    <p class="deja_inscrit">Vous avez déjà un compte ?<a href="Connexion.php">Me connecter</a></p>
                </form>
            </fieldset>
        </main>
        <?php require('../php/footer.php') ?>
        <script src="../javascript/theme.js" defer></script>
    </body>
</html>