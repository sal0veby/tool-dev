<?php
/**
 * Created by PhpStorm.
 * User: SALOVEBY JOKE
 * Date: 20-Sep-18
 * Time: 11:02
 */

namespace App\Http\Controllers\Traits;


use App\Models\CarRegistration;
use App\Models\Contractor;
use App\Models\HotWork;
use App\Models\JobOrder;
use App\Models\JobOrderDetail;
use App\Models\Owner;
use App\Models\Participants;
use App\Models\Supervisor;
use App\Models\Taskmaster;
use App\Models\Tool;
use App\Models\TransactionJobOrder;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait SaveJobOrder
{
    protected $order_id = 0;

    public function saveJobOrder($id, $request)
    {
        $input = $request->all();

        $this->order_id = $id;

        DB::beginTransaction();

        try {
            $new_data = unset_array($input, ['_token']);

            switch ($new_data) {
                case array_get($new_data, 'process_id') == 1 && array_get($new_data, 'state_id') == 2:
                    $owner = isset($input['owner_list']) ? array_get($input, 'owner_list') : '';
                    $supervisor = isset($input['supervisor_list']) ? array_get($input, 'supervisor_list') : '';
                    $contractor = isset($input['contractor_list']) ? array_get($input, 'contractor_list') : '';
                    $taskmaster = isset($input['taskmaster_list']) ? array_get($input, 'taskmaster_list') : '';
                    $participants = isset($input['participants_list']) ? array_get($input, 'participants_list') : '';
                    $car_registration = isset($input['car_registration_list']) ? array_get($input, 'car_registration_list') : '';
                    $tools = isset($input['hot_work_list']) ? array_get($input, 'hot_work_list') : '';

                    if (!empty($owner)) {
                        $this->owner($owner);
                    }

                    if (!empty($supervisor)) {
                        $this->supervisor($supervisor);
                    }

                    if (!empty($contractor)) {
                        $this->contractor($contractor);
                    }

                    if (!empty($taskmaster)) {
                        $this->taskmaster($taskmaster);
                    }

                    if (!empty($participants)) {
                        $this->participants($participants);
                    }

                    if (!empty($car_registration)) {
                        $this->car_registration($car_registration);
                    }

                    if (!empty($tools)) {
                        $this->tools($tools);
                    }

                    $date = DateTime::createFromFormat('d/m/Y', $new_data['coming_work_date']);
                    $new_data['coming_work_date'] = $date->format('Y-m-d');

                    $this->updateJobOrder($input);

                    break;

                case array_get($new_data, 'process_id') == 2 && array_get($new_data, 'state_id') == 1:
                    $data = unset_array($new_data, ['disabled_1', 'disabled_2']);

                    $this->saveJobDetail($data, 'add');

                    $data = unset_array($data, ['step_2_1', 'step_2_1_user']);
                    $this->updateJobOrder($data);
                    break;

                case array_get($new_data, 'process_id') == 2 && array_get($new_data, 'state_id') == 2:
                    $data = unset_array($new_data, ['disabled_1', 'disabled_2']);

                    $this->saveJobDetail($data);

                    $data = unset_array($data, ['step_2_1', 'step_2_1_user']);
                    $this->updateJobOrder($data);
                    break;

                case array_get($new_data, 'process_id') == 3 && array_get($new_data, 'state_id') == 1:

                    $data = unset_array($new_data, ['disabled_1', 'disabled_2', 'disabled_3']);

                    $this->saveJobDetail($data);

                    $data = unset_array($data, ['step_2_2_user', 'step_2_2_tel']);
                    $this->updateJobOrder($data);
                    break;
            }

            DB::commit();
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollback();
            return redirect()->back()->with('error', trans('error_message.save_false'));
        }

    }

    protected function createJobOrder($data)
    {
        $order_id = JobOrder::create($data)->id;

        if ($order_id > 0) {
            $this->createTransactionJobOrder(['process_id' => 1, 'state_id' => 1]);
        }

        return $order_id;
    }

    protected function updateJobOrder($data): void
    {
        $data['updated_by'] = base64_decode(Session::get('id'));

        JobOrder::where('id', $this->order_id)->update($data);

        $this->createTransactionJobOrder($data);
    }

    protected function saveJobDetail($data, $action = ''): void
    {
        if ($action == 'add') {
            $data['order_id'] = $this->order_id;
            JobOrderDetail::create($data);
        } else {
            JobOrderDetail::where('id', $this->order_id)->update($data);
        }
    }

    protected function saveHotWork($data, $action = ''): void
    {
        if ($action == 'add') {
            HotWork::create($data);
        } else {
//            $result = Tool::where('order_id', $this->order_id)->get()->toArray();
//            $ids1 = array();
//            foreach ($result as $key => $elem1) {
//                $ids1[] = array_get($elem1, 'id');
//            }
//            $ids2 = array();
//            foreach ($data_decode as $key => $elem2) {
//                if (!empty(array_get($elem2, 'id'))) {
//                    $ids2[] = data_get($elem2, 'id');
//                }
//            }
//
//            $id_delete = array_diff($ids1, $ids2);
//
//            if (!empty($id_delete)) {
//                foreach ($id_delete as $id) {
//                    $model = Tool::find($id);
//                    $model->delete();
//                }
//            }
//
//            foreach ($data_decode as $key => $value) {
//                if (empty(array_get($value, 'id'))) {
//                    unset($value['id']);
//                    $value['order_id'] = $this->order_id;
//                    $value['created_at'] = Carbon::now();
//                    $value['updated_at'] = Carbon::now();
//
//                    Tool::insert($value);
//                } else {
//                    $id = $value['id'];
//                    unset($value['id']);
//                    Tool::where('id', $id)->update($value);
//                }
//            }
        }
    }

    protected function createTransactionJobOrder($data)
    {
        $transaction = new TransactionJobOrder();
        $transaction->createTransactionJobOrder($this->order_id, $data['process_id'], $data['state_id']);
    }


}
