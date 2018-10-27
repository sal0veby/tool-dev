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
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-taskmaster">
                    @if(isset($data['taskmasters']) && !empty(array_get($data, 'taskmasters')))
                        @foreach(array_get($data, 'taskmasters') as $key => $value)
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input taskmaster_name"
                                           name="taskmasters[{{ $key }}][name]"
                                           placeholder="{{ trans('main.name') }}"
                                           value="{{ array_get($value , 'name') }}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input taskmaster_company"
                                           name="taskmasters[{{ $key }}][company]"
                                           placeholder="{{ trans('main.company_name') }}"
                                           value="{{ array_get($value , 'company') }}">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input taskmaster_tel"
                                           name="taskmasters[{{ $key }}][tel]"
                                           placeholder="{{ trans('main.tel') }}"
                                           value="{{ array_get($value , 'tel') }}">
                                </div>
                                @if($key == 0)
                                    <div class="col-lg-1">
                                        <button class="btn btn-success btn-add-taskmaster m-btn m-btn--icon
                            m-btn--icon-only">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="col-lg-1">
                                        <button
                                            class="btn btn-danger btn-delete-owner m-btn m-btn--icon m-btn--icon-only"
                                            onclick="remove_taskmaster(this)">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input taskmaster_name"
                                       name="taskmasters[0][name]"
                                       placeholder="{{ trans('main.name') }}">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input taskmaster_company"
                                       name="taskmasters[0][company]"
                                       placeholder="{{ trans('main.company_name') }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input taskmaster_tel"
                                       name="taskmasters[0][tel]"
                                       placeholder="{{ trans('main.tel') }}">
                            </div>
                            <div class="col-lg-1">
                                <button class="btn btn-success btn-add-taskmaster m-btn m-btn--icon
                            m-btn--icon-only">
                                    <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
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
                var count = $('.div-taskmaster .form-group').length;
                var str = '<div class="form-group row">'
                    + '<input type="hidden" class="taskmaster_id" value="">'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input taskmaster_name" name="taskmasters[' + count + '][name]" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input taskmaster_company" name="taskmasters[' + count + '][company]" placeholder="{{ trans('main.company_name') }}"></div>'
                    + '<div class="col-lg-3"><input type="text" class="form-control m-input taskmaster_tel" name="taskmasters[' + count + '][tel]" placeholder="{{ trans('main.tel') }}"></div>'
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-taskmaster m-btn m-btn--icon m-btn--icon-only" onclick="remove_taskmaster(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-taskmaster").append(str);
            });

            $("#save-taskmaster").click(function (e) {
                e.preventDefault();
                var i = 0;
                $("#taskmaster").html("");
                $(".div-taskmaster .form-group").each(function () {
                    var name = $(this).find(".taskmaster_name").val();
                    var company = $(this).find(".taskmaster_company").val();
                    var tel = $(this).find(".taskmaster_tel").val();
                    if (name == '' || company == '' || tel == '') {
                        i++;
                    }
                    $("#taskmaster").append(name + ' ' + company + ' ' + tel + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                }
                $("#m_modal_taskmaster").modal("hide");
            });

        });

        function remove_taskmaster(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
