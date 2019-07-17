<?php

namespace App\Http\Repositories;

use App\Entities\Client;
use App\Entities\Loans;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class LoansRepo extends BaseRepo
{
    public function getModel()
    {
        return new Loans();
    }

    public function getAll(){
        return $this->getModel()->with('Payments')->where('user_id','=',Auth::user()->id)->get();
    }

}