<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposals extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_order_id','lawyer_id','value','acceptance'
    ];
}

