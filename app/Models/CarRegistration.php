<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarRegistration extends Model
{
    protected $table = 'car_registrations';

    protected $fillable = [
        'order_id',
        'car_registration',
    ];
}
