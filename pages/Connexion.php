<?php
session_start();
$message = $_GET['error'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="stylesheet" type="text/css" href="../style.css"> 
    <link rel="icon" type="image/jpg" href="../Images/logo.jpg">
</head>
<body>
<?php

        require('../php/header.php')

    ?>
<main>
        <fieldset class="field_connexion">
            <legend class="legend_connexion">Connexion</legend>
            <form class="form_connexion" action="../php/connect.php" method="post">
                <?php if (!isset($message)): ?>
                    <div class="div_connexion">
                        <label for="email">Mon email * :</label>
                    </div>
                    <div>
                        <input type="email" id="email" name="email" class="champ_connexion" placeholder="Saisissez votre adresse mail" required>
                    </div>

                    <div class="div_connexion">
                        <label for="mdp_connexion">Mot de passe * :</label>
                    </div>
                        <input type="password" id="mdp_connexion" name="mdp_connexion" class="champ_connexion" placeholder="Saisissez votre mot de passe" required>
                    </div>
                <?php else: ?> 
                    <div class="div_connexion">
                        <label for="email">Mon email * :</label>
                    </div>
                    <div>
                        <input type="email" id="email" name="email" class="champ_connexion champ_error" placeholder="<?php echo($message) ?>" required>
                    </div>

                    <div class="div_connexion">
                        <label for="mdp_connexion">Mot de passe * :</label>
                    </div>
                        <input type="password" id="mdp_connexion" name="mdp_connexion" class="champ_connexion champ_error" placeholder="<?php echo($message) ?>" required>
                    </div>
                <?php endif; ?>

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