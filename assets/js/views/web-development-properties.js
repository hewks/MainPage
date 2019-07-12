// Creado por CtrlProgrammer
// Copyright (C) Derechos de autor Hewks.net

//Animaciones
window.addEventListener('scroll', function () {
    var scrollPosition = window.pageYOffset;
    var propContOne = document.getElementById('property-container-one');
    var propContTwo = document.getElementById('property-container-two');
    var propContThree = document.getElementById('property-container-three');
    var propContFour = document.getElementById('property-container-four');
    var propContFive = document.getElementById('property-container-five');
    var propContSix = document.getElementById('property-container-six');

    if (scrollPosition >= propContOne.offsetTop + 300) {
        propContOne.style.visibility = 'visible';
        propContOne.classList.add('animated');
        propContOne.classList.add('fadeInLeft');
    }
    if (scrollPosition >= propContTwo.offsetTop + 300) {
        propContTwo.style.visibility = 'visible';
        propContTwo.classList.add('animated');
        propContTwo.classList.add('fadeInLeft');
    }
    if (scrollPosition >= propContThree.offsetTop + 300) {
        propContThree.style.visibility = 'visible';
        propContThree.classList.add('animated');
        propContThree.classList.add('fadeInLeft');
    }
    if (scrollPosition >= propContFour.offsetTop + 300) {
        propContFour.style.visibility = 'visible';
        propContFour.classList.add('animated');
        propContFour.classList.add('fadeInLeft');
    }
    if (scrollPosition >= propContFive.offsetTop + 300) {
        propContFive.style.visibility = 'visible';
        propContFive.classList.add('animated');
        propContFive.classList.add('fadeInLeft');
    }
    if (scrollPosition >= propContSix.offsetTop + 300) {
        propContSix.style.visibility = 'visible';
        propContSix.classList.add('animated');
        propContSix.classList.add('fadeInLeft');
    }

});
