<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    protected $fillable = [
        'id',
        'name',
        'active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
