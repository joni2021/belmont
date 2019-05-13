<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Financing extends Model
{
    protected $fillable = [
        'name','due','porcent'
    ];

    protected $table = "financing";
}
