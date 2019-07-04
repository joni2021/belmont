<div class="dt-responsive">
    <table class="table table-bordered nowrap tablaCuotas @if(empty($model)) d-none @endif w-100">
        <thead>
        <tr>
            <th>Cuota</th>
            <th>Tasa</th>
            <th>Interés pagado($)</th>
            <th>Amortización($)</th>
            <th>Saldo a pagar($)</th>
        </tr>
        </thead>
        <tbody class="datosCuota">
        @if(!empty($model))
            @php
                $interesPagado = 0.0000;
                $amortizacionPagado = 0.0000;
                $valorDeudaASaldar = floatval($model->amount);

            @endphp

            @for($i = 0; $i < $model->dues; $i++)
                @php
                    $fin = $financing->get(1);

                    if($i < 2)
                        $tasa = floatval($financing->get(1)->porcent);
                    else
                        $tasa = floatval(($fin->porcent));

                    $valCuota = floatval($model->amount) * floatval(floatval(($fin->porcent) / 100) / (1 - pow(1 + floatval(floatval($fin->porcent) / 100),((-1) * floatval($fin->due)))));

                    $ind = $i+1;
                    $interesPagado = floatval($valorDeudaASaldar) * floatval(($fin->porcent) / 100);
                    $amortizacionPagado = floatval($valCuota) - floatval($interesPagado);
                    $valorDeudaASaldar = floatval($valorDeudaASaldar) - floatval($amortizacionPagado);

                @endphp

                <tr>
                    <td>{{ $ind }}</td>
                    <td>{{ $tasa }}%</td>
                    <td>${{ number_format($interesPagado,2) }}</td>
                    <td>${{ number_format($amortizacionPagado,2) }}</td>
                    <td>${{ number_format($valorDeudaASaldar,2) }}</td>
                </tr>
                {{--@break($financing->get($i)->due == $model->dues)--}}
            @endfor
        @endif
        </tbody>

    </table>
</div>