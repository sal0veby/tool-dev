<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rule['first_name'] = 'required|string';
        $rule['last_name'] = 'required|string';
        $rule['email'] = 'required|string';
        $rule['permission_id'] = 'required|string';
        $rule['username'] = 'required|string';
        if (request('action') == 'edit') {
            return $rule;
        } else {
            $rule['password'] = 'required|min:6';
            return $rule;
        }
    }

    public function messages()
    {
        return [
            'permission_id.required' => 'กรุณาเลือก :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => trans('main.first_name'),
            'last_name' => trans('main.last_name'),
            'email' => trans('main.email'),
            'permission_id' => trans('main.permission'),
            'username' => trans('main.username'),
            'password' => trans('main.password'),
        ];
    }
}
