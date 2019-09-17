$(document).ready(function() {
    const headers = {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
    };
    const table = $(".dataTable tbody");
    const HTTP_OK = 200;

    table.on('click', 'button.confirm', function() {
        let surgery = $(this).data('id');
        let element = $(this).closest('tr');

        swal({
            title: 'Tem certeza?',
            text: 'Realmente possui todos os materiais para esta cirurgia?',
            icon: 'warning',
            buttons: ["Não.", "Sim, possuo todos os materiais."],
        }).then((response) => {
            if (response) {
                $.ajax({
                    url: `/api/surgeries/confirm-materials/cme/${surgery}/confirm`,
                    headers: headers,
                    method: 'post',
                    success: function(response, status, xhr) {
                        console.log(response);
                        swal({
                            icon: response.data.swal.icon,
                            title: response.data.swal.title,
                            text: response.data.swal.text,
                            timer: response.data.swal.timer
                        });
                        if (xhr.status === HTTP_OK) {
                            element.fadeOut(400, function() {
                                element.remove();
                            });
                        }
                    },
                });
            }
        })
    });
});
