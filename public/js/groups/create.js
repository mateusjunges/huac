$(document).ready(function () {
   $("#permissions").select2({
       placeholder: 'Selecione as permissões'
   });
    $('#slug').tooltip({
        'trigger':'focus',
        'title': 'Deixe em branco para gerar automaticamente'
    });
});
