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
            <input type="hidden" id="car_registration_list" name="car_registration_list">
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-car_registration">
                    <div class="form-group row">
                        <div class="col-lg-10">
                            <input type="text" class="form-control m-input car_registration_name"
                                   placeholder="{{ trans('main.car_registration') }}">
                        </div>
                        {{--<div class="col-lg-4">--}}
                        {{--<input type="text" class="form-control m-input car_registration_company"--}}
                        {{--placeholder="{{ trans('main.company_name') }}">--}}
                        {{--</div>--}}
                        {{--<div class="col-lg-3">--}}
                        {{--<input type="text" class="form-control m-input car_registration_tel"--}}
                        {{--placeholder="{{ trans('main.tel') }}">--}}
                        {{--</div>--}}
                        <div class="col-lg-1">
                            <button class="btn btn-success btn-add-car_registration m-btn m-btn--icon
                            m-btn--icon-only">
                                <i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <!--                <button type="button" class="btn btn-metal clear" data-action="clear" style="margin-right: 30px">
                                    Clear
                                </button>-->
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
                var str = '<div class="form-group row">'
                    + '<div class="col-lg-10"><input type="text" class="form-control m-input car_registration_name" placeholder="{{ trans('main.car_registration') }}"></div>'
                    {{--+ '<div class="col-lg-4"><input type="text" class="form-control m-input car_registration_company" placeholder="{{ trans('main.company_name') }}"></div>'--}}
                    {{--+ '<div class="col-lg-3"><input type="text" class="form-control m-input car_registration_tel" placeholder="{{ trans('main.tel') }}"></div>'--}}
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-car_registration m-btn m-btn--icon m-btn--icon-only" onclick="remove_car_registration(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-car_registration").append(str);
            });

            $("#save-car_registration").click(function (e) {
                e.preventDefault();
                var temp = [];
                var i = 0;
                $("#car_registration").html("");
                $(".div-car_registration .form-group").each(function () {
                    var name = $(this).find(".car_registration_name").val();
                    if (name == "") {
                        i++;
                    } else {
                        var objTemp = {};
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
