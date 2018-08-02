@extends('layout.main')

@section('title')
    {{ trans('main.manage_class') }}
@endsection

@section('content_title')
    {{ trans('main.edit_class') }}
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
                        <form class="" method="post"
                              action="{{ route('location.update' , ['id' => array_get($result , 'id')])}}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-4 col-form-label">{{ trans('main.class_name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="class_id">
                                                <option value="">
                                                    ----- Please select -----
                                                </option>
                                                @forelse($class_list as $val)
                                                    <option value="{{ $val->id }}"
                                                        {{ $result->class_id == $val->id ? 'selected' : '' }}>
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
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ $result->name }}">
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
                                                       style="margin-top: 0.75rem;" {{ $result->active == true ? 'checked' : '' }}>
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
                                    <a href="{{ route('location.index') }}" class="btn btn-danger">
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
