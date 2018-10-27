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
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-supervisor">
                    @if(isset($data['supervisors']) && !empty(array_get($data, 'supervisors')))
                        @foreach(array_get($data, 'supervisors') as $key => $value)
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input supervisor_name"
                                           name="supervisors[{{ $key }}][name]"
                                           placeholder="{{ trans('main.name') }}"
                                           value="{{ array_get($value , 'name') }}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input supervisor_company"
                                           name="supervisors[{{ $key }}][company]"
                                           placeholder="{{ trans('main.company_name') }}"
                                           value="{{ array_get($value , 'company') }}">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input supervisor_tel"
                                           name="supervisors[{{ $key }}][tel]"
                                           placeholder="{{ trans('main.tel') }}"
                                           value="{{ array_get($value , 'tel') }}">
                                </div>
                                @if($key == 0)
                                    <div class="col-lg-1">
                                        <button class="btn btn-success btn-add-supervisor m-btn m-btn--icon
                            m-btn--icon-only">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="col-lg-1">
                                        <button
                                            class="btn btn-danger btn-delete-owner m-btn m-btn--icon m-btn--icon-only"
                                            onclick="remove_supervisor(this)">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input supervisor_name"
                                       name="supervisors[0][name]"
                                       placeholder="{{ trans('main.name') }}">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input supervisor_company"
                                       name="supervisors[0][company]"
                                       placeholder="{{ trans('main.company_name') }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input supervisor_tel"
                                       name="supervisors[0][tel]"
                                       placeholder="{{ trans('main.tel') }}">
                            </div>
                            <div class="col-lg-1">
                                <button class="btn btn-success btn-add-supervisor m-btn m-btn--icon
                            m-btn--icon-only">
                                    <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
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
                var count = $('.div-supervisor .form-group').length;
                var str = '<div class="form-group row">'
                    + '<input type="hidden" class="supervisor_id" value="">'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input supervisor_name" name="supervisors[' + count + '][name]" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input supervisor_company" name="supervisors[' + count + '][company]" placeholder="{{ trans('main.company_name') }}"></div>'
                    + '<div class="col-lg-3"><input type="text" class="form-control m-input supervisor_tel" name="supervisors[' + count + '][tel]" placeholder="{{ trans('main.tel') }}"></div>'
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-supervisor m-btn m-btn--icon m-btn--icon-only" onclick="remove_supervisor(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-supervisor").append(str);
            });

            $("#save-supervisor").click(function (e) { //supervisor
                e.preventDefault();
                var i = 0;
                $("#supervisor").html("");
                $(".div-supervisor .form-group").each(function () {
                    var name = $(this).find(".supervisor_name").val();
                    var company = $(this).find(".supervisor_company").val();
                    var tel = $(this).find(".supervisor_tel").val();
                    if (name == '' || company == '' || tel == '') {
                        i++;
                    }
                    $("#supervisor").append(name + ' ' + company + ' ' + tel + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                }
                $("#m_modal_supervisor").modal("hide");
            });

        });

        function remove_supervisor(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
