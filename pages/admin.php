<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PeakExplorer - Randonnées en hautes montages</title>
    <link rel="icon" type="image/jpg" href="../Images/logo.jpg">
    <link rel="stylesheet" type="text/css" href="../style.css"> 
</head>
<body>
<header class="Entete">

<?php if (!isset($_SESSION['email'])): ?>
    <!-- When logged out -->
    <div class="logo_petit">
        <a href="../index.php">
            <img src="../Images/logo.jpg" alt="PeakExplorer logo">
        </a>
    </div>
    <ul class="Haut_Page">
        <li class="inactive"><a href="../index.php">Accueil</a></li>
        <li class="active"><a href="../pages/A_Propos.php">À Propos</a></li>
    </ul>
    <div class="profile">
        <abbr title="Connexion/Inscription">
            <a href="../pages/Connexion.php">
                <img src="../Images/profile.png" alt="Profil">
            </a>
        </abbr>
    </div>
<?php elseif ($_SESSION['email'] === "admin@peakexplorer.com"): ?>
    <!-- When Admin -->
    <div class="logo_petit">
        <a href="../index.php">
            <img src="../Images/logo.jpg" alt="PeakExplorer logo">
        </a>
    </div>
    <ul class="Haut_Page">
        <li class="inactive"><a href="../index.php">Accueil</a></li>
        <li class="inactive"><a href="../pages/Sejours.php">Séjours</a></li>
        <li class="active"><a href="../pages/A_Propos.php">À Propos</a></li>
    </ul>
    <div class="profile">
        <abbr title="Mon Profile">
            <a href="../pages/profile.php">
                <img src="../Images/profile.png" alt="Profil">
            </a>
        </abbr>
        <abbr title="Gestion admin">
            <a href="../pages/admin.php">
                <img src="../Images/admin.png" alt="Admin">
            </a>
        </abbr>
    </div>
<?php else: ?>
    <!-- When Logged in as normal user -->
    <div class="logo_petit">
        <a href="../index.php">
            <img src="../Images/logo.jpg" alt="PeakExplorer logo">
        </a>
    </div>
    <ul class="Haut_Page">
        <li class="inactive"><a href="../index.php">Accueil</a></li>
        <li class="inactive"><a href="../pages/Sejours.php">Séjours</a></li>
        <li class="active"><a href="../pages/A_Propos.php">À Propos</a></li>
    </ul>
    <div class="profile">
        <abbr title="Mon Profile">
            <a href="../pages/profile.php">
                <img src="../Images/profile.png" alt="Profil">
            </a>
        </abbr>
    </div>
<?php endif; ?>
</header>
<main>

<?php
$file = "../json/comptes.json";
if (!file_exists($file) || !is_readable($file)) {
    die("Error: Unable to read the user accounts file.");
}

$jsonData = file_get_contents($file);
$users = json_decode($jsonData, true);

if ($users === null) {
    die("Error: Invalid JSON format.");
}

echo '<table class="table_admin">
        <tr>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Adresse Mail </th>
            <th> Mot de passe </th>
            <th> Statut </th>
        </tr>';

foreach ($users as $user) {
    echo "<tr>
            <td>" . ($user['nom']) . "</td>
            <td>" . ($user['prenom']) . "</td>
            <td>" . ($user['email']) . "</td>
            <td>********</td>
            <td>
                <form method='post' action='../php/update_status.php'>
                    <input type='hidden' name='nom' value='" . ($user['nom']) . "'>
                    <select name='Statut'>
                        <option value='client' " . ($user['statut'] == "client" ? "selected" : "") . ">Client</option>
                        <option value='vip' " . ($user['statut'] == "vip" ? "selected" : "") . ">VIP</option>
                        <option value='admin' " . ($user['statut'] == "admin" ? "selected" : "") . ">Admin</option>
                        <option value='BanDef' " . ($user['statut'] == "BanDef" ? "selected" : "") . ">BanDef</option>
                    </select>
                    <button type='submit'>Modifier</button>
                </form>
            </td>
          </tr>";
}

echo '</table>';
?>

</main>
        
<?php
require('../php/footer.php');
?>
    
</body>
</html>