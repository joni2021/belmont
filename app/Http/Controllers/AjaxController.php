<?php

namespace App\Http\Controllers;

use App\Entities\Client;
use App\Entities\Payments;
use function floatval;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use const null;
use function response;

class AjaxController extends Controller
{
    public function __construct(Route $route, Request $request)
    {
        $this->route = $route;
        $this->request = $request;
    }

    public function searchClient()
    {

        if(!$this->request->has('client'))
            return response()->json('No se encontró el usuario',404);

        $dato = $this->request->get('client');

        /*
        $clients = DB::table(DB::raw('clients, dni_types'))
                    ->select(DB::raw("CONCAT(CONCAT(CONCAT(last_name,' ',name),' - ', type), ': ', dni) as cliente"))
                    ->where(DB::raw("clients.dni_type_id = dni_types.id  AND CONCAT(CONCAT(last_name,' ',name),' ', dni)"),'LIKE', '%' . $dato . '%')
                    ->get();
        */

        $client = Client::with('DniType')->find($dato);

        if($client)
            $status = 200;
        else
            $status = 500;

        return response()->json($client,$status);
    }

    public function payDue(){

        $payment = Payments::find($this->request->params["id"]);

        $payment->amount_paid = floatval($this->request->params["amount_paid"]);
        $payment->state = 1;

        $payment->save();

        return response()->json('ok',200);
    }

    public function cancelPayDue(){

        $payment = Payments::find($this->request->params["id"]);

        $payment->amount_paid = null;
        $payment->state = 0;

        $payment->save();

        return response()->json('ok',200);
    }
}
