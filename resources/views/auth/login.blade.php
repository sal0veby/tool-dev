<html>
<head>
    <title>{{ env('APP_NAME') }} - Login</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <link href="{!! asset("css/vendors.bundle.css") !!}" rel="stylesheet" type="text/css"/>
    <link href="{!! asset("css/style.bundle.css") !!}" rel="stylesheet" type="text/css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <script src="{!! asset("js/template/vendors.bundle.js") !!}" type="text/javascript"></script>
    <script src="{!! asset("js/template/scripts.bundle.js") !!}" type="text/javascript"></script>
    <script src="{!! asset("js/sweetalert2.all.min.js") !!}" type="text/javascript"></script>

    <style>
        body {
            background: linear-gradient(to bottom, rgba(254, 0, 2, 0.5), rgba(254, 0, 2, 1));
        }

        .m-login.m-login--2.m-login-2--skin-2 .m-login__container .m-login__head .m-login__title {
            color: #ffffff;
        }
    </style>

</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<!-- begin:: Page -->
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2"
     id="m_login" style="">
    <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
        <div class="m-login__container">
            <div class="m-login__logo">
                <a href="#">
                    <img src="./assets/app/media/img//logos/logo-1.png">
                </a>
            </div>
            <div class="m-login__signin">
                <div class="m-login__head">
                    <h3 class="m-login__title">Sign In To Admin</h3>
                </div>
                <form class="m-login__form m-form" method="post" action="{{ route('login') }}"
                      aria-label="{{ __('Login') }}">
                    @csrf
                    <div class="form-group m-form__group">
                        <input class="form-control m-input" type="text" placeholder="Username" name="username"
                               autocomplete="off" value="{{ old('username') }}">
                    </div>
                    <div class="form-group m-form__group">
                        <input class="form-control m-input m-login__form-input--last" type="password"
                               placeholder="Password" name="password">
                    </div>
                    <div class="row m-login__form-sub">
                        <div class="col m--align-left m-login__form-left">
                            <a href="javascript:;" id="m_login_forget_password" class="m-link" style="color: #ffffff">Forget
                                Password ?</a>
                        </div>
                    </div>
                    <div class="m-login__form-action">
                        <button id="m_login_signin_submit"
                                class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        @if ($errors->has('username'))
        swal({
            position: 'center',
            type: 'error',
            title: '{{ $errors->first('username') }}',
            showConfirmButton: false,
            timer: 2500
        });
        @endif

        @if ($errors->has('password'))
        swal({
            position: 'center',
            type: 'error',
            title: '{{ $errors->first('password') }}',
            showConfirmButton: false,
            timer: 2500
        });
        @endif

        {{--@if(Session::has('error'))--}}
        {{--swal({--}}
        {{--position: 'center',--}}
        {{--type: 'error',--}}
        {{--title: '{!! Session::get('error') !!}',--}}
        {{--showConfirmButton: false,--}}
        {{--timer: 2500--}}
        {{--});--}}
        {{--@endif--}}

    });
</script>

</body>
</html>



