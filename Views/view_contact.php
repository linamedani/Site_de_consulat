<?php 
require 'view_begin.php';  // Inclure l'entête de la page
?>
<link rel="stylesheet" href="../Css/contact.css"> <!-- Lien vers le fichier CSS -->
<section class="contact-container">
        <h1>Contactez-Nous</h1>
        <form action="index.php?controller=contact&action=sendMessage" method="POST" class="contact-form">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required placeholder="Votre nom">
            </div>

            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required placeholder="Votre email">
            </div>

            <div class="form-group">
                <label for="subject">Objet :</label>
                <select id="subject" name="subject" required>
                    <option value="">Choisir un motif</option>
                    <option value="demande_visa">Demande de Visa</option>
                    <option value="question">Question Générale</option>
                    <option value="suggession">Suggestions</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Message :</label>
                <textarea id="message" name="message" rows="6" required placeholder="Votre message ici..."></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="submit-btn">Envoyer</button>
            </div>
            <!-- Afficher un message d'erreur ou de succès -->
            <?php if (isset($message)): ?>
                 <p style="color: <?php echo (strpos($message, 'succès') !== false) ? 'green' : 'red'; ?>;">
                <?php echo $message; ?>
                </p>
            <?php endif; ?>
        </form>
    </section>
<?php 
require 'view_footer.php';  // Inclure le pied de page
?>