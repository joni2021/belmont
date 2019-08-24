<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Financing extends Model
{
    protected $fillable = [
        'due','porcent'
    ];

    protected $table = "financing";
}
