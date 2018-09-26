<div class="tab" style="{{ !empty(array_get($data , 'disabled_3')) ? 'display:none' : 'display:block' }}">
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
                                    2.2 ผู้ตรวจสอบงาน : ที่ได้รับมอบหมายจาก (ข้อ 2.1)
                                </label>
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
                            <label class="col-lg-2 col-md-2 col-form-label">
                                {{ trans('main.sign') }} :
                            </label>
                            <div class="col-lg-4 col-md-4">
                                @php($value = !empty(array_get($data['job_detail'], 'step_2_2_user')) ? array_get($data['job_detail'], 'step_2_2_user') : Session::get('full_name'))
                                <input type="text" class="form-control m-input" name="step_2_2_user"
                                       value="{{ $value }}">
                            </div>
                            {{--</div>--}}
                        </div>
                        <div class="row form-group">
                            <label class="col-lg-2 col-md-2 col-form-label">
                                {{ trans('main.tel_number') }} :
                            </label>
                            <div class="col-lg-4 col-md-4">
                                @php($tel = !empty(array_get($data['job_detail'], 'step_2_2_tel')) ? array_get($data['job_detail'], 'step_2_2_tel') : Session::get('tel'))
                                <input type="text" class="form-control m-input" name="step_2_2_tel"
                                       value="{{ $tel }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 m--margin-top-30 text-center">
                                <button type="submit"
                                        class="btn btn-primary m--margin-right-20"
                                    {{ !empty(array_get($data , 'disabled_3')) ? 'hidden' : '' }}>
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
                    class="btn btn-warning" {{ !empty(array_get($data , 'disabled_3')) ? 'hidden' : '' }}
                    onclick="prevStep(this)">
                {{ trans('main.previous') }}
            </button>
        </div>

        @if(!empty(array_get($data , 'disabled_3')))
            <div class="col-lg-6 col-md-6 text-right">
                <button type="button" class="btn btn-info" onclick="nextStep(this)">
                    {{ trans('main.next') }}
                </button>
            </div>
        @endif
    </div>
</div>
