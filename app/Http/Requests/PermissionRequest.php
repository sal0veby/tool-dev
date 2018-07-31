<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if(request('action') == 'edit'){
            return [
                'name' => 'required|string',
                'permission' => 'required'
            ];
        }

        return [
            'name' => 'required|string|unique:permissions,name',
            'permission' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'permission.required' => 'กรุณาเลือก :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'name' => trans('main.permission_name'),
            'permission' => trans('main.permission')
        ];
    }
}
