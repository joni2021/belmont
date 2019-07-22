<div class="dt-responsive">
    <table class="table table-bordered nowrap tablaCuotas @if(empty($model)) d-none @endif w-100">
        <thead>
        <tr>
            <th>Cuota</th>
            <th>Tasa</th>
            <th>Interés pagado($)</th>
            <th>Amortización($)</th>
            <th>Saldo a pagar($)</th>
            <th>Valor cuota($)</th>
        </tr>
        </thead>
        <tbody class="datosCuota">

        </tbody>
        <tfooter>
            <tr>
                <td colspan="5" class="text-right"><b>Total:</b></td>
                <td colspan="1" class="text-left" id="precioTotal"></td>
            </tr>
        </tfooter>

    </table>
</div>