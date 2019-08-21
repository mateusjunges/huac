$(document).ready(function () {
    // Global variables
    var _token = $("#csrf").val();
    var numberOfRooms = 5;
    var _events = {1: '', 2: '', 3: '', 4: '', 5: ''};
    var fullCalendar = $("#fullcalendar");
    var _slotDuration = '00:15:00';
    var eventConfig = $("#event-config");

    var globalEvent = null;
    var currentEventId = null;
    var currentSurgeryId = null;
    var surgeonIsAvailable = false;
    var numberOfReschedules = 0;
    var cirurgia_log_id = -1;
    var notOnReservedPeriod = null;
    // End global variables

    // Global consts
    const defaultRoom = 1;
    // End global consts

    /**
     * Function to retrieve the events scheduled in the specified room
     * @param room_id
     */
    function getEvents(room_id)
    {
        $.ajax({
            url: '/agendamentos/'+room_id,
            method: 'post',
            data: {
                '_token': _token,
                'start': fullCalendar.fullCalendar('getView').intervalStart.format(),
                'end': fullCalendar.fullCalendar('getView').intervalEnd.format()
            },
            async: false,
            success: function (response) {
                _events[room_id] = null;
                _events[room_id] = response.data;
            },
        });
    }

    /**
     * Update fullCalendar displayed events
     * @param room_id
     */
    function refetchEvents(room_id) {
        fullCalendar.fullCalendar('removeEvents');
        fullCalendar.fullCalendar('rerenderEvents');
        fullCalendar.fullCalendar('refetchEvents');
        fullCalendar.fullCalendar('addEventSource', _events[room_id]);
    }

    /**
     * Get surgery observation and open modal to edit it.
     * @param event_id
     */
    async function getObservationData(surgery) {
        $.ajax({
            url: `/surgery-observation/${surgery}`,
            method: 'get',
            success: function (response) {
                $("#dropped-surgery-observation").val(response.observation);
                $("#add-dropped-surgery-observation").modal('show');
            }
        });
    }

    /**
     * Check if the surgeon is available in the specified time interval
     * @param start
     * @param end
     * @param estimated_time
     * @param surgery_id
     * @param event_id
     */
    function verifyIfSurgeonIsAvailable(start, end, estimated_time, surgery_id = null, event_id = null)
    {
        try{
            $.ajax({
                url: '/events/verificar-cirurgiao',
                method: 'get',
                async: false,
                data:{
                    'start': start,
                    'end': end,
                    'tempo_estimado': estimated_time,
                    'cirurgia_id': surgery_id,
                    'event_id': event_id,
                },
                success: function (response) {
                    if (response.code === 200){
                        if (response.availability === false)
                            surgeonIsAvailable = false;
                        else
                            surgeonIsAvailable = true;
                    }else{
                        surgeonIsAvailable = false;
                        swal({
                            icon: response.icon,
                            title: response.title,
                            text: response.text,
                            timer: response.timer,
                        });
                    }
                }
            });
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
     * Verifica periodo de reserva ao trocar data pelo modal
     * @param event_id
     * @param start
     */
    function verifyReservedPeriodOnDateUpdate(event_id, start)
    {
        $.ajax({
            url: '/verificar-reservas/mudar-sala',
            method: 'get',
            async: false,
            success: function (response) {
                if (response.code === 200){
                    if (response.can_schedule === true)
                        notOnReservedPeriod = true;
                    else
                        notOnReservedPeriod = false;
                }
            },
        });
    }

    /**
     * Check if the time desired to the schedule the surgery is reserved for emergencies.
     *
     * @param surgery_id
     * @param start
     */
    async function verifyReservedPeriodOnStore(surgery_id, start)
    {
        $.ajax({
            url: '/verificar-reservas/1',
            method: 'get',
            data: {
                'cirurgia_id': surgery_id,
                'start': start,
                'sala_id': eventConfig.data('room'),
            },
            async: false,
            success: function (response) {
                if (response.code === 200){
                    if (response.can_schedule === true)
                        notOnReservedPeriod = true;
                    else
                        notOnReservedPeriod = false
                }
            },
        });
    }

    /**
     * Save the event on the database
     *
     * @param event
     * @param color
     * @param room_id
     * @param surgery_id
     */
    function saveEvent(event, color, room_id, surgery_id)
    {
        $.ajax({
            url: '/store-event',
            async: false,
            method: 'post',
            data: {
                'start': event.start,
                'event_end': event.end,
                'color': color,
                'tempo_estimado': event.tempo_estimado,
                'event_id': event.id,
                'title': event.title,
                'sala_id': room_id,
                'cirurgia_id': surgery_id,
                '_token': _token,
            },
            success: function (response) {
                swal({
                    icon:  response.icon,
                    title: response.title,
                    text:  response.text,
                    timer: response.timer,
                });
                getEvents(room_id);
                refetchEvents(room_id);
                if (response.code == 200)
                    return true;
                else
                    return false;
            }
        })
    }

    /**
     * Update Event date
     * @param event_id
     * @param start
     */
    function updateEventDate(event_id, start) {
        $.ajax({
            url: '/set-new-date/'+currentEventId,
            method: 'post',
            data: {
                '_token': _token,
                '_method': 'put',
                'newdate': start,
            },
            success: function (response) {
                swal({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                    timer: response.timer,
                });
                if (response.code === 200){
                    $("#updateDateModal").modal('hide');
                    getEvents(eventConfig.data('room'));
                    refetchEvents(eventConfig.data('room'));
                }
                else if (response.code == "VALIDATOR") {
                    if (response.errors.newdate) {
                        $("#error-new-date").html(response.errors.newdate);
                        $("#error-new-date").fadeIn();
                    }
                }
            },
        });
    }


    /**
     * Verify the number of reschedules of the specified event.
     *
     * @param eventId
     */
    function verifyReschedules(eventId)
    {
        $.ajax({
            url: '/verifica-reagendamentos/'+eventId,
            method: 'get',
            async: false,
            success: function (response) {
                if (response.code == 200){
                    numberOfReschedules = parseInt(response.quantidade);
                }else{
                    swal({
                        icon: 'error',
                        title: 'Ops...',
                        text: 'Ocorreu um erro ao verificar a quantidade de reagendamentos,' +
                            'tente novamente!',
                    });
                    return false;
                }
            },
        });
    }

    /**
     * Verify the periods reserved for emergencies while updating an event.
     *
     * @param room
     * @param event_id
     * @param start
     * @param end
     */
    async function verifyReservedPeriodOnUpdate(room, event_id, start, end)
    {
        $.ajax({
            url: '/verificar-reservas/2',
            method: 'get',
            async: false,
            data: {
                'event_id': event_id,
                'sala_id': room,
                'start': start,
                'end': end,
            },
            success: function (response) {
                if (response.code === 200){
                    if (response.can_schedule === true)
                        notOnReservedPeriod = true;
                    else
                        notOnReservedPeriod = false
                }
            }
        })
    }

    /**
     * Update the event in database
     *
     * @param event
     * @param id
     */
    function updateEvent(event, id)
    {
        $.ajax({
            url: '/update-event/'+id,
            method: 'post',
            async: false,
            data: {
                'id': event.id,
                'title': event.title,
                'color': event.color,
                'start': event.start.format(),
                'event_end': event.end.format(),
                '_method': 'put',
                '_token': _token,
            },
            success: function (response) {
                if (response.code == 200) {
                    cirurgia_log_id = response.cirurgia_log_id;
                    getEvents(eventConfig.data('room'));
                    refetchEvents(eventConfig.data('room'));
                    swal({
                        title: 'Sucesso!',
                        icon: 'success',
                        text: 'Procedimento atualizado com sucesso!',
                        timer: 3000,
                    });
                    $("#motivo-reagendamento-modal").modal('show');
                } else if (response.code == '403') {
                    swal({
                        icon: 'error',
                        title: 'Ops...',
                        text: 'Seu usuário não tem permissão para realizar esta ação no sistema. ' +
                            'Entre em contato com o administrador do sistema para mais informações!'
                    });
                    getEvents(eventConfig.data('room'));
                    refetchEvents(eventConfig.data('room'));
                }else {
                    swal({
                        title: 'Ops...',
                        icon: 'error',
                        text: 'Ocorreu um erro, tente novamente!',
                    });
                    getEvents(eventConfig.data('room'));
                    refetchEvents(eventConfig.data('room'));
                }
            }
        });
    }

    /**
     * Get informations of the specified event
     *
     * @param event_id
     */
    function getEventInformations(event_id)
    {
        currentEventId = event_id;
        $.ajax({
            method: 'get',
            url: '/event-informations/'+event_id,
            async: false,
            success: function (response) {
                $("#pnome").html(response[2][0].nome);
                $("#pprontuario").html(response[2][0].prontuario);
                $("#pdata-nascimento").html(response[2][0].data_nascimento);

                if (response[2][0].genero == 1)
                    $("#psexo").html("Masculino");
                else if (response[2][0] == 0)
                    $("#psexo").html("Feminino");
                else
                    $("#psexo").html("Outro");
                $("#ccirurgiao").html(response.principal);
                $("#cauxiliar").html(response.auxiliar);
                $("#canestesia").html(response.anestesia);
                $("#cprocedimento").html(response.procedimento);
                $("#cstatus").html(response.status);
                $("#cobs").html(response[1][0].observacao);
                $("#av_anest").html(response[1][0].av_anestesica);
                $("#cmateriais").html(response.materiais);
                $("#surgery-start").attr("href", response.app_url);
                $("#event-informations-modal").modal('show');
            }
        });
    }

    /**
     * Save the reason why the surgery has been rescheduled
     *
     * @param cirurgia_log_id
     * @param event_id
     */
    function saveReschedulingReason(cirurgia_log_id, event_id)
    {  $.ajax({
        url: '/motivos/new/'+event_id,
        method: 'post',
        async: false,
        data: {
            '_token': _token,
            'motivo': $("#select-motivo").val(),
            'event_id': event_id,
            'cirurgia_log_id': cirurgia_log_id,
        },
        success: function (response) {
            if (response.code == 200)
                $("#motivo-reagendamento-modal").modal('hide');
            swal({
                icon: response.icon,
                title: response.title,
                text: response.text,
                timer: response.timer
            });
        },
    })
    }

    /**
     * Busca as informações de avaliação anestésica da cirurgia.
     * @param surgery_id
     */
    function getAnestheticEvaluationData(surgery_id)
    {
        $.ajax({
            url: '/get-procedure/'+surgery_id,
            async: false,
            success: function (response) {
                if (response.code == "OK"){
                    $("#av_anestesica").val(" ");
                    $("#erro-av").fadeOut();
                    $("#dropped-surgery-observation").val(response.observation);
                    $("#av_anestesica").val(response.data);
                    $("#add-av-modal").modal('show');
                }
            }
        })
    }

    /**
     * Configure the full calendar options and events
     */
    fullCalendar.fullCalendar({
        header: {
            left: 'prev, next, today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },
        viewRender: function(view, element) {
            let room_id = eventConfig.data('room');
            $.ajax({
                url: '/agendamentos/' + room_id,
                method: 'post',
                data: {
                    '_token': _token,
                    'start': view.start.format(),
                    'end': view.end.format(),
                },
                async: false,
                success: function (response) {
                    _events[room_id] = response.data;
                    fullCalendar.fullCalendar('removeEvents');
                    fullCalendar.fullCalendar('rerenderEvents');
                    fullCalendar.fullCalendar('refetchEvents');
                    fullCalendar.fullCalendar('addEventSource', _events[room_id]);
                }
            });
        },
        slotDuration: _slotDuration,
        events: _events[defaultRoom],
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
         * Change the default calendar view
         *
         * @param date
         * @param jsEvent
         * @param view
         */
        dayClick: function(date, jsEvent, view){
            fullCalendar.fullCalendar('changeView', 'agendaDay');
            fullCalendar.fullCalendar('gotoDate', moment(date.format()));
        },
        /**
         * Handle fullCalendar resize events
         *
         * @param event
         * @param delta
         * @param revertFunc
         */
        eventResize: async function (event, delta, revertFunc) {
            currentEventId = event.id;
            await verifyIfSurgeonIsAvailable(event.start.format(), event.end.format(), 0, null, currentEventId);
            if (surgeonIsAvailable){
                swal({
                    icon: 'warning',
                    title: 'Tem certeza?',
                    text: 'O procedimento será reagendado para o período selecionado.',
                    timer: 4000,
                    buttons: ["Não", "Confirmar"],
                }).then(async (response) => {
                    if (response){
                        notOnReservedPeriod = null;
                        await verifyReservedPeriodOnUpdate(eventConfig.data('room'), event.id, event.start.format(), event.end.format());

                        if (notOnReservedPeriod){
                            $.ajax({
                                url: '/update-event/'+currentEventId,
                                method: 'post',
                                async: false,
                                data: {
                                    '_method': 'put',
                                    '_token': _token,
                                    'id': event.id,
                                    'start': event.start.format(),
                                    'event_end': event.end.format(),
                                    'color': event.color,
                                    'title': event.title,

                                },
                                success: function (response) {
                                    swal({
                                        icon: response.icon,
                                        title: response.title,
                                        text: response.text,
                                        timer: response.timer,
                                    });
                                },
                            });
                        }else{
                            swal({
                                icon: 'warning',
                                title: 'Período reservado para emergência!',
                                text: 'Se você reagendar esta cirurgia para este horário, estará utilizando o período reservado para emergências. Deseja continuar?',
                                buttons: ["Não", "Confirmar"],
                            }).then((response) => {
                                if (response)
                                    updateEvent(event, currentEventId);
                                else revertFunc();
                            });
                        }
                    }else
                        revertFunc();
                });
            }else{
                revertFunc();
                swal({
                    icon: 'warning',
                    title: 'Conflito de horário!',
                    text: 'O médico designado para esta cirurgia já possui agenamentos neste horário. Verifique e tente novamente.',
                    timer: 4000,
                });
            }
        },

        /**
         * Handle fullCalendar drop events
         *
         * @param date
         * @param jsEvent
         * @param resourceId
         * @param events
         * @param revertFunc
         */
        drop: async function (date, jsEvent, resourceId, events, revertFunc) {
            let _name = $(this).data('event').title;
            let _id = $(this).data('id').toString();

            let _event = new Object();

            _event = {
                id: _id,
                title: _name,
                start: date.format(),
                end: date.format(),
                tempo_estimado: $(this).data('estimado'),
            }
            currentSurgeryId = $(this).data('id');

            //Check if the surgeon is availabe:
            await verifyIfSurgeonIsAvailable(_event.start, _event.end, _event.tempo_estimado, currentSurgeryId);

            //If the surgeon is available:
            if (surgeonIsAvailable){
                notOnReservedPeriod = null;

                await verifyReservedPeriodOnStore(currentSurgeryId, _event.start);
                if (notOnReservedPeriod){
                    //Check if the event can be saved:
                    await saveEvent(_event, eventConfig.data('color').toString(), eventConfig.data('room').toString(), currentSurgeryId);
                    $("#cirurgia"+currentSurgeryId).remove();
                    await getAnestheticEvaluationData(currentSurgeryId);
                    // getObservationData(currentSurgeryId);
                }else{// If the period is reserved for emergencies:
                    swal({
                        icon: 'warning',
                        title: 'Período reservado para emergências!',
                        text: 'Se você agendar esta cirurgia neste horário, estará utilizando o espaço reservado para emergências. Deseja continuar?',
                        buttons: ["Não", "Confirmar"],
                    }).then(async (response) => {
                        if (response){
                            await saveEvent(_event, eventConfig.data('color'), eventConfig.data('room'), currentSurgeryId);
                            $("#cirurgia"+currentSurgeryId).remove();
                            getAnestheticEvaluationData(currentSurgeryId);
                            // getObservationData(currentSurgeryId);
                        }else{
                            getEvents(eventConfig.data('room'));
                            refetchEvents(eventConfig.data('room'));
                        }
                    });
                }
            }else{//if the surgeon isn't available:
                getEvents(eventConfig.data('room'));
                refetchEvents(eventConfig.data('room'));
                swal({
                    icon: 'warning',
                    title: 'Conflito de horário!',
                    text: 'O médico designado para esta cirurgia já possui agenamentos neste horário. Verifique e tente novamente.',
                    timer: 4000,
                });
            }
        },

        /**
         * Handle event drop events within fullcalendar
         *
         * @param event
         * @param delta
         * @param revertFunc
         */
        eventDrop: async function (event, delta, revertFunc) {
            currentEventId = event.id;
            if (await
                swal({
                    icon: 'warning',
                    title: 'Você tem certeza?',
                    text: 'Se sim, o procedimento será reagendado para o período selecionado.',
                    timer: 4000,
                    buttons: ["Não", "Confirmar"],
                })
            ){
                event = {
                    id: event.id,
                    title: event.title,
                    start: event.start,
                    end: event.end,
                    color: event.color,
                };
                await verifyIfSurgeonIsAvailable(event.start.format(), event.end.format(), 0, null, event.id);
                if (surgeonIsAvailable){
                    verifyReschedules(currentEventId);
                    if (numberOfReschedules > 0){ //If the surgery has reschedules
                        if (
                            await swal({
                                icon: 'warning',
                                title: 'Verifique a quantidade de reagendamentos!',
                                text: 'A cirurgia já possui '+numberOfReschedules+' reagendamentos! ' +
                                    'Tem certeza que deseja reagendar novamente?'
                            })
                        ){
                            //If the reschedule has been confirmed:
                            //check if the period desired is not reserved for emergencies:
                            notOnReservedPeriod = null;
                            await verifyReservedPeriodOnUpdate(eventConfig.data('room'), event.id, event.start.format(), event.end.format());
                            if (notOnReservedPeriod){
                                updateEvent(event, currentEventId);
                            }else{
                                swal({
                                    icon: 'warning',
                                    title: 'Período reservado para emergência!',
                                    text: 'Se você reagendar esta cirurgia para este horário, estará utilizando o período reservado para emergências. Deseja continuar?',
                                    buttons: ["Não", "Confirmar"],
                                }).then((response) => {
                                    if (response)
                                        updateEvent(event, currentEventId);
                                    else revertFunc();
                                });
                            }
                        }else{
                            revertFunc();
                        }
                    }else{//if the surgery has not reschedules
                        notOnReservedPeriod = null;
                        await verifyReservedPeriodOnUpdate(eventConfig.data('room'), event.id, event.start.format(), event.end.format());
                        if (notOnReservedPeriod){
                            //The period is not reserved for emergencies:
                            updateEvent(event, currentEventId);
                        }else{
                            swal({
                                icon: 'warning',
                                title: 'Período reservado para emergência!',
                                text: 'Se você reagendar esta cirurgia para este horário, estará utilizando o período reservado para emergências. Deseja continuar?',
                                buttons: ["Não", "Confirmar"],
                            }).then((response) => {
                                if (response)
                                    updateEvent(event, currentEventId);
                                else revertFunc();
                            });
                        }
                    }
                }else{
                    revertFunc();
                    swal({
                        icon: 'warning',
                        title: 'Conflito de horário!',
                        text: 'O médico designado para esta cirurgia já possui agenamentos neste horário. Verifique e tente novamente.',
                        timer: 4000,
                    });
                }
            }else{
                revertFunc();
            }
        },

        /**
         * Handle fullCalendar event click
         *
         * @param calEvent
         * @param jsEvent
         * @param view
         */
        eventClick: function(calEvent, jsEvent, view){
            getEventInformations(calEvent.id);
        }
    });

    $("#sala-1").click(function () {
        eventConfig.data('room', 1);
        eventConfig.data('color', '#24872c');
        getEvents(eventConfig.data('room'));
        refetchEvents(eventConfig.data('room'));
        $("#current-room").html("Sala 1");
    });
    $("#sala-2").click(function () {
        eventConfig.data('room', 2);
        eventConfig.data('color', '#24872c');
        getEvents(eventConfig.data('room'));
        refetchEvents(eventConfig.data('room'));
        $("#current-room").html("Sala 2");
    });
    $("#sala-3").click(function () {
        eventConfig.data('room', 3);
        eventConfig.data('color', '#24872c');
        getEvents(eventConfig.data('room'));
        refetchEvents(eventConfig.data('room'));
        $("#current-room").html("Sala 3");
    });
    $("#sala-4").click(function () {
        eventConfig.data('room', 4);
        eventConfig.data('color', '#24872c');
        getEvents(eventConfig.data('room'));
        refetchEvents(eventConfig.data('room'));
        $("#current-room").html("Sala 4");
    });

    /**
     On click events
     **/
    /**
     * Salvar motivo para um reagendamento de cirurgia
     */
    $("#salvar-motivo-reagendamento").click(function () {
        saveReschedulingReason(cirurgia_log_id, currentEventId);
    });

    /**
     * Editar uma cirurgia
     */
    $("#editSurgery").click(function () {
        window.location.replace('/edit-pre-agenda/'+currentEventId);
    });

    /**
     * Abrir modal para alterar status de uma cirurgia
     */
    $("#alterarstatus").click(function () {
        $.ajax({
            url: '/get-status/'+currentEventId,
            method:'get',
            success: function (response) {
                if (response !== "ERRO") {
                    $("#status-select").val(response);
                    $("#event-informations-modal").modal('hide');
                    $("#obs-text").html(" ");
                    $("#alterar-status-modal").modal('show');
                }
                else
                    swal({
                        icon: 'error',
                        title: 'Ops...',
                        text: 'Ocorreu um erro, tente novamente!'
                    });
            },
        });
    });

    /**
     * Salva o novo status da cirurgia.
     */
    $("#save-status").click(function () {
        $.ajax({
            url: '/update-status/'+currentEventId,
            method: 'post',
            data: {
                '_method': 'put',
                '_token': $("#csrf").val(),
                'status': $("#status-select").val(),
                'observacao': $("#obs-text").val(),
            },
            success: function (response) {
                swal({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                });
                if (response.code === 200){
                    getEvents(eventConfig.data('room'));
                    refetchEvents(eventConfig.data('room'));
                    $("#alterar-status-modal").modal('hide');
                }
                else if (response.code === 400){
                    if (response.errors.status)
                        $("#erroStatus").html(response.errors.status);
                    else
                        $("#erroStatus").html("");
                    if (response.errors.observacao)
                        $("#erroObs").html(response.errors.observacao);
                    else
                        $("#erroObs").html("");
                }
            },
        });
    });

    /**
     * Obtém o histórico/logs da cirurgia e evento.
     */
    $("#history-button").click(function () {
        $.ajax({
            url: '/get-history/'+currentEventId,
            method: 'get',
            async: false,
            success: function (response) {
                if (response.code === 401){
                    swal({
                        icon: response.icon,
                        title: response.title,
                        text: response.text,
                        timer: response.timer,
                    });
                }
                else{
                    $("#table-history-body").html(" ");
                    for(var i=0; i<response.length; i++){
                        var row = '<tr>';
                        if(response[i].status_id == "Reagendado" || response[i].status_id == "Reagendado após confirmação de materiais")
                            row+=
                                '<td>'+response[i].status_id+'<br><b>Motivo: </b>'+response[i].motivo+'</td>';
                        else
                            row+=
                                '<td>'+response[i].status_id+'</td>';
                        row +=
                            '<td>'+response[i].user_id+'</td>'
                            +'<td>'+response[i].data+'</td>'
                            +'<td>'+response[i].observacao+'</td>'
                            +'</tr>';
                        $("#table-history-body").append(row);
                    }
                    $("#event-informations-modal").modal('hide');
                    $("#history-modal").modal('show');
                }
            },
        });
    });

    /**
     * Modal para alterar data da cirurgia
     */
    $("#updateDate").click(function () {
        $("#event-informations-modal").modal('hide');
        $("#error-new-date").val(" ");
        $("#error-new-date").fadeOut();
        $("#newdate").val("");
        $("#updateDateModal").modal('show');
    });

    /**
     * Salva a nova data do evento
     */
    $("#alterardata").click(function () {
        verifyIfSurgeonIsAvailable($("#newDateInput").val(), 0, 0, null,currentEventId);
        if (surgeonIsAvailable){
            verifyReservedPeriodOnDateUpdate(currentEventId, $("#newDateInput").val());
            if(notOnReservedPeriod){
                updateEventDate(currentEventId, $("#newDateInput").val());
            }else{
                swal({
                    icon: 'warning',
                    title: 'Período reservado para emergências!',
                    text: 'Se você agendar esta cirurgia neste horário, estará utilizando o espaço reservado para emergências. Deseja continuar?',
                    buttons: ["Não", "Confirmar"],
                }).then(async (response) => {
                    if (response){
                        await updateEventDate(currentEventId, $("#newDateInput").val());
                    }else{
                        $("#updateDateModal").modal('hide');
                    }
                });
            }
        }else{
            getEvents(eventConfig.data('room'));
            refetchEvents(eventConfig.data('room'));
            swal({
                icon: 'warning',
                title: 'Conflito de horário!',
                text: 'O médico designado para esta cirurgia já possui agenamentos neste horário. Verifique e tente novamente.',
                timer: 4000,
            });
            return;
        }
    });

    /**
     * Modal para alterar sala da cirurgia
     */
    $("#mudar-sala").click(function () {
        $("#event-informations-modal").modal('hide');
        $("#sala").data('event', currentEventId);
        $("#mudar-sala-modal").modal('show');
    });

    /**
     * Salva a nova sala cirúrgica
     */
    $("#alterar-sala").click(function () {
        $.ajax({
            url: '/mudarsala',
            method: 'post',
            data: {
                '_token': $("#csrf").val(),
                'sala_id': $("#sala").val(),
                '_method': 'put',
                'event_id': currentEventId,
            },
            success: function (response) {
                $("#mudar-sala-modal").modal('hide');
                swal({
                    icon: response.icon,
                    title: response.title,
                    text: response.text,
                    timer: response.timer,
                });
                if(response.code === 200) {
                    getEvents(eventConfig.data('room'));
                    refetchEvents(eventConfig.data('room'));
                }
            }
        });
    });

    /**
     * Remover uma cirurgia
     */
    $("#removeSurgery").click(function () {
        swal({
            icon: 'warning',
            buttons: true,
            text: 'Tem certeza que deseja remover esta cirurgia do quadro de agendamento?',
        }).then((resposta) => {
            if (resposta){
                $.ajax({
                    url: '/delete-event/'+currentEventId,
                    method: 'post',
                    data: {
                        '_token': _token,
                        '_method': 'delete',
                    },
                    success: function (response) {
                        swal({
                            icon: response.icon,
                            title: response.title,
                            text: response.text,
                            timer: response.timer,
                        });
                        if (response.code === 200) {
                            getEvents(eventConfig.data('room'));
                            refetchEvents(eventConfig.data('room'));
                            $("#event-informations-modal").modal('hide');
                        }
                    },
                });
            }
        });
    });

    /**
     * Atualizar avaliação anestésica
     */
    $("#update-AV").click(function () {
        $.ajax({
            method: 'post',
            url: '/avaliacao-anestesica',
            data: {
                '_token': _token,
                '_method': 'put',
                'id': currentSurgeryId,
                'observation': $("#dropped-surgery-observation").val(),
                'av_anestesica': $("#av_anestesica").val(),
            },
            success: function (response) {
                if (response.code == "OK"){
                    swal({
                        icon: 'success',
                        text: 'Observação adicionada com sucesso!',
                        title: 'Sucesso!',
                    });
                    $("#add-av-modal").modal('hide');
                }else if(response.code == "VALIDATOR"){
                    swal({
                        icon: 'warning',
                        text: 'Verifique os erros no formulário!',
                        title: 'Ops...',
                    });
                    if (response.errors.observacao){
                        $("#erro-av").html(response.errors.observacao);
                        $("#erro-av").fadeIn();
                    }
                }else{
                    swal({
                        icon: 'error',
                        text: 'Ocorreu um erro, tente novamente!',
                        title: 'Ops...',
                    });
                }
            }
        })
    });

    /**
     * Refetch events during broadcast
     * @param data
     */
    function refetchByBroadcast(data){
        if (eventConfig.data('room') == data.oldRoom){
            getEvents(eventConfig.data('room'));
            refetchEvents(eventConfig.data('room'));
        }
    }

    /**
     * Pushser JS
     */
    Pusher.logToConsole = true;
    var pusher = new Pusher('8761bad23068a10a3e5f', {
        cluster: 'us2',
        forceTLS: true,
    });

    var channel = pusher.subscribe('room-changed');
    channel.bind('App\\Events\\RoomChangedEvent', function(data) {
        refetchByBroadcast(data);
    });

    var surgeryScheduled = pusher.subscribe('surgery-scheduled');
    surgeryScheduled.bind('App\\Events\\SurgeryScheduledEvent', function(data) {
        let surgeryId = data.surgery_id;
        $("#cirurgia"+surgeryId).remove();
        if (data.room == eventConfig.data('room')){
            getEvents(data.room);
            refetchEvents(data.room);
        }
    });
});
