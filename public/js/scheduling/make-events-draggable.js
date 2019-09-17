$('#external-events .fc-event').each(function() {
    // store data so the calendar knows to render an event upon drop
    let estimated = $(this).data('estimated');
    if (estimated < 10)
        estimated = '0' + estimated.toString();
    else
        estimated = estimated.toString();

    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true, // maintain when user navigates (see docs on the renderEvent method)
        duration: estimated + ':00:00',
    });
    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0,  //  original position after the drag
        helper: function() {
            return $(this).clone().appendTo('body').show();
        }
    });
});

$('#external-events-waiting-list .fc-event').each(function() {

    // store data so the calendar knows to render an event upon drop
    let estimated = $(this).data('estimated');
    if (estimated < 10)
        estimated = '0' + estimated.toString();
    else
        estimated = estimated.toString();

    $(this).data('event', {
        title: $.trim($(this).text()), // use the element's text as the event title
        stick: true, // maintain when user navigates (see docs on the renderEvent method)
        duration: estimated + ':00:00',
    });
    // make the event draggable using jQuery UI
    $(this).draggable({
        zIndex: 999,
        revert: true,      // will cause the event to go back to its
        revertDuration: 0,  //  original position after the drag
        helper: function() {
            return $(this).clone().appendTo('body').show();
        }
    });
});

String.prototype.toHHMM = function () {
    var sec_num = parseInt(this, 10);
    var hours   = Math.floor(sec_num / 3600);
    var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
    var seconds = sec_num - (hours * 3600) - (minutes * 60);

    if (hours   < 10) {hours   = "0"+hours;}
    if (minutes < 10) {minutes = "0"+minutes;}
    if (seconds < 10) {seconds = "0"+seconds;}
    return hours+':'+minutes;
};
