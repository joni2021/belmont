$(document).ready(function () {
    $("#dues").select2({
        placeholder: "Seleccione cuotas"
    });

    var cuota, tasa, monto, porcentajeCuota;

    $("#dues").on("change", function (ev) {

        cuota = parseFloat($(this).val());
        tasa = parseFloat(ev.currentTarget.selectedOptions[0].dataset.porcent);
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

        var tabla = "<tr><td>1</td><td>" + tasaPrimerCuota + "%</td><td>" + calcular_cuota(tasaPrimerCuota) + "</td>";

        var pagoTotal = parseFloat(monto) + parseFloat(calcular_cuota(tasaPrimerCuota));

         for(var i = 2; i <= cuota; i++ ){
             var tasa = $("#dues option[value=" + i + "]").data("porcent");
             var tasaCuota =

             tabla += "<tr><td>" + i + "</td>";
             tabla += "<td>" + parseFloat(tasa) + "%</td>";
             tabla += "<td>" + calcular_cuota(tasa) + "</td></tr>";

             pagoTotal = parseFloat(pagoTotal) + parseFloat(calcular_cuota(tasa));
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