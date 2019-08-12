$(document).ready(function () {
    var dataTable = $(".dataTable tbody");
    /**
     * Função para remover um registro no banco de dados.
     */
    dataTable.on('click', 'button.delete', function () {
        let type = $(this).data('type');
        let token = $(this).val();
        let name = $(this).data('name');
        let permission = $(this).data('permission');
        let gender = $(this).data('gender');
        let group = $(this).data('group');
        var tr = $(this).closest('tr');

        swal(`Deseja realmente excluir ${gender} ${type} ${name}?`,{
            icon: 'warning',
            buttons: true,
        }).then((response) => {
            if (response === true){
                $.ajax({
                    method: 'post',
                    url: `/api/groups/permissions`,
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        '_token': token,
                        '_method': 'delete',
                        'permission': permission,
                        'group': group
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
