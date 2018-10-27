<div role="tabpanel" class="tab-pane active" id="tab1">
    <div class="form-group m-form__group row" style="border-bottom: 1px solid #e9ecef">
        <h4>
            1. รายละเอียดเบื้องต้น
        </h4>
    </div>

    <div class="form-group m-form__group row">
        <label class="col-lg-2 col-form-label">
            ผู้ขออนุญาต:
        </label>
        <div class="col-lg-4">
            <input type="text" class="form-control m-input" name="owner_name"
                   value="{{ isset($data['hot_work_list']['owner_name']) ?
                    array_get($data['hot_work_list'] , 'owner_name') : '' }}"
                {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }} >
        </div>
        <label class="col-lg-2 col-form-label">
            หน่วยงาน:
        </label>
        <div class="col-lg-4">
            <input type="text" class="form-control m-input" name="department"
                   value="{{ isset($data['hot_work_list']['department']) ?
                    array_get($data['hot_work_list'] , 'department') : ''}}"
                {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <div class="col-12" style="border-bottom: 1px solid #e9ecef">
            <h5>
                รายละเอียดของงาน
            </h5>
        </div>
    </div>

    <div class="form-group m-form__group row">
        <div class="col-12">
            <textarea class="form-control" name="work_description" rows="5" cols="0"
                      placeholder="รายละเอียดของงาน" {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>{{ isset($data['hot_work_list']['work_description']) ?
                    array_get($data['hot_work_list'] , 'work_description') : ''}}</textarea>
        </div>
    </div>


    <div class="form-group m-form__group row">
        <div class="col-12" style="border-bottom: 1px solid #e9ecef">
            <h5>
                อุปกรณ์หรือเครื่องมือที่ใช้ทำงาน เช่น ตู้เชื่อมไฟฟ้า, ชุดเชื่อมแก๊ส, หินเจีย, ไฟเบอร์ตัด
            </h5>
        </div>
    </div>

    <div class="form-group m-form__group row" id="div_tools">
        <div class="col-12">
            <input type="text" class="form-control m-input tool_name" data-role="tagsinput"
                   placeholder="{{ trans('main.equipment_or_tools') }}" name="tool"
                   value="{{ isset($data['hot_work_list']['tool']) ? array_get($data['hot_work_list'] , 'tool') : '' }}"
                {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }} >
        </div>
    </div>
</div>

