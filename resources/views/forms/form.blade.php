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
                        @if(isset($model))
                            <h4>Préstamo {{ $model->code }} <span class="f-20 text-muted">({{ $model->Client->fullname }})</span></h4>

                        @else
                            <h4>Préstamo</h4>
                        @endif

                        <span>Por medio de la presente requerimos a ustedes, sujeto a su definitiva aprobación y conformidad, un préstamos en pesos o moneda de curso legal por la suma más abajo detallada.</span>
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
                                            {{ Form::model($model,['route' => ['forms.update',$model->id],'method' => 'PUT','class' => 'wizard-form','id' => 'example-advanced-form', 'files' => true]) }}
                                        @else
                                            {{ Form::open(['route' => 'forms.store','method' => 'POST','class' => 'wizard-form','id' => 'example-advanced-form', 'files' => true]) }}
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
                                                    <div class="col-12 col-md-6 col-lg-3">
                                                        <label class="block" for="cuil">CUIL/CUIT</label>
                                                        {{ Form::number('cuil',null,['class' => 'form-control','id' => 'cuil']) }}
                                                    </div>

                                                    <div class="col-md-6 col-lg-2">
                                                        <label class="block" for="cp">CP</label>
                                                        {{ Form::number('cp',null,['class' => 'form-control','id' => 'cp']) }}
                                                    </div>


                                                    <div class="col-6 col-lg-2">
                                                        <label class="block" for="ca">COD. ÁREA</label>
                                                        {{ Form::number('ca',null,['class' => 'form-control','id' => 'ca']) }}
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-2">
                                                        <label class="block" for="phone">Teléfono</label>
                                                        {{ Form::number('phone',null,['class' => 'form-control','id' => 'phone']) }}
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-3">
                                                        <label class="block" for="cel">Celular</label>
                                                        <div class="input-group">

                                                            {{ Form::number('cel',null,['class' => 'required form-control','id' => 'cel']) }}
                                                        </div>
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="address">Domicilio Actual</label>
                                                        {{ Form::text('address',null,['class' => 'required form-control','id' => 'address']) }}
                                                        <div class="invalid-feedback d-block"></div>
                                                    </div>

                                                    <div class="col-12 col-md-6 col-lg-4">
                                                        <label class="block" for="city">Localidad</label>
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

                                            <h3 class="d-flex"> Instrucciones </h3>

                                            <fieldset class="instrucciones">

                                                <div class="form-group row">
                                                    <div class="col-12 col-md-4">
                                                        <p class="border-bottom-primary mb-2 pb-1">Instrucción 1</p>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="instruction1_amount">Monto</label>
                                                                {{ Form::number('instruction1_amount',null,['class' => 'form-control','id' => 'instruction1_amount']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block" for="instruction1_payment">Medio de
                                                                    pago</label>
                                                                {{ Form::select('instruction1_payment',$accreditationsType,null,['class' => 'form-control select2','id' => 'instruction1_payment']) }}
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="instruction1_order">Orden</label>
                                                                {{ Form::text('instruction1_order',null,['class' => 'form-control','id' => 'instruction1_order']) }}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <p class="border-bottom-primary mb-2 pb-1">Instrucción 2</p>
                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="instruction2_amount">Monto</label>
                                                                {{ Form::number('instruction2_amount',null,['class' => 'form-control','id' => 'instruction2_amount']) }}
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">

                                                            <div class="col-12">
                                                                <label class="block" for="instruction2_payment">Medio de
                                                                    pago</label>
                                                                {{ Form::select('instruction2_payment',$accreditationsType,null,['class' => 'form-control select2','id' => 'instruction2_payment']) }}
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="instruction2_order">Orden</label>
                                                                {{ Form::text('instruction2_order',null,['class' => 'form-control','id' => 'instruction2_order']) }}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <p class="border-bottom-primary mb-2 pb-1">Instrucción 3</p>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="instruction3_amount">Monto</label>
                                                                {{ Form::number('instruction3_amount',null,['class' => 'form-control','id' => 'instruction3_amount']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">

                                                            <div class="col-12">
                                                                <label class="block" for="instruction3_payment">Medio de
                                                                    pago</label>
                                                                {{ Form::select('instruction3_payment',$accreditationsType,null,['class' => 'form-control select2','id' => 'instruction3_payment']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="instruction3_order">Orden</label>
                                                                {{ Form::text('instruction3_order',null,['class' => 'form-control','id' => 'instruction3_order']) }}
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <hr>
                                                <div class="form-group row">

                                                    <div class="col-12 col-md-4">
                                                        <p class="border-bottom-primary mb-2 pb-1">Instrucción 4</p>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="instruction4_amount">Monto</label>
                                                                {{ Form::number('instruction4_amount',null,['class' => 'form-control','id' => 'instruction4_amount']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">

                                                            <div class="col-12">
                                                                <label class="block" for="instruction4_payment">Medio de
                                                                    pago</label>
                                                                {{ Form::select('instruction4_payment',$accreditationsType,null,['class' => 'form-control select2','id' => 'instruction4_payment']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="instruction4_order">Orden</label>
                                                                {{ Form::text('instruction4_order',null,['class' => 'form-control','id' => 'instruction4_order']) }}
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="col-12 col-md-4">
                                                        <p class="border-bottom-primary mb-2 pb-1">Cancelación</p>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="cancellation1_amount">Monto</label>
                                                                {{ Form::text('cancellation1_amount',null,['class' => 'form-control','id' => 'cancellation1_amount']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">

                                                            <div class="col-12">
                                                                <label class="block" for="cancellation1_payment">Medio
                                                                    de
                                                                    pago</label>
                                                                {{ Form::select('cancellation1_payment',$accreditationsType,null,['class' => 'form-control select2','id' => 'cancellation1_payment']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="cancellation1_order">Orden</label>
                                                                {{ Form::text('cancellation1_order',null,['class' => 'form-control','id' => 'cancellation1_order']) }}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-12 col-md-4">
                                                        <p class="border-bottom-primary mb-2 pb-1">Cancelación</p>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="cancellation2_amount">Monto</label>
                                                                {{ Form::text('cancellation2_amount',null,['class' => 'form-control','id' => 'cancellation2_amount']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">

                                                            <div class="col-12">
                                                                <label class="block" for="cancellation2_payment">Medio
                                                                    de
                                                                    pago</label>
                                                                {{ Form::select('cancellation2_payment',$accreditationsType,null,['class' => 'form-control select2','id' => 'cancellation2_payment']) }}
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-12">
                                                                <label class="block"
                                                                       for="cancellation2_order">Orden</label>
                                                                {{ Form::text('cancellation2_order',null,['class' => 'form-control','id' => 'cancellation2_order']) }}
                                                            </div>
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
                                                                        @if(isset($model) && $model->financing_id == $f->id) selected
                                                                        @elseif(old('financing_id') && old('financing_id') == $f->id) selected
                                                                        @endif
                                                                        data-porcent="{{ $f->porcent }}"
                                                                        data-due="{{ $f->due }}">{{ $f->due }}</option>

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
                                                            {{ Form::number(null,$model->client->cbu,['class' => 'form-control','id' => 'cbu']) }}
                                                        @endif
                                                    </div>
                                                    <div class="invalid-feedback d-block"></div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12 col-md-2 col-lg-3">
                                                    <label class="block" for="cft">CFT</label>
                                                    {{ Form::number('cft',null,['class' => 'form-control','id' => 'cft','readonly' => true]) }}
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

                                                        {{ Form::number('tem',null,['class' => 'form-control','id' => 'tem','readonly' => true]) }}
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

                                        @if(!empty($model))

                                            <h3 class="align-text-bottom">
                                                <i class="icofont icofont-attachment icofont-2x" data-toggle="tooltip"
                                                   data-placement="top" title="Adjuntar documentación"
                                                   data-original-title="Adjuntar documentación"></i>
                                            </h3>
                                            <fieldset class="mb-5">
                                                <div class="row">

                                                    @foreach($archiveTypes as $archiveType)
                                                        <div class="col-12 col-md-6">

                                                            <div class="job-cards">
                                                                <div class="media">
                                                                    <div class="media-left media-middle">
                                                                        <img class="media-object m-r-10 m-l-10"
                                                                             src="{{ $model->getArchive($archiveType->id) }}"
                                                                             alt="{{ $archiveType->name }}">
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="company-name m-b-10">
                                                                            {{ Form::customFile($archiveType->name,$archiveType->slug,null) }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

{{--<div class="col-12 col-md-6">--}}

                                                        {{--<div class="job-cards">--}}
                                                            {{--<div class="media">--}}
                                                                {{--<div class="media-left media-middle">--}}
                                                                    {{--<img class="media-object m-r-10 m-l-10"--}}
                                                                         {{--src="{{ $model->dni }}"--}}
                                                                         {{--alt="Generic placeholder image">--}}
                                                                {{--</div>--}}
                                                                {{--<div class="media-body">--}}
                                                                    {{--<div class="company-name m-b-10">--}}
                                                                        {{--{{ Form::customFile('Fotocopia de DNI','dni',null) }}--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}


                                                    {{--<div class="col-12 col-md-6">--}}
                                                        {{--<div class="job-cards">--}}
                                                            {{--<div class="media">--}}
                                                                {{--<div class="media-left media-middle">--}}
                                                                    {{--<img class="media-object m-r-10 m-l-10"--}}
                                                                         {{--src="{{ $model->paycheck }}"--}}
                                                                         {{--alt="Generic placeholder image">--}}
                                                                {{--</div>--}}
                                                                {{--<div class="media-body">--}}
                                                                    {{--<div class="company-name m-b-10">--}}
                                                                        {{--{{ Form::customFile('Recibo de sueldo','paycheck',null) }}--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}

                                                {{--</div>--}}

                                                {{--<div class="row">--}}
                                                    {{--<div class="col-12 col-md-6">--}}

                                                        {{--<div class="job-cards">--}}
                                                            {{--<div class="media">--}}
                                                                {{--<div class="media-left media-middle">--}}
                                                                    {{--<img class="media-object m-r-10 m-l-10"--}}
                                                                         {{--src="{{ $model->contract }}"--}}
                                                                         {{--alt="Generic placeholder image">--}}
                                                                {{--</div>--}}
                                                                {{--<div class="media-body">--}}
                                                                    {{--<div class="company-name m-b-10">--}}
                                                                        {{--{{ Form::customFile('Contrato','contract',null) }}--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}


                                                    {{--<div class="col-12 col-md-6">--}}
                                                        {{--<div class="job-cards">--}}
                                                            {{--<div class="media">--}}
                                                                {{--<div class="media-left media-middle">--}}
                                                                    {{--<img class="media-object m-r-10 m-l-10"--}}
                                                                         {{--src="{{ $model->promissory_note }}"--}}
                                                                         {{--alt="Generic placeholder image">--}}
                                                                {{--</div>--}}
                                                                {{--<div class="media-body">--}}
                                                                    {{--<div class="company-name m-b-10">--}}
                                                                        {{--{{ Form::customFile('Pagaré','promissory_note',null) }}--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}

                                                </div>


                                            </fieldset>
                                        @endif
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
        $(document).ready(function () {
            flatpickr.localize(flatpickr.l10ns.es);

            $('.flatpickr').flatpickr({
                altFormat: 'd/m/Y',
                altInput: true,
                locale: 'es'
            });

        })
    </script>

    <script src="js/file_upload.js" type="text/javascript"></script>
@endsection
