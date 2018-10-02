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
        $rule = [];
        if (request()->has('disabled_1') && empty(request()->get('disabled_1'))) {
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

            if (request()->has('hot_work') && request()->get('hot_work') == 1) {
                $rule['owner_name'] = 'required';
                $rule['department'] = 'required';
                $rule['description'] = 'required';
                $rule['tools'] = 'required';
                $rule['audit'] = 'required';
                $rule['owner_name_end'] = 'required';
                $rule['contractor_name'] = 'required';
            }
        }

        if (request()->has('disabled_3') && empty(request()->get('disabled_3'))) {
            $rule = [
                'step_2_2_user' => 'required',
                'step_2_2_tel' => 'required|max:10',
            ];
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
            'hot_work_list' => trans('main.work_permit'),
            'step_2_2_user' => trans('main.sign'),
            'step_2_2_tel' => trans('main.tel_number'),

            'owner_name' => 'ผู้ขออนุญาต',
            'department' => 'หน่วยงาน',
            'description' => 'รายละเอียดของงาน',
            'tools' => 'อุปกรณ์หรือเครื่องมือที่ใช้ทำงาน',
            'audit' => 'ข้อพึงปฏิบัติและรายงานการตรวจสอบ',
            'safety' => 'อุปกรณ์ความปลอดภัยส่วนบุคคล',
            'owner_name_end' => 'ผู้ขออนุญาต / เจ้าของงาน',
            'contractor_name' => 'ผู้รับเหมา ( รับทราบ )',
        ];
    }

    public function messages()
    {
        return [
            'class_id.required' => 'ข้อมูล :attribute จำเป็นต้องเลือก',
            'location_id.required' => 'ข้อมูล :attribute จำเป็นต้องเลือก',
            'work_type_id.required' => 'ข้อมูล :attribute จำเป็นต้องเลือก',

            'owner_name.required' => 'ข้อมูล :attribute ใน' . trans('main.work_permit') . ' จำเป็นต้องกรอก',
            'department.required' => 'ข้อมูล :attribute ใน' . trans('main.work_permit') . ' จำเป็นต้องกรอก',
            'description.required' => 'ข้อมูล :attribute ใน' . trans('main.work_permit') . ' จำเป็นต้องกรอก',
            'tools.required' => 'ข้อมูล :attribute ใน' . trans('main.work_permit') . ' จำเป็นต้องกรอก',
            'audit.required' => 'ข้อมูล :attribute ใน' . trans('main.work_permit') . ' จำเป็นต้องเลือก',
            'safety.required' => 'ข้อมูล :attribute ใน' . trans('main.work_permit') . ' จำเป็นต้องเลือก',
            'owner_name_end.required' => 'ข้อมูล :attribute ใน' . trans('main.work_permit') . ' จำเป็นต้องกรอก',
            'contractor_name.required' => 'ข้อมูล :attribute ใน' . trans('main.work_permit') . ' จำเป็นต้องกรอก',
        ];
    }
}
