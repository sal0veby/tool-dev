<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StepFlow extends Model
{
    protected $table = 'step_flows';

    protected $fillable = [
        'process_next_id',
        'state_next_id',
        'process_before_id',
        'state_before_id'
    ];
}
