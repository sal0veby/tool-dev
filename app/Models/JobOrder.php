<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOrder extends Model
{
    protected $table = 'job_orders';

    protected $primaryKey = 'id';

    protected $fillable = [
        'document_no',
        'reference_no',
        'coming_work_date',
        'class_id',
        'start_work_time',
        'end_work_time',
        'requirement',
        'work_type_id',
        'description_work_type',
        'location_id',
        'description_location',
        'process_id',
        'state_id'
    ];
}
