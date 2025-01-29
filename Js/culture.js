
    let index = 0;
    const slides = document.querySelectorAll('.carousel-image');

    function moveSlide(step) {
        index += step;
        if (index < 0) index = slides.length - 1;
        if (index >= slides.length) index = 0;
        updateCarousel();
    }

    function updateCarousel() {
        const newTransform = -index * 100 + '%';
        document.querySelector('.carousel-images').style.transform = `translateX(${newTransform})`;
    }

