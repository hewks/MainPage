// Creado por CtrlProgrammer
// Copyright (C) Derechos de autor Hewks.net
// Wrapper animado

var customColorBackground = document.querySelectorAll('.custom-color-background');
var animatedText = document.querySelectorAll('.custom-color-background .an-text');
var animatedIcon = document.querySelectorAll('.custom-color-background .an-icon');

const LIGH_GREY = ' 180, 180, 180 ';
const DARK_GREY = ' 60, 60, 60 ';
const WHITE = ' 255, 255, 255 ';

var divNumber = 0;

setInterval(function () {
    if (divNumber == 0) {
        customColorBackground[divNumber].style.background = 'rgb(' + DARK_GREY + ')';
        customColorBackground[divNumber + 1].style.background = 'rgb(' + LIGH_GREY + ')';
    } else if (divNumber == customColorBackground.length - 1) {
        customColorBackground[divNumber].style.background = 'rgb(' + DARK_GREY + ')';
        customColorBackground[divNumber - 1].style.background = 'rgb(' + LIGH_GREY + ')';
    } else {
        customColorBackground[divNumber].style.background = 'rgb(' + DARK_GREY + ')';
        customColorBackground[divNumber - 1].style.background = 'rgb(' + LIGH_GREY + ')';
        customColorBackground[divNumber + 1].style.background = 'rgb(' + LIGH_GREY + ')';
    }
    if (typeof animatedText[divNumber] !== 'undefined') {
        animatedText[divNumber].style.visibility = 'visible';
        animatedText[divNumber].classList.add('animated');
        animatedText[divNumber].classList.add('fadeInDown');
    }
    if (typeof animatedIcon[divNumber] !== 'undefined') {
        animatedIcon[divNumber].style.visibility = 'visible';
        animatedIcon[divNumber].classList.add('animated');
        animatedIcon[divNumber].classList.add('fadeInDown');
    }
    if (divNumber < customColorBackground.length - 1) {
        divNumber++;
    } else {
        divNumber = 0;
    }
}, 900);