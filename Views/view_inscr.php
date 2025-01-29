<?php 
require 'view_begin.php';
?>
<link rel="stylesheet" href="../Css/inscrip.css">
<body>
<section class="form-container">
        <h2>Formulaire d'Inscription</h2>
        <form action="index.php?controller=inscr&action=doInscription" method="POST">
            <div class="form-group">
                <input type="text" id="nom" name="nom" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <input type="text" id="prenom" name="prenom" placeholder="Prénom" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
        
            <div class="form-group">
                <input type="password" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
                <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirmez le mot de passe" required>
            </div>
              <!-- Affichage des messages d'erreur ou de confirmation -->
              <?php if (isset($message)): ?>
                    <p style="color: <?php echo (strpos($message, 'réussi') !== false) ? 'green' : 'red'; ?>;">
                    <?php echo $message; ?>
                    </p>
            <?php endif; ?>
            <button type="submit">S'inscrire</button>
        </form>
        <p class="register-link">Déjà inscrit ? <a href="index.php?controller=connect&action=connect">Connectez-vous</a></p>
      
    </section>
</body>
</html>
<?php require 'view_footer.php'; ?>
