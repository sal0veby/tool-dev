<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\UserTable;
use App\Http\Requests\UserRequest;
use App\Models\Permission;
use App\Models\UserModel;
use App\Models\UserPermission;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(UserTable $table)
    {
        return $table->render('manage.user.index');
    }

    public function create()
    {
        $permission = Permission::where('active', true)->whereNull('parent_id')->orderBy('name')->get();
        return view('manage.user.create', compact('permission'));
    }

    public function store(UserRequest $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['default'] = 0;
        $input['created_by'] = base64_decode(session('id'));

        try {
            $user_id = UserModel::create($input)->id;
            $permission = Permission::where('parent_id', $input['permission_id'])->get();
            foreach ($permission as $val) {
                $list = [
                    'user_id' => $user_id,
                    'menu_id' => $val->menu_id,
                    'use' => $val->use,
                    'add' => $val->add,
                    'update' => $val->update,
                    'delete' => $val->delete,
                    'excel' => $val->excel,
                    'pdf' => $val->pdf,
                    'active' => $val->active,
                    'created_by' => base64_decode(session('id'))
                ];
                UserPermission::create($list);
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('user')->with('success', trans('error_message.save_success'));
    }

    public function show($id)
    {
        $result = UserModel::where('id', $id)->first();
        $permission = Permission::where('active', true)->whereNull('parent_id')->orderBy('name')->get();

        return view('manage.user.view', compact('result', 'permission'));
    }

    public function edit($id)
    {
        $result = UserModel::where('id', $id)->first();
        $permission = Permission::where('active', true)->whereNull('parent_id')->orderBy('name')->get();

        return view('manage.user.edit', compact('result', 'permission'));
    }

    public function update($id, UserRequest $request)
    {
        $input = $request->all();

        $data = [
            'description' => !empty($input['description']) ? $input['description'] : "",
            'active' => $input['active'] = 'on' ? 1 : 0,
            'password' => !empty($input['password']) ? bcrypt($input['password']) : $input['old_password'],
            'updated_by' => base64_decode(session('id'))];

        unset($input['old_password']);

        try {
            UserModel::where('id', $id)->update($data);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }

        return redirect('user')->with('success', trans('error_message.save_success'));
    }

    public function destroy($id)
    {
        try {
            UserModel::where('id', $id)->update(['active' => false]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }
        return redirect('permission')->with('success', trans('error_message.save_success'));
    }
}
