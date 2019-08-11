<?php

namespace App\Entities;

use App\User;
use function explode;
use Illuminate\Database\Eloquent\Model;
use function number_format;
use function strlen;

class Client extends Model
{
    protected $fillable = [
        'name','last_name','dni_type_id','dni','cuil','address','city','province','phone','cp','ca','cel','cbu','job_name','job_address','job_city','job_province','job_phone'
    ];

    public function Users(){
        return $this->belongsToMany(User::class);
    }

    public function DniType(){
        return $this->belongsTo(DniType::class);
    }

    public function Loans(){
        return $this->hasMany(Loan::class);
    }

    public function getFullNameAttribute(){
        return $this->attributes['name'] . " " . $this->attributes['last_name'];
    }

    public function getTotalLoansAttribute(){
        return $this->loans()->count();
    }

    public function getProvinceNameAttribute(){
        return config('utilities.provinces')[$this->attributes['province']];
    }

    public function getJobProvinceNameAttribute(){
        return config('utilities.provinces')[$this->attributes['job_province']];
    }

    public function getFormattedDniAttribute(){
        return number_format($this->attributes['dni'],0,'.','.');
    }

    public function getFormattedCuilAttribute(){
        $cantidad = strlen($this->attributes['cuil']);

        $arr = str_split($this->attributes['cuil']);

        if($cantidad === 11){
            $numero = $arr[0].$arr[1]."-".$arr[2].$arr[3].$arr[4].$arr[5].$arr[6].$arr[7].$arr[8].$arr[9].'-'.$arr[10];
        }else{
            $numero = $arr[0].$arr[1]."-".$arr[2].$arr[3].$arr[4].$arr[5].$arr[6].$arr[7].$arr[8].'-'.$arr[9];
        }

        return $numero;
    }
}


