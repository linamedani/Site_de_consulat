<?php require 'view_begin2.php'; ?>

<link rel="stylesheet" href="../Css/vis.css">

<div class="form-container">
    <h2>Formulaire de demande de visa</h2>
    
    <form action="index.php?controller=visa&action=submit" method="POST" enctype="multipart/form-data">
        <?php if (!empty($errors)): ?>
        <div class="error-messages">
         <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
        <!-- Nom -->
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required placeholder="Votre nom">
        </div>

        <!-- Prénom -->
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required placeholder="Votre prénom">
        </div>

        <!-- Date de naissance -->
        <div class="form-group">
            <label for="dob">Date de naissance :</label>
            <input type="date" id="dob" name="dob" required>
        </div>

        <div class="form-group">
    <label for="nationalite">Nationalité :</label>
    <select id="nationalite" name="nationalite" required>
        <!-- Pays nécessitant un visa -->
        <optgroup label="Pays nécessitant un visa">
            <!-- Europe -->
            <option value="Allemagne">Allemagne</option>
            <option value="Maroc">Maroc</option>
            <option value="Andorre">Andorre</option>
            <option value="Argentine">Argentine</option>
            <option value="Australie">Australie</option>
            <option value="Autriche">Autriche</option>
            <option value="Belgique">Belgique</option>
            <option value="Bosnie">Bosnie-Herzégovine</option>
            <option value="Brésil">Brésil</option>
            <option value="Bulgarie">Bulgarie</option>
            <option value="Canada">Canada</option>
            <option value="Chine">Chine</option>
            <option value="Chypre">Chypre</option>
            <option value="Croatie">Croatie</option>
            <option value="Danemark">Danemark</option>
            <option value="Espagne">Espagne</option>
            <option value="États-Unis">États-Unis</option>
            <option value="France">France</option>
            <option value="Grèce">Grèce</option>
            <option value="Hongrie">Hongrie</option>
            <option value="Inde">Inde</option>
            <option value="Irlande">Irlande</option>
            <option value="Italie">Italie</option>
            <option value="Japon">Japon</option>
            <option value="Mexique">Mexique</option>
            <option value="Norvège">Norvège</option>
            <option value="Pays-Bas">Pays-Bas</option>
            <option value="Pologne">Pologne</option>
            <option value="Portugal">Portugal</option>
            <option value="Royaume-Uni">Royaume-Uni</option>
            <option value="Russie">Russie</option>
            <option value="Suisse">Suisse</option>
            <option value="Suède">Suède</option>
            <option value="Turquie">Turquie</option>
        </optgroup>

        <!-- Pays exemptés de visa -->
        <optgroup label="Pays exemptés de visa">
            <option value="Tunisie">Tunisie</option>
            <option value="Libye">Libye</option>
            <option value="Mauritanie">Mauritanie</option>
            <option value="SaharaOccidental">Sahara Occidental</option>
            <option value="Mali">Mali</option>
            <option value="Egypte">Égypte</option>
        </optgroup>

        <!-- Pays interdits de visa -->
        <optgroup label="Pays interdits de visa">
            <option value="Israël">Israël</option>
        </optgroup>
    </select>
</div>



        <!-- Numéro de passeport -->
        <div class="form-group">
            <label for="numero_passeport">Numéro de passeport :</label>
            <input type="text" id="numero_passeport" name="numero_passeport" required placeholder="Numéro de votre passeport" pattern="^[a-zA-Z0-9]{6,9}$" title="Le numéro de passeport doit contenir entre 6 et 9 caractères, lettres ou chiffres.">
        </div>

        <!-- Date de création du passeport -->
        <div class="form-group">
            <label for="date_creation">Date de création du passeport :</label>
            <input type="date" id="date_creation" name="date_creation" required>
        </div>

        <!-- Date de validité du passeport -->
        <div class="form-group">
            <label for="date_validite">Date de validité du passeport :</label>
            <input type="date" id="date_validite" name="date_validite" required>
        </div>
        <div class="form-group">
        <label for="passport_photo">Photo du passeport :</label>
        <input type="file" id="passport_photo" name="passport_photo" accept="image/jpeg, image/png" required>
    </div>

    <!-- Informations de paiement -->
    <p class="payment-notice">Vous allez être débité de 60 euros pour le traitement de votre demande de visa.</p>

    <div class="form-group">
        <label for="card_number">Numéro de carte :</label>
        <input type="text" id="card_number" name="card_number" pattern="^\d{16}$" placeholder="Numéro de carte bancaire (16 chiffres)" required>
    </div>

    <div class="form-group">
        <label for="expiration_date">Date d'expiration :</label>
        <input type="month" id="expiration_date" name="expiration_date" min="<?php echo date('Y-m'); ?>" required>
    </div>

    <div class="form-group">
        <label for="cvc">CVV :</label>
        <input type="text" id="cvc" name="cvc" pattern="^\d{3}$" placeholder="CVV (3 chiffres)" required>
    </div>

        <!-- Bouton de soumission -->
        <div class="form-group">
            <input type="submit" value="Soumettre la demande">
        </div>
    </form>
</div>

<script>
    // Limitation des dates
    const today = new Date().toISOString().split('T')[0];

    // Limiter la date de naissance à aujourd'hui ou avant
    document.getElementById('dob').setAttribute('max', today);

    // Limiter la date de création du passeport à aujourd'hui ou avant
    document.getElementById('date_creation').setAttribute('max', today);

    // Limiter la date de validité du passeport à aujourd'hui ou après
    document.getElementById('date_validite').setAttribute('min', today);
   
</script>

<?php require 'view_footer.php'; ?>
