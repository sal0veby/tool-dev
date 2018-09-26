<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOrderDetail extends Model
{
    protected $table = 'job_order_details';

    protected $fillable = [
        'order_id',
        'step_2_1',
        'step_2_1_user',
        'step_2_1_description',
        'step_2_2_user',
        'step_2_2_tel',
        'step_2_3_user',
        'step_3_1_user',
        'step_3_2_start_work_time',
        'step_3_2_count_people',
        'step_3_2_user',
        'step_5_1_user',
        'step_5_2_end_work_time',
        'step_5_2_count_people',
        'step_5_2_user',
    ];
}
