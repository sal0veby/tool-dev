<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class UserModel extends Model
{
    use NodeTrait;

    protected $table = 'users';

    protected $fillable = [
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
        'updated_by'
    ];

    public function user_permission()
    {
        return $this->hasMany(UserPermission::class,'user_id');
    }

}
