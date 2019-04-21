<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'order_status', 'amount',
    ];
    protected $visible = [
        'user_id', 'order_status', 'amount', 'id', 'created_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function items() {
        return $this->hasMany('App\OrderItem');
    }
}
