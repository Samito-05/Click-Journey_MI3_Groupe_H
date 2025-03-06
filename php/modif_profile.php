<?php

session_start();

$fichier = "../comptes.txt";
$email = $_SESSION['email'];

$nv_nom = trim($_POST['nom']);
$nv_prenom = trim($_POST['prenom']);
$nv_naissance = $_POST['naissance'];
$nv_adresse = trim($_POST['adresse']);
$nv_mail = trim($_POST['mail']);
$nv_num = trim($_POST['num']);
$nv_mdp = trim($_POST['mdp1']);
$nv_mdp_confirm = trim($_POST['mdp2']);

if (file_exists($fichier) && is_readable($fichier)) {
    $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $nouveau_contenu = [];

    foreach ($lignes as $ligne) {
        $infos = explode(" ; ", $ligne);
        
        if (count($infos) >= 7) {
            list($nom, $prenom, $naissance, $adresse, $num, $utilisateur, $mdp_hash) = $infos;

            if ($utilisateur === $email) {
                
                if ($nv_nom !== "") {
                    $nom = $nv_nom;
                }
                if ($nv_prenom !== "") {
                    $prenom = $nv_prenom;
                }
                if ($nv_naissance !== "") {
                    $naissance = $nv_naissance;
                }
                if ($nv_adresse !== "") {
                    $adresse = $nv_adresse;
                }
                if ($nv_mail !== "") {
                    $utilisateur = $nv_mail;
                }
                if ($nv_num !== "") {
                    $num = $nv_num;
                }
                if ($nv_mdp !== "" && $nv_mdp === $nv_mdp_confirm) {
                    $mdp_hash = password_hash($nv_mdp, PASSWORD_DEFAULT);
                }

                $_SESSION['email'] = $utilisateur;
            }

            $nouveau_contenu[] = "$nom ; $prenom ; $naissance ; $adresse ; $num ; $utilisateur ; $mdp_hash";
        }
    }

    file_put_contents($fichier, implode("\n", $nouveau_contenu) . "\n");
}

header("location: ../pages/profile.php");
exit();

?>