// Validar email
function validateEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

function validatePassword(password) {
    return (password == null || password == '') ? false : true;
}

function validateText(text) {
    return (text == null || text == '') ? false : true;
}


// Send and validate forms

function validateForm(validateFormOptions, sendFormOtions, otherForm = null) {

    var form;
    if (otherForm == null) {
        form = document.querySelectorAll('#bs-send-form .bs-form-input');
        if (form.length == 0) {
            form = document.querySelectorAll('#bs-send-form .bs-admin-input');
        }
    } else {
        form = document.querySelectorAll(otherForm);
    }
    
    var errForm = [];
    var formData = [];
    var errorList = '';

    var formPasswords = {
        'passwordOne': null,
        'passwordTwo': null,
    };

    form.forEach(input => {
        switch (input.type) {
            case 'password':
                if (validatePassword(input.value) == false) { errForm.push(input.dataset.name) }
                else if (input.id != 'passwordTwo') {
                    if (validateFormOptions.passwordHash) {
                        formData.push({ 'name': input.name, 'value': md5(input.value) })
                    } else {
                        formData.push({ 'name': input.name, 'value': input.value })
                    }
                }
                break;
            case 'email':
                if (validateEmail(input.value) == false) { errForm.push(input.dataset.name) }
                else { formData.push({ 'name': input.name, 'value': input.value }) }
                break;
            default:
                if (validateText(input.value) == false) { errForm.push(input.dataset.name) }
                else { formData.push({ 'name': input.name, 'value': input.value }) }
                break;
        }
    });


    if (validateFormOptions.validateTwoPass == true) {
        formPasswords.passwordOne = document.getElementById('passwordOne').value;
        formPasswords.passwordTwo = document.getElementById('passwordTwo').value;
        if (formPasswords.passwordOne != formPasswords.passwordTwo) {
            errForm.push('Las contraseñas son distintas');
        }
    }

    if (errForm.length > 0) {

        errForm.forEach(error => { errorList += error + '\n' });
        PNotify.error({
            title: 'Debes llenar todos los campos',
            text: errorList
        });
    } else {
        if (validateFormOptions.sendForm == true) {
            sendFormData(sendFormOtions, formData);
        } else {
            PNotify.error({
                title: 'Validacion',
                text: 'El formulario se valido correctamente'
            });
        }
    }
}

function sendFormData(sendFormOtions, formData) {

    var request = new XMLHttpRequest();
    var dataObj = new FormData();

    formData.forEach(data => {
        dataObj.append(data.name, data.value);
    });

    request.open("POST", sendFormOtions.sendFormUrl);
    request.send(dataObj);

    request.onreadystatechange = () => {
        if (request.readyState == 200 || request.readyState == 4) {
            var requestResponse = JSON.parse(request.responseText);
            if (requestResponse[0]['status'] == true) {
                if (sendFormOtions.redirectUrl != false) {
                    window.location.href = sendFormOtions.redirectUrl;
                } else {
                    PNotify.success({
                        title: sendFormOtions.moduleTitle,
                        text: requestResponse[0]['response']
                    });
                }
            } else {
                PNotify.error({
                    title: sendFormOtions.moduleTitle,
                    text: requestResponse[0]['response']
                });
            }
        }
    }
}

// Tables

function requestTableData(requestOptions) {
    var postUrlDataTable = requestOptions.requestUrl;
    var req = new XMLHttpRequest();
    var postData = 'requestType=' + requestOptions.requestType;
    req.open('POST', base_url + postUrlDataTable, true);
    req.setRequestHeader('Content-Type', requestOptions.requestContentType);
    req.send(postData);
    req.onreadystatechange = function () {
        if (req.readyState == 4 || req.readyState == 200) {
            var sectionData = JSON.parse(req.responseText);
            if (sectionData[0]['status'] == true) {
                if (requestOptions.fillTable == true) {
                    fillTable(sectionData[1], requestOptions.tableColumns);
                } else {
                    PNotify.info({
                        title: moduleName,
                        text: sectionData[0]['response']
                    });
                }
            } else {
                PNotify.error({
                    title: moduleName,
                    text: sectionData[0]['response']
                });
            }
        }
    }
}

function fillTable(tableData, dataTableColumns) {
    var customerTable = $('#tableSectionTable').DataTable();
    customerTable.destroy();
    var customerTable = $('#tableSectionTable').DataTable({
        data: tableData.tableData,
        columns: dataTableColumns
    });
}

function sectionAction(moduleName, id, action) {
    var postUrlDataTable = 'BackSurface/' + moduleName + '/' + action;
    var req = new XMLHttpRequest();
    var postData = 'id=' + id;
    req.open('POST', base_url + postUrlDataTable, true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(postData);
    req.onreadystatechange = function () {
        if (req.readyState == 4 || req.readyState == 200) {
            var sectionData = JSON.parse(req.responseText);
            if (sectionData[0]['status'] == true) {
                tableSection();
                PNotify.success({
                    title: moduleName,
                    text: sectionData[0]['response']
                });
            } else {
                PNotify.error({
                    title: moduleName,
                    text: sectionData[0]['response']
                });
            }
        }
    }
}