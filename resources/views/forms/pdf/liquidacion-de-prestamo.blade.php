<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liquidación del préstamo</title>

    <style>
        html{
            font-family: sans-serif, Verdana;
            font-size: 13pt;
            /*font-size: 8.5pt;*/
            box-sizing: border-box;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>


    <div style="width: 19.3cm;height: .7cm; display: block;border: 1px solid black; background-color: black; text-align: center;">
        <p style="margin:0; text-transform: uppercase; padding: 5px auto; color: white;">Liquidacion de prestamo</p>
    </div>

    <div style="margin-top: -20px;">
        <p style="display: inline-block; vertical-align: bottom;">Apellido y nombres: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->fullName }}</i></p>
        <p style="margin-left: 5px;display: inline-block;">DNI: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->dni }}</i></p>
        <p style="margin-left: 5px;display: inline-block;">NRO. de prestamo: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->id }}</i></p>
    </div>

    <div style="margin-top:0; border: 1px solid #000;padding: 5px;">
        <div style="float: left;">
            <p style="display: block;">Prestamo otorgado: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm; width: 4cm;">${{ $loan->amount }}</i></p>
            <p style="margin-left: 5px;">Total deducciones: <i style="display:inline-block; vertical-align: middle;border: 1px solid #9b9b9b; padding: .1cm .2cm; width: 4cm;">$</i></p>
        </div>

        <div style="float: right; margin-right: 1cm;">

            <p style="display: block;">Instrucción 1: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm;width:4cm;">$ {{ $loan->instruction1_amount}}</i></p>
            <p style="display: block;">Instrucción 2: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm;width:4cm;">$ {{ $loan->instruction2_amount}}</i></p>
            <p style="display: block;">Instrucción 3: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm;width:4cm;">$ {{ $loan->instruction3_amount}}</i></p>
            <p style="display: block;">Instrucción 4: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm;width:4cm;">$ {{ $loan->instruction4_amount}}</i></p>


            <p style="display: block;">CANCELACION: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm;width:3.3cm;">$ {{ $loan->cancellation1_amount}}</i></p>
            <p style="display: block;">CANCELACION: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm;width:3.3cm;">$ {{ $loan->cancellation2_amount}}</i></p>


            <p style="display: block;">NETO LIQUIDADO:$ {{ $loan->net_settled }}</p>
        </div>

        <div style="clear: both; width: 100%;">
        </div>
    </div>


    <div style="margin-top: -10px;">
        <p style="margin-left: 5px;display: inline-block; vertical-align: bottom;">
            Por la presente solicito a <b>{{ $loan->Client->fullname }}</b> que los fondos netos resultantes de la liquidación del crédito sea desembolsado de acuerdo a la presente instrucción:
        </p>
    </div>


    <div style="margin-top: -10px;">

        <p>
            Instrucción 1
            <br>
            @if(!empty($loan->instruction1_pay_date))
                Son <b>{{ NumerosEnLetras::convertir($loan->instruction1_payment,'pesos',false,'centavos')}}</b> - Fecha de pago {{ date('d-m-Y',strtotime($loan->instruction1_pay_date)) }} - Medio de pago: <b>{{ $loan->instruction1Payment->type }}</b>
                <br>
                A la orden de {{ $loan->instruction1_order }}
            @else
                Son <b>_______________________</b> - Medio de pago: <b>__________________________</b>
                <br style="padding-top: 1cm;display: block;">
                <br style="padding-top: 1cm;display: block;">
                A la orden de ____________________________________________
            @endif
        </p>
        <hr>

        <p>
            Instrucción 2
            <br>
            @if(!empty($loan->instruction2_pay_date))
                Son <b>{{ NumerosEnLetras::convertir($loan->instruction2_payment,'pesos',false,'centavos')}}</b> - Medio de pago: <b>{{ $loan->instruction2Payment->type }}</b>
                <br>
                A la orden de {{ $loan->instruction2_order }}
            @else
                Son <b>_______________________</b> - Medio de pago: <b>__________________________</b>
                <br style="padding-top: 1cm;display: block;">
                <br style="padding-top: 1cm;display: block;">
                A la orden de ____________________________________________
            @endif
        </p>
        <hr>

        <p>
            Instrucción 3
            <br>
            @if(!empty($loan->instruction3_pay_date))
                Son <b>{{ NumerosEnLetras::convertir($loan->instruction3_payment,'pesos',false,'centavos')}}</b> - Medio de pago: <b>{{ $loan->instruction3Payment->type }}</b>
                <br>
                A la orden de {{ $loan->instruction3_order }}
            @else
                Son <b>_______________________</b> - Medio de pago: <b>__________________________</b>
                <br>
                A la orden de ____________________________________________
            @endif
        </p>
        <hr>

        <p>
            Instrucción 4
            <br>
            @if(!empty($loan->instruction4_pay_date))
                Son <b>{{ NumerosEnLetras::convertir($loan->instruction4_payment,'pesos',false,'centavos')}}</b> - Medio de pago: <b>{{ $loan->instruction4Payment->type }}</b>
                <br>
                A la orden de {{ $loan->instruction4_order }}
            @else
                Son <b>_______________________</b> - Medio de pago: <b>__________________________</b>
                <br>
                A la orden de ____________________________________________
            @endif
        </p>
        <hr>

        <p>
            Cancelación 1
            <br>
            @if(!empty($loan->cancellation1_pay_date))
                Son <b>{{ NumerosEnLetras::convertir($loan->cancellation1_payment,'pesos',false,'centavos')}}</b> - Medio de pago: <b>{{ $loan->cancellation1Payment->type }}</b>
                <br>
                A la orden de {{ $loan->cancellation1_order }}
            @else
                Son <b>_______________________</b> - Medio de pago: <b>__________________________</b>
                <br>
                A la orden de ____________________________________________
            @endif
        </p>
        <hr>

        <p>
            Cancelación 2
            <br>
            @if(!empty($loan->cancellation2_pay_date))
                Son <b>{{ NumerosEnLetras::convertir($loan->cancellation2_payment,'pesos',false,'centavos')}}</b> - Medio de pago: <b>{{ $loan->cancellation2Payment->type }}</b>
                <br>
                A la orden de {{ $loan->cancellation2_order }}
            @else
                Son <b>_______________________</b> - Medio de pago: <b>__________________________</b>
                <br>
                A la orden de ____________________________________________
            @endif
        </p>
        <hr>


    </div>


    <div style=" margin-top: 1.5cm;  ">
        <p style=" display: block; float: left;">
            ___________________________
            <br>
            <b>Firma del solicitante</b></p>
        <p style="display: block; float: right; margin-top: 0;">
            {{ $loan->Client->fullname }}
            <br>
            <b>Aclaración</b>
            <br>
            {{ $loan->Client->DniType->type }} {{ $loan->Client->dni
             }}
            <br>
            <b>Tipo y N° de DOC.</b>
        </p>
    </div>

</body>
</html>