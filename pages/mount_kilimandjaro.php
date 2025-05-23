<?php
session_start();
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
            <h1 class="Titre">Mont Kilimandjaro</h1>
            <iframe class="carte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15936.408037874538!2d37.34532756009439!3d-3.0674031234841292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1839fc5a396ea805%3A0x8e741c478eea6c01!2sKilimandjaro!5e0!3m2!1sfr!2sfr!4v1739349491873!5m2!1sfr!2sfr" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
            <div class="description">
                <p class="description">Le <b>Mont Kilimandjaro</b>, plus haut sommet d’Afrique avec ses <b>5 895 mètres</b>, est une destination mythique pour les amateurs de trekking et de nature sauvage. Situé en Tanzanie, il offre une ascension progressive à travers des paysages variés, allant des forêts tropicales aux neiges éternelles.</p>
                <p class="description"><b>L’ascension du Kilimandjaro</b> est l’activité principale et attire des randonneurs du monde entier. Plusieurs itinéraires permettent d’atteindre le sommet, le plus populaire étant la <b>voie Marangu</b>, surnommée la "route Coca-Cola", qui est la plus accessible avec des refuges en chemin. D’autres itinéraires comme la <b>voie Machame</b> offrent des paysages plus spectaculaires et une meilleure acclimatation. La montée dure généralement entre <b>5 et 9 jours</b>, avec un passage obligé au <b>Uhuru Peak</b>, point culminant du massif et de tout le continent africain.</p>
                <p class="description">Pour ceux qui ne souhaitent pas gravir la montagne, il est possible d’explorer les <b>pentes inférieures du Kilimandjaro</b>, riches en faune et en flore. <b>Le Parc national du Kilimandjaro</b>, classé au patrimoine mondial de l’UNESCO, abrite des forêts luxuriantes où l’on peut observer des colobes noirs et blancs, des éléphants et même des léopards.</p>
                <p class="description">Les amateurs de culture peuvent visiter les villages <b>Chagga</b>, situés au pied de la montagne, pour découvrir les traditions locales et la culture de la banane et du café, produits emblématiques de la région. La grotte de <b>Chagga Underground</b>, utilisée autrefois pour se protéger des envahisseurs Masaï, offre une plongée fascinante dans l’histoire locale.</p>
                <p class="description">Après une journée d’exploration, il est possible de se détendre aux <b>chutes de Materuni</b>, situées non loin de Moshi, où l’on peut nager dans une eau rafraîchissante avec une vue sur la jungle environnante. Les sources chaudes de <b>Kikuletwa</b>, aussi appelées "Chemka Hot Springs", offrent un cadre idyllique pour un bain relaxant dans une eau cristalline.</p>
                <p class="description">Enfin, la région du Kilimandjaro est un excellent point de départ pour un <b>safari en Tanzanie</b>, notamment dans les parcs du <b>Tarangire, du Serengeti ou du cratère du Ngorongoro</b>, où l’on peut observer les célèbres "Big Five" (lion, éléphant, buffle, léopard et rhinocéros).</p>
                <p class="description"><b>Que ce soit pour une aventure intense jusqu’au sommet ou une découverte plus douce des paysages et des cultures locales, le Mont Kilimandjaro promet une expérience inoubliable au cœur de l’Afrique.</b></p>
            </div>
        </main>
        
        <?php require('../php/footer.php') ?>
        <script src="../javascript/theme.js" defer></script>
    </body>
</html>