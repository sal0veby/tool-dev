<?php

namespace App\Http\Controllers;

use App\DataTables\JobOrderDataTable;
use App\Http\Requests\JobOrderRequest;
use App\Models\ClassModel;
use App\Models\JobOrder;
use App\Models\Location;
use App\Models\TransactionJobOrder;
use App\Models\WorkType;

class JobListController extends Controller
{
    public function __construct()
    {

    }

    public function index(JobOrderDataTable $table)
    {
        return $table->render('job_order.index');
    }

    public function create()
    {
        $compact_array = [
            'class' => ClassModel::where('active', true)->get(),
            'location' => Location::where('active', true)->get(),
            'work_type' => WorkType::where('active', true)->get(),
            'document_no' => $this->getLastDocumentNo(),
            'created_at' => date('d/m/Y')
        ];

        return view('job_order.create', $compact_array);
    }

    public function store(JobOrderRequest $request)
    {
        $input = $request->all();dd($input);
        try {
            $order_id = JobOrder::create($input)->id;

            if($order_id > 0){
                $transaction = new TransactionJobOrder();
                $transaction->createTransactionJobOrder();
            }

        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('job-list')->with('success', trans('error_message.save_success'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    protected function getLastDocumentNo()
    {
        $last_document = JobOrder::orderBy('id', 'DESC')->limit(1)->first();

        if (!empty($last_document)) {
            $document_no = str_pad(array_get($last_document, 'document_no') + 1, strlen(array_get($last_document, 'document_no')), "0", STR_PAD_LEFT);
            return $document_no;
        } else {
            return '0000001';
        }
    }
}
