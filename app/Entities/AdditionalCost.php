<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class AdditionalCost extends Model
{
    protected $casts = ['porcent' => 'boolean'];

    protected $table =  "additional_costs";

    protected $fillable = ['amount', 'porcent', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    protected function getRealAmountAttribute(){
        return $this->attributes['porcent'] === true ? ($this->attributes['amount'] / 100) : $this->attributes['amount'];
    }
}
