<?php

    use Illuminate\Routing\Route;

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
            'dni' => "numeric|unique:clients,dni",
            'cuil' => "numeric|unique:clients,cuil",
            'address' => "string",
            'city' => "string",
            'province' => "numeric",
            'phone' => "nullable|regex:/^[0-9]*$/",
            'cp' => "nullable|string",
            'ca' => "nullable|regex:/^[0-9]*$/",
            'cbu' => "nullable|regex:/^[0-9]*$/",
            'job_name' => "nullable",
            'job_address' => "nullable",
            'job_city' => "nullable",
            'job_province' => "nullable",
            'job_phone' => "nullable"
        ],

    //validaciones de edición

    'validationsUpdate' => [
        'name' => "required|string",
        'last_name' => "string",
        'dni_types_id' => "exists:dni_types,id",
        'address' => "string",
        'city' => "string",
        'province' => "numeric",
        'cp' => "nullable|string",
        'ca' => "nullable|regex:/^[0-9]*$/",
        'cbu' => "nullable|regex:/^[0-9]*$/",
        'job_name' => "nullable",
        'job_address' => "nullable",
        'job_city' => "nullable",
        'job_province' => "nullable",
        'job_phone' => "nullable"
    ],


    'messagesStore' => [
        'name.required' => "El nombre es obligtorio",
        'phone.regex' => "El teléfono debe ser un número válido",
        'cuil.numeric' => "El CUIL/CUIT debe ser un número",
        'cuil.unique' => "El CUIL/CUIT ya está en uso, busque el cliente en la lista",
        'dni.numeric' => "El DNI debe ser un número",
        'dni.unique' => "El DNI ya está en uso, busque el cliente en la lista",
        'cbu.numeric' => "El CBU debe ser un número",
        'dni_types_id.exists' => "El tipo de documento no está en la lista",
    ],


    'messagesUpdate' => [
        'name.required' => "El nombre es obligtorio",
        'phone.regex' => "El teléfono debe ser un número válido",
        'cuil.numeric' => "El CUIL/CUIT tiene que ser un número",
        'cuil.unique' => "El CUIL/CUIT ya está en uso, busque el cliente en la lista",
        'dni.numeric' => "El DNI tiene que ser un número",
        'dni.unique' => "El DNI ya está en uso, busque el cliente en la lista",
        'dni_types_id.exists' => "El tipo de documento no está en la lista",
    ],

];
