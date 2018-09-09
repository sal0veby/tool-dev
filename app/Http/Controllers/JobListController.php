<?php

namespace App\Http\Controllers;

use App\DataTables\JobOrderDataTable;
use App\Http\Requests\JobOrderRequest;
use App\Models\CarRegistration;
use App\Models\ClassModel;
use App\Models\Contractor;
use App\Models\JobOrder;
use App\Models\Location;
use App\Models\Owner;
use App\Models\Participants;
use App\Models\StepFlow;
use App\Models\Supervisor;
use App\Models\Taskmaster;
use App\Models\TransactionJobOrder;
use App\Models\WorkType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $input = $request->all();

        DB::beginTransaction();

        $owner = isset($input['owner_list']) ? array_get($input, 'owner_list') : '';
        $supervisor = isset($input['supervisor_list']) ? array_get($input, 'supervisor_list') : '';
        $contractor = isset($input['contractor_list']) ? array_get($input, 'contractor_list') : '';
        $taskmaster = isset($input['taskmaster_list']) ? array_get($input, 'taskmaster_list') : '';
        $participants = isset($input['participants_list']) ? array_get($input, 'participants_list') : '';
        $car_registration = isset($input['car_registration_list']) ? array_get($input, 'car_registration_list') : '';

        try {
            $new_data = unset_array($input, [
                'owner_list',
                'supervisor_list',
                'contractor_list',
                'taskmaster_list',
                'participants_list',
                'car_registration_list'
            ]);

            $order_id = JobOrder::create($new_data)->id;

            if ($order_id > 0) {
                $transaction = new TransactionJobOrder();
                $transaction->createTransactionJobOrder($order_id, 1, 1);

                if (!empty($owner)) {
                    $this->owner($order_id, $owner, 'add');
                }

                if (!empty($supervisor)) {
                    $this->supervisor($order_id, $supervisor, 'add');
                }

                if (!empty($contractor)) {
                    $this->contractor($order_id, $contractor, 'add');
                }

                if (!empty($taskmaster)) {
                    $this->taskmaster($order_id, $taskmaster, 'add');
                }

                if (!empty($participants)) {
                    $this->participants($order_id, $participants, 'add');
                }

                if (!empty($car_registration)) {
                    $this->car_registration($order_id, $car_registration, 'add');
                }

            }

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollback();
            return redirect()->back()->with('error', trans('error_message.save_false'));
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

    public function getWorkTypeList(Request $request)
    {
        $class_id = $request->get('class_id');
        $location_id = $request->get('location_id');

        return WorkType::where(['location_id' => $location_id, 'class_id' => $class_id])->get();
    }

    public function getLocationList(Request $request)
    {
        $input = $request->get('class_id');

        return Location::where('class_id', $input)->get();
    }

    public function owner($order_id, $data, $action = '')
    {
        if ($action == 'add') {
            $data_decode = json_decode($data, true);

            foreach ($data_decode as $key => $val) {
                $data_decode[$key]['order_id'] = $order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Owner::insert($data_decode);
        } else {

        }
    }

    public function supervisor($order_id, $data, $action = '')
    {
        if ($action == 'add') {
            $data_decode = json_decode($data, true);

            foreach ($data_decode as $key => $val) {
                $data_decode[$key]['order_id'] = $order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Supervisor::insert($data_decode);
        } else {

        }
    }

    public function contractor($order_id, $data, $action = '')
    {
        if ($action == 'add') {
            $data_decode = json_decode($data, true);

            foreach ($data_decode as $key => $val) {
                $data_decode[$key]['order_id'] = $order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Contractor::insert($data_decode);
        } else {

        }
    }

    public function taskmaster($order_id, $data, $action = '')
    {
        if ($action == 'add') {
            $data_decode = json_decode($data, true);

            foreach ($data_decode as $key => $val) {
                $data_decode[$key]['order_id'] = $order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Taskmaster::insert($data_decode);
        } else {

        }
    }

    public function participants($order_id, $data, $action = '')
    {
        if ($action == 'add') {
            $data_decode = json_decode($data, true);

            foreach ($data_decode as $key => $val) {
                $data_decode[$key]['order_id'] = $order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Participants::insert($data_decode);
        } else {

        }
    }

    public function car_registration($order_id, $data, $action = '')
    {
        if ($action == 'add') {
            $data_decode = json_decode($data, true);

            foreach ($data_decode as $key => $val) {
                $data_decode[$key]['order_id'] = $order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            CarRegistration::insert($data_decode);
        } else {

        }
    }
}
