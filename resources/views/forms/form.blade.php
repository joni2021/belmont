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
                        <h4>Prestamos</h4>
                        <span>Por medio de la presente requerimos a ustedes sujeto a su definitiva aprobación y conformidad, un préstamos en pesos o moneda de curso legal, por la suma más abajo detallada.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item">Préstamos
                        </li>
                        <li class="breadcrumb-item text-black-50"><b>Nuevo préstamo</b>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

    <div class="page-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="wizard">
                                    <section>
                                        @if(isset($model))
                                            {{ Form::model($model,['route' => ['forms.update',$status,$model->id],'method' => 'PUT','class' => 'wizard-form','id' => 'example-advanced-form']) }}
                                        @else
                                            {{ Form::open(['route' => ['forms.store',$status],'method' => 'POST','class' => 'wizard-form','id' => 'example-advanced-form']) }}
                                        @endif
                                            @csrf

                                            @if(!isset($model))
                                            <h3 class="d-flex"> Datos personales </h3>

                                            <fieldset class="datosPersonales">

                                                <div class="card p-3 m-4">
                                                    <div class="form-group">
                                                        <label>Buscar cliente:</label>

                                                        {{ Form::select('searchClient',$clients,null,['class' => 'newSelect2 form-control form-control-info','placeholder' => 'Seleccione un cliente','id' => 'searchClient']) }}

                                                    </div>
                                                </div>


                                                {{ Form::hidden('client_id',null) }}


                                                <div class="form-group row">
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="name">Nombre</label>
                                                        {{ Form::text('name',null,['class' => 'required form-control','id' => 'name']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="last_name">Apellido</label>
                                                        {{ Form::text('last_name',null,['class' => 'required form-control','id' => 'last_name']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="dni">DNI</label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon p-0 border-0">
                                                                <span class="input-group-btn">
                                                                    {{ Form::select('dni_type_id',$dniTypes,null,['class' => 'form-control','id' => 'dni_type_id']) }}
                                                                </span>
                                                            </span>
                                                            {{ Form::number('dni',null,['class' => 'form-control required','id' => 'dni']) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="name">Domicilio Actual</label>
                                                        {{ Form::text('address',null,['class' => 'required form-control','id' => 'address']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="last_name">Localidad</label>
                                                        {{ Form::text('city',null,['class' => 'required form-control','id' => 'city']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="province">Provincia</label>
                                                        <div class="input-group">

                                                            {{ Form::select('province',$provinces,null,['class' => 'form-control','id' => 'province']) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                </div>


                                                <div class="form-group row">
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="name">Cp</label>
                                                        {{ Form::number('cp',null,['class' => 'form-control','id' => 'cp']) }}
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="last_name">Teléfono</label>
                                                        {{ Form::number('phone',null,['class' => 'form-control','id' => 'phone']) }}
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="dni">Celular</label>
                                                        <div class="input-group">

                                                            {{ Form::number('cel',null,['class' => 'required form-control','id' => 'cel']) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                </div>
                                            </fieldset>


                                            <h3 class="align-text-bottom"> Datos Laborales </h3>
                                            <fieldset>
                                                <div class="form-group row">
                                                    <div class="col-12 col-md-6">
                                                        <label class="block" for="job_name">Empresa</label>
                                                        {{ Form::text('job_name',null,['class' => 'required form-control','id' => 'job_name']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        <label class="block" for="job_address">Domicilio</label>
                                                        {{ Form::text('job_address',null,['class' => 'required form-control','id' => 'job_address']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12 col-md-4">
                                                        <label class="block" for="job_city">Localidad</label>
                                                        {{ Form::text('job_city',null,['class' => 'required form-control','id' => 'job_city']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <label class="block" for="job_province">Provincia</label>
                                                        <div class="input-group">

                                                            {{ Form::select('job_province',$provinces,null,['class' => 'form-control required','id' => 'job_province']) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <label class="block" for="job_phone">Teléfono</label>
                                                        <div class="input-group">

                                                            {{ Form::number('job_phone',null,['class' => 'form-control','id' => 'job_phone']) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>
                                                </div>


                                            </fieldset>
                                            @endif

                                            <h3 class="align-text-bottom"> Operación </h3>
                                            <fieldset class="mb-5">

                                                <div class="form-group row">
                                                    <div class="col-12 col-md-3">
                                                        <label class="block" for="amount">Monto solicitado ($)</label>
                                                        {{ Form::number('amount',null,['class' => 'required form-control','id' => 'amount']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-6 col-md-2">
                                                        <label class="block" for="dues">Cant. Cuotas</label>
                                                        <div class="input-group">
                                                            <select name="financing_id" id="dues" class="form-control"
                                                                    data-placeholder="Seleccione cuotas">

                                                                @foreach($financing as $f)
                                                                    <option value="{{ $f->id }}"
                                                                            @if(isset($model) && $model->financing_id == $f->id) selected @endif
                                                                            data-porcent="{{ $f->porcent }}" data-due="{{ $f->due }}">{{ $f->due }}</option>

                                                                @endforeach
                                                            </select>

                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>


                                                    <div class="col-12 col-md-7">
                                                        <label class="block" for="cbu">C.B.U</label>
                                                        <div class="input-group">
                                                            @if(!isset($model))
                                                                {{ Form::number('cbu',null,['class' => 'form-control','id' => 'cbu']) }}
                                                            @else
                                                                {{ Form::number(null,$model->client->cbu,['class' => 'form-control','id' => 'cbu','readonly' => true]) }}
                                                            @endif
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12 col-md-2 col-lg-3">
                                                        <label class="block" for="cft">CFT</label>
                                                        {{ Form::number('cft',null,['class' => 'form-control','id' => 'cft']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-6 col-md-2 col-lg-3">
                                                        <label class="block" for="tna">TNA</label>
                                                        <div class="input-group">

                                                            {{ Form::number('tasa',null,['class' => 'form-control','id' => 'tasa','readonly' => true]) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-6 col-md-2 col-lg-3">
                                                        <label class="block" for="tem">TEM</label>
                                                        <div class="input-group">

                                                            {{ Form::number('tem',null,['class' => 'form-control','id' => 'tem']) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>


                                                    <div class="col-12 col-md-5 col-lg-3">
                                                        <label class="block" for="accreditation_type_id">Tipo de
                                                            aceditación</label>
                                                        <div class="input-group">

                                                            {{ Form::select('accreditation_type_id',$accreditationsType,null,['class' => 'form-control','id' => 'accreditation_type_id']) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>


                                                </div>

                                            @php
                                                if(!isset($model))
                                                    $model = [];
                                            @endphp

                                            @include('forms.partials.dues_table',$model)

                                            </fieldset>
                                        {{ Form::close() }}

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <!--Forms - Wizard js-->
    <script src="bower_components/jquery.cookie/js/jquery.cookie.js"></script>
    <script src="bower_components/jquery.steps/js/jquery.steps.js"></script>
    <script src="bower_components/jquery-validation/js/jquery.validate.js"></script>
    <!-- Validation js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script type="text/javascript" src="assets/pages/form-validation/validate.js"></script>
    <!-- Custom js -->

    <!-- Select 2 js -->
    <script type="text/javascript" src="bower_components/select2/js/select2.full.min.js"></script>

    {{-- Validations & Steps --}}
    @if(!empty($model))
        <script type="text/javascript" src="js/validations/forms-edit.js"></script>
    @else
        <script type="text/javascript" src="js/validations/forms.js"></script>
    @endif

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
    <script type="text/javascript" src="js/calcular_cuotas.js"></script>

    <script>
        //        var vm = new Vue({
        //            el: '#example-advanced-form',
        //            method: {
        //                calcularMonto: function(){
        //                    console.log("anda")
        //                }
        //            }
        //        })


    </script>

@endsection