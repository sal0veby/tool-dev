<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    protected $table = 'contractors';

    protected $fillable = [
        'order_id',
        'name',
        'company_name',
        'tel'
    ];
}
