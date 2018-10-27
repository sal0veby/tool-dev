<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Session;

class JobOrder extends Model
{
    use SoftDeletes;

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
        'state_id',
        'created_by',
        'updated_by',
        'owners',
        'supervisors',
        'contractors',
        'taskmasters',
        'participants',
        'car_registrations',
        'hot_work'
    ];

    protected $casts = [
        'owners' => 'json',
        'supervisors' => 'json',
        'contractors' => 'json',
        'taskmasters' => 'json',
        'participants' => 'json',
        'car_registrations' => 'json',
    ];

    public function setComingWorkDateAttribute($value)
    {
        $date = DateTime::createFromFormat('d/m/Y', $value);
        $this->attributes['coming_work_date'] = $date->format('Y-m-d');
    }

    public function setStart_work_timeAttribute($value)
    {
        $this->attributes['start_work_time'] = date("H:i:s", strtotime($value));
    }

    public function setEnd_work_timeAttribute($value)
    {
        $this->attributes['end_work_time'] = date("H:i:s", strtotime($value));
    }

    public function setCreatedByAttribute()
    {
        if (Session::has('id')) {
            $this->attributes['created_by'] = base64_decode(Session::get('id'));
        } else {
            $this->attributes['created_by'] = 0;
        }
    }

}
