<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{

    // Todo: Agregar columna de user_id para saber qué usuario dio el prestamo.
    protected $fillable = [
        'amount', 'dues', 'cft', 'tna', 'tem', 'accreditation_type_id', 'financing_id', 'client_id',"status"
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

    public function getDateAttribute(){
        return date('d-m-Y',strtotime($this->attributes['created_at']));
    }

    public function getFormattedAmountAttribute(){
        return '$'. number_format($this->attributes["amount"],2);
    }

}
