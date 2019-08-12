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
        }
    });


});
