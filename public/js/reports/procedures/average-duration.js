
String.prototype.toHHMMSS = function () {
    var sec_num = parseInt(this, 10);
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes+':'+seconds;
};

let starting_at = null;
let ending_at = null;

$(document).ready(function() {
    const headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    };

    let dataTable = $(".dataTable");
    let columns = null;

    $.ajax({
        method: 'GET',
        url: '/api/reports/procedures/columns',
        async: false,
        headers: headers,
        success: function (response) {
            columns = response;
        }
    });
    let table = dataTable.dataTable({
        language: {
            "decimal":        "",
            "emptyTable":     "Não há dados cadastrados",
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ procedimentos",
            "infoEmpty":      "Mostrando 0 to 0 of 0 registros",
            "infoFiltered":   "(filtrado de _MAX_ registros)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrando _MENU_ procedimentos",
            "loadingRecords": "Carregando...",
            "processing":     "Processando...",
            "search":         "Buscar:",
            "zeroRecords":    "Nada encontrado",
            "paginate": {
                "first":      "Primeiro",
                "last":       "Último",
                "next":       "Próximo",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": Ordem Crescente",
                "sortDescending": ": Ordem Decrescente"
            }

        },
        "columnDefs": [
            {
                "render": function ( data, type, row ) {
                    return data.toString().toHHMMSS();
                },
                "targets": 1
            },
        ],
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: {
            type: 'GET',
            url: '/api/reports/procedures/data',
            dataType: 'json',
            headers: headers,
            data: function(data) {
                let starting_at = $("#starting-at").val();
                let ending_at = $("#ending-at").val();

                data.starting_at = starting_at;
                data.ending_at = ending_at;
            }
        },
        columns: JSON.parse(columns),
    }).api();

    $("#starting-at").change(function() {
        table.ajax.reload();
        table.draw();
    });

    $("#ending-at").change(function() {
        table.ajax.reload();
        table.draw();
    });
});
