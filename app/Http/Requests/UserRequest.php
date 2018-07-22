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
        if (request('action') == 'edit') {

        } else {
            return [
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'permission_id' => 'required',
                'username' => 'required|unique:users,username',
                'password' => 'required| 
                               min:6',
            ];
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
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'permission_id' => 'Permission',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
