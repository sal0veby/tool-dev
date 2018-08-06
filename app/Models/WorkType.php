<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    protected $table = 'work_types';

    protected $fillable = [
        'class_id',
        'location_id',
        'name',
        'active',
        'created_by',
        'updated_by'
    ];

    public function class_name()
    {
        return $this->hasOne(ClassModel::class, 'id' , 'class_id');
    }

    public function location()
    {
        return $this->hasOne(Location::class, 'id' , 'location_id');
    }
}
