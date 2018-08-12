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
                                            <th>{{ trans('main.step_hot_work') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = 1; $i <= 6; $i++)
                                            <tr>
                                                <td>{{ trans('main.step') . ' ' . $i }}</td>
                                                <td>
                                                    <select class="form-control m-input m-input--square"
                                                            name="permission_id">
                                                        <option
                                                            value="" {{ old('permission_id') == '' ? 'selected' : '' }}>
                                                            ---- Please select ----
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
                                                            name="hot_work_id" onclick="select_hotwork(this)">
                                                        <option
                                                            value="" {{ old('hot_work_id') == '' ? 'selected' : '' }}>
                                                            ---- Please select ----
                                                        </option>
                                                        @forelse($hot_work as $key => $val)
                                                            <option value="{{ $key }}"
                                                                {{ old('hot_work_id') == $key ? 'selected' : '' }}
                                                            >
                                                                {{ $val}}
                                                            </option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </td>
                                            </tr>
                                        @endfor
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

    @push('scripts')
        <script>
            function select_hotwork(__this) {
                var _this = $(__this);
                var data = [];
                var myItems = JSON.parse('<?php echo json_encode($hot_work); ?>');
                var aaa = '';
                $(".hot_work > option:selected").each(function (index) {
                    if ($(this).val() != '') {
                        $.each(myItems, function ($k, $val) {
                            if ($.inArray($k, data) !== -1) {
                                aaa += '<option value="' + $k + '">' + $val + '</option>';
                                _this.append('<option value="' + $k + '">' + $val + '</option>');
                            }
                        });
                    }
                });

                // _this.html('');
                // _this.html('<option value="">---- Please select ----</option>');
                // var aaa = '';
                // $.each(myItems, function ($k, $val) {
                //     if ($.inArray($k, data) !== -1) {
                //         aaa += '<option value="' + $k + '">' + $val + '</option>';
                //         _this.append('<option value="' + $k + '">' + $val + '</option>');
                //     }
                // });
                console.log(aaa);

            }


            $(document).ready(function () {
                $('.hot_work').on('blur', function () {
                    var _this = $(this);
                    var data = [];
                    var myItems = JSON.parse('<?php echo json_encode($hot_work); ?>');


                    $(".hot_work > option:selected").each(function (index) {
                        if ($(this).val() != '') {
                            data.push($(this).val());
                        }
                    });

                    _this.html('');
                    _this.html('<option value="">---- Please select ----</option>');
                    var aaa = '';
                    $.each(myItems, function ($k, $val) {
                        if ($.inArray($k, data) === -1) {
                            aaa += '<option value="' + $k + '">' + $val + '</option>';
                            _this.append('<option value="' + $k + '">' + $val + '</option>');
                        }
                    });
                    console.log(aaa);
                });


                // $('.hot_work').change(function () {
                //
                //
                // })
            })
        </script>
    @endpush

@endsection
