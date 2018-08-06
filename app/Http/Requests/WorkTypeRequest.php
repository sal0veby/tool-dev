<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkTypeRequest extends FormRequest
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
            'class_id' => 'required',
            'location_id' => 'required',
            'name' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'class_id.required' => 'ข้อมูล :attribute จำเป็นต้องเลือก',
            'location_id.required' => 'ข้อมูล :attribute จำเป็นต้องเลือก'
        ];
    }

    public function attributes()
    {
        return [
            'name' => trans('main.location_name'),
            'class_id' => trans('main.class_name'),
            'location_id' => trans('main.location_name')
        ];
    }
}
