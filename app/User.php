<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "id_user";
    protected $fillable = [
        'nama', 'email', 'password', 'nomor_hp','activated','activation_code','reset_pass_code','slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    function ritem(){
        return $this->hasMany(Item::class);
    }
    function rtrans(){
        return $this->hasMany(Transaksi::class);
    }
}
