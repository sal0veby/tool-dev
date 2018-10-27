<div role="tabpanel" class="tab-pane" id="tab2">
    <div class="form-group m-form__group row" style="border-bottom: 1px solid #e9ecef">
        <h4>
            2. ข้อพึงปฏิบัติและรายงานการตรวจสอบ
        </h4>
    </div>

    <div class="form-group m-form__group row">
        <div class="col-12">
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="1"
                            {{ isset($data['hot_work_list']['audit']) && in_array(1, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        1. กั้นบริเวณ พื้นที่ปฏิบัตงาน
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="2"
                            {{ isset($data['hot_work_list']['audit']) && in_array(2, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        2. ติดตั้งป้ายเตือนเพื่อความปลอดภัย
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" id="check-hotwork-audit-3"
                               value="3"
                            {{ isset($data['hot_work_list']['audit']) && in_array(3, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        3. เตรียมอุปกรณ์ดับเพลิง (อย่างน้อยขนาด 10 ปอนด์ 1 ถัง)
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">
                            จำนวน :
                        </label>
                        <div class="col-lg-3">
                            <input type="number" id="input-count-hotwork"
                                   name="audit[count]"
                                   class="form-control m-input" style="width: 115px;"
                                   value="{{ isset($data['hot_work_list']['audit']['count'])
                                   ? array_get($data['hot_work_list']['audit'] , 'count')
                                   : 0 }}"
                                {{ isset($data['hot_work_list']['audit']) && in_array(3, array_get($data['hot_work_list'], 'audit')) ? '' : 'disabled' }}
                                {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        </div>
                        <label class="col-lg-2 col-form-label">
                            ถัง
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="4"
                            {{ isset($data['hot_work_list']['audit']) && in_array(4, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        4. ตรวจสอบบริเวณใกล้เคียงต้องปราศจากวัตถุไวไฟ หรือวัสดุติดไฟง่าย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="5"
                            {{ isset($data['hot_work_list']['audit']) && in_array(5, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        5. หลังปฏิบัติงานต้องมีการนำวัตถุไวไฟ หรือสารไวไฟ
                        ออกจากอาคารให้เรียบร้อย
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="6"
                            {{ isset($data['hot_work_list']['audit']) && in_array(6, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        6. ตรวจสอบอุปกรณ์เครื่องมือ เช่น ตู้เชื่อม, ชุดเชื่อมแก๊ส,
                        ปลั๊กและสายไฟ ต้องอยู่ในสภาพที่ปลอดภัย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="7"
                            {{ isset($data['hot_work_list']['audit']) && in_array(7, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        7. ผู้ควบคุมงาน / ผู้เฝ้าระวังไฟ ต้องควบคุมตลอดเวลา
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="8"
                            {{ isset($data['hot_work_list']['audit']) && in_array(8, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        8. ท่อ/วาล์ว มีการเปิด - ปิดก่อนและหลังการปฏิบัติงานทุกครั้ง
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="9"
                            {{ isset($data['hot_work_list']['audit']) && in_array(9, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        9. พื้นที่ปฏิบัติงานมีการทำความสะอาดเรียบร้อย
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-4">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="10"
                               id="check-hotwork-audit-10"
                            {{ isset($data['hot_work_list']['audit']) && in_array(10, array_get($data['hot_work_list'], 'audit')) ? 'checked' : ''  }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                        10. อื่น ๆ เพื่อความปลอดภัย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group row" style="padding-left: 15px;">
                        <input type="text" id="input-together-hotwork"
                               name="audit[description]"
                               class="form-control m-input"
                               style="width: 100%"
                               value="{{ isset($data['hot_work_list']['audit']['description'])
                               ? array_get($data['hot_work_list']['audit'] , 'description')
                               : '' }}"
                            {{ isset($data['hot_work_list']['audit']) && in_array(10, array_get($data['hot_work_list'], 'audit')) ? '' : 'disabled' }}
                            {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $("#check-hotwork-audit-3").change(function () {
                if ($(this).is(":checked"))
                    $("#input-count-hotwork").attr("disabled", false);
                else
                    $("#input-count-hotwork").attr("disabled", true);
            });

            $("#check-hotwork-audit-10").change(function () {
                if ($(this).is(":checked"))
                    $("#input-together-hotwork").attr("disabled", false);
                else
                    $("#input-together-hotwork").attr("disabled", true);
            });
        })
    </script>
@endpush('scripts')
