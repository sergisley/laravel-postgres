<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service_orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id','title','description','status'
    ];
}

