$(document).ready(function () {

    /**
     * Datatable for users list.
     * @type {*|jQuery.fn.init|jQuery|HTMLElement}
     */
    const dataTable = $(".dataTable tbody");

    /**
     * Ajax headers for api communication.
     * @type {{"X-CSRF-TOKEN": (*|jQuery|undefined)}}
     */
    const headers = {
      'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
    };

    /**
     * Show assign groups modal, loading database users and groups.
     */
    dataTable.on('click', 'button.assign-group', function () {
    let user_id = $(this).data('id');

    $.ajax({
            url: '/api/users',
            method: 'get',
            headers: headers,
            success: function (response) {
                let select_users = $("#select-user-to-group");
                select_users.html("");
                for (let i = 0; i < response.data.length; i++)
                    select_users.append(new Option(response.data[i].name, response.data[i].id));
                select_users.val(user_id);
            }
        });

        $.ajax({
            url: '/api/groups',
            method: 'get',
            headers: headers,
            success: function (response) {
                let select_groups = $("#select-user-groups");
                select_groups.html("");
                for (let i = 0; i < response.data.length; i++)
                    select_groups.append(new Option(response.data[i].name, response.data[i].id));
                select_groups.select2({
                    placeholder: "Grupos"
                });
            }
        });

        $("#assign-groups-to-user-modal").modal('show');

    });

    /**
     * Store the selected user groups.
     */
    $("#store-user-groups").click(function () {
        let groups = $("#select-user-groups").val();
        let user = $("#select-user-to-group").val();

        $.ajax({
            url: `/api/users/${user}/assign-groups`,
            method: 'post',
            headers: headers,
            data: {
                groups: groups,
            },
            success: function (response) {
                $("#assign-groups-to-user-modal").modal('hide');
                swal({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                    timer: response.timer,
                })
            }
        });
    });
});
