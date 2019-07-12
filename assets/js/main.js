// Creado por CtrlProgrammer
// Copyright (C) Derechos de autor Hewks.net

window.onload = function () {
    var loader = document.getElementById('total-page-loader');
    loader.style.visibility = 'hidden';
    loader.style.opacity = '0';
}

document.addEventListener("DOMContentLoaded", function (event) {

    //Toggle sidebar
    document.getElementById('sidebar-toggler-btn').addEventListener('click', function (e) {

        e.preventDefault();

        var sidebar = document.getElementById('main-sidebar');

        if (sidebar.classList.contains('active-sidebar')) {
            sidebar.classList.remove('active-sidebar');
        } else {
            sidebar.classList.add('active-sidebar');
        }

    });

    //Toggle sidebar blocks
    var sidebarTogglers = document.querySelectorAll('.main-sidebar>.sidebar-block>.sidebar-block-toggler');
    if (sidebarTogglers.length > 0) {
        sidebarTogglers.forEach(function (toggler) {
            toggler.addEventListener('click', function (e) {
                e.preventDefault();
                var toggleBlock = document.querySelector('#' + this.dataset.target);
                if (toggleBlock.classList.contains('toggle-block-active')) {
                    toggleBlock.classList.remove('toggle-block-active');
                } else {
                    toggleBlock.classList.add('toggle-block-active');
                }
            });
        });
    }

    document.addEventListener('scroll', function () {
        var navigationTopBar = document.getElementById('top-navigation');
        if (window.pageYOffset > 0) {
            navigationTopBar.classList.add('active-top-navigation');
        } else if (window.pageYOffset == 0) {
            navigationTopBar.classList.remove('active-top-navigation');
        }
    });

});

// Validar email
function validar_email(email) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

//Send forms
function sendForm(reqForm, sendUrl, redirectUrl, title) {

    var formError = [];
    var formData = [];
    var form;

    //Variable que almacena los datos del formulario
    var reqData = new FormData();

    //Furmulario en la pagina
    form = document.querySelectorAll('#' + reqForm + '.send-form .my-input');

    // Validacion de formulario
    form.forEach(function (input) {
        if (input.type == 'email') {
            if (validar_email(input.value)) {
                formData.push(input);
            } else {
                formError.push(input.dataset.name);
            }
        } else if (input.type != 'email') {
            if (input.value == '' || input.value == null || input.value == undefined) {
                formError.push(input.dataset.name);
            } else {
                formData.push(input);
            }
        }
    });

    //Validacion de errores
    if (formError.length != 0) {
        errorList = '';
        formError.forEach(function (error) {
            errorList += ' - ' + error + '\n';
        });
        PNotify.error({
            title: title,
            text: 'Debes llenar todos los campos\n' + errorList
        });
    } else {
        //Obtencion de datos en cada input
        formData.forEach(function (input) {
            if (input.type == 'password') {
                reqData.append(input.name, md5(input.value));
            } else if (input.type == 'file') {
                reqData.append(input.name, input.files[0]);
            } else {
                reqData.append(input.name, input.value);
            }
        });

        //Petcion
        var req = new XMLHttpRequest();

        req.open("POST", sendUrl, true);
        req.send(reqData);

        req.onreadystatechange = function () {
            if (req.readyState == 4 || req.readyState == 200) {
                var reqResponse = JSON.parse(req.responseText);
                if (reqResponse[0]['status'] == true) {
                    if (redirectUrl != null) {
                        window.location.href = redirectUrl;
                    } else {
                        PNotify.success({
                            title: title,
                            text: reqResponse[0]['response']
                        });
                    }
                } else {
                    PNotify.error({
                        title: title,
                        text: reqResponse[0]['response']
                    });
                }
            }
        };

    }
}

