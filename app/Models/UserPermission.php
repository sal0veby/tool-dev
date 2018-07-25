<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $fillable = [
        'user_id',
        'menu_id',
        'use',
        'add',
        'update',
        'delete',
        'excel',
        'pdf',
        'active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

}
