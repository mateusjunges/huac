$(document).ready(function() {
    const headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    };

    let dataTable = $(".dataTable");
    let columns = null;

    $.ajax({
        method: 'GET',
        url: '/api/surgeries/confirm-materials/surgery-center/columns',
        async: false,
        headers: headers,
        success: function (response) {
            columns = response;
        }
    });

    dataTable.dataTable({
        language: {
            "decimal":        "",
            "emptyTable":     "Não há dados cadastrados",
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ cirurgias",
            "infoEmpty":      "Mostrando 0 to 0 of 0 registros",
            "infoFiltered":   "(filtrado de _MAX_ registros)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrando _MENU_ cirurgias",
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
        scrollX: true,
        processing: true,
        serverSide: true,
        ajax: {
            type: 'GET',
            url: '/api/surgeries/confirm-materials/surgery-center/data',
            dataType: 'json',
            headers: headers,
        },
        columns: JSON.parse(columns),
    });
});
