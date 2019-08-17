$(document).ready(function() {

    const select2_fields = [
        {
            name: "classification_id",
            placeholder: "Classifique esta cirurgia"
        },
        {
            name: "surgical-procedure",
            placeholder: "Selecione o procedimento cirúrgico"
        },
        {
            name: "estimated-duration",
            placeholder: "Informe a duração estimada desta cirurgia"
        },
        {
            name: "anesthesia",
            placeholder: "Selecione uma anestesia para esta cirurgia"
        },
        {
            name: "head-surgeon",
            placeholder: "Selecione o cirurgião principal"
        },
        {
            name: "assistant-surgeon",
            placeholder: "Selecione o cirurgião auxiliar",
        },
    ];

    select2_fields.forEach((field) => {
       $("#"+field.name).select2({
           placeholder: field.placeholder,
           language: {
               noResults: function(){
                   return "Nenhum resultado encontrado";
               }
           },
       });
    });


});
