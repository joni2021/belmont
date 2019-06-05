$(document).ready(function () {

    var cuota, tasa, monto, porcentajeCuota;

    $("#dues,#amount").on("change keyup", function (ev) {
        var dues = $("#dues");
        cuota = parseFloat($(dues).find("option:selected").data("due"));
        // tasa = parseFloat(ev.currentTarget.selectedOptions[0].dataset.porcent);
        tasa = parseFloat($("#dues>option:selected").data("porcent"));
        monto = parseFloat($('#amount').val());

        if (monto == 'undefined' || parseFloat(monto) < 1 || isNaN(monto)) {
            return false;
        }


        porcentajeCuota = (tasa / 100);
        porcentajeCuota = parseFloat(porcentajeCuota.toFixed(3));

        var valCuota = monto * (( porcentajeCuota * (Math.pow( 1 + porcentajeCuota, cuota ))) / (( (Math.pow( 1 + porcentajeCuota, cuota )) - 1 )));

        $("#tasa").val(tasa);
        $("#dues_amount").val(parseFloat(valCuota).toFixed(2));

        var tasaPrimerCuota = parseFloat($("#dues option")[0].dataset.porcent)

        var tabla = "<tr><td>1</td><td>" + tasaPrimerCuota + "%</td><td>" + calcular_cuota(2) + "</td>";

        var pagoTotal = parseFloat(monto) + parseFloat(calcular_cuota(cuota));

         for(var i = 2; i <= cuota; i++ ){
             var tasa = $("#dues option[value=" + i + "]").data("porcent");
             var tasaCuota =

             tabla += "<tr><td>" + i + "</td>";
             tabla += "<td>" + parseFloat(tasa) + "%</td>";
             tabla += "<td>" + calcular_cuota(i) + "</td></tr>";

             pagoTotal = parseFloat(pagoTotal) + parseFloat(calcular_cuota(2));
         }

        tabla += "<tr>";


        $(".datosCuota").empty();
        $(".datosCuota").append(tabla);
        $("#precioTotal").text("$ " + pagoTotal)


        $(".tablaCuotas").removeClass("d-none");
        
    })


    function calcular_cuota(cuota){

        var valor =  monto * (( porcentajeCuota * (Math.pow( 1 + porcentajeCuota, cuota ))) / (( (Math.pow( 1 + porcentajeCuota, cuota )) - 1 )))

        return parseFloat(valor).toFixed(2);
    }

})