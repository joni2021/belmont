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
                        <li class="breadcrumb-item">Clientes
                        </li>
                        <li class="breadcrumb-item text-black-50"><a href="{{ url('clients.index') }}"> Listado</a>
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
                <div class="row mb-4">
                    <div class="col-12 text-center">
                        <i class="p-3 icofont icofont-file-alt" style="font-size: 40px; opacity:.7;"></i>
                        <h4 class="mb-0">{{ $model->fullName }}</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card b-l-success shadow-none m-b-20">
                            <div class="card-header">
                                <div class="service-header">
                                    <h5 class="card-header-text">Datos personales</h5>
                                    <hr class="mb-0 pb-0">
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="task-detail"><b>Nombre:</b> {{ $model->fullname }}</p>
                                        <p class="task-detail"><b>{{ $model->dniType->type }}</b>: {{ $model->dni }}</p>
                                        <p class="task-detail"><b>Dirección: </b>{{ $model->address }}</p>
                                        <p class="task-detail"><b>Ciudad: </b>{{ $model->city }} - {{ $model->province or '' }} - cp:{{ $model->cp }}</p>
                                        <hr>
                                        <p class="task-detail"><b>Teléfono: </b>{{ $model->phone }}</p>
                                        <p class="task-detail"><b>Celular: </b>{{ $model->cel }}</p>


                                    </div>
                                    <!-- end of col-sm-8 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of card-block -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card b-r-primary shadow-none m-b-20">
                            <div class="card-header">
                                <div class="service-header">
                                    <h5 class="card-header-text">Datos laborales</h5>
                                    <hr class="mb-0 pb-0">
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="task-detail"><b>Nombre:</b> {{ $model->job_name }}</p>
                                        <p class="task-detail"><b>Dirección: </b>{{ $model->job_address }} - {{ $model->job_city }} - {{ $model->job_province }}</p>
                                    </div>
                                    <!-- end of col-sm-8 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of card-block -->
                        </div>

                        <div class="card b-r-primary shadow-none m-b-20">
                            <div class="card-header">
                                <a href="" class="btn btn-mini btn-success float-right"><i class="fa fa-line-chart"></i> Historial financiero</a>
                                <div class="service-header">
                                    <h5 class="card-header-text">Datos financieros</h5>
                                    <hr class="my-0 pb-0">
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p class="task-detail"><b>CBU:</b> {{ $model->cbu }}</p>

                                    </div>
                                    <!-- end of col-sm-8 -->
                                </div>
                                <!-- end of row -->
                            </div>
                            <!-- end of card-block -->
                        </div>
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
