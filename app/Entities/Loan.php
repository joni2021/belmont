<?php

namespace App\Entities;

use App\User;
use function floatval;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use function intval;
use function is_null;
use function number_format;

class Loan extends Model
{


    protected $fillable = [
        'amount', 'dues', 'cft', 'tna', 'tem', 'accreditation_type_id', 'financing_id', 'client_id',"status","code", "user_id","instruction1_amount","instruction1_payment","instruction1_order","instruction2_amount","instruction2_payment","instruction2_order","instruction3_amount","instruction3_payment","instruction3_order","instruction4_amount","instruction4_payment","instruction4_order","cancellation1_amount","cancellation1_payment","cancellation1_order","cancellation2_amount","cancellation2_payment","cancellation2_order"
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

    public function Instruction1Payment(){
        return $this->belongsTo(Payments::class,'instruction1_payment');
    }
    public function Instruction2Payment(){
        return $this->belongsTo(Payments::class,'instruction2_payment');
    }
    public function Instruction3Payment(){
        return $this->belongsTo(Payments::class,'instruction3_payment');
    }
    public function Instruction4Payment(){
        return $this->belongsTo(Payments::class,'instruction4_payment');
    }
    public function Cancellation1Payment(){
        return $this->belongsTo(Payments::class,'cancellation1_payment');
    }
    public function Cancellation2Payment(){
        return $this->belongsTo(Payments::class,'cancellation2_payment');
    }


    public function getDateAttribute(){
        return date('d-m-Y',strtotime($this->attributes['created_at']));
    }

    public function getFormattedAmountAttribute(){
        return '$'. number_format($this->attributes["amount"],2,',','.');
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

        $totalAmount = "$" . number_format(floatval($this->Payments->first()->float_amount_payable) * intval($this->attributes['dues']),2,',','.');

        return $totalAmount;
    }

    public function getTotalAmountOriginalAttribute(){

        $totalAmount = floatval($this->Payments->first()->float_amount_payable) * intval($this->attributes['dues']);

        return $totalAmount;
    }


    public function getAccreditationDateAttribute(){
        $fecha = Carbon::create($this->attributes['created_at'],'America/Argentina/Buenos_Aires')->locale('es');

        return $fecha->isoFormat('LLLL \h\s');
    }

    public function getArchive($value){

        return $this->Archives->where('archive_type_id',$value)->count() > 0 ? $this->Archives->where('archive_type_id',$value)->first()->route : 'img/imagen-no-disponible.jpg';
    }


    public function getInstruction1AmountAttribute(){
        return $this->attributes['instruction1_amount'] ?? '0';
    }

    public function getInstruction2AmountAttribute(){
        return $this->attributes['instruction2_amount'] ?? '0';
    }

    public function getInstruction3AmountAttribute(){
        return $this->attributes['instruction3_amount'] ?? '0';
    }

    public function getInstruction4AmountAttribute(){
        return $this->attributes['instruction4_amount'] ?? '0';
    }

    public function getCancellation1AmountAttribute(){
        return $this->attributes['cancellation1_amount'] ?? '0';
    }

    public function getCancellation2AmountAttribute(){
        return $this->attributes['cancellation2_amount'] ?? '0';
    }

    public function getNetSettledAttribute(){
        return floatval($this->attributes['amount']) - floatval($this->attributes['instruction1_amount']) - floatval($this->attributes['instruction2_amount']) - floatval($this->attributes['instruction3_amount']) - floatval($this->attributes['instruction4_amount']) - floatval($this->attributes['cancellation1_amount']) - floatval($this->attributes['cancellation2_amount']);
    }

    public function itsPaid(){
        if($this->Payments()->count() == 0)
            return false;

        return $this->Payments()->where('due','=',1)->first()->state ;
    }
}
