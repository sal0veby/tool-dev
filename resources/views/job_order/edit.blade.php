@extends('layout.main')

@section('title')
    {{ trans('main.job_list') }}
@endsection

@section('content_title')
    {{ trans('main.job_list') }}
@endsection

@section('content')
    <style>
        .m-portlet .m-portlet__body {
            padding: 1.2rem 2.2rem;
        }
    </style>

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
                            <form class="" method="post"
                                  action="{{ route('job_list.update',['id' => array_get($data , 'id')]) }}"
                                  autocomplete="off">
                                @csrf

                                <input type="hidden" name="process_id" disabled_1
                                       value="{{ array_get($data , 'process_next_id') }}" {{ array_get($data , 'disabled_1') }}>
                                <input type="hidden" name="state_id"
                                       value="{{ array_get($data , 'state_next_id') }} {{ array_get($data , 'disabled_1') }}">
                                {{--<input type="hidden" name="created_by" value="">--}}

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
                                            <button type="button" class="btn btn-info btn-sm active pull-right"
                                                    data-toggle="modal" data-target="#m_modal_supervisor"
                                                {{ !empty(array_get($data , 'disabled_1')) ? 'hidden' : '' }}>
                                                <i class="la la-plus" style="font-weight: bold"></i>
                                                {{ trans('main.add') . trans('main.supervisor') }}
                                            </button>
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
                                            <button type="button" class="btn btn-info btn-sm active pull-right"
                                                    data-toggle="modal" data-target="#m_modal_contractor"
                                                {{ !empty(array_get($data , 'disabled_1')) ? 'hidden' : '' }}>
                                                <i class="la la-plus" style="font-weight: bold"></i>
                                                {{ trans('main.add') . trans('main.contractor') }}
                                            </button>
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
                                            <button type="button" class="btn btn-info btn-sm active pull-right"
                                                    data-toggle="modal" data-target="#m_modal_taskmaster"
                                                {{ !empty(array_get($data , 'disabled_1')) ? 'hidden' : '' }}>
                                                <i class="la la-plus" style="font-weight: bold"></i>
                                                {{ trans('main.add') . trans('main.taskmaster') }}
                                            </button>
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
                                            <button type="button" class="btn btn-info btn-sm active pull-right"
                                                    data-toggle="modal" data-target="#m_modal_participants"
                                                {{ !empty(array_get($data , 'disabled_1')) ? 'hidden' : '' }}>
                                                <i class="la la-plus" style="font-weight: bold"></i>
                                                {{ trans('main.add') . trans('main.participants') }}
                                            </button>
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
                                            <button type="button" class="btn btn-info btn-sm active pull-right"
                                                    data-toggle="modal" data-target="#m_modal_car_registration"
                                                {{ !empty(array_get($data , 'disabled_1')) ? 'hidden' : '' }}>
                                                <i class="la la-plus" style="font-weight: bold"></i>
                                                {{ trans('main.add') . trans('main.car_registration') }}
                                            </button>
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
                                        <button type="submit"
                                                class="btn btn-primary m--margin-right-20" {{ !empty(array_get($data , 'disabled_1')) ? 'hidden' : '' }}>
                                            {{ trans('main.approve') }}
                                        </button>
                                        <a href="{{ route('job_list.index') }}" class="btn btn-danger">
                                            {{ trans('main.back') }}
                                        </a>
                                    </div>
                                </div>

                                @include('job_order.modals.owner')
                                @include('job_order.modals.supervisor')
                                @include('job_order.modals.contractor')
                                @include('job_order.modals.taskmaster')
                                @include('job_order.modals.participants')
                                @include('job_order.modals.car_registration')
                                @include('job_order.license_hot_work.create_hot_work')

                            </form>
                        </div>
                    </div>
                </div>
                <!--end: Search Form -->
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $('document').ready(function () {

                $('#class_id').change(function () {
                    $.get('{{ route('job_list.getLocationList') }}', {'class_id': $(this).val()}, function ($response) {
                        $('#location_id').html('');
                        if ($response) {
                            var str = '<option value="">----- Please select -----</option>';
                            $.each($response, function ($k, $val) {
                                str += '<option value="' + $val.id + '">' + $val.name + '</option>';
                            })
                            $('#location_id').append(str);
                        } else {
                            $('#location_id').append('<option value="">----- Please select -----</option>');
                        }

                        $('#location_id').append('<option value="99">{{ trans('main.other') }}</option>');
                    })

                    $("#description_location").attr("disabled", true);
                    $("#description_location").val("");

                    $("#description_work_type").attr("disabled", true);
                    $("#description_work_type").val("");

                    $('#work_type_id').html('');
                    $('#work_type_id').append('<option value="">----- Please select -----</option>');
                    $('#work_type_id').append('<option value="99">{{ trans('main.other') }}</option>');
                })

                $('#location_id').change(function () {
                    if ($(this).val() == "99") {
                        $("#description_location").attr("disabled", false);
                    } else {
                        if ($(this).val() != "") {
                            $.get('{{ route('job_list.getWorkTypeList') }}',
                                {'class_id': $('#class_id').val(), 'location_id': $(this).val()}, function ($response) {
                                    $('#work_type_id').html('');
                                    if ($response) {
                                        var str = '<option value="">----- Please select -----</option>';
                                        $.each($response, function ($k, $val) {
                                            str += '<option value="' + $val.id + '">' + $val.name + '</option>';
                                        })
                                        $('#work_type_id').append(str);
                                    } else {
                                        $('#work_type_id').append('<option value="">----- Please select -----</option>');
                                    }

                                    $('#work_type_id').append('<option value="99">{{ trans('main.other') }}</option>');
                                });
                        }

                        $("#description_location").attr("disabled", true);
                        $("#description_location").val("");
                    }
                });

                $('#work_type_id').change(function () {
                    if ($(this).val() == "99") {
                        $("#description_work_type").attr("disabled", false);
                    } else {
                        $("#description_work_type").attr("disabled", true);
                        $("#description_work_type").val("");
                    }
                });


                // input group layout
                $('#coming_date').datepicker({
                    todayHighlight: true,
                    autoclose: true,
                    startDate: new Date(),
                    orientation: "bottom left",
                    format: 'dd/mm/yyyy',
                    templates: {
                        leftArrow: '<i class="la la-angle-left"></i>',
                        rightArrow: '<i class="la la-angle-right"></i>'
                    }
                });

                $('#FromTime').timepicker({
                    showMeridian: false,
                    defaultTime: '00:00',
                    timeFormat: 'HH:mm',
                });

                $("#ToTime").timepicker({
                    timeFormat: 'HH:mm',
                    showMeridian: false,
                    defaultTime: '00:00',
                });

                $('.hot_work').change(function () {
                    if ($(this).val() == 1) {
                        $('#btn_hot_work').attr("hidden", false);
                    } else {
                        $('#btn_hot_work').attr("hidden", true);
                    }
                });

            })
        </script>
    @endpush

@endsection
