<?php require 'view_begin2.php'; ?>

<link rel="stylesheet" href="../Css/profile.css">

<h2>Bienvenue <?php echo (isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Nom non disponible') . " " . (isset($_SESSION['user_prenom']) ? htmlspecialchars($_SESSION['user_prenom']) : 'Prénom non disponible'); ?></h2>

<h6>Vous pouvez ici effectuer toutes vos démarches auprès du consulat d'Algérie</h6>
<?php if (isset($confirmation_message)) : ?>
    <div class="confirmation-message">
        <p><?php echo $confirmation_message; ?></p>
        <p><a href="<?php echo $pdf_filename; ?>" download>Téléchargez votre acceptation de visa ici.</a></p>
    </div>
<?php endif; ?>
<section class="card-container">
<div class="card">
    <img src="../images/visa.jpg" alt="Demande de Visa" class="card-image">
    <h3>Demande de Visa</h3>
    <p>Effectuez votre demande de visa en ligne rapidement et facilement.</p>
   
    <a href="index.php?controller=visa&action=submit" class="card-button">Faire une demande</a>


</div>

    <div class="card">
        <img src="../images/Pas.jpeg" alt="Demande de Loterie" class="card-image">
        <h3>Demande de Loterie</h3>
        <p>Participez à la loterie pour obtenir la nationalité algérienne.</p>
        <a href="#" class="card-button">Participer</a>
    </div>
</section>

<?php require 'view_footer.php'; ?>















