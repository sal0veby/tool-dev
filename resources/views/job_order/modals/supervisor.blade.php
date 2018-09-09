<div class="modal fade" id="m_modal_supervisor" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ trans('main.supervisor') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <input type="hidden" id="supervisor_list" name="supervisor_list">
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-supervisor">
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <input type="text" class="form-control m-input supervisor_name"
                                   placeholder="{{ trans('main.name') }}">
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control m-input supervisor_company"
                                   placeholder="{{ trans('main.company_name') }}">
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control m-input supervisor_tel"
                                   placeholder="{{ trans('main.tel') }}">
                        </div>
                        <div class="col-lg-1">
                            <button class="btn btn-success btn-add-supervisor m-btn m-btn--icon
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
                <button type="button" class="btn btn-primary" id="save-supervisor">
                    {{ trans('main.save') }}
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $(".btn-add-supervisor").click(function (e) {
                e.preventDefault();
                var str = '<div class="form-group row">'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input supervisor_name" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input supervisor_company" placeholder="{{ trans('main.company_name') }}"></div>'
                    + '<div class="col-lg-3"><input type="text" class="form-control m-input supervisor_tel" placeholder="{{ trans('main.tel') }}"></div>'
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-supervisor m-btn m-btn--icon m-btn--icon-only" onclick="remove_supervisor(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-supervisor").append(str);
            });

            $("#save-supervisor").click(function (e) {
                e.preventDefault();
                var temp = [];
                var i = 0;
                $("#supervisor").html("");
                $(".div-supervisor .form-group").each(function () {
                    var name = $(this).find(".supervisor_name").val();
                    var company = $(this).find(".supervisor_company").val();
                    var tel = $(this).find(".supervisor_tel").val();
                    if (name == "" || company == "" || tel == "") {
                        i++;
                    } else {
                        var objTemp = {};
                        objTemp.name = name;
                        objTemp.company_name = company;
                        objTemp.tel = tel;
                        temp.push(objTemp);
                    }
                    $("#supervisor").append(name + "  " + company + "  " + tel + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                } else {
                    $("#supervisor_list").val(JSON.stringify(temp));
                    $("#supervisor_list").css("border", "");
                }
                $("#m_modal_supervisor").modal("hide");
            });

        });

        function remove_supervisor(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
