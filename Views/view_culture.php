<?php 
require 'view_begin.php';  // Inclure l'entête de la page
?>

<link rel="stylesheet" href="../Css/culture.css"> <!-- Lien vers le fichier CSS -->

<section class="culture-container">
    <h1>Exploration de la Culture Algérienne</h1>

    <!-- Section Gastronomie -->
    <div class="culture-section">
        <h2>Gastronomie</h2>
        <p>
        L'Algérie est un pays aux multiples traditions, et sa gastronomie est un excellent reflet de cette diversité. Chaque région de l'Algérie a ses propres spécialités culinaires qui ont été transmises de génération en génération. 
            Les plats traditionnels sont savoureux et remplis de saveurs uniques, mélangeant des épices, des herbes et des ingrédients locaux. Parmi les plats les plus célèbres, nous trouvons le <strong>Zfiti de Bousaada</strong>, un plat à base de semoule accompagné de viande et d'épices, le <strong>Tajine Zitoun</strong> d'Alger, un ragoût aux olives, et les <strong>Mhajeb</strong>, ces crêpes farcies et épicées de la région de Biskra. Ces plats représentent bien la richesse culinaire algérienne.
            Et d'autres plats sont présentés ci-dessous.
        
        </p>

        <!-- Carrousel d'images pour Gastronomie -->
        <div class="carousel">
            <div class="carousel-images">
                <img src="../images/zfiti.jpeg" alt="Couscous" class="carousel-image">
                <img src="../images/zitoun.jpg" alt="Makroud" class="carousel-image">
                <img src="../images/mhajeb.jpg" alt="mhajeb" class="carousel-image">
                <img src="../images/couscous.jpg" alt="Couscous" class="carousel-image">
                <img src="../images/chorba.jpg" alt="Chorba" class="carousel-image">
                <img src="../images/chakhchoukha.jpg" alt="Chakhchoukha" class="carousel-image">
                <img src="../images/beghrir.png" alt="Beghrir" class="carousel-image">
                <img src="../images/sucre.jpeg" alt="Sucre" class="carousel-image">
            </div>
        </div>
    </div>

    <!-- Section Musique -->
    <div class="culture-section">
        <h2>Musique</h2>
        <p>
        La musique algérienne se distingue par la diversité de ses genres musicaux et par la richesse de son répertoire. La musique classique arabophone, représentée par la musique arabo-andalouse, est particulièrement prisée dans les grandes villes du pays. Cette tradition a donné naissance à trois formes distinctes : le gharnati à Tlemcen, la çanaa à Alger et le malouf à Constantine. À côté de ces formes classiques, des styles citadins populaires tels que le hawzi, le aroubi, le mahjouz et le chaâbi occupent également une place importante dans la culture musicale algérienne.

Régionalement, le raï est originaire de l’Ouest algérien, tandis que la musique staifi s’est développée dans l’Est. La musique berbère contemporaine a surtout émergé en Kabylie, tandis que le Sahara est marqué par les musiques diwane et touarègue. La musique moderne algérienne est également influencée par divers styles comme le rock et le rap.

La richesse linguistique du répertoire musical algérien est également remarquable, mêlant arabe classique, arabe algérien, français et langues berbères (notamment le kabyle, le chaoui et le tamasheq touareg).
        </p>

        <!-- Carrousel d'images pour Musique -->
        <div class="carousel">
            <div class="carousel-images">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/sMQSwaEfb3g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/tN__1cr2JIU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/zlShQr3yO-E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/bsPWx59yvYI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 <iframe width="560" height="315" src="https://www.youtube.com/embed/GZU0ms6bND0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/tKpHdhFxICg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/XbkHZTyoZ24" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/QxcwF_EVcLU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/9hPIkJR_CrQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            
            </div>
        </div>
    </div>

    <!-- Section Sport -->
    <div class="culture-section">
        <h2>Sport</h2>
        <p>
        Le football est sans doute le sport le plus populaire en Algérie, avec l'équipe nationale ayant remporté la Coupe d'Afrique des Nations à plusieurs reprises ainsi que la Coupe arabe. D'autres sports, comme le handball, le basketball et la boxe, connaissent également un grand succès dans le pays.
        </p>

        <!-- Carrousel d'images pour Sport -->
        <div class="carousel">
            <div class="carousel-images">
                <img src="../images/foot.jpg" alt="Football Algérien" class="carousel-image">
                <img src="../images/foo.jpg" alt="Équipe nationale" class="carousel-image">
                <img src="../images/box.jpg" alt="Match de football" class="carousel-image">
                <img src="../images/hand.jpg" alt="Match de football" class="carousel-image">
            </div>
        </div>
    </div>

   
</section>
<script src="../Js/culture.js"></script>
<?php 
require 'view_footer.php';  // Inclure le pied de page
?>
