$(document).ready(function () {
    const _token = $("meta[name='csrf-token']").attr('content');
    const _slotDuration = '00:30:00';
    let events = null;
    const headers = {
        'X-CSRF-TOKEN': _token,
    };
    const HTTP_OK = 200;

    let config = $("#event-config");
    let fullCalendar = $("#fullCalendar");

    /**
     * Return all events
     * @param room
     */
    function getEvents(room) {
        $.ajax({
            url: `/api/events/my-surgeries`,
            method: 'get',
            headers: headers,
            data: {
                start: fullCalendar.fullCalendar('getView').intervalStart.format(),
                end: fullCalendar.fullCalendar('getView').intervalEnd.format()
            },
            async: false,
            success: function (response, status, xhr) {
                if (xhr.status !== HTTP_OK) {
                    swal({
                        icon: 'error',
                        text: 'Não foi possível buscar os eventos para esta sala.',
                        title: 'Ops...',
                        timer: 5000,
                    })
                }
                else events = response.data.events;
            }
        });
    }

    /**
     * Refresh events within the fullCalendar
     */
    function refreshEvents() {
        getEvents();
        refetchEvents();
    }

    /**
     * Update the displayed events.
     */
    function refetchEvents() {
        fullCalendar.fullCalendar('removeEvents');
        fullCalendar.fullCalendar('rerenderEvents');
        fullCalendar.fullCalendar('refetchEvents');
        fullCalendar.fullCalendar('addEventSource', events);
    }



    /**
     * Instantiate and configure the fullCalendar plugin.
     */
    fullCalendar.fullCalendar({
        header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },
        viewRender: function (view, element) {

            let room = config.data('room');
            $.ajax({
                url: `/api/events/my-surgeries`,
                headers: headers,
                data: {
                    start: view.start.format(),
                    end: view.end.format(),
                },
                success: function (response, status, xhr) {
                    if (xhr.status !== HTTP_OK)
                        swal({
                            icon: 'error',
                            title: 'Ops...',
                            text: 'Desculpe, não foi possível recuperar os agendamentos!',
                            timer: 5000,
                        });
                    events = response.data.events;
                    refetchEvents();
                }
            });
        },
        slotDuration: _slotDuration,

        /**
         * Change the fullCalendar view to agendaDay
         * @param date
         * @param jsEvent
         * @param view
         */
        dayClick: function (date, jsEvent, view) {
            fullCalendar.fullCalendar('changeView', 'agendaDay');
            fullCalendar.fullCalendar('gotoDate', moment(date.format()));
        },

        /**
         * Handle the event click event.
         * @param calEvent
         * @param jsEvent
         * @param view
         */
        eventClick: function (calEvent, jsEvent, view) {
            currentEventId = calEvent.id;
            currentEvent = calEvent;
            information(calEvent.id);
        },
    });

});
