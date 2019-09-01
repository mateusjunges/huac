$(document).ready(function() {
    const headers = {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
    };
    const table = $(".dataTable tbody");
    const HTTP_OK = 200;

    let element = null;
    let surgery = null;
    table.on('click', 'button.deny', function() {
        surgery = $(this).data('id');
        element = $(this).closest('tr');

        swal({
            title: 'Tem certeza?',
            text: 'Realmente não possui os materiais para esta cirurgia?',
            icon: 'warning',
            buttons: ["Não.", "Sim, não tenho os materiais."],
        }).then((response) => {
            if (response) {
                $("#deny-materials-modal").modal('show');
            }
        })
    });

    $("#deny").click(function() {

        $.ajax({
            url: `/api/surgeries/confirm-materials/cme/${surgery}/deny`,
            headers: headers,
            method: 'post',
            data: {
                observation: $("#deny-materials-observation").val(),
            },
            success: function(response, status, xhr) {
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
                    $("#deny-materials-modal").modal('hide');
                }
            },
        });
    });
});
