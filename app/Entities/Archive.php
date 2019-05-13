<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'route'
    ];

    public function Loans(){
        return $this->belongsToMany(Loans::class);
    }
}
