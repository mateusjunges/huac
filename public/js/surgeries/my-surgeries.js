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
                    let surgical_room = $("#surgical-room");

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
                    observation.html(response.data.surgery.observation || "Não cadastrado.");
                    anesthetic_evaluation.html(response.data.surgery.anesthetic_evaluation || "Não cadastrado.");
                    surgical_room.html(response.data.event.surgical_room_id);
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

    $("#btnGoToDate").click(function() {
        let date = $("#goToDate").val();
        console.log(date);
        fullCalendar.fullCalendar('gotoDate', date);
    });

});
