<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Permission extends Model
{
    use NodeTrait;

    protected $table = 'permissions';

    protected $fillable = [
        'id',
        'name',
        'description',
        'active',
        'created_by',
        'menu_id',
        'add',
        'use',
        'update',
        'delete',
        'excel',
        'parent_id',
        'created_at',
        'updated_at'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function children()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }
}
