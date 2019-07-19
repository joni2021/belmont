@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-12">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a>
                        </li>
                        <li class="breadcrumb-item text-black-50"> Historial financiero
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

                <div class="row">
                    <div class="col-12">
                        <div class="sub-title">Historial financiero</div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
                            @foreach($history as $year => $loans)
                                <li class="nav-item">
                                    <a class="nav-link @if($loop->first) active @endif" data-toggle="tab"
                                       href="#loan{{ $year }}" role="tab">{{ $year }}</a>
                                    <div class="slide"></div>
                                </li>
                            @endforeach
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabs-left-content card-block">
                            @foreach($history as $year => $loans)

                                <div class="tab-pane @if($loop->first) active @endif" id="loan{{ $year }}"
                                     role="tabpanel">

                                <div class="row">
                                    @foreach($loans as $loan)
                                    <!-- timeline -->
                                            <div class="col-auto">
                                                <div class="card border-success shadow">
                                                    <div class="card-body text-dark">
                                                        <div class="float-right text-secondary py-2">{{ $loan->accreditation_date }}
                                                        </div>
                                                        <h4 class="card-title h4 py-2 text-secondary">{{ $loan->formatted_amount }}</h4>
                                                        <p class="card-text text-danger"><b>{{ $loan->dues }} cuotas</b></p>
                                                        <a class="btn btn-mini btn-outline-success" href="{{  route('forms.paymentPlan',$loan->id) }}">
                                                            Detalle del préstamo
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                        <!--/row-->

                                </div>

                            @endforeach
                        </div>
                    </div>


                </div>
            </div>
            <!-- Config. table end -->

        </div>

        @endsection

        @section('js')

            <script type="text/javascript" src="assets/js/script.js"></script>


@endsection
