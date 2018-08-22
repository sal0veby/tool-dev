<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageStepRequest;
use App\Models\ManageStep;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageStepController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $permission = Permission::where('active', true)->whereNull('parent_id')->orderBy('name')->get();

        $hot_work = json_decode(file_get_contents(base_path('resources/views') . "/step_hot_work.json"), true);

        $result = ManageStep::get();

        return view('manage.step_workflow.index', [
            'permission' => $permission,
            'hot_work' => $hot_work,
            'result' => $result
        ]);
    }

    public function update(ManageStepRequest $request)
    {
        $input = $request->all();

        $result_step = ManageStep::get();

        foreach ($input['permission_id'] as $key => $val) {
            $list['permission_id'] = $val;
            $list['process_hot_work_id'] = array_get($input['hot_work_id'], $key);
            $list['updated_by'] = base64_decode(session('id'));


            if ($result_step->count() > 0) {
                try {
                    ManageStep::where('id', $key)->update($list);
                } catch (\Exception $exception) {
                    return redirect()->back()->withErrors('error', trans('error_message.save_false'));
                }
            } else {
                try {
                    ManageStep::create($list);
                } catch (\Exception $exception) {
                    return redirect()->back()->withErrors('error', trans('error_message.save_false'));
                }
            }

        }


        return redirect('manage-step')->with('success', trans('error_message.save_success'));
    }

    public function destroy($id)
    {
        //
    }
}
