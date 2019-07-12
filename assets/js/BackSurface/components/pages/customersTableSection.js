var moduleName = 'Customers';

document.addEventListener("DOMContentLoaded", function (event) {
    tableSection();
});

document.getElementById('bs-send-form-button').addEventListener('click', e => {

    e.preventDefault();

    validateFormOptions = {
        validateTwoPass: false,
        moduleTitle: moduleName,
        sendForm: true,
        passwordHash: false
    };

    sendFormOtions = {
        moduleTitle: moduleName,
        sendFormUrl: base_url + 'BackSurface/' + moduleName + '/add',
        redirectUrl: false,
        sendImages: false,
    }

    validateForm(validateFormOptions, sendFormOtions);
    tableSection();

});

function tableSection() {
    var tableColumns = ['id', 'name', 'email', 'phone', 'status', 'actions'];
    var dataTableColumns = [];

    tableColumns.forEach(column => {
        dataTableColumns.push({ data: column });
    });

    var requestOptions = {
        requestUrl: 'BackSurface/' + moduleName + '/data_table',
        moduleName: moduleName,
        requestType: 'all',
        requestContentType: 'application/x-www-form-urlencoded',
        fillTable: true,
        tableColumns: dataTableColumns
    }

    requestTableData(requestOptions);
}

function editSection() {

    validateFormOptions = {
        validateTwoPass: false,
        moduleTitle: moduleName,
        sendForm: true,
        passwordHash: false
    };

    sendFormOtions = {
        moduleTitle: moduleName,
        sendFormUrl: base_url + 'BackSurface/' + moduleName + '/edit',
        redirectUrl: false,
        sendImages: false,
    }

    validateForm(validateFormOptions, sendFormOtions, '#editModal .bs-admin-input');
    tableSection();

}

function requestEditData(moduleName, id) {
    var request = new XMLHttpRequest();

    var postData = 'requestType=one&id=' + id;

    request.open("POST", base_url + 'BackSurface/' + moduleName + '/data_table');
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    request.send(postData);

    request.onreadystatechange = () => {
        if (request.readyState == 200 || request.readyState == 4) {
            var requestResponse = JSON.parse(request.responseText);
            if (requestResponse[0]['status'] == true) {
                fillEditModal(requestResponse[1]['tableData']);
            } else {
                PNotify.error({
                    title: moduleName,
                    text: requestResponse[0]['response']
                });
            }
        }
    }
}

function fillEditModal(data) {
    var editForm = document.querySelectorAll('#editModal .bs-admin-input');
    editForm.forEach(input => {
        switch (input.name) {
            case 'name': input.value = data.name; break;
            case 'email': input.value = data.email; break;
            case 'phone': input.value = data.phone; break;
            case 'id': input.value = data.id; break;
        }
    });
    $('#editModal').modal();
}


