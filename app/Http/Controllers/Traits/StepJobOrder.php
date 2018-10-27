<?php

namespace App\Http\Controllers\Traits;


use App\Models\JobOrder;
use App\Models\JobOrderDetail;
use App\Models\StepFlow;
use Carbon\Carbon;

trait StepJobOrder
{
    use SaveHotWork;

    public function getStepJobOrder($id)
    {
        $result = JobOrder::where('id', $id)->first();
        return $this->checkStepJob($result);
    }

    private function checkStepJob($data)
    {
        $step_flow = StepFlow::query()->where([
            'process_before_id' => array_get($data, 'process_id'),
            'state_before_id' => array_get($data, 'state_id')
        ])->first();

        $result = $data->toArray();

        $result['created_at'] = Carbon::parse(array_get($result, 'created_at'))->format(config('date.default_date_format'));
        $result['coming_work_date'] = Carbon::parse(array_get($result, 'coming_work_date'))->format(config('date.default_date_format'));

        $result['process_next_id'] = array_get($step_flow, 'process_next_id');
        $result['state_next_id'] = array_get($step_flow, 'state_next_id');

        $result['hot_work_list'] = $this->getHotWork(array_get($result, 'id'))->toArray();

        switch ($step_flow) {
            case array_get($step_flow, 'process_next_id') == 1 && array_get($step_flow, 'state_next_id') == 2:
                $result['view'] = 'job_order.edit';

                if (!session()->has('permission_id') || session()->get('permission_name') == 'Admin') {
                    $result['disabled_1'] = '';
                    return $result;
                }

                $result['disabled_1'] = 'disabled';
                return $result;
                break;

            case array_get($step_flow, 'process_next_id') == 2 && array_get($step_flow, 'state_next_id') == 1:
                $result['disabled_1'] = 'disabled';
                $result['view'] = 'job_order.tab_steps.template_step';
                $result['btn-save'] = 'save';

                if (session()->get('permission_name') == 'Supnoc' || session()->get('permission_name') == 'Admin') {
                    $result['disabled_2'] = '';
                    return $result;
                }

                $result['disabled_2'] = 'disabled';
                return $result;
                break;

            case array_get($step_flow, 'process_next_id') == 2 && array_get($step_flow, 'state_next_id') == 2:
                $result['disabled_1'] = 'disabled';
                $result['view'] = 'job_order.tab_steps.template_step';
                $result['btn-save'] = 'approve';

                $result['job_detail'] = JobOrderDetail::where('order_id', array_get($result, 'id'))->first()->toArray();

                if (session()->get('permission_name') == 'Supnoc' || session()->get('permission_name') == 'Admin') {
                    $result['disabled_2'] = '';
                    return $result;
                }

                $result['disabled_2'] = 'disabled';
                return $result;
                break;

            case array_get($step_flow, 'process_next_id') == 3 && array_get($step_flow, 'state_next_id') == 1:
                $result['disabled_1'] = 'disabled';
                $result['disabled_2'] = 'disabled';
                $result['view'] = 'job_order.tab_steps.template_step';
                $result['btn-save'] = 'save';

                $result['job_detail'] = JobOrderDetail::where('order_id', array_get($result, 'id'))->first()->toArray();

                if (session()->get('permission_name') == 'Noc' || session()->get('permission_name') == 'Admin') {
                    $result['disabled_3'] = '';
                    return $result;
                }

                $result['disabled_3'] = 'disabled';
                return $result;
                break;

            case array_get($step_flow, 'process_next_id') == 3 && array_get($step_flow, 'state_next_id') == 2:
                $result['disabled_1'] = 'disabled';
                $result['disabled_2'] = 'disabled';
                $result['view'] = 'job_order.tab_steps.template_step';
                $result['btn-save'] = 'approve';

                $result['job_detail'] = JobOrderDetail::where('order_id', array_get($result, 'id'))->first()->toArray();

                if (session()->get('permission_name') == 'Noc' || session()->get('permission_name') == 'Admin') {
                    $result['disabled_3'] = '';
                    return $result;
                }

                $result['disabled_3'] = 'disabled';
                return $result;
                break;

        }
    }
}
