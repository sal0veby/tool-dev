<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotWork extends Model
{
    protected $fillable = [
        'order_id',
        'work_description',
        'tool',
        'audit',
        'safety',
        'owner_name',
        'department',
        'owner_name_end',
        'contractor_name',
        'engineer_id',
        'engineer_name_end',
        'noc_name_start',
        'noc_name_end',
        'noc_name_end',
        'created_by',
        'updated_by',
        'tool_name',
        'audit',
        'safety',
    ];

    protected $casts = [
        'audit' => 'json',
        'safety' => 'json',
        'tool' => 'json',
    ];
}

