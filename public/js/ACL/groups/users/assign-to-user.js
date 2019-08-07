$(document).ready(function () {
    let dataTable = $(".dataTable tbody");

    const headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    };

    dataTable.on('click', 'button.assign-user-to-group', function () {
        let group_id = $(this).data('id');
        $.ajax({
            url: '/api/users',
            method: 'get',
            headers: headers,
            success: function (response) {
                let users = $("#users");
                users.html("");
                for (let i = 0; i < response.data.length; i++)
                    users.append(new Option(response.data[i].name, response.data[i].id));
                users.select2({
                    placeholder: 'Usuários'
                });

            }
        });
        $.ajax({
            url: '/api/groups',
            method: 'get',
            headers: headers,
            success: function (response) {
                let select_groups = $("#select-groups-1");
                select_groups.html("");
                for (let i = 0; i < response.data.length; i++)
                    select_groups.append(new Option(response.data[i].name, response.data[i].id));
                select_groups.val(group_id);
            }
        });

        $("#assign-users-modal").modal('show');
    });
});
