<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulat d'Algérie</title>
    <link rel="stylesheet" href="../Css/begin2.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- En-tête -->
    <header>
        <div class="logo">
            <a href="index.php?controller=acceuil&action=acceuil">
                <img src="../images/alg.png" alt="Logo République Algérienne">
            </a>
            <div class="logo-text">
                <p>République Algérienne</p>
                <p>Démocratique et Populaire</p>
            </div>
        </div>

        <nav>
            <ul>
                <li><a href="index.php?controller=visa&action=submit">Demande de Visa</a></li>
                <li><a href="index.php?controller=culture&action=culture">Culture</a></li>
                <li><a href="index.php?controller=presse&action=presse">Actualités</a></li>
                <?php if (isset($_SESSION['user'])): ?>
                    <!-- Si l'utilisateur est connecté, affiche le profil et déconnexion -->
                    <li><a href="index.php?controller=connect&action=logout">Déconnexion</a></li>
                    <li class="profile-container">
                        <div class="profile-icon" id="profile-button">
                            <i class="fas fa-user-circle"></i> <!-- Icône de profil -->
                        </div>
                        <div class="profile-menu dropdown-content" id="dropdownMenu">
                            <p><strong>Nom :</strong> <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></p>
                            <p><strong>Prénom :</strong> <?php echo htmlspecialchars($_SESSION['user_prenom'] ?? ''); ?></p>
                            <p><strong>Email :</strong> <?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?></p>
                            <a href="index.php?controller=profil&action=show">Mon Profil</a>
                        </div>
                    </li>
                <?php else: ?>
                    <!-- Si l'utilisateur n'est pas connecté, affiche login et inscription -->
                    <li><a href="index.php?controller=connect&action=connect">Se connecter</a></li>
                    <li><a href="index.php?controller=inscr&action=inscr">S'inscrire</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
</body>
</html>
<script>
// JavaScript pour afficher/masquer le menu de profil
document.getElementById('profile-button').addEventListener('click', function(event) {
    event.stopPropagation();
    const profileMenu = document.getElementById('dropdownMenu');
    profileMenu.style.display = profileMenu.style.display === 'block' ? 'none' : 'block';
});

// Fermer le menu si on clique en dehors
window.onclick = function(event) {
    if (!event.target.matches('#profile-button') && !event.target.closest('.profile-menu')) {
        document.getElementById('dropdownMenu').style.display = 'none';
    }
};
</script>
