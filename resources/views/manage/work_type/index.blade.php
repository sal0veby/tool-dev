@extends('layout.main')

@section('title')
    {{ trans('main.manage_work_type') }}
@endsection

@section('content_title')
    {{ trans('main.manage_work_type') }}
@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__body">
            <!--begin: Search Form -->
            <div class="m-form m-form--label-align-right m--margin-bottom-30">
                <div class="row align-items-center">
                    <div class="col-xl-8 order-2 order-xl-1">
                        <div class="form-group m-form__group row align-items-center">
                            <div class="col-md-12">
                                <form>
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input m-input--solid"
                                               placeholder="Search..." id="custom_search"
                                               onkeyup='window.LaravelDataTables["dataTableBuilder_work_type"].draw()'>
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span>
                                              <i class="la la-search"></i>
                                            </span>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                        <button type="button"
                                class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill"
                                id="btn-refresh" style="margin-right: 10px"
                                onclick='window.LaravelDataTables["dataTableBuilder_work_type"].ajax.reload()'>
                        <span>
                            <i class="fa flaticon-refresh"></i>
                        </span>
                        </button>
                        <a href="{{ route('work_type.add') }}" id="add"
                           class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-plus" style="font-weight: bold"></i>
                            <span>
                                {{ trans('main.add') }}
                            </span>
                        </span>
                        </a>
                        <div class="m-separator m-separator--dashed d-xl-none"></div>
                    </div>
                </div>
            </div>
            <!--end: Search Form -->
            <!--begin: Datatable -->
            <div
                class="m_datatable m-datatable m-datatable--default table table-bordered table-hover m-datatable--subtable m-datatable--loaded m-datatable--scroll"
                id="local_data" style="">
                {!! $dataTable->table(['class' => 'table table-bordered table-responsive', 'id' => 'dataTableBuilder_work_type'])  !!}
            </div>
            <!--end: Datatable -->
        </div>
    </div>
    @include('partial.confirm_delete')
    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush

@endsection
