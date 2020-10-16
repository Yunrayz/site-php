<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

    <body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    ?>
    <h1>Mon projet</h1>
    <h3>Les trois premières options</h3>
    <p>Il manquait la table récolte dans ce site. J'ai donc naturellement décidé de l'utiliser. Cependant, elle n'est en l'état pas très intéressante. Il faut la combiner avec vin et producteur pour pouvoir effectuer des requêtes intéressantes.</p>
    <p>C'est ici que les difficultés commencent. Comment utiliser la PDO et le MVC sur une requête comportant plusieurs JOIN ? Je me suis inspiré du début du TP PHP/SQL n°11 en utilisant une variable row et la fonction fetch à plusieurs reprises. J'ai ainsi pu obtenir un affichage total et satisfaisant. Cela m'a également permis de n'utiliser qu'une seule vue pour les trois premières requête. J'ai ensuite créé des fonctions effectuant des requêtes s'avérant plus ou moins intéressante, à vous de juger !</p>
    <h3>Le tableau de suppression des récoltes</h3>
    <p>Je voulais permettre à l'utilisateur de supprimer plus facilement dans la base de donnée que dans MVC1 et MVC2. Ainsi, j'ai créé un tableau comportant la totalité des tuples de récoltes. La dernière colonne comporte une checkbox. Le tableau est en fait contenu dans un FORM de type POST (avec GET l'URL n'était pas valide pour le router). Chaque checkbox peut faire passer une variable décrite ainsi : </p>
    <p>producteur_id (la clé) = vin_id (la valeur)</p>
    <p>Ainsi, j'obtiens un couple de valeur par tuple et j'économise des variables donc de la mémoire. Une boucle foreach sur les superglobales me permet de faire les suppressions par la suite.</p>
    <h3>Laisser un avis</h3>
    <p>La plupart des sites proposent aujourd'hui de laisser un avis. J'ai donc tout simplement créé une table avis pour cela sur Phpmyadmin. Il a ensuite fallu créer un model, un controller, des vues, etc... Il est possible de laisser un avis ou d'aller directement regarder l'ensemble des avis.</p>


</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>