$(document).ready(function () {
    calcular();

    var cuota, tasa, monto, porcentajeCuota;

    $("#dues,#amount").on("change keyup ", calcular);




    function calcular (ev) {
        var dues = $("#dues");
        cuota = parseFloat($(dues).find("option:selected").data("due"));
        // tasa = parseFloat(ev.currentTarget.selectedOptions[0].dataset.porcent);
        tasa = parseFloat($("#dues>option:selected").data("porcent"));
        monto = parseFloat($('#amount').val());

        if (monto == 'undefined' || parseFloat(monto) < 1 || isNaN(monto)) {
            return false;
        }


        porcentajeCuota = (tasa / 100)/12;
        porcentajeCuota = parseFloat(porcentajeCuota);

        var valCuota = monto * (porcentajeCuota / (1 - Math.pow(1 + porcentajeCuota,((-1) * cuota))))
        // var valCuota = monto * (( porcentajeCuota * (Math.pow( 1 + porcentajeCuota, cuota ))) / (( (Math.pow( 1 + porcentajeCuota, cuota )) - 1 )));

        $("#tasa").val(tasa);
        $("#dues_amount").val(parseFloat(valCuota).toFixed(2));

        var tasaPrimerCuota = parseFloat($("#dues option")[0].dataset.porcent)

        // var tabla = "<tr><td>1</td><td>" + tasaPrimerCuota + "%</td><td>$" + calcular_cuota(2).toLocaleString() + "</td>";
        var tabla;

        // var pagoTotal = 0;
        // var pagoTotal = parseFloat(calcular_cuota(cuota));

        var interesPagado = 0.0000;
        var amortizacionPagado = 0.0000;
        var valorDeudaASaldar = monto;


        for(var i = 0; i < cuota; i++ ){
            if(i < 2){
                var tasa = $("#dues option[value=" + 2 + "]").data("porcent");
            }else{
                var tasa = $("#dues option[value=" + i + "]").data("porcent");
            }

            interesPagado = valorDeudaASaldar * porcentajeCuota;
            amortizacionPagado = valCuota - interesPagado;
            valorDeudaASaldar = valorDeudaASaldar - amortizacionPagado;

            var ind = i+1;
            tabla += "<tr><td>" + ind + "</td>";
            tabla += "<td>" + parseFloat(tasa) + "%</td>";
            tabla += "<td>$" + parseFloat(interesPagado.toFixed(2)) + "</td>";
            tabla += "<td>$" + parseFloat(amortizacionPagado.toFixed(2)) + "</td>";
            tabla += "<td>$" + parseFloat(valorDeudaASaldar.toFixed(2)) + "</td></tr>";

            // pagoTotal += parseFloat(calcular_cuota(ind)).toFixed(2) //+ parseFloat(pagoTotal) ;

        }

        // tabla += "<tr>";


        $(".datosCuota").empty();
        $(".datosCuota").append(tabla);
        // $("#precioTotal").text("$ " + pagoTotal)


        $(".tablaCuotas").removeClass("d-none");

    }



    function calcular_cuota(cuota){

        var valor =  monto * (porcentajeCuota / (1 - Math.pow(1 + porcentajeCuota,((-1) * cuota))))

        // var valor =  monto * (( porcentajeCuota * (Math.pow( 1 + porcentajeCuota, cuota ))) / (( (Math.pow( 1 + porcentajeCuota, cuota )) - 1 )))

        return parseFloat(valor);
    }

})