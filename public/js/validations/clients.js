$(document).ready(function () {


    $(".validateForm").validate({
        errorPlacement: function errorPlacement(error, element) {
            if ($($(element).parents('div')[0]).next(".invalid-feedback"))
                $($(element).parents('div')[0]).next(".invalid-feedback").html(error)

            $($(element).parents('div')[0]).find('.invalid-feedback').html(error);

        },
        errorClass: 'form-control-danger',
        messages: {
            name: {
                required: "El nombre es requerido"
            },
            last_name: {
                required: "El apellido es requerido"
            },
            dni: {
                required: "El DNI es requerido",
                maxlength: "El valor debe ser un DNI válido",
                minlength: "El valor debe ser un DNI válido",
                number: "El DNI tiene que ser numérico"
            },
            cuil: {
                required: "El CUIL/CUIT es requerido",
                maxlength: "El valor debe ser un CUIL/CUIT válido",
                minlength: "El valor debe ser un CUIL/CUIT válido",
                number: "El CUIL/CUIT tiene que ser numérico"
            },
            address: {
                required: "La dirección es requerida"
            },
            city: {
                required: "La localidad es requerida"
            },
            cel:{
                required: "El celular es requerido",
                number: "Debe ser numérico"
            },
            phone: {
                number: "Debe ser numérico"
            }
        },
        rules: {
            dni: {
                maxlength: 9,
                minlength: 7,
                number: true
            },
            cuil: {
                maxlength: 12,
                minlength: 9,
                number: true
            },
            phone: {
                number: true
            },
            cel: {
                number: true
            }
        }
    });


});
