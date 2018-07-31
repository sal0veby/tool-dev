<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\UserPermissionDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPermissionRequest;
use App\Models\Menu;
use App\Models\UserModel;
use App\Models\UserPermission;

class UserPermissionController extends Controller
{
    public function __construct()
    {

    }

    public function index(UserPermissionDataTable $table)
    {
        return $table->render('manage.user_permission.index');
    }

    public function create()
    {

    }

    public function store()
    {
        //
    }

    public function show($id)
    {
        $result_User_permission = UserModel::with('user_permission')->where('id', $id)->first();

        $result['id'] = $result_User_permission->id;
        $result['username'] = $result_User_permission->username;
        $result['name'] = $result_User_permission->first_name . ' ' . $result_User_permission->last_name;

        foreach ($result_User_permission['user_permission'] as $value) {
            $result['permission'][] = [
                'menu_id' => $value->menu_id,
                'use' => $value->use,
                'add' => $value->add,
                'update' => $value->update,
                'delete' => $value->delete,
                'excel' => $value->excel,
                'pdf' => $value->pdf
            ];
        }

        $menu = Menu::get()->toTree();
        return view('manage.user_permission.view', compact('menu', 'result'));
    }

    public function edit($id)
    {
        $result_User_permission = UserModel::with('user_permission')->where('id', $id)->first();

        $result['id'] = $result_User_permission->id;
        $result['username'] = $result_User_permission->username;
        $result['name'] = $result_User_permission->first_name . ' ' . $result_User_permission->last_name;

        foreach ($result_User_permission['user_permission'] as $value) {
            $result['permission'][] = [
                'menu_id' => $value->menu_id,
                'use' => $value->use,
                'add' => $value->add,
                'update' => $value->update,
                'delete' => $value->delete,
                'excel' => $value->excel,
                'pdf' => $value->pdf
            ];
        }

        $menu = Menu::get()->toTree();
        return view('manage.user_permission.edit', compact('menu', 'result'));
    }

    /**
     * @param $id
     * @param UserPermissionRequest $permission
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, UserPermissionRequest $permission)
    {
        $input = $permission->all();
        $result_User_permission = UserModel::with('user_permission')->where('id', $id)->first()->getRelations();

        $this->mapPermission($id, $input, $result_User_permission['user_permission']);

        return redirect('user-permission')->with('success', trans('error_message.save_success'));
    }

    public function destroy($id)
    {
        //
    }

    public function mapPermission($id, $input, $result)
    {
        try { // $menu
            $list_data = [];
            foreach ($result as $index => $val) {
                if (array_key_exists($val->menu_id, $input['permission'])) {
                    $list_data = [
                        'use' => isset($input['permission'][$val->menu_id]['use']) && $input['permission'][$val->menu_id]['use'] = 'on' ? 1 : 0,
                        'add' => isset($input['permission'][$val->menu_id]['add']) && $input['permission'][$val->menu_id]['add'] = 'on' ? 1 : 0,
                        'update' => isset($input['permission'][$val->menu_id]['update']) && $input['permission'][$val->menu_id]['update'] = 'on' ? 1 : 0,
                        'delete' => isset($input['permission'][$val->menu_id]['delete']) && $input['permission'][$val->menu_id]['delete'] = 'on' ? 1 : 0,
                        'excel' => isset($input['permission'][$val->menu_id]['excel']) && $input['permission'][$val->menu_id]['excel'] = 'on' ? 1 : 0,
                        'pdf' => isset($input['permission'][$val->menu_id]['pdf']) && $input['permission'][$val->menu_id]['pdf'] = 'on' ? 1 : 0,
                        'active' => 1,
                        'updated_by' => base64_decode(session('id'))
                    ];

                    UserPermission::where(['user_id' => $id, 'menu_id' => $val->menu_id, 'id' => $val->id])->update($list_data);
                } else {
                    $list_data = [
                        'use' => false,
                        'add' => false,
                        'update' => false,
                        'delete' => false,
                        'excel' => false,
                        'pdf' => false,
                        'active' => false,
                        'updated_by' => base64_decode(session('id'))];

                    UserPermission::where(['user_id' => $id, 'menu_id' => $val->menu_id, 'id' => $val->id])->update($list_data);
                }
            }
        } catch (\Exception $e) {
//                dd($e->getMessage());
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }
    }
}
