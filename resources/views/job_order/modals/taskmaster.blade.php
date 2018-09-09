<div class="modal fade" id="m_modal_taskmaster" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ trans('main.taskmaster') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <input type="hidden" id="taskmaster_list" name="taskmaster_list">
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-taskmaster">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <input type="text" class="form-control m-input taskmaster_name"
                                   placeholder="{{ trans('main.name') }}">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control m-input taskmaster_company"
                                   placeholder="{{ trans('main.company_name') }}">
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control m-input taskmaster_tel"
                                   placeholder="{{ trans('main.tel') }}">
                        </div>
                        <div class="col-lg-1">
                            <button class="btn btn-success btn-add-taskmaster m-btn m-btn--icon
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
                <button type="button" class="btn btn-primary" id="save-taskmaster">
                    {{ trans('main.save') }}
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $(".btn-add-taskmaster").click(function (e) {
                e.preventDefault();
                var str = '<div class="form-group row">'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input taskmaster_name" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input taskmaster_company" placeholder="{{ trans('main.company_name') }}"></div>'
                    + '<div class="col-lg-3"><input type="text" class="form-control m-input taskmaster_tel" placeholder="{{ trans('main.tel') }}"></div>'
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-taskmaster m-btn m-btn--icon m-btn--icon-only" onclick="remove_taskmaster(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-taskmaster").append(str);
            });

            $("#save-taskmaster").click(function (e) {
                e.preventDefault();
                var temp = [];
                var i = 0;
                $("#taskmaster").html("");
                $(".div-taskmaster .form-group").each(function () {
                    var name = $(this).find(".taskmaster_name").val();
                    var company = $(this).find(".taskmaster_company").val();
                    var tel = $(this).find(".taskmaster_tel").val();
                    if (name == "" || company == "" || tel == "") {
                        i++;
                    } else {
                        var objTemp = {};
                        objTemp.name = name;
                        objTemp.company_name = company;
                        objTemp.tel = tel;
                        temp.push(objTemp);
                    }
                    $("#taskmaster").append(name + "  " + company + "  " + tel + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                } else {
                    $("#taskmaster_list").val(JSON.stringify(temp));
                    $("#taskmaster_list").css("border", "");
                }
                $("#m_modal_taskmaster").modal("hide");
            });

        });

        function remove_taskmaster(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
