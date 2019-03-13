<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'quantity', 'order_id',
    ];

    public function order(){
        return $this->belongsTo('App\Order');
    }

    public function item() {
        return $this->belongsTo('App\Item');
    }
}
