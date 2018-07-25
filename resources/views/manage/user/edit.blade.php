@extends('layout.main')

@section('title')
    {{ trans('main.manage_user') }}
@endsection

@section('content_title')
    {{ trans('main.edit_user') }}
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

        table th[rowspan="2"] {
            text-align: center;
            vertical-align: middle;
        }

        table th[colspan="3"] {
            text-align: center;
        }

        table tbody td {
            border: 1px solid #c7cbce !important;
        }

        .checkbox {
            text-align: center;
            vertical-align: middle !important;
        }

        input[type=checkbox] {
            transform: scale(1.3);
        }

        .form-check {
            vertical-align: middle !important;
        }

        .form-check-input {
            margin-left: 0;
        }

    </style>
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right ">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <form class="" method="post" action="{{ route('user.update' , ['id' => array_get($result , 'id')])}}">
                            @csrf
                            <input type="hidden" value="edit" name="action">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('main.first_name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="first_name"
                                                   value="{{ array_get($result , 'first_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('main.last_name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="last_name"
                                                   value="{{ array_get($result , 'last_name') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('main.email') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="email"
                                                   value="{{ array_get($result , 'email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('main.tel') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tel"
                                                   value="{{ array_get($result , 'tel') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('main.company_name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="company_name"
                                                   value="{{ array_get($result , 'company_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('main.permission') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <select class="form-control m-input m-input--square" name="permission_id">
                                                <option value="" {{ array_get($result , 'company_name') == '' ? 'selected' : '' }}>
                                                    ---- Please select ----
                                                </option>
                                                @forelse($permission as $val)
                                                    <option value="{{ $val->id }}"
                                                            {{ array_get($result , 'permission_id') == $val->id ? 'selected' : '' }}
                                                    >
                                                        {{ $val->name }}
                                                    </option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="active" value="1">

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('main.username') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="username"
                                                   value="{{ array_get($result , 'username') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">{{ trans('main.password') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password"
                                                   value="{{ old('password') }}">

                                            <input type="hidden" class="form-control" name="old_password"
                                                   value="{{ array_get($result , 'password') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 m--margin-top-30 text-center">
                                    <button type="submit" class="btn btn-primary m--margin-right-20">
                                        {{ trans('main.save') }}
                                    </button>
                                    <a href="{{ route('user.index') }}" class="btn btn-danger">
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
@endsection