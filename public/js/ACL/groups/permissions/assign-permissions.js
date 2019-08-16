$(document).ready(function () {
    let dataTable = $(".dataTable tbody");
    let headers = {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    };

    /**
     * Load the form, allowing group permission assignment.
     */
    dataTable.on('click', 'button.assign-permission', function () {
        let group_id = $(this).data('id');

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
                   placeholder: 'Selecione as permissões'
               });

           }
        });
        $.ajax({
           url: '/api/groups',
           method: 'get',
           headers: headers,
           success: function (response) {
               let select_groups = $("#select-groups");
               select_groups.html("");
               for (let i = 0; i < response.data.length; i++)
                   select_groups.append(new Option(response.data[i].name, response.data[i].id));
               select_groups.val(group_id);
           } 
        });
        $("#assign-permissions-modal").modal('show');
    });

    /**
     * Store the group permissions
     */
    $("#store-group-permissions").click(function () {
        let group = $("#select-groups").val();
        let permissions = $("#permissions").val();

        $.ajax({
            url: `/api/groups/${group}/assign-permissions`,
            method: 'post',
            headers: headers,
            data: {
                'permissions': permissions,
            },
            success: function (response) {
                $("#assign-permissions-modal").modal('hide');
                swal({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                    timer: response.timer,
                });
            }
        })
    });
});
