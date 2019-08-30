$(document).ready(function () {
    const headers = {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
    };
    const table = $(".dataTable");

    let columns = null;

    $.ajax({
        method: 'GET',
        url: '/api/patients/columns',
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
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ pacientes",
            "infoEmpty":      "Mostrando 0 to 0 of 0 registros",
            "infoFiltered":   "(filtrado de _MAX_ registros)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrando _MENU_ pacientes",
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
            url: '/api/patients/data',
            dataType: 'json',
            headers: headers,
        },
        columns: JSON.parse(columns),
    });

    $(".dataTable tbody").on('click', 'button.delete', function() {
        let type = $(this).data('type');
        let token = $(this).val();
        let name = $(this).data('name');
        let route = $(this).data('route');
        let id = $(this).data('id');
        let gender = $(this).data('gender');

        var tr = $(this).closest('tr');

        swal(`Deseja realmente excluir o paciente ${name}? Todas as cirurgias, agendadas ou não, serão removidas.`,{
            title: 'Tem certeza',
            icon: 'warning',
            buttons: ["Não", "Sim, quero remover este paciente"],
        }).then((response) => {
            if (response === true){
                $.ajax({
                    method: 'post',
                    url: `/api/${route}/${id}`,
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        '_token': token,
                        '_method': 'delete',
                    },
                    success: function (response) {
                        swal({
                            icon: response.icon,
                            title: response.title,
                            text: response.text,
                            timer: response.timer,
                        });
                        if (response.code === 200){
                            tr.fadeOut(400, function () {
                                tr.remove();
                            });
                        }
                    }
                });
            }
        });
    });
});
