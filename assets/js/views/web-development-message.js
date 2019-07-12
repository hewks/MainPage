// Creado por CtrlProgrammer
// Copyright (C) Derechos de autor Hewks.net

document.getElementById('sendFormSubmit').addEventListener('click',function(e){
    e.preventDefault();
    var form = 'contact-form';
    var sendUrl = base_url + 'DesarrolloWeb/add';
    var title = 'Contacto';
    sendForm(form,sendUrl,null,title);
});