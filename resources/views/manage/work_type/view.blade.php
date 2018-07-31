@extends('layout.main')

@section('title')
    {{ trans('main.manage_class') }}
@endsection

@section('content_title')
    {{ trans('main.view_class') }}
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
                        <form class="">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-4 col-form-label">{{ trans('main.class_name') }}
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="name" disabled
                                                   value="{{  array_get($result , 'name') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group row">
                                        <label for="inputPassword"
                                               class="col-sm-3 col-form-label">{{ trans('main.active') }}
                                            :</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="active" disabled
                                                       style="margin-top: 0.75rem;" {{ array_get($result , 'active') == 1 ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 m--margin-top-30 text-center">
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
@endsection
