@extends('layout.main')

@section('title')
    {{ trans('main.manage_user_permission') }}
@endsection

@section('content_title')
    {{ trans('main.manage_user_permission') }}
@endsection

@section('content')
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet" type="text/css">--}}
    {{--<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">--}}
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-12">
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid"
                                           placeholder="Search..." id="custom_search"
                                           onkeyup='window.LaravelDataTables["dataTableBuilder_user_permission"].draw()'>
                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <button type="button"
                                class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
                                id="btn-refresh" style="margin-right: 10px"
                                onclick='window.LaravelDataTables["dataTableBuilder_user_permission"].ajax.reload()'>
                        <span>
                            <i class="fa flaticon-refresh"></i>
                        </span>
                        </button>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <div class="m_datatable m-datatable m-datatable--default table table-bordered table-hover m-datatable--subtable m-datatable--loaded m-datatable--scroll"
                 id="local_data" style="">
                {!! $dataTable->table(['class' => 'table table-bordered table-responsive', 'id' => 'dataTableBuilder_user_permission'])  !!}
            </div>
            <!--end: Datatable -->
        </div>
    </div>
    @include('partial.confirm_delete')
    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush
@endsection
