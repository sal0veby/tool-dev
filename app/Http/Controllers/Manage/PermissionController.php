<?php

namespace App\Http\Controllers\Manage;

use App\DataTables\PermissionTable;
use App\Http\Requests\PermissionRequest;
use App\Models\Menu;
use App\Models\Permission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{

    public function __construct()
    {

    }

    public function index(PermissionTable $table)
    {
        return $table->render('manage.permission.index');
    }

    public function create()
    {
        $menu = Menu::get()->toTree();
        return view('manage.permission.create', compact('menu'));
    }

    public function store(PermissionRequest $permissionRequest)
    {
        $input = $permissionRequest->all();

        $data = [
            'name' => $input['name'],
            'description' => !empty($input['description']) ? $input['description'] : "",
            'active' => $input['active'] = 'on' ? 1 : 0,
            'created_by' => base64_decode(session('id'))];

        $permission_id = Permission::create($data)->id;

        if (isset($input['permission'])) {
            $this->map_permission($input, $permission_id, 'add');
        }

        return redirect('permission')->with('success', trans('error_message.save_success'));
    }

    public function show($id)
    {
        $result = Permission::with(['children'])->where('id', $id)->first();
        if (!empty($result['children'])) {
            $result['children'] = $result->relationsToArray();
        }
        $menu = Menu::get()->toTree();

        return view('manage.permission.view', compact('result', 'menu'));
    }

    public function edit($id)
    {
        $result = Permission::with(['children'])->where('id', $id)->first();
        if (!empty($result['children'])) {
            $result['children'] = $result->relationsToArray();
        }
        $menu = Menu::get()->toTree();

        return view('manage.permission.edit', compact('result', 'menu'));
    }

    public function update($id, PermissionRequest $permissionRequest)
    {
        $input = $permissionRequest->all();

        $data = [
            'name' => $input['name'],
            'description' => !empty($input['description']) ? $input['description'] : "",
            'active' => $input['active'] = 'on' ? 1 : 0,
            'updated_by' => base64_decode(session('id'))];
        Permission::where('id', $id)->update($data);

        $permission_id = $id;

        $this->map_permission($input, $permission_id, 'update');

        return redirect('permission')->with('success', trans('error_message.save_success'));
    }

    public function destroy($id)
    {
        try {
            Permission::where('id', $id)->update(['active' => false]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }
        return redirect('permission')->with('success', trans('error_message.save_success'));
    }

    public function map_permission($input, $permission_id, $action = NULL)
    {
        $menu = Menu::get();
        try { // $menu
            $list_data = [];
            foreach ($menu as $index => $val) {
                if (array_key_exists($val->id, $input['permission'])) {
                    $list_data[$val->id] = [
                        'parent_id' => $permission_id,
                        'menu_id' => $val->id,
                        'use' => isset($input['permission'][$val->id]['use']) && $input['permission'][$val->id]['use'] = 'on' ? 1 : 0,
                        'add' => isset($input['permission'][$val->id]['add']) && $input['permission'][$val->id]['add'] = 'on' ? 1 : 0,
                        'update' => isset($input['permission'][$val->id]['update']) && $input['permission'][$val->id]['update'] = 'on' ? 1 : 0,
                        'delete' => isset($input['permission'][$val->id]['delete']) && $input['permission'][$val->id]['delete'] = 'on' ? 1 : 0,
                        'excel' => isset($input['permission'][$val->id]['excel']) && $input['permission'][$val->id]['excel'] = 'on' ? 1 : 0,
                        'pdf' => isset($input['permission'][$val->id]['pdf']) && $input['permission'][$val->id]['pdf'] = 'on' ? 1 : 0,
                        'active' => 1,
                        'created_by' => base64_decode(session('id'))
                    ];

                    if ($action == 'update') {
                        Permission::where(['parent_id' => $permission_id, 'menu_id' => $val->id])->update($list_data[$val->id]);
                    }
                } else {
                    $list_data[$val->id] = [
                        'parent_id' => $permission_id,
                        'menu_id' => $val->id,
                        'use' => false,
                        'add' => false,
                        'update' => false,
                        'delete' => false,
                        'excel' => false,
                        'pdf' => false,
                        'active' => false,
                        'created_by' => base64_decode(session('id'))];

                    if ($action == 'update') {
                        Permission::where(['parent_id' => $permission_id, 'menu_id' => $val->id])->update($list_data[$val->id]);
                    }
                }
            }

            if ($action != 'edit') {
                Permission::insert($list_data);
            }
        } catch (\Exception $e) {
//                dd($e->getMessage());
            return redirect()->back()->withErrors('error', trans('error_message.save_false'));
        }
    }


}
