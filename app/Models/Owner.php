<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{

    protected $table = 'owners';

    protected $fillable = [
        'order_id',
        'name',
        'company_name' ,
        'tel'
    ];
}
