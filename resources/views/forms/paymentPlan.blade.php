@extends('layouts.app')
@section('css')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
          href="assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">


    <!-- sweet alert framework -->
    <link rel="stylesheet" type="text/css" href="bower_components/sweetalert/css/sweetalert.css">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="assets/css/component.css">

    <!-- Material Icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/material-design/css/material-design-iconic-font.min.css">
@endsection
@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Plan de pagos</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('forms.index') }}">Préstamos</a>
                        </li>
                        <li class="breadcrumb-item text-black-50"><b>Plan de pagos</b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <div class="page-body">
        <!-- Config. table start -->
        <div class="card">

            <div class="card-block">

                <div class="dt-responsive">
                    <table class="table table-bordered nowrap datatable w-100">
                        <thead>
                        <tr>
                            <th>Cuota</th>
                            <th>Fecha de cobro ($)</th>
                            <th>Monto a pagar ($)</th>
                            <th>Monto pagado ($)</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($paymentPlan as $payment)

                            <tr>
                                <td>{{ $payment->due }}</td>
                                <td>{{ $payment->payment_date }}</td>
                                <td>{{ $payment->amount_payable }}</td>
                                <td>{{ $payment->amount_paid }}</td>
                                <td>{{ $payment->formatted_state }}</td>

                                <td class="text-right">
                                    @if($payment->state)
                                        <a class="btn text-danger btn-link btn-mini alert-prompt-danger"
                                           data-id="{{ $payment->id }}">
                                            <i class="zmdi zmdi-money-off zmdi-hc-2x"></i>
                                        </a>
                                    @else
                                        <a class="btn text-success btn-link btn-mini alert-prompt-success"
                                           data-id="{{ $payment->id }}"
                                           data-amountpayable="{{ $payment->amount_payable }}">
                                            <i class="zmdi zmdi-money zmdi-hc-2x"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">El préstamo no cuenta con un plan de pagos</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- Config. table end -->
    </div>

@endsection

@section('js')

    <!-- data-table js -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/pages/data-table/js/jszip.min.js"></script>
    <script src="assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="assets/pages/data-table/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>



    {{--<script src="assets/pages/data-table/extensions/responsive/js/responsive-custom.js"></script>--}}

    <script type="text/javascript" src="assets/js/script.js"></script>

    <script>
        $(document).ready(function () {
            $('.alert-prompt-success').on('click', function (ev) {
                ev.preventDefault();

                var id = $(this).data('id');
                var amountPayable = $(this).data('amountpayable').substring(1);

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
                            amount_paid: inputValue
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
        })
    </script>

@endsection