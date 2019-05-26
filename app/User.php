<?php

namespace App;

use App\Entities\Client;
use App\Entities\DniType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'dni', 'user', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function Clients(){
        return $this->belongsToMany(Client::class);
    }

    public function DniType(){
        return $this->belongsTo(DniType::class);
    }

    public function getFullNameAttribute(){
        return $this->attributes['user'] ? $this->attributes['user'] : $this->attributes['name'] . ' ' . $this->attributes['last_name'];
    }

    public function getTotalLoans(){
        $total = 0;

        if($this->clients()->count() > 0):
            foreach ($this->clients as $client) {
                $total += $client->totalLoans;
            }
        endif;

        return $total;
    }

    public function TotalLoansByClient($client){

    }
}
