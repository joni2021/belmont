$(document).ready(function () {
    $('.alert-prompt-success').on('click', function (ev) {
        ev.preventDefault();

        var id = $(this).data('id');
        var amountPayable = $(this).data('amountpayable').substring(1);
        var loan = $(this).data('loan');

        swal({
            title: "¿Cuánto abonó el cliente?",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            inputPlaceholder: "$2000",
            showLoaderOnConfirm: true
        }, function (inputValue) {

            if (inputValue === false) return false;

            if (isNaN(inputValue)) {
                swal.showInputError("El monto debe ser un número (si es decimal use punto)");
                return false
            }

            if (inputValue === "") {
                swal.showInputError("Ingrese el monto pagado");
                return false
            }

            if (parseFloat(inputValue) > parseFloat(amountPayable)) {
                swal.showInputError("El monto tiene que ser menor a $" + amountPayable);
                return false
            }

            axios.post('ajax/payDue', {
                params: {
                    id: id,
                    amount_paid: inputValue,
                    loan: loan
                }
            }).then(function (response) {
                swal("", "Pago ingresado: " + inputValue, "success");

                window.location.reload();
            })
                .catch(function (e) {
                    console.log(e);
                })
        });
    });


    $('.alert-prompt-danger').on('click', function (ev) {
        ev.preventDefault();

        var id = $(this).data('id');
        var loan = $(this).data('loan');

        swal({
                title: "¿Cancelar el pago?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Si",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true
            },
            function (isConfirm) {
                if (isConfirm) {

                    axios.post('ajax/cancelPayDue', {
                        params: {
                            id: id,
                            loan: loan
                        }
                    }).then(function (response) {
                        swal("", "El pago ha sido cancelado", "success");

                        window.location.reload();
                    }).catch(function (e) {
                        swal("", "No se pudo cancelar el pago", "error");
                    })

                } else {
                    swal("", "No se pudo cancelar el pago", "error");
                }
            });


    });


    $(".planCuotas").DataTable({
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        responsive: true,
        paging: false
    })
})