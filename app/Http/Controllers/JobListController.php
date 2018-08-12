<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobListController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $permission = Permission::where('active', true)->whereNull('parent_id')->orderBy('name')->get();

        $hot_work = json_decode(file_get_contents(base_path('resources/views') . "/step_hot_work.json"), true);

        return view('job_list.step_workflow.index', compact('permission', 'hot_work'));
    }

    public function create()
    {
        //
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
