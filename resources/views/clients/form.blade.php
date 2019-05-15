@extends('layouts.app')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Nuevo Cliente</h4>
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
                        <li class="breadcrumb-item text-black-50"><b>Nuevo cliente</b>
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
                                            {{ Form::model($model,['route' => ['clients.update',$model->id],'method' => 'put','class' => 'validateForm']) }}
                                        @else
                                            {{ Form::open(['route' => 'clients.store','method' => 'post','class' => 'validateForm']) }}
                                        @endif
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
                                                <div class="invalid-feedback d-block"></div>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-4">
                                                <label class="block" for="dni">Celular</label>
                                                <div class="input-group">

                                                    {{ Form::number('cel',null,['class' => 'required form-control','id' => 'cel']) }}
                                                </div>
                                                <div class="invalid-feedback d-block"></div>
                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-primary">Crear</button>
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
    <script src="bower_components/jquery-validation/js/jquery.validate.js"></script>
    <!-- Validation js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
    <script type="text/javascript" src="assets/pages/form-validation/validate.js"></script>
    <!-- Custom js -->

    <!-- Select 2 js -->
    <script type="text/javascript" src="bower_components/select2/js/select2.full.min.js"></script>

    <script type="text/javascript" src="js/validations/clients.js"></script>

@endsection