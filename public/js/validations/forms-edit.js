$(document).ready(function () {
    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        titleTemplate: "#title#",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                form.steps("previous");
            }
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            form.submit();
        },
        labels: {
            cancel: "Cancelar",
            current: "current step:",
            pagination: "Paginación",
            finish: "Terminar",
            next: "Siguiente",
            previous: "Anterior",
            loading: "Cargando ..."
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) {
            if ($($(element).parents('div')[0]).next(".invalid-feedback"))
                $($(element).parents('div')[0]).next(".invalid-feedback").html(error)

            $($(element).parents('div')[0]).find('.invalid-feedback').html(error);

        },
        errorClass: 'form-control-danger',
        messages: {

            amount: {
                number: "Debe ser un monto válido",
                required: "El monto es requerido"
            },
            dues: {
                number: "Debe ser una cuota válida",
                required: "Las coutas son requeridas"
            },
            dues_amount: {
                number: "Debe ser un monto válida",
            },
            cft: {
                number: "Debe ser numérico",
                required: "La cft es requerida"
            },
            tem: {
                number: "Debe ser numérico"
            },
            cbu: {
                number: "Debe ser numérico",
                min: "Debe ser un CBU válido",
                max: "Debe ser un CBU válido"
            }

        },
        rules: {

            amount: {
                number: true
            },
            dues: {
                number: true
            },
            dues_amount: {
                number: true
            },
            cft: {
                number: true
            },
            tna: {
                number: true
            },
            tem: {
                number: true
            },
            cbu: {
                number: true,
                min:1000000000000000000000,
                max:9999999999999999999999
            }
        }
    });



});
