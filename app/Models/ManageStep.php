<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageStep extends Model
{

    protected $table = 'manage_steps';

    protected $fillable = ['permission_id', 'process_hot_work_id', 'license_hot_work', 'updated_by'];
}
