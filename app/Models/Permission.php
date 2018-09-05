<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Kalnoy\Nestedset\NodeTrait;

class Permission extends Model
{
    use NodeTrait;

    protected $table = 'permissions';

    protected $fillable = [
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
        'created_by'
    ];

    public function children()
    {
        return $this->hasMany(Permission::class, 'parent_id');
    }

    public function setCreatedByAttribute($value)
    {
        if (Session::has('id')) {
            $this->attributes['created_by'] = base64_decode(Session::get('id'));
        } else {
            $this->attributes['created_by'] = 1;
        }
    }
}
