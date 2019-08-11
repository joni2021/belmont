<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrato</title>

    <style>
        html{
            font-family: sans-serif, Verdana;
            /*font-size: 8.5pt;*/
            font-size: 12pt;
            box-sizing: border-box;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

    <div>
        <p>SRES: {{ Auth::user()->Company->name }} <br>
            Por medio de la presente requerimos de ustedes sujeto a su definitiva aprobación y conformidad, un préstamo en Pesos o moneda de curso legal, por la suma que más abajo se detalla, declarando en base a los siguientes términos y condiciones particulares que a continuación, exponiendo mis datos personales, manifestando:
        </p>
        <p style="display: block; float: left;"><b>1. Datos</b></p>
        <p style="display: block; float: right; margin-top: 0;"><b>Fecha:</b> {{ date('d/m/Y',strtotime($loan->created_at)) }}</p>
    </div>
    <div style="height: .3cm; width:.3cm;">
    </div>

    <div style="width: 19.3cm;height: .7cm; display: block;border: 1px solid black; background-color: black; text-align: center; text-transform: uppercase;">
        <p style="margin:0; text-transform: uppercase; padding: 5px auto; color: white;">datos personales</p>
    </div>

    <div style="margin-top: -20px; text-transform: uppercase; font-size: 11pt;">
        <p style="display: inline-block; vertical-align: bottom;">Apellido y nombres: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .8cm;">{{ $loan->Client->fullName }}</i></p>
        <p style="margin-left: 10px;display: inline-block;">DNI: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .5cm; width: 6cm;">{{ $loan->Client->formatted_dni }}</i></p>
    </div>

    <div style="margin-top: -20px; text-transform: uppercase; font-size: 11pt;">
        <p style="display: inline-block; vertical-align: bottom;">Domicilio actual: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->address }}</i></p>
        <p style="margin-left: 5px;display: inline-block;">Localidad: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->city }}</i></p>
    </div>

    <div style="margin-top: -20px; text-transform: uppercase; font-size: 11pt;">
        <p style="display: inline-block; vertical-align: bottom;">Provincia: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->province_name }}</i></p>
        <p style="display: inline-block;">CP: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->cp }}</i></p>

        <p style="margin-left: 5px;display: inline-block;">TEL. Particular: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->phone }}</i></p>
        <p style="margin-left: 5px;display: inline-block;">TEL. celular: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->cel }}</i></p>
    </div>



    <div style="width: 19.3cm;height: .7cm; display: block;border: 1px solid black; background-color: black; text-align: center; text-transform: uppercase;">
        <p style="margin:0; text-transform: uppercase; padding: 5px auto; color: white;">datos laborales</p>
    </div>

    <div style="margin-top: -20px; text-transform: uppercase; font-size: 11pt;">
        <p style="margin-left: 5px;display: inline-block; vertical-align: bottom;">Empresa: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;width:3cm;">{{ $loan->Client->job_name }}</i></p>
        <p style="margin-left: 5px;display: inline-block;">Domicilio laboral: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm; width: 3cm;">{{ $loan->Client->job_address }}</i></p>
    </div>

    <div style="margin-top: -40px; text-transform: uppercase; font-size: 11pt;">
        <p style="margin-left: 5px;display: inline-block; vertical-align: bottom;">Localidad: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->job_city }}</i></p>
        <p style="margin-left: 5px;display: inline-block;">Provincia: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->job_province_name }}</i></p>

        <p style="margin-left: 5px;display: inline-block;">TEL. LABORAL: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->Client->job_phone }}</i></p>
    </div>



    <div style="width: 19.3cm;height: .7cm; display: block;border: 1px solid black; background-color: black; text-align: center; text-transform: uppercase; font-size: 11pt;">
        <p style="margin:0; text-transform: uppercase; font-size: 11pt; padding: 5px auto; color: white;">datos de la operacion</p>
    </div>

    <div style="margin-top: -30px; text-transform: uppercase; font-size: 11pt;">
        <p style="margin-left: 5px;display: inline-block; vertical-align: bottom;">Monto solicitado: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->formatted_amount }}</i></p>
        <p style="margin-left: 5px;display: inline-block;">Cantidad de cuotas: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">{{ $loan->dues }}</i></p>
        <p style="margin-left: 5px;display: inline-block;">Importe cuota: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .2cm;">${{ $loan->Payments->first()->formated_amount_payable }}</i></p>
    </div>


    <div style="margin-top: -30px; text-transform: uppercase; font-size: 11pt;">
        <p style="margin-left: 5px;display: inline-block; vertical-align: bottom;">CBU: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .5cm;">{{ $loan->Client->cbu }}</i></p>
        <p style="margin-left: 12px;display: inline-block; ">C.F.T: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .5cm;width:3cm;">{{ $loan->cft }}%</i></p>
        <p style="margin-left: 12px;display: inline-block;">T.N.A: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .5cm;width:3cm;">{{ $loan->tna }}%</i></p>
        <p style="margin-left: 12px;display: inline-block; ">T.E.M: <i style="display:inline-block; vertical-align: bottom;border: 1px solid #9b9b9b; padding: .1cm .5cm;width:3cm;">{{ $loan->tem }}%</i></p>
    </div>

    <div style="margin-top: 20px;">
        <p>2. Objeto</p>
        <p style="margin-top: -10px;">
            2.1. El Acreedor otorga al Deudor, 	<b><i>{{ $loan->Client->fullname }}</i></b>,la suma de <b>{{ $loan->formatted_amount }} ({{ NumerosEnLetras::convertir($loan->amount,'pesos',false,'centavos') }})</b>, que el Deudor acepta y declara recibir los fondos de plena conformidad, mediante {{ $loan->AccreditationType->type }}
            <br>
            2.2. El Deudor declara asimismo, que la totalidad de los fondos provenientes de este préstamo, los destinará a
        </p>
        <p>________________________________________________________________________________________________</p>
        <p>
            3. Cancelación del préstamo. El préstamo será cancelado bajo las siguientes condiciones: <br>
            3.1. <b>{{ $loan->dues }}</b> cuotas mensuales, iguales y consecutivas, de: <b>${{ $loan->Payments->first()->formated_amount_payable }} ({{ NumerosEnLetras::convertir($loan->Payments->first()->amount_payable,'pesos',false,'centavos') }}) </b>
            <br>
            El vencimiento de la primera cuota se producirá el 	y las restantes el mismo día de cada mes subsiguiente.
            <br>
            Las cuotas son calculadas conforme al denominado sistema de amortización francés, las que tienen incluido una tasa de interés del <b>{{ $loan->tem }}%</b> efectiva mensual, debiéndosele adicionar a los intereses, el Impuesto al Valor Agregado (IVA) que corresponda, los que se deberán abonar conjuntamente con cada cuota. A la cuota se le adicionarán los gastos administrativos aplicables conforme se establecen en el artículo sexto del presente.
            <br>
            4. Libramiento de Pagaré. Las partes convienen en documentar la deuda de <b>{{ $loan->formatted_amount }} ({{ NumerosEnLetras::convertir($loan->amount,'pesos',false,'centavos') }})</b>, en un pagaré a la vista bajos las condiciones de su libramiento, confiriendo a su vez la via ejecutiva al presente, por lo que el Acreedor podrá a su sola opción, iniciar la ejecución con cualesquiera de los documentos que prefiera en caso de incumplimiento de algunas de las obligaciones asumidas por el Deudor.
            <br>
            5. Mora
            <br>
            5.1, Con prescindencia de cualquier medio de pago establecido en el presente instrumento y restantes documentos alternativos aplicables, el Deudor manifiesta que hasta tanto no ingresen efectivamente los fondos debidamente conciliados al dominio de Acreedor, para ser aplicados a la cancelación de las obligaciones correspondientes, sin importar la situación respecto del canal de cobranzas aplicables al caso, la deuda se considerará impaga y pendiente de cancelación.
            <br>
            5.2. Bajo este supuesto, el Deudor solo se libera de su obligación personal de pago, en la medida de la cancelación efectiva de los montos adeudados a favor del Acreedor, por lo que en caso de no percepción de los montos comprometidos en tiempo y forma, el Deudor deberá cancelarlos en forma directa en el domicilio en la cláusula novena.
            <br>
            5.3. La mora en el pago de las cuotas de amortización de capital o de los servicios de interés, como así también de cualquier obligación adicional convenida, sé producirá de pleno derecho y por el sólo vencimiento de los plazos, sin necesidad de aviso previo alguno, judicial o extrajudicial. Producida la mora, la deuda se tendrá como de plazo vencido y el Acreedor, podrá exigir el pago íntegro de todo lo adeudado, va sea en concepto de capital, intereses, gastos y demás accesorios y anexos.
            <br>
            5.4. Producida la mora, y por todo el tiempo que dure la misma, el Deudor deberá abonar un snrerés punitorio, cuya tasa será del 50% de los intereses compensatorios pactados, los que se adicionarán a estos últimos.


        </p>
    </div>


    <div style="margin-top: 1cm;">
        <p style="display: block; float: left;"><b>Firma del solicitante</b></p>
        <p style="display: block; float: right; margin-top: 0;"><b>Verificado</b></p>
    </div>


    <div class="page-break"></div>


    <div style="margin-top: -20px;">
        <p>6. Gastos</p>
        <p style="margin-top: -10px;">
            Todos los gastos que se deba incurrir para el pago del préstamo ya fuere por capital o intereses, serán a cargo del Deudor, siendo también a su exclusivo cargo, todo impuesto que grave al préstamo, sus intereses y demás gastos, ya sea en el presente como en el futuro. Asimismo, habiendo conferido autorización expresa para la contratación de un seguro de vida a mi nombre, respecto del cual EL ACREEDOR resulte su beneficiario, solicito que los gastos que el mismo genere sean descontados del presente préstamo a mí cargo.
            7. Mecanismo de pago de las obligaciones del Deudor.
            <br>
            7.1. Las partes convienen que el pago de la totalidad de las obligaciones establecidas en el presente, serán canceladas mediante el denominado sistema de débito (en cuentas bancarias caja de ahorro y/o corriente / tarjetas de crédito / sueldo / haberes / etc.), previa autorización y aceptación del mismo por el deudor.
            <br>
            7.2. Este mecanismo de pago se considera de carácter esencial para el otorgamiento del préstamo presente.
            <br>
            7.3. Por consiguiente, las cuotas para el repago del capital prestado y los intereses convenidos, conjuntamente con sus accesorios, serán retenidas en forma mensual a través del sistema de débito conforme se indicara en la cláusula 7.1.

            <br>

            7.4. En función de lo aquí dispuesto, el Deudor presta desde ya conformidad para que se retenga de sus haberes mensuales, sin límites de aplicación, los montos dispuestos para la cancelación de las obligaciones del presente y autorizo en forma irrevocable.
            <br>
            8. Mecanismo alternativo de cobranzas. En concordancia con lo establecido en los apartados 7.1 y 7.2, de la cláusula Séptima del presente, solo para el caso que por el Acreedor no reciba por cualquier motivo los montos correspondientes al repago del préstamo otorgado, por medio del indicado sistema de débitos, él Deudor deberá cancelar en forma personal dichas obligaciones en el domicilio de pago indicado en la cláusula nueve.
            <br>
            9. Domicilio de pago. Todos los pagos que deba efectuar el Deudor, los realizarán en el domicilio del Acreedor sito en <b>{{ Auth::user()->Company->address }}</b>, en horario y día hábil o en su defecto, donde éste lo indique en el futuro.
            <br>
            10. Otras causales de incumplimiento. El Acreedor tendrá la facultad de considerar la deuda como de plazo vencido y exigir el pago íntegro de todo lo adeudado, ya sea en concepto de capital, intereses, impuestos y gastos, en los siguientes casos:
            <br>
            (a)	Si el Deudor incurrieran en Incumplimiento de cualquiera de sus obligaciones para con el Acreedor.
            <br>
            (b)	La presentación del Deudor en Concurso Preventivo, así como también su eventual estado de cesación de pagos.
            <br>
            (c)	La petición del Deudor de su propia quiebra, o la petición de quiebra por parte de terceros, no levantada en un lapso de treinta días (30), desde la notificación de dicha medida.
            <br>
            (d) La petición del Deudor de suspensión del sistema de débito.
            <br>
            (e) El cierre por parte del Banco Central de la República Argentina, de cuentas bancarias del Deudor, por cualquiera de las causales previstas en las normas respectivas y en sus reglamentaciones.
            <br>
            En estos casos los plazos caducarán en forma automática, y serán exigibles todas las obligaciones emergentes del presente contrato.
            <br>
            11. Cesión de derechos y créditos.
            <br>
            11.1. El Acreedor queda desde ahora expresamente autorizado a ceder total o parcialmente el préstamo otorgado en propiedad, propiedad fiduciaria o en garantía a terceros, sin restricciones de ningún tipo, ni autorización en particular.
            <br>
            11.2. Las partes expresamente acuerdan que todos los derechos a favor del Acreedor, conforme a este contrato, podrán ser cedidos sin necesidad de notificar al deudor cedido en los términos del artículo 72 inc. (a) de la ley 24.441, cuando tal cesión tuviera por objeto (I) garantizar la emisión de títulos valores mediante oferta pública; (II) constituir el activo de una sociedad (fideicomiso) con el objeto de que emita títulos valores ofertables públicamente y cuyos servicios de amortización e intereses estén garantizados con dicho activo; y/o (III) constituir el patrimonio de un fondo común de créditos.
            <br>
            11.3. El Acreedor podrá ceder los derechos y créditos dispuestos en el presente, sin necesidad de notificar al deudor cedido, sin restricciones de ningún tipo, ni autorización en particular.
            <br>
            12. Autorización.
            <br>
            12.1. Autorizo al Acreedor a los fines de verificación de la información que he brindado y como base de análisis de riesgo crediticio, de conformidad con la ley 25.326, art. 5, presto mi consentimiento, libre, expreso e informado, para que solicite información tanto para mi persona como sobre codeudores y referidos terceros, con carácter previo al otorgamiento del crédito solicitado y aún durante la vigencia del crédito, sean estos personas físicas o jurídicas, de carácter público o privado.
            <br>
            12.2. Asimismo presto irrevocable conformidad para que el Acreedor informe a las agencias de Información crediticia datos relacionados con la operación del crédito a ser solicitado conforme con la ley 25.326 art. 26.
            <br>
            12. Precancelacion. En caso de que el Deudor produzca la cancelación total del préstamo otorgado en esta oportunidad con antelación a los plazos originalmente convenidos en la presente, a los efectos de perfeccionar dicho pago anticipado, deberá el Deudor abonar el monto correspondiente al capital pactado, la totalidad de los intereses devengados al momento del perfeccionamiento definitivo de la cancelación del préstamo, con más un importe en concepto de recargo, equivalente al 15% del capital original del préstamo.
            <br>
            13. Domicilios. Jurisdicción y Competencia.
            <br>
            13.1. Para todos los efectos Judiciales y/o extrajudiciales derivados del presente préstamo, las partes constituyen domicilios especiales en los lugares indicados al inicio de este contrato, donde serán válidas todas las notificaciones que se efectúen.
            <br>
            13.2. De común acuerdo las partes deciden someterse para la resolución de las controversias suscitadas a raíz del presente, bajo la decisión de los Tribunales Ordinarios en lo Comercial con asiento en la Ciudad de Buenos Aires, República Argentina, renunciando expresamente a cualquier otro fuero jurisdicción o competencia que originariamente pudiera corresponderles,
        </p>
    </div>

    <div>
        <p style="font-size: 9pt">
            El titular de los datos personales tiene la facultad de ejercer el derecho de acceso a los mismos en forma gratuita e intervalos no inferiores a seis meses, salvo que se acredite un interés legítimo al efecto conforme lo establecido en el artículo 14. inciso 3 de la Ley N° 25.326. La DIRECCION NACIONAL DE PROTECCION DE DATOS PERSONALES, Órgano de Control de la Ley N° 25.326, tiene la atribución de atender las denuncias y reclamos que se interpongan con relación al incumplimiento de las normas sobre protección de datos personales.
        </p>
    </div>

    <div style="margin-top: 1.5cm;">
        <p style="display: block; float: left;"><b>Verificado</b></p>
        <p style="display: block; float: right; margin-top: -30px;">
            <b>Firma del solicitante</b> ___________________________
            <br>
            <br>
            <b>Aclaración</b> {{ $loan->Client->fullName }}
            <br>
            <b>{{ $loan->Client->DniType->type }} </b> {{ $loan->Client->formatted_dni }}
        </p>
    </div>

</body>
</html>