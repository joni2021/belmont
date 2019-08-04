<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrato</title>

    <style>
        html {
            font-family: sans-serif, Verdana;
            font-size: 8.5pt;
        }

        body {
            box-sizing: border-box;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

<div style="width: 17cm;height: 15cm;border: 1px solid #000;border-radius: 30px; padding: 10px;margin: auto;">
    <div>
        <p style="display: block; float: left; margin-top: .5cm;margin-left: 1cm; font-size: 25pt;">
            <b>PAGARÉ</b></p>
    </div>
    <div>
        <p style="display: block; float: right; margin-top: .7cm;margin-right: 1cm; font-size: 12pt;">
            <b>$</b> {{  $loan->amount }}</p>
    </div>

    <div style="width: 15cm;display: block; clear: both;"></div>

    <div>
        <p style="float: left; display: block; margin-top: 1.2cm;">Lugar: ______________________</p>
        <p style="margin-left: 5px;float: right;display: block; margin-top: -10px;">Fecha: <i
                    style=" display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;"> {{ date('d-m-Y', strtotime($loan->created_at)) }}</i>
        </p>
    </div>

    <div style="width: 5cm;display: block; clear: both;"></div>

    <div style="margin-top: -30px;">
        <p>
            Pagaré a la vista y sin protesto (art. 50 Decreto-Ley 5965/63) a {{ Auth::user()->company->name }} o a su orden la cantidad de
            <b>${{ $loan->amount }} (son {{ NumerosEnLetras::convertir($loan->amount,'pesos',false,'centavos') }})</b> por igual valor recibido en dinero efectivo a mi entera
            satisfacción. La suma adeudada en virtud de este pagaré, devengará intereses compensatorios a una tasa
            del {{ $loan->AccreditationType->porcent }}% efectiva mensual desde la fecha de emisión e intereses
            punitorios del orden del 50% de la tasa establecida como interés compensatorio que se adicionarán a aquel
            desde la fecha de la presentación al cobro del pagaré sin realización del pago. Todos los intereses se
            calcularán sobre la base de un año de 365 días.
            <br>
            Este pagaré será pagadero y exigible en la ciudad de· Buenos Aires o donde el beneficiario lo indique en el
            futuro y podrá ser presentado al cobro hasta 5 (cinco) años de su fecha de emisión (art.36, 96, 100 y 103
            Decreto-Ley 5965/63).
        </p>
    </div>

    <div>
        <div style="margin-top: 0; float: left;">
            <p style="display: block;"><b>DEUDOR</b></p>
            <p style="display: block;">
                <b style="margin: .1cm 0;display: block;">Firma</b>
                <br>
                <b style="margin: .1cm 0;display: block;">Aclaración</b> {{ $loan->client->fullname }}
                <br>
                <b style="margin: .1cm 0;display: block;">Tipo y N° Doc:</b> {{ $loan->client->dniType->type }} {{ $loan->client->dni }}
                <br>
                <b style="margin: .1cm 0;display: block;">Calle:</b> {{ $loan->client->address }}
                <br>
                <b style="margin: .1cm 0;display: block;">Localidad:</b> {{ $loan->client->city }}
                <br>
                <b style="margin: .1cm 0;display: block;">Provincia:</b> {{ $loan->client->province }}
            </p>
        </div>

        <div style="margin-top: 0; margin-right: 5cm; float: right;">
            <p style="display: block;"><b>DEUDOR</b></p>
            <p style="display: block">
                <b style="margin: .1cm 0; display:block;">Firma</b>
                <br>
                <b style="margin: .1cm 0; display:block;">Aclaración</b>
                <br>
                <b style="margin: .1cm 0; display:block;">Tipo y N° Doc:</b>
                <br>
                <b style="margin: .1cm 0; display:block;">Calle:</b>
                <br>
                <b style="margin: .1cm 0; display:block;">Localidad:</b>
                <br>
                <b style="margin: .1cm 0; display:block;">Provincia:</b>
            </p>
        </div>
    </div>
</div>
</body>
</html>