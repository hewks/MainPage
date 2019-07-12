var moduleName = 'Errors';

document.addEventListener("DOMContentLoaded", function (event) {
    tableSection();
});

function tableSection() {
    var tableColumns = ['id', 'type', 'error', 'date', 'status', 'actions'];
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
