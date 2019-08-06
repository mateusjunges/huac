$(document).ready(function () {

   let columns = null;

   $.ajax({
       url: '/api/users/columns',
       async: false,
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       success: function (response) {
           columns = response;
       }
   });

   $("#users").dataTable({
        language: {
            "decimal":        "",
            "emptyTable":     "Não há dados cadastrados",
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ usuários",
            "infoEmpty":      "Mostrando 0 to 0 of 0 registros",
            "infoFiltered":   "(filtrado de _MAX_ registros)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrando _MENU_ usuários",
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
           'type': 'GET',
           'url': '/api/users',
           'dataType': 'json',
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
       },
       columns: JSON.parse(columns),
   })
});
