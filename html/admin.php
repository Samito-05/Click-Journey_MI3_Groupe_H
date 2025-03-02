<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>
<body>
<header class="Entete">
    <div class="logo_petit">
        <a href="../index.php">
            <img src="../Images/logo.jpg" alt="PeakExplorer logo">
        </a>
    </div>
    <ul class="Haut_Page">
        <li class="inactive"><a href="../index.php">Accueil</a></li>
        <li class="inactive"><a href="../html/Sejours.php">Séjours</a></li>
        <li class="inactive"><a href="../html/A_Propos.php">À Propos</a></li>
    </ul>

    <?php if (!isset($_SESSION['email'])): ?>
        <!-- When logged out -->
        <div class="profile">
            <abbr title="Connexion/Inscription">
                <a href="../html/Inscription.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php elseif ($_SESSION['email'] === "admin@peakexplorer.com"): ?>
        <!-- When Admin -->
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="../html/profile.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
        <div class="profile">
            <abbr title="Gestion admin">
                <a href="../html/verif_admin.php">
                    <img src="../Images/admin.png" alt="Admin">
                </a>
            </abbr>
        </div>
    <?php else: ?>
        <!-- When Logged in as normal user -->
        <div class="profile">
            <abbr title="Mon Profile">
                <a href="../html/profile.php">
                    <img src="../Images/profile.png" alt="Profil">
                </a>
            </abbr>
        </div>
    <?php endif; ?>
</header>

        <table class="table_admin">
            <tr>
                <th> Nom </th>
                <th> Prenom </th>
                <th> Adresse Mail </th>
                <th> Mot de passe </th>
                <th> Statut </th>
            </tr>
            <tr>
                <td> Dupont </td>
                <td> Jean-Patoche </td>
                <td> mail@mail.com </td>
                <td> MDP1client </td>
                <td> 
                    <form method="post" action="" class="statut_client">
                        <select name="Statut">
                            <option value="VIP">VIP</option>
                            <option value="Normal">Normal</option>
                            <option value="BanDef">BanDef</option>
                        </select> 
                    </form>
                </td>
            </tr>
            <tr>
                <td> ... </td>
                <td> ... </td>
                <td> ... </td>
                <td> ... </td>
                <td> 
                    <form method="post" action="" class="statut_client">
                        <select name="Statut">
                            <option value="VIP">VIP</option>
                            <option value="Normal">Normal</option>
                            <option value="BanDef">BanDef</option>
                        </select> 
                    </form>
                </td>
            </tr>
            <tr>
                <td> ... </td>
                <td> ... </td>
                <td> ... </td>
                <td> ... </td>
                <td> 
                    <form method="post" action="" class="statut_client">
                        <select name="Statut">
                            <option value="VIP">VIP</option>
                            <option value="Normal">Normal</option>
                            <option value="BanDef">BanDef</option>
                        </select> 
                    </form>
                </td>
            </tr>
        </table>