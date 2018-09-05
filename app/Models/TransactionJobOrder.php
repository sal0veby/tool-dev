<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class TransactionJobOrder extends Model
{
    protected $table = 'transaction_job_orders';

    protected $fillable = [
        'order_id',
        'process_id',
        'state_id',
        'created_by',
        'updated_by'
    ];

    public function createTransactionJobOrder($order_id, $process_id, $state_id)
    {
        $data = [
            'order_id' => $order_id,
            'process_id' => $process_id,
            'state_id' => $state_id,
            'created_by' => Session::has('id') ? base64_decode(Session::get('id')) : 0,
            'updated_by' => Session::has('id') ? base64_decode(Session::get('id')) : 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $result = TransactionJobOrder::create($data);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
