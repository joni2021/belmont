<?php

namespace App\Http\Controllers;

use App\Entities\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

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
}
