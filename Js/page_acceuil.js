let currentPosition = 0;
const imagesToShow = 4; // Nombre d'images visibles au départ
const totalImages = document.querySelectorAll('.carousel-images img').length;

function updateCarousel() {
    const carouselImages = document.querySelector('.carousel-images');
    const offset = -currentPosition * 25; // Déplacement basé sur la position actuelle
    carouselImages.style.transform = `translateX(${offset}%)`;

    // Masquer ou afficher les images selon la position
    const allImages = document.querySelectorAll('.carousel-images img');
    allImages.forEach((img, index) => {
        if (index >= currentPosition && index < currentPosition + imagesToShow) {
            img.style.display = 'block'; // Afficher les images visibles
        } else {
            img.style.display = 'none'; // Masquer les images hors de la vue
        }
    });
}

function nextImage() {
    if (currentPosition < totalImages - imagesToShow) {
        currentPosition += 1; // Déplace d'une position à la fois
    } else {
        currentPosition = 0; // Revenir au début si on atteint la fin
    }
    updateCarousel();
}

function prevImage() {
    if (currentPosition > 0) {
        currentPosition -= 1; // Déplace d'une position à la fois
    } else {
        currentPosition = totalImages - imagesToShow; // Aller à la fin si on est au début
    }
    updateCarousel();
}

// Initialisation du carrousel
updateCarousel();
