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
                        <h4>Clientes</h4>
                        <span>Listado de mis clientes</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item">Clientes
                        </li>
                        <li class="breadcrumb-item text-black-50"><b>Listado</b>
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
                    <table class="table table-striped table-bordered nowrap datatable">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($datas as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->last_name }}</td>
                                <td><b>{{ $client->dniType->type }}:</b> {{ $client->dni }}</td>
                                <td>{{ $client->address }}</td>
                                <td><ul>
                                        <li><b>Tel:</b> {{ $client->phone }}</li>
                                        <li><b>Cel:</b> {{ $client->cel }}</li>
                                    </ul>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown-primary dropdown open show">
                                        <button class="btn btn-primary btn-sm dropdown-toggle waves-effect waves-light "
                                                type="button" id="dropdown-7" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="true">Opciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-7" data-dropdown-in="fadeIn"
                                             data-dropdown-out="fadeOut" x-placement="bottom-start">
                                            <a class="dropdown-item waves-light waves-effect" href="{{ route("clients.edit",$client->id) }}">
                                                <i class="fa fa-edit"></i> Editar</a>
                                            {{ Form::open(["route" => ["clients.destroy",$client->id],'method' => 'DELETE']) }}

                                                <button class="dropdown-item waves-light waves-effect" type="submit">
                                                    <i class="fa fa-trash"></i> Borrar</button>

                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"></td>
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


    <script type="text/javascript" src="assets/js/script.js"></script>


@endsection
