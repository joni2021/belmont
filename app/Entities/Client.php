<?php

namespace App\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name','last_name','dni_types_id','dni','address','city','province','phone','cp','cel','cbu','job_name','job_address','job_city','job_province','job_phone'
    ];

    public function Users(){
        return $this->belongsToMany(User::class);
    }

    public function DniType(){
        return $this->belongsTo(DniType::class);
    }
}


