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
use App\Models\JobOrder;
use App\Models\JobOrderDetail;
use App\Models\Owner;
use App\Models\Participants;
use App\Models\Supervisor;
use App\Models\Taskmaster;
use App\Models\Tool;
use App\Models\TransactionJobOrder;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait SaveJobOrder
{
    use SaveHotWork;

    protected $order_id = 0;

    public function createJobAction($id, $data)
    {
        $this->order_id = $this->createJobOrder($data);

        $owner = isset($data['owner_list']) ? array_get($data, 'owner_list') : '';
        $supervisor = isset($data['supervisor_list']) ? array_get($data, 'supervisor_list') : '';
        $contractor = isset($data['contractor_list']) ? array_get($data, 'contractor_list') : '';
        $taskmaster = isset($data['taskmaster_list']) ? array_get($data, 'taskmaster_list') : '';
        $participants = isset($data['participants_list']) ? array_get($data, 'participants_list') : '';
        $car_registration = isset($data['car_registration_list']) ? array_get($data, 'car_registration_list') : '';
        $tools = isset($data['hot_work_list']) ? array_get($data, 'hot_work_list') : '';


        if (!empty($owner)) {
            $this->owner($owner, 'add');
        }

        if (!empty($supervisor)) {
            $this->supervisor($supervisor, 'add');
        }

        if (!empty($contractor)) {
            $this->contractor($contractor, 'add');
        }

        if (!empty($taskmaster)) {
            $this->taskmaster($taskmaster, 'add');
        }

        if (!empty($participants)) {
            $this->participants($participants, 'add');
        }

        if (!empty($car_registration)) {
            $this->car_registration($car_registration, 'add');
        }

        if (!empty($tools)) {
            $this->tools($tools, 'add');
        }
    }

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

                    $data = unset_array($new_data, [
                        'owner_list',
                        'supervisor_list',
                        'contractor_list',
                        'taskmaster_list',
                        'participants_list',
                        'car_registration_list',
                        'hot_work_list',
                    ]);


                    $this->updateJobOrder($data);

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
        $new_data = unset_array($data, [
            'owner_list',
            'supervisor_list',
            'contractor_list',
            'taskmaster_list',
            'participants_list',
            'car_registration_list',
            'hot_work_list'
        ]);

        $order_id = JobOrder::create($new_data)->id;

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
        $new_data = unset_array($data, ['state_id', 'process_id']);
        if ($action == 'add') {
            $data['order_id'] = $this->order_id;
            JobOrderDetail::create($new_data);
        } else {dd($new_data);
            JobOrderDetail::where('id', $this->order_id)->update($new_data);
        }
    }

    protected function owner($data, $action = ''): void
    {
        $data_decode = json_decode($data, true);

        if ($action == 'add') {
            foreach ($data_decode as $key => $val) {
                unset($data_decode[$key]['id']);
                $data_decode[$key]['order_id'] = $this->order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }
            Owner::insert($data_decode);
        } else {
            $result = Owner::where('order_id', $this->order_id)->get()->toArray();
            $ids1 = array();
            foreach ($result as $key => $elem1) {
                $ids1[] = array_get($elem1, 'id');
            }
            $ids2 = array();
            foreach ($data_decode as $key => $elem2) {
                if (!empty(array_get($elem2, 'id'))) {
                    $ids2[] = data_get($elem2, 'id');
                }
            }

            $id_delete = array_diff($ids1, $ids2);
            dd($id_delete);
            if (!empty($id_delete)) {
                foreach ($id_delete as $id) {
                    $model = Owner::find($id);
                    $model->delete();
                }
            }

            foreach ($data_decode as $key => $value) {
                if (empty(array_get($value, 'id'))) {
                    unset($value['id']);
                    $value['order_id'] = $this->order_id;
                    $value['created_at'] = Carbon::now();
                    $value['updated_at'] = Carbon::now();

                    Owner::insert($value);
                } else {
                    $id = $value['id'];
                    unset($value['id']);
                    Owner::where('id', $id)->update($value);
                }
            }
        }
    }

    protected function supervisor($data, $action = ''): void
    {
        $data_decode = json_decode($data, true);
        if ($action == 'add') {

            foreach ($data_decode as $key => $val) {
                unset($data_decode[$key]['id']);
                $data_decode[$key]['order_id'] = $this->order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Supervisor::insert($data_decode);
        } else {
            $result = Supervisor::where('order_id', $this->order_id)->get()->toArray();
            $ids1 = array();
            foreach ($result as $key => $elem1) {
                $ids1[] = array_get($elem1, 'id');
            }
            $ids2 = array();
            foreach ($data_decode as $key => $elem2) {
                if (!empty(array_get($elem2, 'id'))) {
                    $ids2[] = data_get($elem2, 'id');
                }
            }

            $id_delete = array_diff($ids1, $ids2);

            if (!empty($id_delete)) {
                foreach ($id_delete as $id) {
                    $model = Supervisor::find($id);
                    $model->delete();
                }
            }

            foreach ($data_decode as $key => $value) {
                if (empty(array_get($value, 'id'))) {
                    unset($value['id']);
                    $value['order_id'] = $this->order_id;
                    $value['created_at'] = Carbon::now();
                    $value['updated_at'] = Carbon::now();

                    Supervisor::insert($value);
                } else {
                    $id = $value['id'];
                    unset($value['id']);
                    Supervisor::where('id', $id)->update($value);
                }
            }
        }
    }

    protected function contractor($data, $action = ''): void
    {
        $data_decode = json_decode($data, true);
        if ($action == 'add') {

            foreach ($data_decode as $key => $val) {
                unset($data_decode[$key]['id']);
                $data_decode[$key]['order_id'] = $this->order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Contractor::insert($data_decode);
        } else {
            $result = Contractor::where('order_id', $this->order_id)->get()->toArray();
            $ids1 = array();
            foreach ($result as $key => $elem1) {
                $ids1[] = array_get($elem1, 'id');
            }
            $ids2 = array();
            foreach ($data_decode as $key => $elem2) {
                if (!empty(array_get($elem2, 'id'))) {
                    $ids2[] = data_get($elem2, 'id');
                }
            }

            $id_delete = array_diff($ids1, $ids2);

            if (!empty($id_delete)) {
                foreach ($id_delete as $id) {
                    $model = Contractor::find($id);
                    $model->delete();
                }
            }

            foreach ($data_decode as $key => $value) {
                if (empty(array_get($value, 'id'))) {
                    unset($value['id']);
                    $value['order_id'] = $this->order_id;
                    $value['created_at'] = Carbon::now();
                    $value['updated_at'] = Carbon::now();

                    Contractor::insert($value);
                } else {
                    $id = $value['id'];
                    unset($value['id']);
                    Contractor::where('id', $id)->update($value);
                }
            }
        }
    }

    protected function taskmaster($data, $action = ''): void
    {
        $data_decode = json_decode($data, true);
        if ($action == 'add') {

            foreach ($data_decode as $key => $val) {
                unset($data_decode[$key]['id']);
                $data_decode[$key]['order_id'] = $this->order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Taskmaster::insert($data_decode);
        } else {
            $result = Taskmaster::where('order_id', $this->order_id)->get()->toArray();
            $ids1 = array();
            foreach ($result as $key => $elem1) {
                $ids1[] = array_get($elem1, 'id');
            }
            $ids2 = array();
            foreach ($data_decode as $key => $elem2) {
                if (!empty(array_get($elem2, 'id'))) {
                    $ids2[] = data_get($elem2, 'id');
                }
            }

            $id_delete = array_diff($ids1, $ids2);

            if (!empty($id_delete)) {
                foreach ($id_delete as $id) {
                    $model = Taskmaster::find($id);
                    $model->delete();
                }
            }

            foreach ($data_decode as $key => $value) {
                if (empty(array_get($value, 'id'))) {
                    unset($value['id']);
                    $value['order_id'] = $this->order_id;
                    $value['created_at'] = Carbon::now();
                    $value['updated_at'] = Carbon::now();

                    Taskmaster::insert($value);
                } else {
                    $id = $value['id'];
                    unset($value['id']);
                    Taskmaster::where('id', $id)->update($value);
                }
            }
        }
    }

    protected function participants($data, $action = ''): void
    {
        $data_decode = json_decode($data, true);
        if ($action == 'add') {
            foreach ($data_decode as $key => $val) {
                unset($data_decode[$key]['id']);
                $data_decode[$key]['order_id'] = $this->order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Participants::insert($data_decode);
        } else {
            $result = Participants::where('order_id', $this->order_id)->get()->toArray();
            $ids1 = array();
            foreach ($result as $key => $elem1) {
                $ids1[] = array_get($elem1, 'id');
            }
            $ids2 = array();
            foreach ($data_decode as $key => $elem2) {
                if (!empty(array_get($elem2, 'id'))) {
                    $ids2[] = data_get($elem2, 'id');
                }
            }

            $id_delete = array_diff($ids1, $ids2);

            if (!empty($id_delete)) {
                foreach ($id_delete as $id) {
                    $model = Participants::find($id);
                    $model->delete();
                }
            }

            foreach ($data_decode as $key => $value) {
                if (empty(array_get($value, 'id'))) {
                    unset($value['id']);
                    $value['order_id'] = $this->order_id;
                    $value['created_at'] = Carbon::now();
                    $value['updated_at'] = Carbon::now();

                    Participants::insert($value);
                } else {
                    $id = $value['id'];
                    unset($value['id']);
                    Participants::where('id', $id)->update($value);
                }
            }
        }
    }

    protected function car_registration($data, $action = ''): void
    {
        $data_decode = json_decode($data, true);
        if ($action == 'add') {
            foreach ($data_decode as $key => $val) {
                unset($data_decode[$key]['id']);
                $data_decode[$key]['order_id'] = $this->order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            CarRegistration::insert($data_decode);
        } else {
            $result = CarRegistration::where('order_id', $this->order_id)->get()->toArray();
            $ids1 = array();
            foreach ($result as $key => $elem1) {
                $ids1[] = array_get($elem1, 'id');
            }
            $ids2 = array();
            foreach ($data_decode as $key => $elem2) {
                if (!empty(array_get($elem2, 'id'))) {
                    $ids2[] = data_get($elem2, 'id');
                }
            }

            $id_delete = array_diff($ids1, $ids2);

            if (!empty($id_delete)) {
                foreach ($id_delete as $id) {
                    $model = CarRegistration::find($id);
                    $model->delete();
                }
            }

            foreach ($data_decode as $key => $value) {
                if (empty(array_get($value, 'id'))) {
                    unset($value['id']);
                    $value['order_id'] = $this->order_id;
                    $value['created_at'] = Carbon::now();
                    $value['updated_at'] = Carbon::now();

                    CarRegistration::insert($value);
                } else {
                    $id = $value['id'];
                    unset($value['id']);
                    CarRegistration::where('id', $id)->update($value);
                }
            }
        }
    }

    protected function tools($data, $action = ''): void
    {
        $data_decode = json_decode($data, true);
        if ($action == 'add') {
            foreach ($data_decode as $key => $val) {
                unset($data_decode[$key]['id']);
                $data_decode[$key]['order_id'] = $this->order_id;
                $data_decode[$key]['created_at'] = Carbon::now();
                $data_decode[$key]['updated_at'] = Carbon::now();
            }

            Tool::insert($data_decode);
        } else {
            $result = Tool::where('order_id', $this->order_id)->get()->toArray();
            $ids1 = array();
            foreach ($result as $key => $elem1) {
                $ids1[] = array_get($elem1, 'id');
            }
            $ids2 = array();
            foreach ($data_decode as $key => $elem2) {
                if (!empty(array_get($elem2, 'id'))) {
                    $ids2[] = data_get($elem2, 'id');
                }
            }

            $id_delete = array_diff($ids1, $ids2);

            if (!empty($id_delete)) {
                foreach ($id_delete as $id) {
                    $model = Tool::find($id);
                    $model->delete();
                }
            }

            foreach ($data_decode as $key => $value) {
                if (empty(array_get($value, 'id'))) {
                    unset($value['id']);
                    $value['order_id'] = $this->order_id;
                    $value['created_at'] = Carbon::now();
                    $value['updated_at'] = Carbon::now();

                    Tool::insert($value);
                } else {
                    $id = $value['id'];
                    unset($value['id']);
                    Tool::where('id', $id)->update($value);
                }
            }
        }
    }

    protected function createTransactionJobOrder($data)
    {
        $transaction = new TransactionJobOrder();
        $transaction->createTransactionJobOrder($this->order_id, $data['process_id'], $data['state_id']);
    }


}
