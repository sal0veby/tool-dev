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
                               name="audit[]" value="1">
                        1. กั้นบริเวณ พื้นที่ปฏิบัตงาน
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="2">
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
                               value="3">
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
                                   name="audit[count]" disabled
                                   class="form-control m-input" style="width: 115px;"
                                   value="">
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
                               name="audit[]" value="4">
                        4. ตรวจสอบบริเวณใกล้เคียงต้องปราศจากวัตถุไวไฟ หรือวัสดุติดไฟง่าย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="5">
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
                               name="audit[]" value="6">
                        6. ตรวจสอบอุปกรณ์เครื่องมือ เช่น ตู้เชื่อม, ชุดเชื่อมแก๊ส,
                        ปลั๊กและสายไฟ ต้องอยู่ในสภาพที่ปลอดภัย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="7">
                        7. ผู้ควบคุมงาน / ผู้เฝ้าระวังไฟ ต้องควบคุมตลอดเวลา
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="form-inline m-checkbox-list">
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="8">
                        8. ท่อ/วาล์ว มีการเปิด - ปิดก่อนและหลังการปฏิบัติงานทุกครั้ง
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-6">
                    <label class="m-checkbox">
                        <input type="checkbox" class="audit"
                               name="audit[]" value="9">
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
                               id="check-hotwork-audit-10">
                        10. อื่น ๆ เพื่อความปลอดภัย
                        <span></span>
                    </label>
                </div>
                <div class="col-lg-8">
                    <div class="form-group row" style="padding-left: 15px;">
                        <input type="text" id="input-together-hotwork"
                               name="audit[description]" disabled
                               class="form-control m-input"
                               style="width: 100%"
                               value="">
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
