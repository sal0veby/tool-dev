@extends('layout.main')

@section('title')
    {{ trans('main.manage_user') }}
@endsection

@section('content_title')
    {{ trans('main.manage_user') }}
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
                                <div class="m-input-icon m-input-icon--left">
                                    <input type="text" class="form-control m-input m-input--solid"
                                           placeholder="Search..." id="m_form_search">
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
                                id="btn-refresh" style="margin-right: 10px">
                        <span>
                            <i class="fa flaticon-refresh"></i>
                        </span>
                        </button>
                        <a href="{{ route('user.add') }}" id="add"
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
            <div class="m_datatable m-datatable m-datatable--default table table-bordered table-hover m-datatable--subtable m-datatable--loaded m-datatable--scroll"
                 id="local_data" style="">
                {!! $dataTable->table(['class' => 'table table-bordered table-responsive', 'id' => 'dataTableBuilder_user'])  !!}
            </div>
            <!--end: Datatable -->
        </div>
    </div>
    @include('partial.confirm_delete')
    @push('scripts')
        <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"></script>

        {!! $dataTable->scripts() !!}
    @endpush

@endsection
