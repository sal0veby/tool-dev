@extends('layout.main')

@section('title')
    {{ trans('main.job_list') }}
@endsection

@section('content_title')
    {{  trans('main.add') . trans('main.job_list') }}
@endsection

@section('content')
    <style>
        .m-portlet .m-portlet__body {
            padding: 1.2rem 2.2rem;
        }
    </style>

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
                        <form class="" method="post" action="{{ route('class.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="document_no" class="col-form-label">
                                            {{ trans('main.document_no') }} :
                                        </label>
                                        <input type="text" class="form-control m-input" readonly name="document_no"
                                               value="{{ old('name') }}">

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="reference_no" class="col-form-label">
                                            {{ trans('main.reference_no') }} ({{ trans('main.if_have') }}) :
                                        </label>
                                        <input type="text" class="form-control m-input" name="reference_no"
                                               value="{{ old('reference_no') }}">

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="created_at" class="col-form-label">
                                            {{ trans('main.created_at') . trans('main.document') }} :
                                        </label>

                                        <input type="text" class="form-control m-input" readonly value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="coming_date" class="col-form-label">
                                            {{ trans('main.coming_work_date') }} :
                                        </label>
                                        <input type='text' class="form-control m-input" name="coming_date"
                                               value="{{ old('coming_date') }}"/>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="reference_no" class="col-form-label">
                                            {{ trans('main.class') }} :
                                        </label>
                                        <select class="form-control" name="class_id" id="class_id">
                                            <option value="" {{ old('class_id') == '' ? 'selected' : '' }}>
                                                ----- Please select -----
                                            </option>
                                            @forelse($class as $val)
                                                <option value="{{ $val->id }}"
                                                    {{ old('class_id') == $val->id ? 'selected' : '' }}>
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
                                                   id="FromTime" value="{{ old('start_work_time') }}"/>
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
                                                   id="FromTime" value="{{ old('end_work_time') }}"/>
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
                                                  cols="0">{{ old('requirement') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="location_id" class="col-form-label">
                                            {{ trans('main.location') }} :
                                        </label>

                                        <select class="form-control" name="location_id" id="location_id">
                                            <option value="" {{ old('location_id') == '' ? 'selected' : '' }}>
                                                ----- Please select -----
                                            </option>
                                            <option value="99" {{ old('location_id') == '99' ? 'selected' : '' }}>
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
                                               value="{{ old('description_location') }}" disabled/>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-4">
                                    <div class="form-group">
                                        <label for="work_type_id" class="col-form-label">
                                            {{ trans('main.work_type') }} :
                                        </label>

                                        <select class="form-control" name="work_type_id" id="work_type_id">
                                            <option value="" {{ old('work_type_id') == '' ? 'selected' : '' }}>
                                                ----- Please select -----
                                            </option>
                                            <option value="99" {{ old('work_type_id') == '99' ? 'selected' : '' }}>
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
                                               value="{{ old('description_work_type') }}" disabled/>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 m--margin-top-30 text-center">
                                    <button type="submit" class="btn btn-primary m--margin-right-20">
                                        {{ trans('main.save') }}
                                    </button>
                                    <a href="{{ route('class.index') }}" class="btn btn-danger">
                                        {{ trans('main.back') }}
                                    </a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
        </div>
    </div>


    @push('scripts')
        <script>
            $('document').ready(function () {

                $('#class_id').change(function () {
                    $.get('{{ route('location.getLocationList') }}', {'class_id': $(this).val()}, function ($response) {
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
                            $.get('{{ route('work_type.getWorkTypeList') }}',
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

            })
        </script>
    @endpush

@endsection
