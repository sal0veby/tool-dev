@extends('layout.main')

@section('title')
    Manage Permission
@endsection

@section('content_title')
    Add Permission
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
                        <form class="" method="post" action="{{ route('user.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">First name
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="first_name"
                                                   value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Last name
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="last_name"
                                                   value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Email
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="email"
                                                   value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Tel No.
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tel"
                                                   value="{{ old('tel') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Company name
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="company_name"
                                                   value="{{ old('company_name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Permission.
                                            :</label>
                                        <div class="col-sm-8">
                                            <select class="form-control m-input m-input--square" name="permission_id">
                                                <option value="" {{ old('permission_id') == '' ? 'selected' : '' }}>
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
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" name="active" value="1">

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Username
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="username"
                                                   value="{{ old('username') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label">Password.
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password"
                                                   value="{{ old('password') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 m--margin-top-30 text-center">
                                    <button type="submit" class="btn btn-primary m--margin-right-20">
                                        Submit
                                    </button>
                                    <a href="{{ route('user.index') }}" class="btn btn-danger">
                                        Cancel
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
