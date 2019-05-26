@extends('layouts.app')

@section('css')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
          href="bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
          href="assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">
@endsection

@section('content')
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Bienvenido {{ Auth::user()->fullname }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->


    <div class="page-body">
        <div class="row">

            <div class="col-8">

                <div class="col-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-primary user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="img/avatar_user.png" width="100"
                                             class="rounded-circle border with-3d-shadow border-white"
                                             alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600">{{ Auth::user()->fullname }}</h6>
                                    <p>Vendedor</p>
                                    <a href="" class="btn btn-link text-white">
                                        <i class="feather icon-edit m-t-10 f-16"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Información</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                            <h6 class="text-muted f-w-400">{{ Auth::user()->email }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Teléfono</p>
                                            <h6 class="text-muted f-w-400">{{ Auth::user()->phone }}</h6>
                                        </div>
                                    </div>
                                    <hr class="p-0 m-0">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">{{ Auth::user()->dniType->type }}</p>
                                            <h6 class="text-muted f-w-400">{{ Auth::user()->dni }}</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Dirección</p>
                                            <h6 class="text-muted f-w-400">{{ Auth::user()->address }}</h6>
                                        </div>
                                    </div>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Préstamos</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="dropdown-primary dropup open float-left">
                                                <button class="btn btn-xs p-0 btn-link dropdown-toggle" type="button"
                                                        data-toggle="dropdown"></button>
                                                <div class="dropdown-menu" aria-labelledby="dropdown-2"
                                                     data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                    <a class="dropdown-item waves-light waves-effect"
                                                       href="{{ route('clients.index') }}"> <i class="fa fa-list"></i>
                                                        Listado</a>
                                                    <a class="dropdown-item waves-light waves-effect"
                                                       href="{{ route('clients.create') }}"> <i
                                                                class="fa fa-user-plus"></i>
                                                        Nuevo</a>
                                                </div>
                                            </div>
                                            <p class="m-b-10 f-w-600"><i class="icofont icofont-contact-add f-26"></i>
                                                Clientes</p>
                                            <h6 class="text-muted f-w-400">{{ Auth::user()->clients()->count() }}</h6>

                                        </div>

                                        <div class="col-sm-6">
                                            <div class="dropdown-primary dropup open float-left">
                                                <button class="btn btn-xs p-0 btn-link dropdown-toggle" type="button"
                                                        data-toggle="dropdown"></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('forms.index') }}"> <i
                                                                class="fa fa-list"></i> Listado</a>
                                                    <a class="dropdown-item" href="{{ route('forms.create') }}"> <i
                                                                class="fa fa-plus"></i> Nuevo</a>
                                                </div>
                                            </div>
                                            <p class="m-b-10 f-w-600"><i class="icofont icofont-bank-alt f-26"></i>
                                                Préstamos</p>
                                            <h6 class="text-muted f-w-400">{{ Auth::user()->getTotalLoans() }}</h6>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wather user -->
                <div class="col-12">
                    <div class="card latest-update-card">
                        <div class="card-header">
                            <h5>Últimos préstamos</h5>
                        </div>
                        <div class="card-block">
                            <div class="latest-update-box">
                                <div class="row p-b-35">
                                    <div class="col-auto text-right update-meta">
                                        <p class="text-muted m-b-0 d-inline">Hace 4 hs</p>
                                        <i class="icofont icofont-tick-boxed bg-simple-c-blue update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <h6>Otorgado a Julio Alvarez <small class="text-danger"> ( Monto: $25000 )</small></h6>
                                    </div>
                                </div>

                                <div class="row p-b-35">
                                    <div class="col-auto text-right update-meta">
                                        <p class="text-muted m-b-0 d-inline">Hace 2 días</p>
                                        <i class="icofont icofont-tick-boxed bg-simple-c-blue update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <h6>Otorgado a Maria Rodriguez <small class="text-danger"> ( Monto: $2000 )</small></h6>
                                    </div>
                                </div>

                                <div class="row p-b-35">
                                    <div class="col-auto text-right update-meta">
                                        <p class="text-muted m-b-0 d-inline">Hace 3 días</p>
                                        <i class="icofont icofont-tick-boxed bg-simple-c-blue update-icon"></i>
                                    </div>
                                    <div class="col">
                                        <h6>Otorgado a Ricardo Urquiza <small class="text-danger"> ( Monto: $5000 )</small></h6>
                                    </div>
                                </div>


                            </div>
                            <div class="text-center">
                                <a href="{{ route('forms.index') }}" class="b-b-primary text-primary">Ver todos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wather user -->

            </div>

            <div class="col-xl-4 col-md-12">
                <div class="card user-activity-card">
                    <div class="card-header">
                        <h5 class="m-b-20 p-b-5 b-b-default f-w-600">Cobros de esta semana</h5>
                    </div>
                    <div class="card-block">

                        <div class="card statustic-progress-card">
                            <div class="card-header">
                                <h5><a href="">Alvarez, Juan Carlos</a></h5>

                                <a href="" class="text-primary f-30 float-right pt-0 mt-0" data-toggle="tooltip"
                                   title="Ver detalle" data-original-title="Ver detalle">
                                    <i class="icofont icofont-idea d-block text-primary"
                                       style="margin-top: -10px; margin-right: -10px;"></i>
                                </a>
                            </div>

                            <div class="card-block">

                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <small class="text-black-50">
                                            1/6/2019 - Cuota 3
                                        </small>
                                    </div>
                                    <div class="col text-right">
                                        <h5 class="text-danger">$3500</h5>
                                    </div>
                                </div>
                                <div class="progress m-t-15">
                                    <div class="progress-bar bg-danger" style="width:10%"></div>
                                </div>

                            </div>
                        </div>


                        <div class="card statustic-progress-card">
                            <div class="card-header">
                                <h5><a href="">Perez, Rocio</a></h5>

                                <a href="" class="text-primary f-30 float-right pt-0 mt-0" data-toggle="tooltip"
                                   title="Ver detalle" data-original-title="Ver detalle">
                                    <i class="icofont icofont-idea d-block text-primary"
                                       style="margin-top: -10px; margin-right: -10px;"></i>
                                </a>
                            </div>

                            <div class="card-block">

                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <small class="text-black-50">
                                            3/6/2019 - Cuota 1
                                        </small>
                                    </div>
                                    <div class="col text-right">
                                        <h5 class="text-danger">$1000</h5>
                                    </div>
                                </div>
                                <div class="progress m-t-15">
                                    <div class="progress-bar bg-warning" style="width:25%"></div>
                                </div>

                            </div>
                        </div>

                        <div class="card statustic-progress-card">
                            <div class="card-header">
                                <h5><a href="">Sanchez, Ezequiel</a></h5>

                                <a href="" class="text-primary f-30 float-right pt-0 mt-0" data-toggle="tooltip"
                                   title="Ver detalle" data-original-title="Ver detalle">
                                    <i class="icofont icofont-idea d-block text-primary"
                                       style="margin-top: -10px; margin-right: -10px;"></i>
                                </a>
                            </div>

                            <div class="card-block">

                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <small class="text-black-50">
                                            5/6/2019 - Cuota 12
                                        </small>
                                    </div>
                                    <div class="col text-right">
                                        <h5 class="text-danger">$7500</h5>
                                    </div>
                                </div>
                                <div class="progress m-t-15">
                                    <div class="progress-bar bg-success" style="width:70%"></div>
                                </div>

                            </div>
                        </div>


                        <div class="card statustic-progress-card">
                            <div class="card-header">
                                <h5><a href="">Pereira, Walter</a></h5>

                                <a href="" class="text-primary f-30 float-right pt-0 mt-0" data-toggle="tooltip"
                                   title="Ver detalle" data-original-title="Ver detalle">
                                    <i class="icofont icofont-idea d-block text-primary"
                                       style="margin-top: -10px; margin-right: -10px;"></i>
                                </a>
                            </div>

                            <div class="card-block">

                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <small class="text-black-50">
                                            7/6/2019 - Cuota 16
                                        </small>
                                    </div>
                                    <div class="col text-right">
                                        <h5 class="text-danger">$500</h5>
                                    </div>
                                </div>
                                <div class="progress m-t-15">
                                    <div class="progress-bar bg-primary" style="width:100%"></div>
                                </div>

                            </div>
                        </div>


                        {{--<div class="row m-b-25">--}}
                        {{--<div class="col-auto p-r-0">--}}
                        {{--<div class="u-img">--}}

                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col">--}}
                        {{--<h6 class="m-b-5">John Deo</h6>--}}
                        {{--<p class="text-muted m-b-0">Lorem Ipsum is simply dummy text.</p>--}}
                        {{--<p class="text-muted m-b-0"><i class="feather icon-clock m-r-10"></i>2 min ago</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="text-center">--}}
                        {{--<a href="{{ route('forms.index') }}" class="b-b-primary text-primary">Ver todos</a>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>


        </div>
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


    <script type="text/javascript" src="assets/js/script.js"></script>


@endsection
