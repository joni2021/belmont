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
                        <h4>Tipos de archivos</h4>
                        <span>Listado de tipos de archivos</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item">Tipos de archivos
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
                    <table class="table table-striped table-bordered nowrap datatable w-100">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Slug</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($datas as $archiveType)
                            <tr>
                                <td>{{ $archiveType->name }}</td>
                                <td>{{ $archiveType->slug }}</td>

                                <td class="text-right">
                                    <div class="dropdown-default bg-transparent border-0 dropdown open show">
                                        <button class="btn btn-light bg-transparent border-0 btn-mini dropdown-toggle waves-effect"
                                                type="button" id="dropdown-7" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">Opciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-7"
                                             data-dropdown-in="fadeIn"
                                             data-dropdown-out="fadeOut" x-placement="bottom-start">
                                            <a class="dropdown-item waves-light waves-effect"
                                               href="{{ route("archiveTypes.edit",$archiveType->id) }}">
                                                <i class="fa fa-edit"></i> Editar</a>
                                            {{ Form::open(["route" => ["archiveTypes.destroy",$archiveType->id],'method' => 'DELETE','style' => 'display:none;']) }}

                                            <button class="dropdown-item waves-light waves-effect" type="submit">
                                                Borrar
                                            </button>

                                            {{ Form::close() }}
                                            <a class="dropdown-item waves-light waves-effect btnDelete" href="#">
                                                <i class="fa fa-trash"></i> Borrar</a>
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
