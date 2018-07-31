<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\ClassDataTable;
use App\Http\Requests\ClassRequest;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function __construct()
    {

    }

    public function index(ClassDataTable $table)
    {
        return $table->render('manage.class.index');
    }

    public function create()
    {
        return view('manage.class.create');
    }

    public function store(ClassRequest $request)
    {
        $input = $request->all();
        $input['active'] = isset($input['active']) && $input['active'] == 'on' ? true : false;
        $input['created_by'] = base64_decode(session('id'));

        try {
            ClassModel::create($input);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('class')->with('success', trans('error_message.save_success'));
    }

    public function show($id)
    {
        $result = ClassModel::where('id', $id)->first();
        return view('manage.class.view', compact('result'));
    }

    public function edit($id)
    {
        $result = ClassModel::where('id', $id)->first();
        return view('manage.class.edit', compact('result'));
    }

    public function update($id, ClassRequest $request)
    {
        $input = $request->all();
        $input['active'] = isset($input['active']) && $input['active'] == 'on' ? true : false;
        $input['updated_by'] = base64_decode(session('id'));

        try {
            unset($input['_token']);
            ClassModel::where('id', $id)->update($input);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('class')->with('success', trans('error_message.save_success'));
    }

    public function destroy($id)
    {
        try {
            UserModel::where('id', $id)->update(['active' => false]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }
        return redirect('class')->with('success', trans('error_message.save_success'));
    }
}
