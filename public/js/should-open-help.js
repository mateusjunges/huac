$(document).on('keydown', function (event) {
    console.log("Tecla: " + event.keyCode);
   if (parseInt(event.keyCode) === 191) {
       $("#help-modal").modal('show');
   }
   else if (parseInt(event.keyCode) === 27) {
       $("#help-modal").modal('hide');
   }
});
