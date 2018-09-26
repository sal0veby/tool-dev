<div class="tab" style="{{ !empty(array_get($data , 'disabled_2')) ? 'display:none' : 'display:block' }}">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        2. {{ trans('topics.approve_job') }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right ">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>
                                    2.1 ผู้มีอำนาจอนุมัติ : บ. ทรู อินเทอร์เน็ต ดาต้า เซ็นเตอร์ (ฝ่ายบริหารอาคาร)
                                </label>
                                <div class="m-radio-inline">
                                    <label class="m-radio m-radio--solid" style="margin-right: 30px;">
                                        <input type="radio" name="step_2_1" checked value="1"
                                            {{ array_get($data['job_detail'] , 'step_2_1') == 1 ? 'checked' : '' }}
                                            {{ array_get($data , 'disabled_2') }}>
                                        อนุมัติ
                                        <span></span>
                                    </label>
                                    <label class="m-radio m-radio--solid">
                                        <input type="radio" name="step_2_1" value="0"
                                            {{ array_get($data['job_detail'] , 'step_2_1') == 0 ? 'checked' : '' }}
                                            {{ array_get($data , 'disabled_2') }}>
                                        ไม่อนุมัติ
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6" style="text-align: right;">
                                @if(array_get($data, 'hot_work') == 1)
                                    <button class="btn btn-success btn-modal_hotwork" type="button">
                                        ครวจสอบ{{ trans('main.work_permit') }}
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            {{--<div class="col-lg-6">--}}
                            <label class="col-lg-1 col-md-1 col-form-label" style="display: none">
                                ลงชื่อ:
                            </label>
                            <div class="col-lg-4 col-md-4">
                                <input type="hidden" class="form-control m-input" name="step_2_1_user"
                                       value="{{ Session::get('full_name') }}" {{ array_get($data , 'disabled_2') }}>
                            </div>
                            {{--</div>--}}
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <span style="color: red">
                                    หมายเหตุ : กรณีเป็นงานที่เสี่ยงอัคคีภัย  ต้องมีใบอนุญาตทำงานเสี่ยงภัย (เพิ่ม)
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 m--margin-top-30 text-center">
                                <button type="submit"
                                        class="btn btn-primary m--margin-right-20"
                                    {{ !empty(array_get($data , 'disabled_2')) ? 'hidden' : '' }}>
                                    {{ trans('main.' . array_get($data , 'btn-save')) }}
                                </button>
                                <a href="{{ route('job_list.index') }}" class="btn btn-danger">
                                    {{ trans('main.back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 text-left">
            <button type="button"
                    class="btn btn-warning" {{ !empty(array_get($data , 'disabled_2')) ? '' : 'hidden' }}
                    onclick="prevStep(this)">
                {{ trans('main.previous') }}
            </button>
        </div>

        @if(!empty(array_get($data , 'disabled_2')))
            <div class="col-lg-6 col-md-6 text-right">
                <button type="button" class="btn btn-info" onclick="nextStep(this)">
                    {{ trans('main.next') }}
                </button>
            </div>
        @endif
    </div>
</div>
