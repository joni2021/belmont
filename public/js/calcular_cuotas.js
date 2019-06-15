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

        // var tabla = "<tr><td>1</td><td>" + tasaPrimerCuota + "%</td><td>$" + calcular_cuota(2).toLocaleString() + "</td>";

        var pagoTotal = 0;
        // var pagoTotal = parseFloat(calcular_cuota(2));

         for(var i = 2; i <= cuota; i++ ){
             var tasa = $("#dues option[value=" + i + "]").data("porcent");
             console.log(i)
             console.log($("#dues option[value=" + i + "]"))

             tabla += "<tr><td>" + i + "</td>";
             tabla += "<td>" + parseFloat(tasa) + "%</td>";
             tabla += "<td>$" + calcular_cuota(i).toLocaleString() + "</td></tr>";

             pagoTotal += parseFloat(calcular_cuota(i)) //+ parseFloat(pagoTotal) ;
         }

        tabla += "<tr>";


        $(".datosCuota").empty();
        $(".datosCuota").append(tabla);
        $("#precioTotal").text("$ " + pagoTotal.toLocaleString())


        $(".tablaCuotas").removeClass("d-none");
        
    })


    function calcular_cuota(cuota){

        var valor =  monto * (( porcentajeCuota * (Math.pow( 1 + porcentajeCuota, cuota ))) / (( (Math.pow( 1 + porcentajeCuota, cuota )) - 1 )))

        return parseFloat(valor).toFixed(2);
    }

})