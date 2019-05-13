<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    protected $fillable = [
        'amount', 'dues', 'cft', 'tna', 'tem', 'accreditation_type_id', 'financing_id', 'client_id',
    ];

    public function Client(){
        return $this->belongsTo(Client::class);
    }

    public function Financing(){
        return $this->belongsTo(Financing::class);
    }

    public function AccreditationType(){
        return $this->belongsTo(AccreditationType::class);
    }
}
