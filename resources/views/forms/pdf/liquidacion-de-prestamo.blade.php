<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrato</title>

    <style>
        html{
            font-family: sans-serif, Verdana;
            font-size: 8.5pt;
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
        <p style="margin-left: 5px;display: inline-block;">Nro. de prestamo: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->id }}</i></p>
    </div>

    <div style="margin-top:0; border: 1px solid #000;padding: 5px;">
        <div style="float: left;">
            <p style="display: block;">Prestamo otorgado: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm;">${{ $loan->amount }}</i></p>
            <p style="margin-left: 5px;">Total deducciones: <i style="display:inline-block; vertical-align: middle;border: 1px solid #9b9b9b; padding: .1cm .2cm; width: 1.2cm;">$</i></p>
        </div>

        <div style="float: right; margin-right: 1cm;">
            @foreach($loan->Payments as $payment)
                <p style="display: block;">Instrucción {{ $payment->due }}: <i style="display:inline-block; vertical-align: top;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $payment->amount_payable }}</i></p>
            @endforeach
                <p style="display: block;">CANCELACION: </p>
                <p style="display: block;">CANCELACION: </p>
                <p style="display: block;">NETO LIQUIDADO: </p>
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
        @foreach($loan->Payments as $payment)
            <p>
                Instrucción {{ $payment->due }}
                <br>
                Son <b>{{ NumerosEnLetras::convertir($payment->amount_payable,'pesos',false,'centavos')}}</b> - Fecha de pago {{ date('d-m-Y',strtotime($payment->payment_date)) }} - Medio de pago: <b>{{ $loan->AccreditationType->type }}</b>
                <br>
                A la orden de
            </p>
            <hr>
        @endforeach
    </div>


    <div style=" margin-top: .3cm;  ">
        <p style=" display: block; float: left;">
            ___________________________
            <br>
            <b>Firma del solicitante</b></p>
        <p style="display: block; float: right; margin-top: 0;">
            ___________________________
            <br>
            <b>Aclaración</b>
        </p>
    </div>

</body>
</html>