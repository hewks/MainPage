// Creado por CtrlProgrammer
// Copyright (C) Derechos de autor Hewks.net

//Animaciones
window.addEventListener('scroll', function () {
    var scrollPosition = window.pageYOffset;

    var one = document.getElementById('animated-one');
    var two = document.getElementById('animated-two');
    var three = document.getElementById('animated-three');


    if (scrollPosition >= one.offsetTop) {
        one.style.visibility = 'visible';
        one.classList.add('animated');
        one.classList.add('fadeInDown');
    }

    if (scrollPosition >= two.offsetTop) {
        two.style.visibility = 'visible';
        two.classList.add('animated');
        two.classList.add('fadeInDown');
    }

    if (scrollPosition >= three.offsetTop ) {
        three.style.visibility = 'visible';
        three.classList.add('animated');
        three.classList.add('fadeInDown');
    }

});
