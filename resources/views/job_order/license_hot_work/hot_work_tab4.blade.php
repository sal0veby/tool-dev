<div role="tabpanel" class="tab-pane" id="tab4">
    <div class="form-group m-form__group row" style="border-bottom: 1px solid #e9ecef">
        <h4>
            4. ยืนยันในการปฏิบัติตามกฎ:
        </h4>
    </div>

    <div class="col-12">
        <div class="row form-group">
            <label class="col-form-label">
                4.1
                ข้าพเจ้าเข้าใจในสิ่งที่ต้องปฏิบัติตามระเบียบแล้วและได้อธิบายผู้รับเหมา/ผู้ปฏิบัติงานถือปฏิบัติโดยเคร่งครัด
            </label>
        </div>
        <div class="row form-group">
            <label class="col-lg-1 col-md-1 col-form-label">
                ลงชื่อ:
            </label>
            <div class="col-lg-4 col-md-4">
                <input type="text" class="form-control m-input" name="owner_name_end"
                       value="{{ isset($data['hot_work_list']['owner_name_end'])
                       ? array_get($data['hot_work_list'] , 'owner_name_end')
                       : '' }}"
                    {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
            </div>
            <label class="col-lg-4 col-md-4 col-form-label">
                ผู้ขออนุญาต / เจ้าของงาน
            </label>
        </div>
        <div class="row form-group">
            <label class="col-lg-1 col-md-1 col-form-label">
                ลงชื่อ:
            </label>
            <div class="col-lg-4 col-md-4">
                <input type="text" class="form-control m-input" name="contractor_name"
                       value="{{ isset($data['hot_work_list']['contractor_name']) ? array_get($data['hot_work_list'] , 'contractor_name') : '' }}"
                    {{ isset($data['disabled_1']) ? array_get($data , 'disabled_1') : '' }}>
            </div>
            <label class="col-lg-4 col-md-4 col-form-label">
                ผู้รับเหมา ( รับทราบ )
            </label>
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
