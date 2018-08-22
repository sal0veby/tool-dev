<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManageStepRequest extends FormRequest
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
        return [
            'permission_id.*' => 'required',
            'hot_work_id.*' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'permission_id.*' => trans('main.permission'),
            'hot_work_id.*' => trans('main.step_hot_work')
        ];
    }
}
