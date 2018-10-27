<?php

namespace App\Http\Controllers;

use App\DataTables\JobOrderDataTable;
use App\Http\Controllers\Traits\ActionJobOrder;
use App\Http\Controllers\Traits\SaveHotWork;
use App\Http\Controllers\Traits\SaveJobOrder;
use App\Http\Controllers\Traits\StepJobOrder;
use App\Http\Requests\JobOrderRequest;
use App\Models\ClassModel;
use App\Models\JobOrder;
use App\Models\Location;
use App\Models\TransactionJobOrder;
use App\Models\WorkType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class JobListController extends Controller
{
    use StepJobOrder;
    use ActionJobOrder;
    use SaveJobOrder;
//    use SaveHotWork;

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
        $request->merge([
            'created_by' => Session::has('id') ? base64_decode(Session::get('id')) : 0,
            'updated_by' => Session::has('id') ? base64_decode(Session::get('id')) : 0,
        ]);

        DB::beginTransaction();

        try {
            $order_id = JobOrder::create($request->all())->id;

            $transaction = new TransactionJobOrder();
            $transaction->createTransactionJobOrder($order_id, 1, 1);

            if ($order_id > 0) {
                if ($request->get('hot_work') == 1) {
                    $request->merge(['order_id' => $order_id]);
                    $this->createHotWork($request->all());
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            return redirect()->back()->with('error', $exception->getMessage());
//            return redirect()->back()->with('error', trans('error_message.save_false'));
        }

        return redirect('job-list')->with('success', trans('error_message.save_success'));
    }

    public function edit($id)
    {
        $data = $this->getStepJobOrder($id);
        $location = Location::where(['active' => true, 'class_id' => array_get($data, 'class_id')])->get();
        $work_type = WorkType::where([
            'active' => true,
            'class_id' => array_get($data, 'class_id'),
            'location_id' => array_get($data, 'location_id')
        ])->get();

        $compact_array = [
            'class' => ClassModel::where('active', true)->get(),
            'location' => $location,
            'work_type' => $work_type,
            'data' => $data
        ];

        return view(array_get($data, 'view'), $compact_array);
    }

    public function update($id, JobOrderRequest $request)
    {
        $this->saveJobOrder($id, $request);

        return redirect('job-list')->with('success', trans('error_message.save_success'));

    }

    public function destroy($id)
    {
        //
    }

}
