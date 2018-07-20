<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Kalnoy\Nestedset\NodeTrait;

class Menu extends Model
{
    use NodeTrait;

protected $fillable = [
    'id',
    'name',
    'description',
    'active',
    'default'
];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }


}
