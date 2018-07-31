<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    protected $table = 'work_types';

    protected $fillable = [
        'id',
        'class_id',
        'location_id',
        'name',
        'active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];
}
