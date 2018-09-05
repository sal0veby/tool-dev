<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobOrderRequest extends FormRequest
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
        $rule = [
            'coming_work_date' => 'required',
            'class_id' => 'required',
            'start_work_time' => 'required',
            'end_work_time' => 'required',
            'requirement' => 'required',
            'location_id' => 'required',
            'work_type_id' => 'required',
        ];

        if (request()->has('location_id') && request()->get('location_id') == 99) {
            $rule['description_location'] = 'required';
        }

        if (request()->has('work_type_id') && request()->get('work_type_id') == 99) {
            $rule['description_work_type'] = 'required';
        }

        return $rule;
    }

    public function attributes()
    {
        return [
            'coming_work_date' => trans('main.coming_work_date'),
            'class_id' => trans('main.class'),
            'start_work_time' => trans('main.start_time'),
            'end_work_time' => trans('main.end_time'),
            'requirement' => trans('main.requirement'),
            'location_id' => trans('main.location'),
            'work_type_id' => trans('main.work_type'),
            'description_location' => trans('main.location') . '(' . trans('main.additional') . ')',
            'description_work_type' => trans('main.work_type') . '(' . trans('main.additional') . ')',
        ];
    }

    public function messages()
    {
        return [
            'class_id.required' => 'ข้อมูล :attribute จำเป็นต้องเลือก',
            'location_id.required' => 'ข้อมูล :attribute จำเป็นต้องเลือก',
            'work_type_id.required' => 'ข้อมูล :attribute จำเป็นต้องเลือก',
        ];
    }
}
