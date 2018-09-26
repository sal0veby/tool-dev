@extends('layout.main')

@section('title')
    {{ trans('main.job_list') }}
@endsection

@section('content_title')
    {{ trans('main.job_list') }}
@endsection

@section('content')

    <style>
        .m-portlet .m-portlet__body {
            padding: 1.2rem 2.2rem;
        }
    </style>
    <form class="" method="post"
          action="{{ route('job_list.update',['id' => array_get($data , 'id')]) }}">
        @csrf

        <input type="hidden" name="process_id" disabled_1
               value="{{ array_get($data , 'process_next_id') }}">
        <input type="hidden" name="state_id"
               value="{{ array_get($data , 'state_next_id') }}">

        <input type="hidden" name="disabled_1" value="{{ array_get($data , 'disabled_1') }}">
        <input type="hidden" name="disabled_2" value="{{ array_get($data , 'disabled_2') }}">
        <input type="hidden" name="disabled_3" value="{{ array_get($data , 'disabled_3') }}">

        @include('job_order.tab_steps.step1')
        @include('job_order.tab_steps.step2')
        @include('job_order.tab_steps.step3')

    </form>
    @push('scripts')
        <script src="{!! asset("js/function_tabs.js") !!}" type="text/javascript"></script>
    @endpush

@endsection
