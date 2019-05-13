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

        ],

    //validaciones de edición

    'validationsUpdate' => [
        
    ],

];
