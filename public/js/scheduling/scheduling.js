$(document).ready(function() {
    const _token = $("meta[name='csrf-token']").attr('content');
    const _slotDuration = '00:30:00';
    const defaultRoom = 1;
    const headers = {
        'X-CSRF-TOKEN': _token,
    };
    const HTTP_OK = 200;

    var events = [];
    var currentEventId = null;
    var currentSurgeryId = null;
    var surgeonIsAvailable = false;
    var logId = -1;
    var usingReservedPeriod = null;
    var config = $("#event-config");
    var fullCalendar = $("#fullCalendar");

    /**
     * Retrieve the events scheduled in the specified room.
     * @param room
     */
    function getEvents(room) {
        $.ajax({
            url: `/api/events/${room}`,
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
                else events[room] = response.data;
            }
        });
    }

    /**
     * Update the displayed events.
     * @param room
     */
    function refetchEvents(room) {
        fullCalendar.fullCalendar('removeEvents');
        fullCalendar.fullCalendar('rerenderEvents');
        fullCalendar.fullCalendar('refetchEvents');
        fullCalendar.fullCalendar('addEventSource', events[room]);
    }

    /**
     * Verify surgeon availability.
     *
     * @param start
     * @param end
     * @param estimated_time
     * @param surgery_id
     * @param event_id
     */
    function verifySurgeonAvailability(start, end, estimated_time, surgery_id = null, event_id = null) {
        try {
            $.ajax({
                url: '/api/surgeons/availability',
                headers: headers,
                method: 'get',
                async: false,
                data: {
                    start: start,
                    end: end,
                    estimated_time: estimated_time,
                    surgery_id: surgery_id,
                    event_id: event_id,
                },
                success: function (response, status, xhr) {
                    if (xhr.status === HTTP_OK) {
                        surgeonIsAvailable = !!response.data.availability;
                    } else {
                        surgeonIsAvailable = false;
                        swal({
                            icon: response.data.icon,
                            title: response.data.title,
                            text: response.data.text,
                            timer: response.data.timer,
                        });
                    }
                }
            })
        }catch (exception) {
            swal({
                icon: 'error',
                title: 'Ops...',
                timer: 4000,
                text: 'Ocorreu um erro em nosso servidor. Entre em contato com o administrador do ' +
                    'sistema ou tente novamente mais tarde.',
            });
        }
    }

    /**
     * Store a newly created event..
     * @param event
     */
    function store(event) {
        $.ajax({
            url: '/api/events/',
            method: 'post',
            headers: headers,
            data: {
                event: event,
            },
            success: function (response, status, xhr) {
                swal({
                    icon:  response.data.icon,
                    title: response.data.title,
                    text:  response.data.text,
                    timer: response.data.timer,
                });
                return xhr.status === HTTP_OK;
            }
        })
    }

    /**
     * Update an event.
     * @param event
     * @param id
     */
    function update(event, id) {
        $.ajax({
            url: `/api/events/${id}`,
            method: 'post',
            headers: headers,
            data: {
                event: {
                    start: event.start.format(),
                    end: event.end.format(),
                },
                _method: 'PUT',
            },
            success: function (response, status, xhr) {
                swal({
                    icon: response.data.icon,
                    title: response.data.title,
                    text: response.data.text,
                    timer: response.data.timer,
                });

                let room = config.data('room');
                getEvents(room);
                refetchEvents(room);

                if (xhr.status === HTTP_OK) {
                    logId = response.data.log_id;
                }
            }
        })
    }


    function verifyReservedPeriodBeforeUpdate(_event, _room) {
        let id = _event.id;

        $.ajax({
            url: '/api/scheduling/verify-reserved-period-before-update',
            method: 'get',
            async: false,
            headers: headers,
            data: {
                room: _room,
                event: {
                    start: _event.start.format(),
                    end: _event.end.format(),
                }
            },
            success: function (response, status, xhr) {
                if (xhr.status === HTTP_OK) {
                    usingReservedPeriod = !!response.data.reserved_period;
                } else {
                    console.log(xhr.status);
                    swal({
                        icon: 'error',
                        title: 'Ops...',
                        text: 'Algo deu errado. Tente novamente mais tarde!',
                        timer: 5000
                    });
                    usingReservedPeriod = true;
                }
            }
        });
    }


    fullCalendar.fullCalendar({
       header: {
           left: 'prev, next, today',
           center: 'title',
           right: 'month,agendaWeek,agendaDay',
       },
       viewRender: function (view, element) {
           let room = config.data('room');
           $.ajax({
               url: `/api/events/${room}`,
               headers: headers,
               data: {
                   start: view.start.format(),
                   end: view.start.format(),
               },
               success: function (response, status, xhr) {
                   if (xhr.status !== HTTP_OK)
                       swal({
                           icon: 'error',
                           title: 'Ops...',
                           text: 'Desculpe, não foi possível recuperar os agendamentos!',
                           timer: 5000,
                       });
                   events[room] = response.data.events;
                   refetchEvents(room);
               }
           });
       },
       slotDuration: _slotDuration,
       droppable: true,
       editable: true,
        eventConstraint: {
            start: moment().startOf('day'),
            end: moment(moment().startOf('day'), 'MM-DD-YYY').add('days', 365)
        },
        selectConstraint: {
            start: moment().startOf('day'),
            end: moment(moment().startOf('day'), 'MM-DD-YYY').add('days', 365)
        },

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
         * Handle fullCalendar resize events
         * @param event
         * @param delta
         * @param revertFunc
         * @returns {Promise<void>}
         */
        eventResize: async function (event, delta, revertFunc) {
            currentEventId = event.id;

            await verifySurgeonAvailability(event.start.format(),
                event.end.format(), 0, null, currentEventId
            );

            if (surgeonIsAvailable) { // The surgeon is available
                swal({
                    icon: 'warning',
                    title: 'Tem certeza?',
                    text: 'A duração do evento será alterada conforme o desejado.',
                    timer: 5000,
                    buttons: ["Cancelar", "Sim, tenho certeza."],
                }).then(async (response) => {
                    if (response) { // If the user says "Yes":
                        usingReservedPeriod = null;

                        await verifyReservedPeriodBeforeUpdate(event, config.data('room'));

                        if (! usingReservedPeriod) { // The reschedule is not using the reserved period
                            update(event, currentEventId);
                        } else { // The reschedule is using the reserved period
                            swal({
                                icon: 'warning',
                                title: 'Período reservado para emergência!',
                                text: 'Se você colocar esta cirurgia neste horário, estará ' +
                                    'utilizando o período reservado para emergências! Deseja continuar?',
                                buttons: ["Não", "Sim, quero continuar."],
                            }).then((response) => {
                               if (response)
                                   update(event, currentEventId);
                               else revertFunc();
                            });
                        }
                    }
                    else revertFunc();
                });
            } else {
                revertFunc();
                swal({
                    icon: 'warning',
                    title: 'Conflito de horário!',
                    text: 'O cirurgião designado para esta cirurgia já possui agendamentos neste horário. Verifique e tente novamente.',
                    timer: 5000,
                });
            }
        }
    });
});
