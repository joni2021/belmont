<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Loans extends Model
{


    protected $fillable = [
        'amount', 'dues', 'cft', 'tna', 'tem', 'accreditation_type_id', 'financing_id', 'client_id',"status", "user_id"
    ];

    public function Client(){
        return $this->belongsTo(Client::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Financing(){
        return $this->belongsTo(Financing::class);
    }

    public function AccreditationType(){
        return $this->belongsTo(AccreditationType::class);
    }

    public function Payments(){
        return $this->hasMany(Payments::class);
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

    public function getAccreditationDateAttribute(){
        $fecha = Carbon::create($this->attributes['created_at'],'America/Argentina/Buenos_Aires')->locale('es');

        return $fecha->isoFormat('LLLL \h\s');
    }


    public function itsPaid(){
        if($this->Payments()->count() == 0)
            return false;

        return $this->Payments()->where('due','=',1)->get('state');
    }
}
