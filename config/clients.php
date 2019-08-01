<?php

$module = 'clients';

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
            'name' => "required|string",
            'last_name' => "string",
            'dni_types_id' => "exists:dni_types,id",
            'dni' => "numeric",
            'cuil' => "numeric",
            'address' => "string",
            'city' => "string",
            'province' => "numeric",
            'phone' => "numeric",
            'cp' => "numeric",
            'cel' => "numeric",
            'cbu' => "numeric",
            'job_name' => "",
            'job_address' => "",
            'job_city' => "",
            'job_province' => "",
            'job_phone => "'
        ],

    //validaciones de edición

    'validationsUpdate' => [
        'name' => "required|string",
        'last_name' => "string",
        'dni_types_id' => "exists:dni_types,id",
        'dni' => "numeric",
        'cuil' => "numeric",
        'address' => "string",
        'city' => "string",
        'province' => "numeric",
        'phone' => "numeric",
        'cp' => "numeric",
        'cel' => "numeric",
        'cbu' => "numeric",
        'job_name' => "",
        'job_address' => "",
        'job_city' => "",
        'job_province' => "",
        'job_phone => "'
    ],


    'messagesStore' => [

    ],


    'messagesUpdate' => [

    ],

];
