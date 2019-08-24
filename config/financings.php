<?php

$module = 'financings';

return [

    'paginate' => '50',
    'updateable' => true,


//directorio de las vistas

    'viewIndex' => $module . '.index',
    'viewForm' => $module . '.form',
    'viewShow' => $module . '.show',

    //rutas del modulo

    'routeCreate' => $module . '.create',
    'routeEdit' => $module . '.edit',
    'routeUpdate' => $module . '.update',
    'routeStore' => $module . '.store',
    'routeDestroy' => $module . '.destroy',
    'routeShow' => $module . '.show',


    //validaciones de creación

    'validationsStore' =>
        [
            "due" => "required|unique:financing,due",
            "porcent" => "required"
        ],

    //validaciones de edición

    'validationsUpdate' => [

        "due" => "required|unique:financing,due",
        "porcent" => "required"
    ],

    'messagesStore' => [
        'due.required' => "El número de cuota es obligatorio",
        'due.unique' => "El número de cuota ya existe",
        'porcent.required' => "El porcentaje de la tasa es obligatorio",
    ],


    'messagesUpdate' => [
        'due.required' => "El número de cuota es obligatorio",
        'due.unique' => "El número de cuota ya existe",
        'porcent.required' => "El porcentaje de la tasa es obligatorio",
    ],


];
