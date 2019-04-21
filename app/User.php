<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_pic', 'roll_no', 'is_admin','fine'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'email_verified_at'
    ];

    /**
     * The attributes that are visible for arrays.
     * @var array
     */
    protected $visible = [
        'name', 'email', 'password','profile_pic', 'roll_no', 'is_admin', 'id','fine'
    ];

    /**
     * Some small changes
     */

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function information() {
        return $this->hasOne('App\UserInformation');
    }
}
