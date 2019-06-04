<?php

$module = 'forms';

return [

    'paginate' => '50',
    'updateable' => true,


//directorio de las vistas

    'viewIndex' => $module.'.index',
    'viewForm' => $module.'.form',
    'viewShow' => $module.'.show',

    //rutas del modulo

    'routeCreate' => $module.'.create',
    'routeEdit' => $module.'.edit',
    'routeUpdate' => $module.'.update',
    'routeStore' => $module.'.store',
    'routeDestroy' => $module.'.destroy',
    'routeShow' => $module.'.show',


    //validaciones de creación

    'validationsStore' =>
        [
            // Datos del cliente
            "cel" => "required",

            //Datos laborales
            "job_name" => "required",
            "job_address" => "required",
            "job_city" => "required",
            "job_province" => "required",

            // Datos del prestamo
            "amount" => "required",
            "financing_id" => "required|exists:financing,due",
            "cbu" => "required_if:accreditation_type_id,1|digits:22",
            "accreditation_type_id" => "required|exists:accreditation_types,id",
        ],

    //validaciones de edición

    'validationsUpdate' => [

        // Datos del prestamo
        "amount" => "required",
        "financing_id" => "required|exists:financing,due",
        "accreditation_type_id" => "required|exists:accreditation_types,id",
    ],

    'messagesStore' => [
        'cbu.required_if' => "El CBU es obligatorio si la acreditación es por transferencia bancaria"
    ],


    'messagesUpdate' => [
        'cbu.required_if' => "El CBU es obligatorio si la acreditación es por transferencia bancaria"

    ],


];
