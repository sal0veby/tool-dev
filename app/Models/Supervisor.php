<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $table = 'supervisors';

    protected $fillable = [
        'order_id',
        'name',
        'company_name',
        'tel'
    ];
}
