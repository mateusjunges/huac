$(document).ready(function () {

    /**
     * User groups datatable.
     * @type {*|jQuery.fn.init|jQuery|HTMLElement}
     */
    const dataTable = $(".dataTable tbody");

    /**
     * Headers for ajax api communications.
     * @type {{"X-CSRF-TOKEN": (*|jQuery|undefined)}}
     */
    const headers = {
        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content'),
    };
    /**
     * Revoke user groups.
     */
    dataTable.on('click', 'button.delete', function () {
        let user = $(this).data('user_id');
        let group = $(this).data('id');
        var tr = $(this).closest('tr');
        $.ajax({
            url: `/api/users/${user}/remove-group`,
            method: 'post',
            headers:  headers,
            data: {
                _method: 'delete',
                groups: group,
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
        })
    });
});
