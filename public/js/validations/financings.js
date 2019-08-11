$(document).ready(function () {


    $(".validateForm").validate({
        errorPlacement: function errorPlacement(error, element) {
            if ($($(element).parents('div')[0]).next(".invalid-feedback"))
                $($(element).parents('div')[0]).next(".invalid-feedback").html(error)

            $($(element).parents('div')[0]).find('.invalid-feedback').html(error);

        },
        errorClass: 'form-control-danger',
        messages: {
            due: {
                required: "El número de cuota es requerida"
            },
            porcent: {
                required: "El porcentaje de la tasa es requerido",
            }
        },
        rules: {
            due: {
                maxlength: 2,
                minlength: 1,
                number: true
            },
            porcent: {
                number: true
            }
        }
    });


});
