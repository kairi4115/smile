let currentSlideIndex = 0;

function showSlide(index) {
    let slides = document.querySelectorAll(".image-slide");
    slides.forEach(slide => {
        slide.style.display = "none";
    });
    slides[index].style.display = "block";
    currentSlideIndex = index;
}

function nextSlide() {
    currentSlideIndex++;
    let slides = document.querySelectorAll(".image-slide");
    if (currentSlideIndex >= slides.length) {
        currentSlideIndex = 0;
    }
    showSlide(currentSlideIndex);
    
    let nextSlideIndex = (currentSlideIndex + 1) % slides.length;
    let nextSlideElement = slides[nextSlideIndex];

    window.scrollTo({
        top: nextSlideElement.offsetTop,
        behavior: 'smooth'
    });
}


document.addEventListener('DOMContentLoaded', function () {
    var rightPoint = document.querySelector('.image-point-right');
    var leftPoint = document.querySelector('.image-point-left');

    rightPoint.addEventListener('click', nextSlide);

    leftPoint.addEventListener('click', function () {
        currentSlideIndex--;
        if (currentSlideIndex < 0) {
            currentSlideIndex = document.querySelectorAll(".image-slide").length - 1;
        }
        showSlide(currentSlideIndex);
    });
});