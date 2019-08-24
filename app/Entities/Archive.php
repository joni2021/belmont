<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Archive extends Model
{
    protected $fillable = [
        'route', 'archive_type_id'
    ];

    public function Loans(){
        return $this->belongsToMany(Loan::class);
    }


}
