<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'id',
        'class_id',
        'name',
        'active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
