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
                        <form class="" method="post" action="{{ route('permission.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-5 col-md-5">
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Permission name
                                            :</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="name"
                                                   placeholder="Name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Description
                                            :</label>
                                        <div class="col-sm-7">
                                            <div class="form-check">
                                                <textarea class="form-control m-input m-input--air" id="exampleTextarea"
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-5 col-form-label">Active
                                            :</label>
                                        <div class="col-sm-7">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="active"
                                                       style="margin-top: 0.75rem;" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7">
                                    <table class="table table-striped m-table table-responsive">
                                        <thead>
                                        <tr>
                                            <th rowspan="2">Menu</th>
                                            <th rowspan="2">Sub menu</th>
                                            <th rowspan="2">Use</th>
                                            <th colspan="3">Permission</th>
                                            <th colspan="2">Export</th>
                                        </tr>
                                        <tr>
                                            <th>Add</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                            <th>Excel</th>
                                            <th>PDF</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($menu as $val)
                                            @if(!empty($val->children))
                                                @if($val->id == 2)
                                                    <tr>
                                                        <td>{{ array_get($val ,'name') }}</td>
                                                        <td></td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="use"
                                                                   name="permission[{{ array_get($val ,'id') }}][use]">
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="add"
                                                                   name="permission[{{ array_get($val ,'id') }}][add]">
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="update"
                                                                   name="permission[{{ array_get($val ,'id') }}][update]">
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="delete"
                                                                   name="permission[{{ array_get($val ,'id') }}][delete]">
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="excel"
                                                                   name="permission[{{ array_get($val ,'id') }}][excel]">
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="pdf"
                                                                   name="permission[{{ array_get($val ,'id') }}][pdf]">
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>{{ array_get($val ,'name') }}</td>
                                                        <td></td>
                                                        @if($val->name == 'Home')
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="use"
                                                                       name="permission[{{ array_get($val ,'id') }}][use]">
                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                @endif
                                                @foreach($val->children as $sub)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ array_get($sub ,'name') }}</td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="use"
                                                                   name="permission[{{ array_get($sub ,'id') }}][use]">
                                                        </td>
                                                        @if(in_array($sub->id , [4,5]))
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        @else
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="add"
                                                                       name="permission[{{ array_get($sub ,'id') }}][add]">
                                                            </td>
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="update"
                                                                       name="permission[{{ array_get($sub ,'id') }}][update]">
                                                            </td>
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="delete"
                                                                       name="permission[{{ array_get($sub ,'id') }}][delete]">
                                                            </td>
                                                        @endif
                                                        @if(in_array($sub->id , [7,8,9,10,11,12]))
                                                            <td></td>
                                                            <td></td>
                                                        @else
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="excel"
                                                                       name="permission[{{ array_get($sub ,'id') }}][excel]">
                                                            </td>
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="pdf"
                                                                       name="permission[{{ array_get($sub ,'id') }}][pdf]">
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>{{ array_get($val ,'name') }}</td>
                                                    <td></td>
                                                    <td>sdf</td>
                                                    <td>sdf</td>
                                                    <td>sdf</td>
                                                    <td>sdf</td>
                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 m--margin-top-30 text-center">
                                    <button type="submit" class="btn btn-primary m--margin-right-20">
                                        Submit
                                    </button>
                                    <a href="{{ route('permission.index') }}" class="btn btn-danger">
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
