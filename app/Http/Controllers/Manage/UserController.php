<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\UserTable;
use App\Http\Requests\UserRequest;
use App\Model\User;
use App\Models\Permission;
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
        $user_id = User::create($input)->id;

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

        return redirect('user')->with('success', trans('error_message.save_success'));
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
