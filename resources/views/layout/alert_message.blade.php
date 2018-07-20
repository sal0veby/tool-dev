@if (Session::has('success'))
    <div class="m-alert m-alert--icon alert alert-success" role="alert">
        <div class="m-alert__icon">
            <i class="icon fa fa-check"></i>
        </div>
        <div class="m-alert__text">
            Success. {!! Session::get('success') !!}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Hide"></button>
        </div>
    </div>
@endif

@if (Session::has('error'))
    <div class="m-alert m-alert--icon alert alert-danger" role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-danger"></i>
        </div>
        <div class="m-alert__text">
            {!! Session::get('error') !!}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Hide"></button>
        </div>
    </div>
@endif

@if (count($errors) > 0)
    <div class="m-alert m-alert--icon alert alert-danger" role="alert">
        <div class="m-alert__icon">
            <i class="flaticon-danger"></i>
        </div>
        <div class="m-alert__text">
            @foreach ($errors->all() as $error)
                <p>{{ '- ' . $error }}</p>
            @endforeach
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-close="alert" aria-label="Hide"></button>
        </div>
    </div>
@endif






