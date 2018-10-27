<div role="tabpanel" class="tab-pane" id="tab3">
    <div class="form-group m-form__group row" style="border-bottom: 1px solid #e9ecef">
        <h4>
            3. ต้องสวมใส่อุปกรณ์ความปลอดภัยส่วนบุคคล (PPE) เพิ่มเติมให้เหมาะสมกับงานดังนี้ :
        </h4>
    </div>

    <div class="form-group m-form__group row">
        <div class="col-12">
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="1"
                            {{ isset($data['hot_work_list']['safety']) && in_array(1, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        1. แว่นตานิรภัย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="2"
                            {{ isset($data['hot_work_list']['safety']) && in_array(2, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        2. หมวกนิรภัย
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="3"
                            {{ isset($data['hot_work_list']['safety']) && in_array(3, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        3. ถุงมือผ้า / หนัง / ยาง
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="4"
                            {{ isset($data['hot_work_list']['safety']) && in_array(4, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        4. ที่ครอบหู / อุดหู
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="5"
                            {{ isset($data['hot_work_list']['safety']) && in_array(5, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        5. เข็มขัดนิรภัย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="6"
                            {{ isset($data['hot_work_list']['safety']) && in_array(6, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        6. รองเท้า Safety
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="7"
                            {{ isset($data['hot_work_list']['safety']) && in_array(7, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        7. รองเท้าบู๊ทยาง
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="8"
                            {{ isset($data['hot_work_list']['safety']) && in_array(8, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        8. หน้ากากป้องกันฝุ่น
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-4">
                    <label class="m-checkbox">
                        <input type="checkbox" class="safety"
                               name="safety[]" value="9"
                               id="check-hotwork-safety"
                            {{ isset($data['hot_work_list']['safety']) && in_array(9, array_get($data['hot_work_list'], 'safety')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        9. อื่น ๆ เพื่อความปลอดภัย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group row" style="padding-left: 15px;">
                        <input type="text" id="input-safety"
                               name="safety[description]"
                               class="form-control m-input"
                               style="width: 100%"
                               value="{{ isset($data['hot_work_list']['safety']['description'])
                               ? array_get($data['hot_work_list']['safety'] , 'description')
                               : '' }}"
                            {{ isset($data['hot_work_list']['safety']) && in_array(9, array_get($data['hot_work_list'], 'safety')) ? '' : 'disabled' }}
                            {{ isset($data['disabled_1']) ? isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' : '' }}>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $("#check-hotwork-safety").change(function () {
                if ($(this).is(":checked"))
                    $("#input-safety").attr("disabled", false);
                else
                    $("#input-safety").attr("disabled", true);
            });
        })
    </script>
@endpush('scripts')
