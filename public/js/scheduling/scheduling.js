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
    var currentEvent = null;
    var surgeonIsAvailable = false;
    var existEventsAtSameTime = false;
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

    function refreshEvents() {
        console.log("refreshEvents");
        let room = config.data('room');
        getEvents(room);
        refetchEvents(room);
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
                    console.log(response);
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
            async: false,
            data: {
                _method: 'post',
                event: event,
            },
            success: function (response, status, xhr) {

                $("#surgery"+currentSurgeryId).remove();

                swal({
                    icon:  response.data.swal.icon,
                    title: response.data.swal.title,
                    text:  response.data.swal.text,
                    timer: response.data.swal.timer,
                });
                return xhr.status === HTTP_OK;
            },
            error: function (response) {
                console.log(response);
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

                refreshEvents();

                if (xhr.status === HTTP_OK) {
                    logId = response.data.log_id;
                }
            }
        })
    }


    /**
     * Verify the reserved period before update an event.
     * @param _event
     * @param _room
     */
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

    /**
     * Verify the reserved period for the specified room before schedule a surgery.
     * @param event
     * @param room
     */
    function verifyReservedPeriodBeforeStore(event, room) {
        $.ajax({
            url: '/api/scheduling/verify-reserved-period-before-store',
            method: 'get',
            async: false,
            headers: headers,
            data: {
                room: room,
                event: {
                    start: event.start,
                    end: event.end,
                    duration: event.estimated_duration
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

    /**
     * Get all event information.
     * @param eventId
     */
    function information(eventId) {
        $.ajax({
            url: `/api/events/${eventId}/details`,
            headers: headers,
            method: 'get',
            success: function (response, status, xhr) {
                if (xhr.status === HTTP_OK) {
                    let patient_name = $("#patient-name");
                    let medical_record = $("#medical-record");
                    let birthday_at = $("#birthday-at");
                    let gender = $("#gender");
                    let head_surgeon = $("#head-surgeon");
                    let assistant_surgeon = $("#assistant-surgeon");
                    let anesthesia = $("#anesthesia");
                    let procedure = $("#procedure");
                    let materials = $("#materials");
                    let status = $("#status");
                    let observation = $("#observation");
                    let anesthetic_evaluation = $("#anesthetic-evaluation");

                    let _gender = null;
                    if (response.data.patient.gender === "M") _gender = "Masculino";
                    else if (response.data.patient.gender === "F") _gender = "Feminino";
                    else _gender = "Outro";

                    let _anesthesia = "";
                    console.log(response.data.anesthetics);
                    response.data.anesthetics.forEach(function(anesthesia) {
                        _anesthesia = _anesthesia + " - " + anesthesia.name;
                    });

                    patient_name.html(response.data.patient.name);
                    medical_record.html(response.data.patient.medical_record);
                    birthday_at.html(moment(response.data.patient.birthday_at).format('DD/MM/YYYY'));
                    gender.html(_gender);
                    head_surgeon.html(response.data.head_surgeon);
                    assistant_surgeon.html(response.data.assistant_surgeon);
                    anesthesia.html(_anesthesia);
                    procedure.html(response.data.procedure.name);
                    materials.html(response.data.surgery.materials);
                    observation.html(response.data.surgery.observation);
                    anesthetic_evaluation.html(response.data.surgery.anesthetic_evaluation);

                    status.html(response.data.status.name);


                    let modal = $("#event-click-modal");
                    modal.modal('show');
                } else
                    swal({
                       icon: response.data.icon,
                       title: response.data.title,
                       text: response.data.text,
                       timer: response.data.timer,
                    });
            }
        })
    }

    /**
     * Verify all schedules for the specified time interval checking for schedule conflicts.
     * @param event
     * @param room
     * @returns {Promise<void>}
     */
    async function verifySchedulesBeforeUpdate(event, room=config.data('room')) {
        $.ajax({
            url: '/api/scheduling/verify-existing-schedules-before-update',
            method: 'get',
            async: false,
            headers: headers,
            data: {
                room: room,
                start: event.start.format(),
                end: event.end.format(),
                event: event.id,
            },
            success: function (response, status, xhr) {
                if (xhr.status === HTTP_OK) {
                    existEventsAtSameTime = response.data.events_at_same_time;
                } else {
                    swal({
                        icon: 'error',
                        title: 'Ops...',
                        text: 'Ocorreu um erro ao verificar os agendamentos. Entre em contato com o responsável pelo sistema.',
                        timer: 5000,
                    });
                }
            },
        })
    }

    /**
     * Verify all schedules for the specified time interval checking for schedule conflicts.
     * @param event
     * @returns {Promise<void>}
     */
    async function verifySchedulesBeforeCreate(event) {
        $.ajax({
            url: '/api/scheduling/verify-existing-schedules-before-create',
            method: 'get',
            async: false,
            headers: headers,
            data: {
                room: config.data('room'),
                start: event.start,
                end: event.end,
                surgery_id: event.surgery_id,
                estimated_duration: event.estimated_duration,
            },
            success: function(response, status, xhr) {
                if (xhr.status === HTTP_OK) {
                    existEventsAtSameTime = response.data.events_at_same_time;
                }
            },
            error: function(response) {
                console.log(response);
                swal({
                    icon: 'error',
                    title: 'Ops...',
                    text: 'Ocorreu um erro ao verificar os agendamentos. Entre em contato com o responsável pelo sistema.',
                    timer: 5000,
                });
            }
        })
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
               url: `/api/events/${room}`,
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

                await verifySchedulesBeforeUpdate(event);

                if (!existEventsAtSameTime) {
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
                        icon: 'error',
                        text: 'Você não pode agendar esta cirurgia no período desejado, pois já existe uma cirurgia ocupando este horário nesta sala.',
                        title: 'Conflito de horário!',
                        timer: 5000,
                    });
                }

            } else {
                revertFunc();
                swal({
                    icon: 'warning',
                    title: 'Conflito de horário!',
                    text: 'O cirurgião designado para esta cirurgia já possui agendamentos neste horário. Verifique e tente novamente.',
                    timer: 5000,
                });
            }
        },

        /**
         * Handle drop events within fullCalendar
         * @param event
         * @param delta
         * @param revertFunc
         * @returns {Promise<void>}
         */
        eventDrop: async function (event, delta, revertFunc) {
            currentEventId = event.id;

            if (await
                swal({
                    icon: 'warning',
                    title: 'Você tem certeza?',
                    text: 'O procedimento será reagendado para o período selecionado',
                    timer: 5000,
                    buttons: ["Cancelar", "Sim, tenho certeza."],
                })
            ) {
                event = {
                    id: event.id,
                    title: event.title,
                    start: event.start,
                    end: event.end,
                    color: event.color,
                };

                await verifySurgeonAvailability(event.start.format(), // Check if the surgeon is available at the desired
                    event.end.format(), 0,                // period
                    null, event.id
                );

                await verifySchedulesBeforeUpdate(event);

                if (! existEventsAtSameTime) {
                    if (surgeonIsAvailable) { // If the surgeon is available:
                        usingReservedPeriod = null;
                        await verifyReservedPeriodBeforeUpdate(event, config.data('room')); // Check if the reschedule are
                                                                                            // using the emergency range
                        console.log(usingReservedPeriod);
                        if (! usingReservedPeriod) { //The reschedule does not use the reserved period
                            update(event, event.id);
                        } else { // The reschedule use the reserved period:
                            swal({
                                icon: 'warning',
                                title: 'Período reservado para emergência!',
                                text: 'Se você colocar esta cirurgia neste horário, estará ' +
                                    'utilizando o período reservado para emergências! Deseja continuar?',
                                buttons: ["Não", "Sim, quero continuar."],
                            })
                                .then((response) => {
                                    if (response) update(event, event.id);
                                    else revertFunc();
                                });
                        }
                    } else {
                        revertFunc();
                        swal({
                            icon: 'warning',
                            title: 'Conflito de horário!',
                            text: 'O cirurgião designado para esta cirurgia já possui ' +
                                'agendamentos neste horário. Verifique e tente novamente.',
                            timer: 5000,
                        });
                    }
                } else {
                    revertFunc();
                    swal({
                        icon: 'error',
                        text: 'Você não pode agendar esta cirurgia no período desejado, pois já existe uma cirurgia ocupando este horário nesta sala.',
                        title: 'Conflito de horário!',
                        timer: 5000,
                    });
                }

            } else{
                revertFunc();
            }
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

         /**
          * Handle drop of external events within the fullCalendar.
          * @param date
          * @param jsEvent
          * @param resourceId
          * @param events
          * @param revertFunc
          */
        drop: async function(date, jsEvent, resourceId, events, revertFunc) {
            let name = $(this).data('event').title;
            let id = $(this).data('id').toString();
            let estimated_duration = $(this).data('estimated');

            event = {
                surgery_id: id,
                color: config.data('color'),
                surgical_room: config.data('room'),
                title: name,
                start: date.format(),
                end: date.format(),
                estimated_duration: estimated_duration,
            };

             currentSurgeryId = event.surgery_id;
             // Check if the desired time interval at the specified room is available
             // and does not has any surgeries already scheduled to cause time conflict:
             existEventsAtSameTime = null;
             await verifySchedulesBeforeCreate(event);

             if (existEventsAtSameTime === false) { //There is no events schedule to this period
                 surgeonIsAvailable = null;
                 await verifySurgeonAvailability(event.start, event.end, event.estimated_duration, currentSurgeryId, null);
                 if (surgeonIsAvailable) {
                     await verifyReservedPeriodBeforeStore(event, config.data('room'));

                     if (usingReservedPeriod) {
                         // If the surgery will use the reserved period:
                         swal({
                             icon: 'warning',
                             title: 'Período reservado para emergência!',
                             text: 'Se você colocar esta cirurgia neste horário, estará ' +
                                 'utilizando o período reservado para emergências! Deseja continuar?',
                             buttons: ["Não", "Sim, quero continuar."],
                         }).then(async (response) => {
                             if (response){
                                 // Schedule the event using the reserved period:
                                 let stored = await store(event);
                                 refreshEvents();
                             } else {
                                 refreshEvents();
                             }
                         });
                     } else {
                         // the surgery will not use the reserved period:
                         let stored = await store(event);
                         refreshEvents();
                     }
                 } else {
                     refreshEvents();

                     swal({
                         icon: 'warning',
                         title: 'Conflito de horário!',
                         text: 'O cirurgião designado para esta cirurgia já possui ' +
                             'agendamentos neste horário. Verifique e tente novamente.',
                         timer: 5000,
                     });
                 }
             } else {
                 refreshEvents();

                 swal({
                     icon: 'error',
                     text: 'Você não pode agendar esta cirurgia no período desejado, pois já existe uma cirurgia ocupando este horário nesta sala.',
                     title: 'Conflito de horário!',
                     timer: 5000,
                 });
             }
             // Check if the surgeon is available before schedule the surgery
        },

    });

    /**
     * Callback function for each surgical room.
     */
    window.surgicalRooms.forEach(function(surgicalRoom) {
        $("#surgical-room-"+surgicalRoom.id).click(function() {
            config.data('room', surgicalRoom.id);
            config.data('color', '#24872c');
            $("#current-room").html("Sala " + surgicalRoom.id);
            getEvents(config.data('room'));
            refetchEvents(config.data('room'));
        });
    });

    /**
     * Change surgical room for a specified event.
     */
    $(".change-room").click(function() {
        $("#event-click-modal").modal("hide");
        let newRoom = $("#new-room");
        newRoom.html("");
        newRoom.append(new Option("Selecione a nova sala de cirurgia", ''));
        window.surgicalRooms.forEach(function(surgicalRoom) {
            newRoom.append(new Option(surgicalRoom.name, surgicalRoom.id));
        });
        $("#change-room-modal").modal('show');
    });

    /**
     * Update the surgical room where the surgery might be realized.
     */
    $("#save-new-room").click(async function () {
        let newRoom = $("#new-room");

        await verifySchedulesBeforeUpdate(currentEvent, newRoom.val());

        surgeonIsAvailable = null;
        await verifySurgeonAvailability(currentEvent.start.format(),
            currentEvent.end.format(),
            0, null, currentEventId
        );

        if (surgeonIsAvailable) {
            if (existEventsAtSameTime) {
                swal({
                    icon: 'error',
                    text: 'Você não pode trocar esta cirurgia para a sala desejada, ' +
                        'pois já existe uma cirurgia ocupando este horário nesta sala.',
                    title: 'Conflito de horário!',
                    timer: 5000,
                });
            } else {
                $.ajax({
                    url: `/api/events/${currentEventId}/change-room`,
                    method: 'post',
                    headers: headers,
                    data: {
                        _method: 'put',
                        surgical_room_id: newRoom.val(),
                    },
                    success: function (response, status, xhr) {
                        swal({
                            icon: response.data.swal.icon,
                            title: response.data.swal.title,
                            text: response.data.swal.text,
                            timer: response.data.swal.timer,
                        });
                        if (xhr.status === HTTP_OK) { // Response code = 200
                            $("#change-room-modal").modal('hide');
                            getEvents(config.data('room'));
                            refetchEvents(config.data('room'));
                        }
                    },
                    error: function (response, status, xhr) {
                        swal({
                            icon: response.data.swal.icon,
                            title: response.data.swal.title,
                            text: response.data.swal.text,
                            timer: response.data.swal.timer,
                        });
                    }
                });
            }
        } else {
            swal({
                icon: 'error',
                title: 'Conflito de horário!',
                timer: 5000,
                text: 'Um dos cirurgiões já possui agendamentos para este horário na sala selecionada!'
            });
        }
    });

    /**
     * Open the modal to update the surgery status.
     */
    $("#update-status").click(function() {
        $.ajax({
            url: '/api/status',
            method: 'get',
            headers:headers,
            success: function (response, status, xhr) {
               $("#event-click-modal").modal('hide');

               let newStatus = $("#new-status");

               newStatus.html("");
               newStatus.append(new Option('Selecione o novo status:', ''));

               response.data.status.forEach(function(status) {
                   newStatus.append(new Option(status.name, status.id));
               });
               $("#change-status-modal").modal('show');
            },
            error: function (response) {
                swal({
                    icon: response.data.swal.icon,
                    title: response.data.swal.title,
                    text: response.data.swal.text,
                    timer: response.data.swal.timer,
                })
            }
        })
    });

    /**
     * Store the new surgery status.
     */
    $("#save-new-status").click(function () {
        let newStatus = $("#new-status");

        if (newStatus.val() === 0
            || newStatus.val() == null
            || newStatus.val() === '0'
            || newStatus.val() === '') {
            swal({
                icon: 'warning',
                title: 'Informe o status!',
                text: 'Informe o novo status para esta cirurgia!',
                timer: 5000,
            });
        } else {
            $.ajax({
                url: `/api/surgeries/status/update`,
                method: 'post',
                headers: headers,
                data: {
                    _method: 'put',
                    event_id: currentEventId,
                    status: newStatus.val(),
                },
                success: function (response, status, xhr) {
                    if (xhr.status === HTTP_OK) {
                        $("#change-status-modal").modal('hide');
                        swal({
                            icon: response.data.swal.icon,
                            title: response.data.swal.title,
                            text: response.data.swal.text,
                            timer: response.data.swal.timer,
                        });

                        let room = config.data('room');

                        getEvents(room);
                        refetchEvents(room);
                    }
                },

                error: function (response) {
                    swal({
                        icon: response.data.swal.icon,
                        title: response.data.swal.title,
                        text: response.data.swal.text,
                        timer: response.data.swal.timer,
                    });
                }
            })
        }
    });

    /**
     * Redirect to the surgeries edit route.
     */
    $(".edit-surgery").click(function () {
        window.location.replace(`/surgeries/${currentEvent.surgery_id}/edit`)
    });

    /**
     * Open the modal to reschedule a surgery.
     */
    $("#change-date").click(function() {
       let modal = $("#change-event-date-modal");
       $("#event-click-modal").modal('hide');
       modal.modal('show');
    });

    /**
     * Restore the surgery to the specified date.
     */
    $("#save-new-date").click(function () {
       let newDate = $("#new-date");
       $.ajax({
           url: `/api/events/${currentEventId}/change-date`,
           method: 'post',
           headers: headers,
           data: {
               _method: 'put',
               date: newDate.val(),
               room: config.data('room'),
           },

           success: function(response, status, xhr) {
               swal({
                   icon: response.data.swal.icon,
                   title: response.data.swal.title,
                   text: response.data.swal.text,
                   timer: response.data.swal.timer,
               });
               if (xhr.status === HTTP_OK) {
                    $("#change-event-date-modal").modal('hide');
                    let room = config.data('room');
                    getEvents(room);
                    refetchEvents(room);
               }
           },
       });
    });


    /**
     * Load and show a modal with the surgery history.
     */
    $("#history-button").click(function () {
        $.ajax({
            url: `/api/events/${currentEventId}/history`,
            method: 'get',
            headers:headers,
            success: function(response, status, xhr) {
                if (xhr.status === HTTP_OK) {
                    $("#history-table-body").html("");
                    response.data.history.forEach(function(history) {
                        $("#history-table-body").append(""+
                          "<tr>" +
                            "<td>"+ history.status_name +"</td>"+
                            "<td>"+ history.user_name +"</td>"+
                            "<td>"+ moment(history.created_at).format('DD/MM/YYYY hh:mm:ss') +"</td>"+
                            "<td>"+ history.observation +"</td>"+
                          "</tr>"
                        +"");
                    });
                    $("#event-click-modal").modal('hide');
                    $("#history-modal").modal('show');
                }
            }
        });
    });

    /**
     * Cancel the clicked surgery.
     */
    $("#delete").click(function () {
        swal({
            icon: 'warning',
            title: 'Tem certeza?',
            text: 'Deseja realmente cancelar o agendamento desta cirrugia?',
            buttons: ["Não", "Sim, quero cancelar o agendamento"],
        }).then((response) => {
            if (response) {
                $("#event-click-modal").modal('hide');

                $.ajax({
                    url: `/api/events/${currentEventId}`,
                    headers: headers,
                    method: 'post',
                    data: {
                        _method: 'delete',
                    },
                    success: function (response, status, xhr) {
                        if (xhr.status === HTTP_OK) {
                            swal({
                                icon: response.data.swal.icon,
                                title: response.data.swal.title,
                                text: response.data.swal.text,
                                timer: response.data.swal.timer,
                            });
                            refreshEvents();
                        }
                    },
                });
            }
        })
    });


    $("#btnGoToDate").click(function() {
        let date = $("#goToDate").val();
        console.log(date);
       fullCalendar.fullCalendar('gotoDate', date);
    });


    // Event listeners with pusher
    Pusher.logToConsole = true; //Allow pusher to console.log things

    let pusher = new Pusher('81d1a717599e253f378e', {
        cluster: 'us2',
        forceTLS: true
    });

    let roomChanged = pusher.subscribe('room-changed');
    roomChanged.bind('room-changed', function(data) {
       if (data.event.surgical_room_id.toString() === config.data('room').toString())
           refreshEvents();
    });

    let surgeryScheduled = pusher.subscribe('surgery-scheduled');
    surgeryScheduled.bind('surgery-scheduled', function (data) {
       if (data.event.surgical_room_id.toString() === config.data('room').toString())
           refreshEvents();
    });
});
