<?php 
require 'view_begin.php';

?>

<link rel="stylesheet" href="../Css/connect.css">
<section class="form-container">
        <h2>Connexion</h2>
        <form action="index.php?controller=connect&action=doConnect" method="POST">
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Adresse Email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
            </div>
            <?php if (isset($message)): ?>
                 <p style="color: <?php echo (strpos($message, 'réussi') !== false) ? 'green' : 'red'; ?>;">
                <?php echo $message; ?>
                </p>
            <?php endif; ?>
            <button type="submit">Se connecter</button>
        </form>
        <p class="register-link">Pas encore inscrit ? <a href="index.php?controller=inscr&action=inscr">Inscrivez-vous</a></p>
    </section>
    <?php 
require 'view_footer.php';
?>