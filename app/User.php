<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function Store(){
        return $this->hasMany(Store::class);
    }
    public function CartItem(){
        return $this->hasMany(CartItem::class);
    }

    public function purchase(){
        return $this->hasMany(Purchase::class);
    }
}
