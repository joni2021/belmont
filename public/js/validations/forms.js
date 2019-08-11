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
            },
            job_name: {
                required: "El nombre es requerido"
            },
            job_address: {
                required: "La dirección es requerida"
            },
            job_city: {
                required: "La localidad es requerida"
            },
            job_phone: {
                number: "Debe ser un celular válido"
            },
            job_province: {
                required: "La provincia es requerida"
            },
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
                // required: "La cft es requerida"
            },
            tasa: {
                number: "Debe ser numérico",
                // required: "La tna es requerida"
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
            dni: {
                maxlength: 9,
                minlength: 7,
                number: true
            },
            cuil: {
                maxlength: 12,
                minlength: 10,
                number: true
            },
            phone: {
                number: true
            },
            cel: {
                number: true
            },
            job_phone: {
                number: true
            },
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

    $(".newSelect2").select2({
        placeholder: "Seleccione un cliente"
    });

    $("#searchClient").on('change', function () {

        var usuario = $(this).val();

        axios.get('ajax/searchClient', {
            params: {
                client: usuario
            }
        })
            .then(function (response) {
                $(".datosPersonales input").empty();
                var client = response.data;

//                        Datos personales
                $('#client_id').val(client.id);
                $('#name').val(client.name);
                $('#last_name').val(client.last_name);
                $('#dni_type_id').val(client.dni_type_id);
                $('#dni').val(client.dni);
                $('#cuil').val(client.cuil);
                $('#address').val(client.address);
                $('#city').val(client.city);
                $('#province').val(client.province);
                $('#cp').val(client.cp);
                $('#ca').val(client.ca);
                $('#phone').val(client.phone);
                $('#cel').val(client.cel);

//                        Datos laborales
                $('#job_name').val(client.job_name);
                $('#job_address').val(client.job_address);
                $('#job_city').val(client.job_city);
                $('#job_province').val(client.job_province);
                $('#job_phone').val(client.job_phone);

//                        CBU
                $('#cbu').val(client.cbu);

            })
            .catch(function (e) {
                console.log(e);
            })

    })


});
