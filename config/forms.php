<?php

$module = 'forms';

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

            // Instrucciones
            /*
            "instruction1_amount" => "numeric",
            "instruction1_pay_date" => "date",
            "instruction1_payment" => "exists:financing,id",
            "instruction1_order" => "string",
            "instruction2_amount" => "numeric",
            "instruction2_pay_date" => "date",
            "instruction2_payment" => "exists:financing,id",
            "instruction2_order" => "string",
            "instruction3_amount" => "numeric",
            "instruction3_pay_date" => "date",
            "instruction3_payment" => "exists:financing,id",
            "instruction3_order" => "string",
            "instruction4_amount" => "numeric",
            "instruction4_pay_date" => "date",
            "instruction4_payment" => "exists:financing,id",
            "instruction4_order" => "string",
            "cancellation1_amount" => "numeric",
            "cancellation1_pay_date" => "date",
            "cancellation1_payment" => "exists:financing,id",
            "cancellation1_order" => "string",
            "cancellation2_amount" => "numeric",
            "cancellation2_pay_date" => "date",
            "cancellation2_payment" => "exists:financing,id",
            "cancellation2_order" => "string",
            */
        ],

    //validaciones de edición

    'validationsUpdate' => [

        // Datos del prestamo
        "amount" => "required",
        "financing_id" => "required|exists:financing,due",
        "accreditation_type_id" => "required|exists:accreditation_types,id",
    ],

    'messagesStore' => [
        'cbu.required_if' => "El CBU es obligatorio si la acreditación es por transferencia bancaria",
        /*
        "instruction1_amount.numeric" => "El monto de la instrucción 1 debe ser numérica",
        "instruction1_pay_date.date" => "La fecha de la instrucción 1 debe ser una fech válida",
        "instruction1_payment.exists" => "El medio de pago de la instrucción 1 debe ser uno válido",
        "instruction1_order.string" => "La orden de la instrucción 1 debe ser alfanumérica",
        "instruction2_amount.numeric" => "El monto de la instrucción 2 debe ser numérica",
        "instruction2_pay_date.date" => "La fecha de la instrucción 2 debe ser una fech válida",
        "instruction2_payment.exists" => "El medio de pago de la instrucción 2 debe ser uno válido",
        "instruction2_order.string" => "La orden de la instrucción 2 debe ser alfanumérica",
        "instruction3_amount.numeric" => "El monto de la instrucción 3 debe ser numérica",
        "instruction3_pay_date.date" => "La fecha de la instrucción 3 debe ser una fech válida",
        "instruction3_payment.exists" => "El medio de pago de la instrucción 3 debe ser uno válido",
        "instruction3_order.string" => "La orden de la instrucción 3 debe ser alfanumérica",
        "instruction4_amount.numeric" => "El monto de la instrucción 4 debe ser numérica",
        "instruction4_pay_date.date" => "La fecha de la instrucción 4 debe ser una fech válida",
        "instruction4_payment.exists" => "El medio de pago de la instrucción 4 debe ser uno válido",
        "instruction4_order.string" => "La orden de la instrucción 4 debe ser alfanumérica",
        "cancellation1_amount.numeric" => "El monto de la cancelación 1 debe ser numérica",
        "cancellation1_pay_date.date" => "La fecha de la cancelación 1 debe ser una fech válida",
        "cancellation1_payment.exists" => "El medio de pago de la cancelación 1 debe ser uno válido",
        "cancellation1_order.string" => "La orden de la cancelación 1 debe ser alfanumérica",
        "cancellation2_amount.numeric" => "El monto de la cancelación 2 debe ser numérica",
        "cancellation2_pay_date.date" => "La fecha de la cancelación 2 debe ser una fech válida",
        "cancellation2_payment.exists" => "El medio de pago de la cancelación 2 debe ser uno válido",
        "cancellation2_order.string" => "La orden de la cancelación 2 debe ser alfanumérica",
        */
    ],


    'messagesUpdate' => [
        'cbu.required_if' => "El CBU es obligatorio si la acreditación es por transferencia bancaria",
        /*
        "instruction1_amount.numeric" => "El monto de la instrucción 1 debe ser numérica",
        "instruction1_pay_date.date" => "La fecha de la instrucción 1 debe ser una fech válida",
        "instruction1_payment.exists" => "El medio de pago de la instrucción 1 debe ser uno válido",
        "instruction1_order.string" => "La orden de la instrucción 1 debe ser alfanumérica",
        "instruction2_amount.numeric" => "El monto de la instrucción 2 debe ser numérica",
        "instruction2_pay_date.date" => "La fecha de la instrucción 2 debe ser una fech válida",
        "instruction2_payment.exists" => "El medio de pago de la instrucción 2 debe ser uno válido",
        "instruction2_order.string" => "La orden de la instrucción 2 debe ser alfanumérica",
        "instruction3_amount.numeric" => "El monto de la instrucción 3 debe ser numérica",
        "instruction3_pay_date.date" => "La fecha de la instrucción 3 debe ser una fech válida",
        "instruction3_payment.exists" => "El medio de pago de la instrucción 3 debe ser uno válido",
        "instruction3_order.string" => "La orden de la instrucción 3 debe ser alfanumérica",
        "instruction4_amount.numeric" => "El monto de la instrucción 4 debe ser numérica",
        "instruction4_pay_date.date" => "La fecha de la instrucción 4 debe ser una fech válida",
        "instruction4_payment.exists" => "El medio de pago de la instrucción 4 debe ser uno válido",
        "instruction4_order.string" => "La orden de la instrucción 4 debe ser alfanumérica",
        "cancellation1_amount.numeric" => "El monto de la cancelación 1 debe ser numérica",
        "cancellation1_pay_date.date" => "La fecha de la cancelación 1 debe ser una fech válida",
        "cancellation1_payment.exists" => "El medio de pago de la cancelación 1 debe ser uno válido",
        "cancellation1_order.string" => "La orden de la cancelación 1 debe ser alfanumérica",
        "cancellation2_amount.numeric" => "El monto de la cancelación 2 debe ser numérica",
        "cancellation2_pay_date.date" => "La fecha de la cancelación 2 debe ser una fech válida",
        "cancellation2_payment.exists" => "El medio de pago de la cancelación 2 debe ser uno válido",
        "cancellation2_order.string" => "La orden de la cancelación 2 debe ser alfanumérica",
        */
    ],


];
