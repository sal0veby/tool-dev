<?php

namespace App\Http\Controllers;

use App\DataTables\JobOrderDataTable;
use App\Models\ClassModel;
use App\Models\Location;
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
//        $hot_work = json_decode(file_get_contents(base_path('resources/views') . "/step_hot_work.json"), true);
        $class_list = ClassModel::where('active', true)->get();
        $location_list = Location::where('active', true)->get();
        $work_type_list = WorkType::where('active', true)->get();

        $compact_array = [
            'class' => $class_list,
            'location' => $location_list,
            'work_type' => $work_type_list,
        ];

        return view('job_order.create', $compact_array);
    }

    public function store()
    {
        //
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
}
