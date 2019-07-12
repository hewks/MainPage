// Creado por CtrlProgrammer
// Copyright (C) Derechos de autor Hewks.net

//Animaciones
var animatedClose = 0;
window.addEventListener('scroll', function () {
    if (animatedClose == 0) {
        var scrollPosition = window.pageYOffset;
        var animatedIcons = document.querySelectorAll('.icon-an');
        var divAnimated = document.getElementById('animated-background');
        animatedIcons.forEach(function(icon, index) {
            if (scrollPosition > divAnimated.offsetTop - 250) {
                icon.style.visibility = 'visible';
                icon.classList.add('animated');
                switch (index) {
                    case 0:
                        icon.classList.add('bounceInDown');
                        break;
                    case 1: ;
                        icon.classList.add('fadeInLeft');
                        break;
                    case 2: ;
                        icon.classList.add('bounceInRight');
                        break;
                    case 3: ;
                        icon.classList.add('bounceInLeft');
                        break;
                    case 4: ;
                        icon.classList.add('fadeInDownBig');
                        break;
                    case 5: ;
                        icon.classList.add('fadeInRight');
                        break;
                    case 6: ;
                        icon.classList.add('bounceInUp');
                        break;
                    case 7: ;
                        icon.classList.add('bounceInLeft');
                        break;
                    case 8: ;
                        icon.classList.add('fadeInUpBig');
                        break;
                    case 9: ;
                        icon.classList.add('fadeInLeftBig');
                        animatedClose = 1;
                        break;
                }
            }
        });

    }
});
