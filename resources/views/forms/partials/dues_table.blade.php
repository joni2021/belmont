<div class="dt-responsive">
    <table class="table table-bordered nowrap tablaCuotas @if(empty($model)) d-none @endif w-100">
        <thead>
        <tr>
            <th>Cuota</th>
            <th>Tasa</th>
            <th>Importe mensual($)</th>
        </tr>
        </thead>
        <tbody class="datosCuota">
            @if(!empty($model))
                {{--<tr>--}}
                    {{--<td>1</td>--}}
                    {{--<td>{{ $financing->first()->porcent }}%</td>--}}
                    {{--<td>${{ number_format($model->monthlyAmount($financing->first()->porcent,2),2) }}</td>--}}
                {{--</tr>--}}
                @foreach($financing as $f)
                    <tr>
                        <td>{{ $f->due }}</td>
                        <td>{{ $f->porcent }}%</td>
                        <td class="montoMensual">${{ number_format($model->monthlyAmount($f->porcent,$f->due),2) }}</td>
                    </tr>
                    @break($f->due == $model->dues)
                @endforeach
            @endif
        </tbody>
        <tfooter>
            <tr>
                <td colspan="2" class="text-right">Total</td>
                <td class="text-danger" id="precioTotal">$ @if(!empty($model)) {{ number_format($model->TotalAmount,2) }} @endif</td>
            </tr>
        </tfooter>
    </table>
</div>