@extends('layout.main')

@section('title')
    {{ trans('main.manage_work_type') }}
@endsection

@section('content_title')
    {{ trans('main.add_work_type') }}
@endsection

@section('content')
    <style>

        input[type=checkbox] {
            transform: scale(1.3);
        }

    </style>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right ">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <form class="" method="post" action="{{ route('work_type.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-4 col-form-label">{{ trans('main.class_name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="class_id" id="class_id">
                                                <option value="" {{ old('class_id') == '' ? 'selected' : '' }}>
                                                    ----- Please select -----
                                                </option>
                                                @forelse($class_list as $val)
                                                    <option value="{{ $val->id }}"
                                                        {{ old('class_id') == $val->id ? 'selected' : '' }}>
                                                        {{ $val->name }}
                                                    </option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-4 col-form-label">{{ trans('main.location_name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="location_id" id="location_id">
                                                <option value="" {{ old('location_id') == '' ? 'selected' : '' }}>
                                                    ----- Please select -----
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-4 col-form-label">{{ trans('main.work_type_name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ old('name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-4 col-form-label">{{ trans('main.active') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="active"
                                                       style="margin-top: 0.75rem;" checked>
                                            </div>
                                        </div>
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
                    })
                })
            })
        </script>
    @endpush

@endsection
