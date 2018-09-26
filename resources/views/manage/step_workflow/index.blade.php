@extends('layout.main')

@section('title')
    {{ trans('main.manage_step_job_list') }}
@endsection

@section('content_title')
    {{ trans('main.manage_step_job_list') }}
@endsection

@section('content')
    <style>
        table {
            border: 1px solid #c7cbce;
            font-size: 14px;
            font-weight: 300;
            font-family: "Poppins";
        }

        table th {
            border: 1px solid #c7cbce !important;
            text-align: center;
        }

        table td {
            text-align: center;
            vertical-align: middle !important;
        }

        table tbody td {
            border: 1px solid #c7cbce !important;
        }

    </style>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right ">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <form class="" method="post"
                              action="{{ route('manage_step.update') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <table class="table table-striped m-table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('main.step_job_list') }}</th>
                                            <th>{{ trans('main.permission') }}</th>
                                            <th style="width: 50%">{{ trans('main.step_hot_work') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @if($result->count() > 0)
                                            @for($i = 1; $i <= config('custom.number_of_steps'); $i++)
                                                <tr>
                                                    <td>
                                                        {{ trans('main.step') . ' ' . $i }}
                                                        <input name="process_hot_work_id"
                                                               value="{{ trans('main.step') . ' ' . $i }}"
                                                               type="hidden">
                                                    </td>
                                                    <td>
                                                        <select class="form-control m-input m-input--square"
                                                                name="permission_id[{{ array_get($result[$i-1] , 'id') }}]">
                                                            <option
                                                                value="" {{ array_get($result[$i-1] , 'permission_id') == '' ? 'selected' : '' }}>
                                                                ---- Please select ----
                                                            </option>
                                                            <option
                                                                value="99" {{ array_get($result[$i-1] , 'permission_id') == '99' ? 'selected' : '' }}>
                                                                {{ trans('main.general_user') }}
                                                            </option>
                                                            @forelse($permission as $val)
                                                                <option value="{{ $val->id }}"
                                                                    {{ array_get($result[$i-1] , 'permission_id') == $val->id ? 'selected' : '' }}
                                                                >
                                                                    {{ $val->name }}
                                                                </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control m-input m-input--square hot_work"
                                                                name="hot_work_id[{{ array_get($result[$i-1] , 'id') }}]"
                                                                onclick="select_hotwork(this)">
                                                            <option
                                                                value="" {{ array_get($result[$i-1] , 'process_hot_work_id') == '' ? 'selected' : '' }}>
                                                                ---- Please select ----
                                                            </option>
                                                            <option
                                                                value="step99" {{ array_get($result[$i-1] , 'process_hot_work_id') == 'step99' ? 'selected' : '' }}>
                                                                {{ trans('main.general_user') }}
                                                            </option>
                                                            @forelse($hot_work as $key => $val)
                                                                <option value="{{ $key }}"
                                                                    {{ array_get($result[$i-1] , 'process_hot_work_id') == $key ? 'selected' : '' }}
                                                                >
                                                                    {{ $val}}
                                                                </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endfor
                                        @else
                                            @for($i = 1; $i <= config('custom.number_of_steps'); $i++)
                                                <tr>
                                                    <td>{{ trans('main.step') . ' ' . $i }}</td>
                                                    <td>
                                                        <select class="form-control m-input m-input--square"
                                                                name="permission_id[]">
                                                            <option
                                                                value="" {{ old('permission_id') == '' ? 'selected' : '' }}>
                                                                ---- Please select ----
                                                            </option>
                                                            <option
                                                                value="99" {{ old('permission_id') == '99' ? 'selected' : '' }}>
                                                                {{ trans('main.general_user') }}
                                                            </option>
                                                            @forelse($permission as $val)
                                                                <option value="{{ $val->id }}"
                                                                    {{ old('permission_id') == $val->id ? 'selected' : '' }}
                                                                >
                                                                    {{ $val->name }}
                                                                </option>
                                                            @empty
                                                            @endforelse
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control m-input m-input--square hot_work"
                                                                name="hot_work_id[]" onclick="select_hotwork(this)">
                                                            <option
                                                                value="" {{ old('hot_work_id') == '' ? 'selected' : '' }}>
                                                                ---- Please select ----
                                                            </option>
                                                            {{--<option--}}
                                                                {{--value="step99" {{ old('permission_id') == '99' ? 'selected' : '' }}>--}}
{{--                                                                {{ trans('main.general_user') }}--}}
                                                            {{--</option>--}}
                                                            @forelse($hot_work as $key => $val)
                                                                <option value="{{ $key }}"
                                                                    {{ old('hot_work_id') == $key ? 'selected' : '' }}
                                                                >
                                                                    {{ $val}}
                                                                </option>
                                                            @empty
                                                            @endforelse
                                                            <option
                                                                value="98" {{ old('permission_id') == '98' ? 'selected' : '' }}>
                                                                {{ trans('main.not_have') }}
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            @endfor
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 m--margin-top-30 text-center">
                                    <button type="submit" class="btn btn-primary m--margin-right-20">
                                        {{ trans('main.save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
        </div>
    </div>

    {{--@push('scripts')--}}
        {{--<script>--}}

        {{--</script>--}}
    {{--@endpush--}}

@endsection
