$(document).ready(function() {
    let dataTable = $(".dataTable");

    const headers = {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
    };

    dataTable.on('click', 'button.delete', function () {
        let type = $(this).data('type');
        let token = $(this).val();
        let name = $(this).data('name');
        let route = $(this).data('route');
        let id = $(this).data('id');
        let gender = $(this).data('gender');

        var tr = $(this).closest('tr');

        swal(`Deseja realmente excluir ${gender} ${type} ${name}?`,{
            icon: 'warning',
            buttons: true,
        }).then((response) => {
            if (response === true){
                // axios.delete()
                $.ajax({
                    method: 'post',
                    url: `/api/${route}/${id}`,
                    async: false,
                    headers: headers,
                    data: {
                        '_token': token,
                        '_method': 'delete',
                    },
                    success: function (response, status, xhr) {
                        swal({
                            icon: response.data.swal.icon,
                            title: response.data.swal.title,
                            text: response.data.swal.text,
                            timer: response.data.swal.timer,
                        });
                        if (xhr.status === 200){
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
