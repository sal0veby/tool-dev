<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\WorkTypeDataTable;
use App\Http\Requests\WorkTypeRequest;
use App\Models\ClassModel;
use App\Models\Location;
use App\Models\WorkType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkTypeController extends Controller
{
    public function __construct()
    {

    }

    public function index(WorkTypeDataTable $table)
    {
        return $table->render('manage.work_type.index');
//        return view('manage.permission.index');
    }

    public function create()
    {
        $class_list = ClassModel::where('active', true)->orderBy('name', 'ASC')->get();

        return view('manage.work_type.create', compact('class_list'));
    }

    public function store(WorkTypeRequest $request)
    {
        $input = $request->all();

        $input['active'] = isset($input['active']) && $input['active'] == 'on' ? true : false;
        $input['created_by'] = base64_decode(session('id'));

        try {
            WorkType::create($input);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('work_type')->with('success', trans('error_message.save_success'));
    }

    public function show($id)
    {
        $result = WorkType::where('id', $id)->first();

        $class_list = ClassModel::where('active', true)->orderBy('name', 'ASC')->get();

        $location_list = Location::where('active', true)->orderBy('name', 'ASC')->get();

        return view('manage.work_type.view', compact('class_list', 'location_list', 'result'));
    }

    public function edit($id)
    {
        $result = WorkType::where('id', $id)->first();

        $class_list = ClassModel::where('active', true)->orderBy('name', 'ASC')->get();

        $location_list = Location::where('active', true)->orderBy('name', 'ASC')->get();

        return view('manage.work_type.edit', compact('class_list', 'location_list', 'result'));
    }

    public function update($id , WorkTypeRequest $request)
    {
        $input = $request->all();
        $input['active'] = isset($input['active']) && $input['active'] == 'on' ? true : false;
        $input['updated_by'] = base64_decode(session('id'));

        try {
            unset($input['_token']);
            WorkType::where('id', $id)->update($input);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('work_type')->with('success', trans('error_message.save_success'));
    }

    public function destroy($id)
    {
        try {
            WorkType::where('id', $id)->update(['active' => false]);
        } catch (\Exception $exception) {dd($exception);
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }
        return redirect('work_type')->with('success', trans('error_message.save_success'));
    }
}
