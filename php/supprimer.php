<?php
    session_start();
    
    $fichier = "../comptes.txt";
    $email = $_SESSION['email']; 

    if (file_exists($fichier) && is_readable($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $nouveau_contenu = [];

        foreach ($lignes as $ligne) {
            list($nom, $prenom, $num, $utilisateur, $mdp_hash) = explode(" ", $ligne);
            
            if ($utilisateur !== $email) {
                $nouveau_contenu[] = $ligne;
            }
        }

        file_put_contents($fichier, implode("\n", $nouveau_contenu) . "\n");
    }

    session_destroy();
    
    header("Location: ../index.php");
    exit();
?>