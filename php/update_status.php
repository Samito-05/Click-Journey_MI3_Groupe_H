<?php

session_start();

$fichier = "../comptes.txt";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = filter_input(INPUT_POST, 'nom');
    $nv_statut = filter_input(INPUT_POST, 'Statut');

    if (file_exists($fichier) && is_readable($fichier)) {
        $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $nouveau_contenu = [];

        foreach ($lignes as $ligne) {
            $infos = explode(" ; ", $ligne);

            if (count($infos) >= 8) {
                list($nom_fichier, $prenom, $naissance, $adresse, $num, $utilisateur, $mdp_hash, $statut) = $infos;

                if ($nom_fichier === $nom) {
                    $statut = $nv_statut;
                }
                $nouveau_contenu[] = "$nom_fichier ; $prenom ; $naissance ; $adresse ; $num ; $utilisateur ; $mdp_hash ; $statut";
            }
        }
        file_put_contents($fichier, implode("\n", $nouveau_contenu) . "\n");
    }
}

header("location: ../pages/admin.php");
exit();

?>