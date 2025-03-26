<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="stylesheet" type="text/css" href="../style.css"> 
    <link rel="icon" type="image/png" href="../Images/peak_explorer_logo.png">
</head>
<body>
<?php

        require('../php/header.php')

    ?>
<main>
        <fieldset class="field_connexion">
            <legend class="legend_connexion">Connexion</legend>
            <form class="form_connexion" action="../php/connect.php" method="post">
                <div class="div_connexion">
                    <label for="email">Mon email * :</label>
                </div>
                <div>
                    <input type="email" id="email" name="email" class="champ_connexion" required>
                </div>

                <div class="div_connexion">
                    <label for="mdp_connexion">Mot de passe * :</label>
                </div>
                    <input type="password" id="mdp_connexion" name="mdp_connexion" class="champ_connexion" required>
                </div>

                <button type="submit" class="boutton_connexion">Me connecter</button>

                <p class="s_inscrire">Vous n'avez pas de compte ?<a href="Inscription.php">S'incrire</a></p>
            </form>
        </fieldset>
 
        </main>
        
        <?php

        require('../php/footer.php')

        ?>
    
    </body>
</html>