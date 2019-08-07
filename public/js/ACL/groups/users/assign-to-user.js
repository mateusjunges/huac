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

    $("#store-group-users").click(function () {
       let select_groups = $("#select-groups-1");
       let users = $("#users");
       let group = select_groups.val();
       let selected_users = users.val();

       $.ajax({
           url: `/api/groups/${group}/attach-users`,
           headers: headers,
           method: 'post',
           data: {
               'users': selected_users,
           },
           success: function (response) {
               $("#assign-users-modal").modal('hide');
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
