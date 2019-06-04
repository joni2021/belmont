<?php

namespace App\Http\Repositories;

use App\Entities\Client;
use App\Entities\Loans;
use App\Http\Repositories\BaseRepo;

class LoansRepo extends BaseRepo
{
    public function getModel()
    {
        return new Loans();
    }

    public function getAllByStatus($status){
        return $this->getModel()->where('status',$status)->get();
    }

}