<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Models\Permission;
use App\Models\UserModel;
use App\Models\UserPermission;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(UserDataTable $table)
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

        $input['active'] = $input['active'] = 'on' ? 1 : 0;
        $input['password'] = !empty($input['password']) ? bcrypt($input['password']) : $input['old_password'];
        $input['updated_by'] = base64_decode(session('id'));

        unset($input['old_password'], $input['_token'], $input['action']);

        try {
            UserModel::where('id', $id)->update($input);
//            if ($input['permission_id'] != $result->permission_id) {
//            $result = UserModel::where('id', $id)->first();
//                $this->mapPermission($id, $input['permission_id']);
//            }
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

    /**
     * @param $id
     * @param $permission_id
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function mapPermission($id, $permission_id)
//    {
//        try { // $menu
//            $result = Permission::with('children')->where('id', $permission_id)->first()->relationsToArray();
//
//            $input = UserModel::with('user_permission')->where('id', $id)->first()->relationsToArray();
//
//            foreach ($result['children'] as $index => $val) {
//                $key = array_search($val->menu_id, array_column($input['user_permission'], 'menu_id'));
//
//                $list_data = [
//                    'use' => $result['children'][$key]['use'],
//                    'add' => $result['children'][$key]['add'],
//                    'update' => $result['children'][$key]['update'],
//                    'delete' => $result['children'][$key]['delete'],
//                    'excel' => $result['children'][$key]['excel'],
//                    'pdf' => $result['children'][$key]['pdf'],
//                    'active' => $result['children'][$key]['active'],
//                    'updated_by' => base64_decode(session('id'))
//                ];
//
//                UserPermission::where(['user_id' => $id, 'menu_id' => $val->menu_id, 'id' => $val->id])->update($list_data);
//            }
//        } catch (\Exception $e) {
////                dd($e->getMessage());
//            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
//        }
//    }
}
