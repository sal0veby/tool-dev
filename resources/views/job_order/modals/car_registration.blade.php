<div class="modal fade" id="m_modal_car_registration" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ trans('main.car_registration') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="col-12">
                    <div class="div-car_registration">
                        @if(isset($data['car_registrations']) && !empty(array_get($data, 'car_registrations')))
                            @foreach(array_get($data, 'car_registrations') as $key => $value)
                                <div class="form-group row">
                                    <div class="col-10">
                                        <input type="text" class="form-control m-input"
                                               name="car_registrations[{{ $key }}][name]"
                                               placeholder="{{ trans('main.name') }}"
                                               value="{{ array_get($value , 'car_registration') }}">
                                    </div>
                                    @if($key == 0)
                                        <div class="col-lg-1">
                                            <button class="btn btn-success btn-add-car_registration m-btn m-btn--icon
                            m-btn--icon-only">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    @else
                                        <div class="col-lg-1">
                                            <button
                                                class="btn btn-danger btn-delete-owner m-btn m-btn--icon m-btn--icon-only"
                                                onclick="remove_car_registration(this)">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="form-group row">
                                <div class="col-10">
                                    <input type="text" class="form-control m-input" name="car_registrations[0][name]"
                                           placeholder="{{ trans('main.car_registration') }}">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-success btn-add-car_registration m-btn m-btn--icon
                            m-btn--icon-only">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-primary" id="save-car_registration">
                    {{ trans('main.save') }}
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $(".btn-add-car_registration").click(function (e) {
                e.preventDefault();
                var count = $('.div-car_registration .form-group').length;
                var str = '<div class="form-group row">'
                    + '<input type="hidden" class="car_registration_id" value="">'
                    + '<div class="col-10"><input type="text" class="form-control m-input" name="car_registrations[' + count + '][name]" placeholder="{{ trans('main.car_registration') }}"></div>'
                    + '<div class="col-1"><button class="btn btn-danger btn-delete-car_registration m-btn m-btn--icon m-btn--icon-only" onclick="remove_car_registration(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-car_registration").append(str);
            });

            $("#save-car_registration").click(function (e) {
                e.preventDefault();
                var temp = [];
                var i = 0;
                $("#car_registration").html("");
                $(".div-car_registration .form-group").each(function () {
                    var id = $(this).find(".car_registration_id").val();
                    var name = $(this).find(".car_registration_name").val();
                    if (name == "") {
                        i++;
                    } else {
                        var objTemp = {};
                        objTemp.id = id;
                        objTemp.car_registration = name;
                        temp.push(objTemp);
                    }
                    $("#car_registration").append(name + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                } else {
                    $("#car_registration_list").val(JSON.stringify(temp));
                    $("#car_registration_list").css("border", "");
                }
                $("#m_modal_car_registration").modal("hide");
            });

        });

        function remove_car_registration(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
