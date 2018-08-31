<html>
<head>
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <link href="{!! asset("css/vendors.bundle.css") !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! asset("css/style.bundle.css") !!}" rel="stylesheet" type="text/css"/>
    <!--end::Base Styles -->
    {{--<link rel="shortcut icon" href="{!! asset("images/favicon.ico") !!}"/>--}}
    {{--<link href="{!! asset("css/style.css") !!}" rel="stylesheet" type="text/css"/>--}}
    @stack('css')

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <style>
        p {
            margin-bottom: 0px;
        }

        table th {
            text-align: center;
        }

        input[readonly] {
            border-color: #f4f5f8 !important;
            color: #6f727d !important;
            background-color: #f4f5f8 !important;
        }
    </style>
</head>
<body
    class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- begin::Header -->
@include('layout.header')

<!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- BEGIN: Left Aside -->
        @include('layout.menu')

        <div class="m-grid__item m-grid__item--fluid m-wrapper">
        @include('layout.alert_message')
        <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            @yield('content_title')
                        </h3>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<script src="{!! asset("js/template/vendors.bundle.js") !!}" type="text/javascript"></script>
<script src="{!! asset("js/template/scripts.bundle.js") !!}" type="text/javascript"></script>
<script src="{!! asset("js/template/util.js") !!}" type="text/javascript"></script>
<script src="{!! asset("js/template/app.js") !!}" type="text/javascript"></script>
<script src="{!! asset("js/template/layout.js") !!}" type="text/javascript"></script>
<script src="{!! asset("js/sweetalert2.all.min.js") !!}" type="text/javascript"></script>
{{--<script src="{!! asset("js/bootstrap-datepicker.js") !!}" type="text/javascript"></script>--}}
{{--<script src="{!! asset("js/bootstrap-timepicker.js") !!}" type="text/javascript"></script>--}}


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>

@stack('scripts')
{{--@push('scripts')--}}
<script>
    $(document).ready(function () {
        $("#m_aside_left_minimize_toggle").click(function () {
            if (localStorage.getItem("LeftAsideToggle") === null) {
                // set the item in localStorage
                localStorage.setItem('LeftAsideToggle', 1);
            } else {

            }
            // set the item in localStorage
            localStorage.setItem('test', text);
        });

        var duration = 4000; // 4 seconds
        setTimeout(function () {
            $('.m-alert').hide();
        }, duration);

        var menu = $('#m_menu').mMenu({
            // submenu settings
            submenu: {
                // breakpoints
                desktop: {
                    default: 'accordion', // by default the submenu mode set to accordion
                    state: {
                        body: 'm-aside-left--minimize', // whenever the page body has this class switch the submenu mode to dropdown
                        mode: 'dropdown'
                    }
                },
                tablet: 'accordion', // the submenu mode set to accordion for tablet
                mobile: 'accordion' // the submenu mode set to accordion for mobile
            },

            //accordion mode settings
            accordion: {
                autoScroll: true,
                expandAll: false
            }
        });

        $('body').tooltip({
            selector: '[data-toggle="tooltip"]'
        });

    })

</script>
{{--@endpush--}}

@yield('script')

</body>
</html>
