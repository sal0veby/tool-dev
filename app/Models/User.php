<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class User extends Model
{
    use NodeTrait;

    protected $fillable = [
        'id',
        'username',
        'password',
        'description',
        'email',
        'first_name',
        'last_name',
        'permission_id',
        'active',
        'default',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

}
