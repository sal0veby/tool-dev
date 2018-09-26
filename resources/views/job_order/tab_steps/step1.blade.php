<div class="tab" style="{{ !empty(array_get($data , 'disabled_1')) ? 'display:none' : 'display:block' }}">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        1. {{ trans('topics.customer') }} : {{ trans('topics.fill_details_job') }}
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
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="document_no" class="col-form-label">
                                        {{ trans('main.document_no') }} :
                                    </label>
                                    <input type="text" class="form-control m-input" readonly name="document_no"
                                           value="{{ array_get($data , 'document_no') }}" {{ array_get($data , 'disabled_1') }}>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="reference_no" class="col-form-label">
                                        {{ trans('main.reference_no') }} ({{ trans('main.if_have') }}) :
                                    </label>
                                    <input type="text" class="form-control m-input" name="reference_no"
                                           value="{{ array_get($data , 'reference_no') }}" {{ array_get($data , 'disabled_1') }}>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="created_at" class="col-form-label">
                                        {{ trans('main.created_at') . trans('main.document') }} :
                                    </label>

                                    <input type="text" class="form-control m-input" readonly
                                           value="{{ array_get($data , 'created_at') }}" {{ array_get($data , 'disabled_1') }}>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="coming_date" class="col-form-label">
                                        {{ trans('main.coming_work_date') }} :
                                    </label>
                                    <input type='text' class="form-control m-input" name="coming_work_date"
                                           id="coming_date"
                                           value="{{ array_get($data , 'coming_work_date') }}" {{ array_get($data , 'disabled_1') }}>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="reference_no" class="col-form-label">
                                        {{ trans('main.class') }} :
                                    </label>
                                    <select class="form-control" name="class_id"
                                            id="class_id" {{ array_get($data , 'disabled_1') }}>
                                        <option
                                            value="" {{ array_get($data , 'class_id') == '' ? 'selected' : '' }}>
                                            ----- Please select -----
                                        </option>
                                        @forelse($class as $val)
                                            <option value="{{ $val->id }}"
                                                {{ array_get($data , 'class_id') == $val->id ? 'selected' : '' }}>
                                                {{ $val->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <label for="created_at" class="col-form-label">
                                        {{ trans('main.start_time') }} :
                                    </label>

                                    <div class='input-group'>
                                        <input type='text' class="form-control m-input" name="start_work_time"
                                               id="FromTime" value="{{ array_get($data , 'start_work_time') }}"
                                            {{ array_get($data , 'disabled_1') }}>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-2">
                                <div class="form-group">
                                    <label for="created_at" class="col-form-label">
                                        {{ trans('main.end_time') }} :
                                    </label>

                                    <div class='input-group'>
                                        <input type='text' class="form-control m-input" name="end_work_time"
                                               id="ToTime" value="{{ array_get($data , 'end_work_time') }}"
                                            {{ array_get($data , 'disabled_1') }}>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="created_at" class="col-form-label">
                                        {{ trans('main.requirement') }} :
                                    </label>

                                    <textarea class="form-control" name="requirement" rows="5"
                                              {{ array_get($data , 'disabled_1') }}
                                              cols="0">{{ array_get($data , 'requirement') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="location_id" class="col-form-label">
                                        {{ trans('main.location') }} :
                                    </label>

                                    <select class="form-control" name="location_id"
                                            id="location_id" {{ array_get($data , 'disabled_1') }}>
                                        <option
                                            value="" {{ array_get($data , 'location_id') == '' ? 'selected' : '' }}>
                                            ----- Please select -----
                                        </option>
                                        @forelse($location as $val)
                                            <option value="{{ $val->id }}"
                                                {{ array_get($data , 'location_id') == $val->id ? 'selected' : '' }}>
                                                {{ $val->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                        <option
                                            value="99" {{ array_get($data , 'location_id') == '99' ? 'selected' : '' }}>
                                            {{ trans('main.other') }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8">
                                <div class="form-group">
                                    <label for="description_location" class="col-form-label">
                                        {{ trans('main.location') }} ({{ trans('main.additional') }}) :
                                    </label>
                                    <input type='text' class="form-control m-input" name="description_location"
                                           id="description_location"
                                           {{  array_get($data , 'location_id') == '99' ? '' : 'disabled' }}
                                           value="{{ array_get($data , 'description_location') }}"
                                        {{ array_get($data , 'disabled_1') }}>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="work_type_id" class="col-form-label">
                                        {{ trans('main.work_type') }} :
                                    </label>

                                    <select class="form-control" name="work_type_id"
                                            id="work_type_id" {{ array_get($data , 'disabled_1') }}>
                                        <option
                                            value="" {{ array_get($data , 'work_type_id') == '' ? 'selected' : '' }}>
                                            ----- Please select -----
                                        </option>
                                        @forelse($work_type as $val)
                                            <option value="{{ $val->id }}"
                                                {{ array_get($data , 'work_type_id') == $val->id ? 'selected' : '' }}>
                                                {{ $val->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                        <option
                                            value="99" {{ array_get($data , 'work_type_id') == '99' ? 'selected' : '' }}>
                                            {{ trans('main.other') }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8">
                                <div class="form-group">
                                    <label for="description_work_type" class="col-form-label">
                                        {{ trans('main.work_type') }} ({{ trans('main.additional') }}) :
                                    </label>

                                    <input type='text' class="form-control m-input" name="description_work_type"
                                           id="description_work_type"
                                           {{  array_get($data , 'work_type_id') == '99' ? '' : 'disabled' }}
                                           value="{{ array_get($data , 'description_work_type') }}"
                                        {{ array_get($data , 'disabled_1') }}>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="owner" class="col-form-label">
                                        {{ trans('main.owner') }} ({{ trans('main.employer') }}) :
                                    </label>
                                    <button type="button" class="btn btn-info btn-sm active pull-right"
                                            data-toggle="modal" data-target="#m_modal_owner"
                                        {{ !empty(array_get($data , 'disabled_1')) ? 'hidden' : '' }}>
                                        <i class="la la-plus" style="font-weight: bold"></i>
                                        {{ trans('main.add') . trans('main.owner') }}
                                        ({{ trans('main.employer') }})
                                    </button>
                                    <textarea class="form-control" rows="5" id="owner"
                                              cols="0" disabled><?php
                                        if (!empty(array_get($data, 'owner'))) {
                                            foreach (array_get($data, 'owner') as $key => $value) {
                                                echo $value['name'] . ' ' . $value['company_name'] . ' ' . $value['tel'] . "\n";
                                            }
                                        }
                                        ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="supervisor" class="col-form-label">
                                        {{ trans('main.supervisor') }} :
                                    </label>
                                    <textarea class="form-control" rows="5" id="supervisor"
                                              cols="0" disabled><?php
                                        if (!empty(array_get($data, 'supervisor'))) {
                                            foreach (array_get($data, 'supervisor') as $key => $value) {
                                                echo $value['name'] . ' ' . $value['company_name'] . ' ' . $value['tel'] . "\n";
                                            }
                                        }
                                        ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="contractor" class="col-form-label">
                                        {{ trans('main.contractor') }} ({{ trans('main.employee') }}) :
                                    </label>
                                    <textarea class="form-control" rows="5" id="contractor"
                                              cols="0" disabled><?php
                                        if (!empty(array_get($data, 'contractor'))) {
                                            foreach (array_get($data, 'contractor') as $key => $value) {
                                                echo $value['name'] . ' ' . $value['company_name'] . ' ' . $value['tel'] . "\n";
                                            }
                                        }
                                        ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="taskmaster" class="col-form-label">
                                        {{ trans('main.taskmaster') }} :
                                    </label>
                                    <textarea class="form-control" rows="5" id="taskmaster"
                                              cols="0" disabled><?php
                                        if (!empty(array_get($data, 'taskmaster'))) {
                                            foreach (array_get($data, 'taskmaster') as $key => $value) {
                                                echo $value['name'] . ' ' . $value['company_name'] . ' ' . $value['tel'] . "\n";
                                            }
                                        }
                                        ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="participants" class="col-form-label">
                                        {{ trans('main.participants') }} :
                                    </label>
                                    <textarea class="form-control" rows="5" id="participants"
                                              cols="0" disabled><?php
                                        if (!empty(array_get($data, 'participants'))) {
                                            foreach (array_get($data, 'participants') as $key => $value) {
                                                echo $value['name'] . "\n";
                                            }
                                        }
                                        ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="car_registration" class="col-form-label">
                                        {{ trans('main.car_registration') }} :
                                    </label>
                                    <textarea class="form-control" rows="5" id="car_registration"
                                              cols="0" disabled><?php
                                        if (!empty(array_get($data, 'car_registration'))) {
                                            foreach (array_get($data, 'car_registration') as $key => $value) {
                                                echo $value['car_registration'] . "\n";
                                            }
                                        }
                                        ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="work_permit" class="col-form-label">
                                        {{ trans('main.work_permit') }} :
                                    </label>
                                    <div class="m-radio-inline">
                                        <label class="m-radio m-radio--bold">
                                            <input class="hot_work" type="radio" name="hot_work" value="0"
                                                {{ array_get($data, 'hot_work') == 0 ? 'checked' : 'checked' }}
                                                {{ array_get($data , 'disabled_1') }}>
                                            {{ trans('main.not_have') }}
                                            <span></span>
                                        </label>
                                        <label class="m-radio m-radio--bold">
                                            <input class="hot_work" type="radio" name="hot_work" value="1"
                                                {{ array_get($data, 'hot_work') == 1 ? 'checked' : '' }}
                                                {{ array_get($data , 'disabled_1') }}>
                                            {{ trans('main.have') }}
                                            <span></span>
                                        </label>

                                        <button type="button" class="btn btn-success btn-sm active pull-right"
                                                data-toggle="modal" data-target="#m_modal_hot_work"
                                                id="btn_hot_work" {{ !empty(array_get($data , 'disabled_1')) ? 'hidden' : '' }}
                                            {{ array_get($data, 'hot_work') == 1 ?: 'hidden' }}>
                                            <i class="la la-plus" style="font-weight: bold"></i>
                                            {{ trans('main.add') . trans('main.license') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 m--margin-top-30 text-center">
                                <a href="{{ route('job_list.index') }}" class="btn btn-danger">
                                    {{ trans('main.back') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 text-right">
            <button type="button" class="btn btn-info" onclick="nextStep(this)">
                {{ trans('main.next') }}
            </button>
        </div>
    </div>
</div>
