<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taskmaster extends Model
{
    protected $table = 'taskmasters';

    protected $fillable = [
        'order_id',
        'name',
        'company_name',
        'tel'
    ];
}
