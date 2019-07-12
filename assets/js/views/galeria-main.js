document.addEventListener("DOMContentLoaded", function (event) {
    setInBig(document.querySelector('.my-active-image'));
    var allGaleryImages = document.querySelectorAll('.my-left-galery-image');
    allGaleryImages.forEach(function (imageContainer) {
        imageContainer.addEventListener('click', function () {
            setInBig(imageContainer.children[0]);
        });
    });
});

function setInBig(imageElement) {
    var bigImage = document.getElementById('my-big-image');
    var bigImageLabel = document.getElementById('my-big-image-label');
    bigImage.style.backgroundImage = 'url(' + imageElement.src + ')';
    bigImageLabel.innerHTML = imageElement.alt;

}