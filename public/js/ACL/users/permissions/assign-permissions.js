$(document).ready(function () {

    const dataTable = $(".dataTable");
    const headers = {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
    };

    dataTable.on('click', 'button.assignPermission', function () {

        let user_id = $(this).data('id');

        $.ajax({
            url: '/api/permissions',
            method: 'get',
            headers: headers,
            success: function (response) {
                let permissions = $("#permissions");
                permissions.html("");
                for (let i = 0; i < response.data.length; i++)
                    permissions.append(new Option(response.data[i].name, response.data[i].id));
                permissions.select2({
                    placeholder: 'Permissões'
                });

            }
        });

        $.ajax({
            url: '/api/users',
            method: 'get',
            headers: headers,
            success: function (response) {
                let select_users = $("#select-users");
                select_users.html("");
                for (let i = 0; i < response.data.length; i++)
                    select_users.append(new Option(response.data[i].name, response.data[i].id));
                select_users.val(user_id);
            }
        });
        $("#assign-permissions-to-user-modal").modal('show');
    });

    $("#store-user-permissions").click(function() {

        let permissions = $("#permissions").val();
        let user = $("#select-users").val();

        $.ajax({
            url: `/api/users/${user}/assign-permissions`,
            method: 'post',
            headers: headers,
            data: {
                permissions: permissions,
            },
            success: function (response) {
                $("#assign-permissions-to-user-modal").modal('hide');
                swal({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                    timer: response.timer,
                });
            }
        });
    });

});
