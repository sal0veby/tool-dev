<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\LocationDataTable;
use App\Http\Requests\LocationRequest;
use App\Models\ClassModel;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocationController extends Controller
{
    public function __construct()
    {

    }

    public function index(LocationDataTable $table)
    {
        return $table->render('manage.location.index');
    }

    public function create()
    {
        $class_list = ClassModel::where('active', true)->orderBy('name', 'ASC')->get();

        return view('manage.location.create', compact('class_list'));
    }

    public function store(LocationRequest $request)
    {
        $input = $request->all();
        $input['active'] = isset($input['active']) && $input['active'] == 'on' ? true : false;
        $input['created_by'] = base64_decode(session('id'));

        try {
            Location::create($input);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('location')->with('success', trans('error_message.save_success'));
    }

    public function show($id)
    {
        $result = Location::where('id', $id)->first();
        $class = ClassModel::where('id', $result->class_id)->first();
        $result->class_name = $class->name;

        return view('manage.location.view', compact('result'));
    }

    public function edit($id)
    {
        $result = Location::where('id', $id)->first();
        $class_list = ClassModel::where('active', true)->orderBy('name', 'ASC')->get();

        return view('manage.location.edit', compact('class_list', 'result'));
    }

    public function update($id, LocationRequest $request)
    {
        $input = $request->all();
        $input['active'] = isset($input['active']) && $input['active'] == 'on' ? true : false;
        $input['updated_by'] = base64_decode(session('id'));

        try {
            unset($input['_token']);
            Location::where('id', $id)->update($input);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('location')->with('success', trans('error_message.save_success'));
    }

    public function destroy($id)
    {
        try {
            Location::where('id', $id)->update(['active' => false]);
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }
        return redirect('location')->with('success', trans('error_message.save_success'));
    }

    public function getLocationList(Request $request)
    {
        $input = $request->get('class_id');

        return Location::where('class_id', $input)->get();
    }
}
