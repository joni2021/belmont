<?php

namespace App\Http\Repositories;

use App\Entities\Client;
use App\Http\Repositories\BaseRepo;

class ClientsRepo extends BaseRepo
{
    public function getModel()
    {
        return new Client();
    }


    public function getClientList(){
        $clients = $this->getModel()->all();

        $list = [];

        foreach ($clients as $client):
            $list[$client->id] = $client->last_name . ' ' . $client->name . ' - ' . $client->dniType->type . ': ' . $client->dni;
        endforeach;

        return $list;
    }
}