@extends('layout.main')

@section('title')
    {{ trans('main.manage_user_permission') }}
@endsection

@section('content_title')
    {{ trans('main.edit_user_permission') }}
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
                        <form class="" method="post"
                              action="{{ route('user_permission.update' , ['id' => array_get($result , 'id')]) }}">
                            @csrf
                            <input type="hidden" class="form-control" name="action" value="edit">
                            <div class="row">
                                <div class="col-lg-5 col-md-5">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-4 col-form-label">{{ trans('main.name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" disabled
                                                   placeholder="Name" value="{{ array_get($result , 'name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-4 col-form-label">{{ trans('main.username') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" disabled
                                                   placeholder="Name" value="{{ array_get($result , 'username') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-7">
                                    <table class="table table-striped m-table table-responsive">
                                        <thead>
                                        <tr>
                                            <th rowspan="2">{{ trans('main.menu') }}</th>
                                            <th rowspan="2">{{ trans('main.sub_menu') }}</th>
                                            <th rowspan="2">{{ trans('main.use') }}</th>
                                            <th colspan="3">{{ trans('main.permission') }}</th>
                                            <th colspan="2">{{ trans('main.export') }}</th>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('main.add') }}</th>
                                            <th>{{ trans('main.update') }}</th>
                                            <th>{{ trans('main.delete') }}</th>
                                            <th>Excel</th>
                                            <th>PDF</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($menu as $key => $val)
                                            @if(!empty($val->children))
                                                @php($key_header = array_search($val->id, array_column($result['permission'], 'menu_id')))
                                                @if($val->id == 2)
                                                    <tr>
                                                        <td>{{ array_get($val ,'name') }}</td>
                                                        <td></td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="use"
                                                                   name="permission[{{ array_get($val ,'id') }}][use]"
                                                                    {{$result['permission'][$key_header]['use'] == 1 ? 'checked' : '' }}
                                                            >
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="add"
                                                                   name="permission[{{ array_get($val ,'id') }}][add]"
                                                                    {{$result['permission'][$key_header]['add'] == 1 ? 'checked' : '' }}
                                                            >
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="update"
                                                                   name="permission[{{ array_get($val ,'id') }}][update]"
                                                                    {{$result['permission'][$key_header]['update'] == 1 ? 'checked' : '' }}
                                                            >
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="delete"
                                                                   name="permission[{{ array_get($val ,'id') }}][delete]"
                                                                    {{$result['permission'][$key_header]['delete'] == 1 ? 'checked' : '' }}
                                                            >
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="excel"
                                                                   name="permission[{{ array_get($val ,'id') }}][excel]"
                                                                    {{$result['permission'][$key_header]['excel'] == 1 ? 'checked' : '' }}
                                                            >
                                                        </td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="pdf"
                                                                   name="permission[{{ array_get($val ,'id') }}][pdf]"
                                                                    {{$result['permission'][$key_header]['pdf'] == 1 ? 'checked' : '' }}
                                                            >
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td>{{ array_get($val ,'name') }}</td>
                                                        <td></td>
                                                        @if($val->name == 'Home')
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="use"
                                                                       name="permission[{{ array_get($val ,'id') }}][use]"
                                                                        {{$result['permission'][$key_header]['use'] == 1 ? 'checked' : '' }}
                                                                >
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
                                                @foreach($val->children as $index => $sub)
                                                    @php($key_detail = array_search($sub->id, array_column($result['permission'] , 'menu_id')))
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ array_get($sub ,'name') }}</td>
                                                        <td class="checkbox">
                                                            <input type="checkbox" class="use"
                                                                   name="permission[{{ array_get($sub ,'id') }}][use]"
                                                                    {{$result['permission'][$key_detail]['use'] == 1 ? 'checked' : '' }}
                                                            >
                                                        </td>
                                                        @if(in_array($sub->id , [4,5]))
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        @else
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="add"
                                                                       name="permission[{{ array_get($sub ,'id') }}][add]"
                                                                        {{$result['permission'][$key_detail]['add'] == 1 ? 'checked' : '' }}
                                                                >
                                                            </td>
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="update"
                                                                       name="permission[{{ array_get($sub ,'id') }}][update]"
                                                                        {{$result['permission'][$key_detail]['update'] == 1 ? 'checked' : '' }}
                                                                >
                                                            </td>
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="delete"
                                                                       name="permission[{{ array_get($sub ,'id') }}][delete]"
                                                                        {{$result['permission'][$key_detail]['delete'] == 1 ? 'checked' : '' }}
                                                                >
                                                            </td>
                                                        @endif
                                                        @if(in_array($sub->id , [7,8,9,10,11,12]))
                                                            <td></td>
                                                            <td></td>
                                                        @else
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="excel"
                                                                       name="permission[{{ array_get($sub ,'id') }}][excel]"
                                                                        {{$result['permission'][$key_detail]['excel'] == 1 ? 'checked' : '' }}
                                                                >
                                                            </td>
                                                            <td class="checkbox">
                                                                <input type="checkbox" class="pdf"
                                                                       name="permission[{{ array_get($sub ,'id') }}][pdf]"
                                                                        {{$result['permission'][$key_detail]['pdf'] == 1 ? 'checked' : '' }}
                                                                >
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
                                        {{ trans('main.save') }}
                                    </button>
                                    <a href="{{ route('user_permission.index') }}" class="btn btn-danger">
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
