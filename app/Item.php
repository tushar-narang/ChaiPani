<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'item_pic', 'is_available', 'price', 'description', 'category_id', 'food_type',
    ];

    /**
     * @var array
     */
    protected $visible = [
        'name', 'item_pic', 'is_available', 'price', 'description', 'category_id', 'food_type',
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function orders(){
        return $this->hasMany('App\OrderItem');
    }

}
