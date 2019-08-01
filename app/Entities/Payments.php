<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use function strtotime;

class Payments extends Model
{

    protected $fillable = [
        "due",'payment_date','amount_payable','amount_paid','state','loans_id'
    ];

    public function Loan(){
        return $this->belongsTo(Loan::class,'loans_id');
    }

    public function getFormattedStateAttribute(){
        return $this->attributes['state'] ? 'Pagado' : 'Sin pagar';
    }

    public function getPaymentDateAttribute(){
        return date('d-m-Y',strtotime($this->attributes['payment_date']));
    }

    public function getAmountPayableAttribute(){
        return '$'. number_format($this->attributes["amount_payable"],2);
    }

    public function getAmountPayableOriginalAttribute(){
        return number_format($this->attributes["amount_payable"],2);
    }

    public function getAmountPaidAttribute(){
        return '$'. number_format($this->attributes["amount_paid"],2);
    }

    public function getAmountPaidOriginalAttribute(){
        return number_format($this->attributes["amount_paid"],2);
    }

}
