<div class="modal fade" id="m_modal_owner" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ trans('main.owner') }} ({{ trans('main.employer') }})
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <input type="hidden" id="owner_list" name="owner_list">
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-owner">
                    @if(isset($data['owner']) && !empty(array_get($data, 'owner')))
                        @foreach(array_get($data, 'owner') as $key => $value)
                            <div class="form-group row">
                                <input type="hidden" class="owner_id"
                                       value="{{ array_get($value , 'id') }}">
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input owner_name"
                                           placeholder="{{ trans('main.name') }}"
                                           value="{{ array_get($value , 'name') }}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input owner_company"
                                           placeholder="{{ trans('main.company_name') }}"
                                           value="{{ array_get($value , 'company_name') }}">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input owner_tel"
                                           placeholder="{{ trans('main.tel') }}"
                                           value="{{ array_get($value , 'tel') }}">
                                </div>
                                @if($key == 0)
                                    <div class="col-lg-1">
                                        <button class="btn btn-success btn-add-owner m-btn m-btn--icon
                            m-btn--icon-only">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="col-lg-1">
                                        <button
                                            class="btn btn-danger btn-delete-owner m-btn m-btn--icon m-btn--icon-only"
                                            onclick="remove_owner(this)">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="form-group row">
                            <input type="hidden" class="owner_id"
                                   value="">
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input owner_name"
                                       placeholder="{{ trans('main.name') }}">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input owner_company"
                                       placeholder="{{ trans('main.company_name') }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input owner_tel"
                                       placeholder="{{ trans('main.tel') }}">
                            </div>
                            <div class="col-lg-1">
                                <button class="btn btn-success btn-add-owner m-btn m-btn--icon
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
                <button type="button" class="btn btn-primary" id="save-owner">
                    {{ trans('main.save') }}
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $(".btn-add-owner").click(function (e) {
                e.preventDefault();
                var str = '<div class="form-group row">'
                    + '<input type="hidden" class="owner_id" value="">'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input owner_name" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input owner_company" placeholder="{{ trans('main.company_name') }}"></div>'
                    + '<div class="col-lg-3"><input type="text" class="form-control m-input owner_tel" placeholder="{{ trans('main.tel') }}"></div>'
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-owner m-btn m-btn--icon m-btn--icon-only" onclick="remove_owner(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-owner").append(str);
            });

            $("#save-owner").click(function (e) {
                e.preventDefault();
                var temp = [];
                var i = 0;
                $("#owner").html("");
                $(".div-owner .form-group").each(function () {
                    var id = $(this).find(".owner_id").val();
                    var name = $(this).find(".owner_name").val();
                    var company = $(this).find(".owner_company").val();
                    var tel = $(this).find(".owner_tel").val();
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
                    $("#owner").append(name + "  " + company + "  " + tel + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                } else {
                    $("#owner_list").val(JSON.stringify(temp));
                    $("#owner_list").css("border", "");
                }
                $("#m_modal_owner").modal("hide");
            });
        });

        function remove_owner(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
