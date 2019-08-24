<?php

namespace App\Http\Repositories;


use App\Entities\ArchiveType;
use App\Http\Repositories\BaseRepo;
use Illuminate\Support\Facades\Auth;

class ArchiveTypesRepo extends BaseRepo
{
    public function getModel()
    {
        return new ArchiveType();
    }

}