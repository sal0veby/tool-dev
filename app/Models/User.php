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
        'description',
        'email',
        'first_name',
        'last_name',
        'user_permission',
        'active',
        'default'
    ];

}
