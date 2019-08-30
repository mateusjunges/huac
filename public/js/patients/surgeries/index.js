$(document).ready(function () {

    let headers = {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
    };
    let patient = $("#patient-id").val();
    const table = $(".dataTable");
    const HTTP_OK = 200;
    let columns = null;

    $.ajax({
        method: 'GET',
        url: `/api/patients/${patient}/surgeries/columns`,
        async: false,
        headers: headers,
        success: function (response) {
            columns = response;
        }
    });

   table.dataTable({
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
           url: `/api/patients/${patient}/surgeries/data`,
           dataType: 'json',
           headers: headers,
       },
       columns: JSON.parse(columns),
   });

   $(".dataTable tbody").on('click', 'button.delete', function() {

       let tr = $(this).closest('tr');
       let surgery = $(this).data('id');

       swal({
           title: 'Tem certeza?',
           text: 'Se esta cirurgia estiver agendada, o agendamento será removido.',
           icon: 'warning',
           buttons: ["Não", "Sim, quero remover esta cirurgia."],
       }).then((response) => {
           if (response) {
               $.ajax({
                   url: `/api/patients/surgeries/${surgery}`,
                   method: 'post',
                   headers: headers,
                   data: {
                       _method: 'delete',
                   },
                   success: function (response, status, xhr) {
                       if (xhr.status === HTTP_OK) {
                           swal({
                               icon: response.data.swal.icon,
                               title: response.data.swal.title,
                               text: response.data.swal.text,
                               timer: response.data.swal.timer
                           });
                           tr.fadeOut(400, function () {
                               tr.remove();
                           });
                       }
                   }
               });
           }
       })
   });
});
