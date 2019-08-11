$(document).ready(function () {
    var dataTable = $(".dataTable tbody");
    /**
     * Função para remover um registro no banco de dados.
     */
    dataTable.on('click', 'button.delete', function () {
        let type = $(this).data('type');
        let token = $(this).val();
        let name = $(this).data('name');
        let gender = $(this).data('gender');
        let group = $(this).data('group');
        let group_id = $(this).data('group-id');
        let user = $(this).data('id');
        var tr = $(this).closest('tr');

        swal(`Deseja realmente remover ${gender} ${type} ${name} do grupo ${group}?`,{
            icon: 'warning',
            buttons: true,
        }).then((response) => {
            if (response === true){
                $.ajax({
                    method: 'post',
                    url: `/api/groups/users`,
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        '_token': token,
                        '_method': 'delete',
                        'user': user,
                        'group': group_id,
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
