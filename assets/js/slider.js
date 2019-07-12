// Creado por CtrlProgrammer
//  Copyright (C) Derechos de autor Hewks.net

document.addEventListener("DOMContentLoaded", function () {

    var sliderItems = document.querySelectorAll('.my-slider-item');
    var count = 0;

    document.getElementById('my-slider-next').addEventListener('click', function () {
        if (count < sliderItems.length - 1) { count++; }
        else if (count == sliderItems.length - 1) { count = 0; }
        deactivateSlider();
        activateSlider(sliderItems[count]);
    });

    document.getElementById('my-slider-prev').addEventListener('click', function () {
        if (count > 0) { count--; }
        else if (count == 0) { count = sliderItems.length - 1; }
        deactivateSlider();
        activateSlider(sliderItems[count]);
    });

});

function deactivateSlider() {
    var activeSlider = document.querySelector('.my-slider-item.active');
    activeSlider.classList.remove('active');
}

function activateSlider(slider) {
    slider.classList.add('active');
}
