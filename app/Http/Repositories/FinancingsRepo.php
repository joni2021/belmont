<?php

namespace App\Http\Repositories;


use App\Entities\Financing;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class FinancingsRepo extends BaseRepo
{
    public function getModel()
    {
        return new Financing();
    }

}