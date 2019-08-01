<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Loan extends Model
{


    protected $fillable = [
        'amount', 'dues', 'cft', 'tna', 'tem', 'accreditation_type_id', 'financing_id', 'client_id',"status", "user_id","instruction1_amount","instruction1_pay_date","instruction1_payment","instruction1_order","instruction2_amount","instruction2_pay_date","instruction2_payment","instruction2_order","instruction3_amount","instruction3_pay_date","instruction3_payment","instruction3_order","instruction4_amount","instruction4_pay_date","instruction4_payment","instruction4_order","cancellation1_amount","cancellation1_pay_date","cancellation1_payment","cancellation1_order","cancellation2_amount","cancellation2_pay_date","cancellation2_payment","cancellation2_order"
    ];

    public $casts = [
        'state' => 'boolean',
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
        return $this->hasMany(Payments::class,'loans_id');
    }

    public function Archives(){
        return $this->belongsToMany(Archive::class);
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

    public function getDniAttribute(){

        return $this->Archives->where('archive_type_id',1)->count() > 0 ? $this->Archives->where('archive_type_id',1)->first()->route : 'img/imagen-no-disponible.jpg';
    }

    public function getPaycheckAttribute(){

        return $this->Archives->where('archive_type_id',2)->count() > 0 ? $this->Archives->where('archive_type_id',2)->first()->route : 'img/imagen-no-disponible.jpg';
    }

    public function getContractAttribute(){

        return $this->Archives->where('archive_type_id',3)->count() > 0 ? $this->Archives->where('archive_type_id',3)->first()->route : 'img/imagen-no-disponible.jpg';
    }

    public function getPromissoryNoteAttribute(){

        return $this->Archives->where('archive_type_id',4)->count() > 0 ? $this->Archives->where('archive_type_id',4)->first()->route : 'img/imagen-no-disponible.jpg';
    }

    public function itsPaid(){
        if($this->Payments()->count() == 0)
            return false;

        return $this->Payments()->where('due','=',1)->first()->state ;
    }
}
