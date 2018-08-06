<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'class_id',
        'name',
        'active',
        'created_by',
        'updated_by'
    ];


    public function class_name()
    {
        return $this->hasOne(ClassModel::class, 'id' , 'class_id');
    }
}
