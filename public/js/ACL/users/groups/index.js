$(document).ready(function () {
    $("#user-groups").dataTable({
        language: {
            "decimal":        "",
            "emptyTable":     "Não há dados cadastrados",
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ grupos",
            "infoEmpty":      "Mostrando 0 to 0 of 0 registros",
            "infoFiltered":   "(filtrado de _MAX_ registros)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrando _MENU_ grupos",
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
    });
});

