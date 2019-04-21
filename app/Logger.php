<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{

    protected $table = 'logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'ip_address', 'action',
    ];

    /**
     * @var array
     */

    /*
     * Some small changes
     */
    protected $visible = [
        'email', 'ip_address', 'action', 'created_at'
    ];

}
