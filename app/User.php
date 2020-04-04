<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const VARIFIED_USER = '1';
    const UNVARIFIED_USER = '0';

    const ADMIN_USER = 'true';
    const REGULAR_USER = 'false';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email', 
        'password',
        'varified',
        'varification_token',
        'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'varification_token'
    ];

    public function isVarified(){
        return $this->varified = User::VARIFIED_USER;
    }

    public function isAdmin(){
        return $this->admin = User::ADMIN_USER;
    }

    public static function generateVarificationCode(){
        return str_random(40);
    }
}
