<?php 
require 'view_begin.php';
?>

<link rel="stylesheet" href="../Css/acceuil.css">
    <!-- Bannière Principale -->
    <section class="banner">
        <h1>Bienvenue au Consulat d'Algérie</h1>
        <img src="images/kabylie2.png" alt="L'Algérie, un pays à explorer" class="banner-image">
        <p class="banner-text">L'Algérie, un pays à explorer</p>
    </section>

    <!-- Section de Description -->
    <section class="description">
        <p>
            L'Algérie est le plus grand pays d'Afrique, avec une superficie de 2,38 millions de km² et une population d'environ 45 millions d'habitants. Ce vaste pays est riche en histoire, en culture et en nature, offrant des paysages variés allant des montagnes verdoyantes aux étendues désertiques du Sahara.
        </p>
    </section>

    <!-- Section Galerie avec Carrousel -->
    <section class="gallery">
        <h2>Voici quelques beaux paysages de la magnifique Algérie</h2>
        <div class="carousel">
            <div class="carousel-images">
                <img src="images/monument-aux-morts-Constantine-300x200 1.png" alt="Paysage 1">
                <img src="images/annaba-Saint-Augustin-300x185 1.png" alt="Paysage 2">
                <img src="images/monument-des-martyrs-maqam-chahid-300x225 1.png" alt="Paysage 3">
                <img src="images/oasis-algerie1-e1424206212657-300x199 1.png" alt="Paysage 4">
                <img src="images/village-kabylie-300x218 1.png" alt="Paysage 5">
                <img src="images/randonnee-chameliere-300x199 1.png" alt="Paysage 6">
            </div>
            <button class="carousel-button left" onclick="prevImage()">❮</button>
            <button class="carousel-button right" onclick="nextImage()">❯</button>
        </div>
    
    
        <p>
            De magnifiques paysages s’étendent d’est en ouest et du nord au sud, pour vous exposer des montagnes majestueuses, des plages de sable fin et des déserts à perte de vue. Le Sahara, à lui seul, est une aventure captivante, avec des dunes de sable doré et des oasis pittoresques. L’Algérie est un trésor naturel et culturel à explorer en toute saison de l’année.
        </p>
    </section>

   

    <script src="../Js/page_acceuil.js"></script>
</body>
</html>
<?php require 'view_footer.php'; ?>