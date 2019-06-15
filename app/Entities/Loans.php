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


    public function monthlyAmount($porcent,$due){
        $porcent = floatval($porcent / 100);
        $p = 1 + floatval($porcent);
        $due = intval($due);
        $amount = floatval($this->attributes['amount']);
        $potencia = pow($p, $due);


        $monto = $amount * (( $porcent * (floatval($potencia))) / (( floatval( floatval($potencia))-1 )) );


        return $monto;
    }

    public function getTotalAmountAttribute(){
//        $totalAmount = floatval($this->monthlyAmount(Financing::first()->porcent,Financing::first()->due));
        $totalAmount = 0;

        foreach(Financing::all() as $financing):
            if($financing->due > $this->attributes['dues'])
                break;

            $totalAmount = floatval($totalAmount) + floatval($this->monthlyAmount($financing->porcent,$financing->due));

        endforeach;


        return $totalAmount;
    }
}
