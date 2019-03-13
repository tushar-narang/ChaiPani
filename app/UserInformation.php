<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_pic', 'roll_number', 'name', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
