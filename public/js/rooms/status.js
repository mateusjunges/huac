$(document).ready(function () {
    const token = $("meta[name='csrf-token']").attr('content');
    const headers = {
        'X-CSRF-TOKEN': token,
    };
    const HTTP_OK = 200;

    // Bloqueia a sala
    $(".dataTable tbody").on('click', 'button.lock', function () {
        let room = $(this).data('id');
        let element = $(this);
        let roomAvailableIcon = $(`#icon-${room}`);

        swal({
            icon: 'warning',
            title: 'Tem certeza?',
            text: 'Deseja realmente alterar o status desta sala?',
            buttons: ["Não", "Sim, tenho certeza"],
        }).then(response => {
            if (response) {
                $.ajax({
                    url: `/api/rooms/${room}/status`,
                    headers: headers,
                    method: 'post',
                    data: {
                        _method: 'put'
                    },
                    success: function (response, status, xhr) {
                        swal({
                            icon: response.data.swal.icon,
                            title: response.data.swal.title,
                            text: response.data.swal.text,
                            timer: response.data.swal.timer
                        });
                        if (xhr.status === HTTP_OK) {
                            if (response.data.room.available){
                                roomAvailableIcon.removeClass('fa-times');
                                roomAvailableIcon.addClass('fa-check');
                                element.removeClass('btn-danger');
                                element.addClass('btn-success');
                                console.log('room available');
                            } else {
                                roomAvailableIcon.removeClass('fa-check');
                                roomAvailableIcon.addClass('fa-times');
                                element.removeClass('btn-success');
                                element.addClass('btn-danger');
                                console.log('room locked');
                            }
                        }
                    }
                })
            }
        });
    });


    // Libera a sala:
    $(".not-available").click(function () {
        let room = $(this).data('id');
        let element = $(this);
        let roomAvailableIcon = $(`#icon-${room}`);

        swal({
            icon: 'warning',
            title: 'Tem certeza que deseja liberar esta sala?',
            text: 'Deseja realmente deixar esta sala disponível?',
            buttons: ["Não", "Sim, quero liberar esta sala"],
        }).then(response => {
            if (response) {
                $.ajax({
                    url: `/api/rooms/${room}/status`,
                    headers: headers,
                    method: 'post',
                    data: {
                        _method: 'put'
                    },
                    success: function (response, status, xhr) {
                        swal({
                            icon: response.data.swal.icon,
                            title: response.data.swal.title,
                            text: response.data.swal.text,
                            timer: response.data.swal.timer
                        });
                        if (xhr.status === HTTP_OK) {
                            if (response.data.room.available){
                                roomAvailableIcon.removeClass('fa-times');
                                roomAvailableIcon.addClass('fa-check');
                                element.removeClass('btn-danger');
                                element.addClass('btn-success');
                                element.removeClass('available');
                                element.addClass('not-available');
                            } else {
                                roomAvailableIcon.removeClass('fa-check');
                                roomAvailableIcon.addClass('fa-times');
                                element.removeClass('btn-success');
                                element.addClass('btn-danger');
                                element.removeClass('available');
                                element.addClass('not-available');
                            }
                        }
                    }
                })
            }
        });
    });
});
