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
                    <table class="table planCuotas table-bordered nowrap w-100">
                        <thead>
                        <tr>
                            <th>Cuota</th>
                            <th>Fecha de cobro ($)</th>
                            <th>Monto a pagar ($)</th>
                            <th>Monto pagado ($)</th>
                            <th>Monto adeudado ($)</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($paymentPlan as $payment)

                            <tr>
                                <td>{{ $payment->due }}</td>
                                <td>{{ $payment->payment_date }}</td>

                            @if($loop->index > 0)
                                <td>${{ number_format($payment->float_amount_payable + $paymentPlan[$loop->index - 1]->amount_owed_original, 2) }}</td>

                            @else
                                <td>${{ $payment->amount_payable_original }}</td>
                            @endif
                                <td>{{ $payment->amount_paid }}</td>
                                <td>{{ $payment->amount_owed }}</td>
                                <td>{{ $payment->formatted_state }}</td>

                                <td class="text-right">
                                    @if($payment->state)
                                        <a class="btn text-danger btn-link btn-mini alert-prompt-danger"
                                           data-id="{{ $payment->id }}">
                                            <i class="zmdi zmdi-money-off zmdi-hc-2x"></i>
                                        </a>
                                    @else

                                        <a class="btn text-success btn-link btn-mini alert-prompt-success" data-id="{{ $payment->id }}" data-loan="{{ $payment->loans_id }}"
                                           @if($loop->index > 0)
                                                data-amountpayable="{{ number_format($payment->float_amount_payable + $paymentPlan[$loop->index - 1]->amount_owed_original,2) }}"
                                           @else
                                                data-amountpayable="{{ $payment->amount_payable_original }}"
                                            @endif
                                            >
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

    <script type="text/javascript" src="js/payment_plan.js"></script>

@endsection