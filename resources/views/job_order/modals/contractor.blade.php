<div class="modal fade" id="m_modal_contractor" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ trans('main.contractor') }} ({{ trans('main.employee') }})
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <input type="hidden" id="contractor_list" name="contractor_list">
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-contractor">
                    @if(isset($data['contractor']) && !empty(array_get($data, 'contractor')))
                        @foreach(array_get($data, 'contractor') as $key => $value)
                            <div class="form-group row">
                                <input type="hidden" class="owner_id"
                                       value="{{ array_get($value , 'id') }}">
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input contractor_name"
                                           placeholder="{{ trans('main.name') }}"
                                           value="{{ array_get($value , 'name') }}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input contractor_company"
                                           placeholder="{{ trans('main.company_name') }}"
                                           value="{{ array_get($value , 'company_name') }}">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input contractor_tel"
                                           placeholder="{{ trans('main.tel') }}"
                                           value="{{ array_get($value , 'tel') }}">
                                </div>
                                @if($key == 0)
                                    <div class="col-lg-1">
                                        <button class="btn btn-success btn-add-contractor m-btn m-btn--icon
                            m-btn--icon-only">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="col-lg-1">
                                        <button
                                            class="btn btn-danger btn-delete-owner m-btn m-btn--icon m-btn--icon-only"
                                            onclick="remove_contractor(this)">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="form-group row">
                            <input type="hidden" class="contractor_id" value="">
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input contractor_name"
                                       placeholder="{{ trans('main.name') }}">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input contractor_company"
                                       placeholder="{{ trans('main.company_name') }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input contractor_tel"
                                       placeholder="{{ trans('main.tel') }}">
                            </div>
                            <div class="col-lg-1">
                                <button class="btn btn-success btn-add-contractor m-btn m-btn--icon
                            m-btn--icon-only">
                                    <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <!--                <button type="button" class="btn btn-metal clear" data-action="clear" style="margin-right: 30px">
                                    Clear
                                </button>-->
                <button type="button" class="btn btn-primary" id="save-contractor">
                    {{ trans('main.save') }}
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $(".btn-add-contractor").click(function (e) {
                e.preventDefault();
                var str = '<div class="form-group row">'
                    + '<input type="hidden" class="contractor_id" value="">'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input contractor_name" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input contractor_company" placeholder="{{ trans('main.company_name') }}"></div>'
                    + '<div class="col-lg-3"><input type="text" class="form-control m-input contractor_tel" placeholder="{{ trans('main.tel') }}"></div>'
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-contractor m-btn m-btn--icon m-btn--icon-only" onclick="remove_contractor(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-contractor").append(str);
            });

            $("#save-contractor").click(function (e) {
                e.preventDefault();
                var temp = [];
                var i = 0;
                $("#contractor").html("");
                $(".div-contractor .form-group").each(function () {
                    var id = $(this).find(".contractor_id").val();
                    var name = $(this).find(".contractor_name").val();
                    var company = $(this).find(".contractor_company").val();
                    var tel = $(this).find(".contractor_tel").val();
                    if (name == "" || company == "" || tel == "") {
                        i++;
                    } else {
                        var objTemp = {};
                        objTemp.id = id;
                        objTemp.name = name;
                        objTemp.company_name = company;
                        objTemp.tel = tel;
                        temp.push(objTemp);
                    }
                    $("#contractor").append(name + "  " + company + "  " + tel + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                } else {
                    $("#contractor_list").val(JSON.stringify(temp));
                    $("#contractor_list").css("border", "");
                }
                $("#m_modal_contractor").modal("hide");
            });

        });

        function remove_contractor(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
