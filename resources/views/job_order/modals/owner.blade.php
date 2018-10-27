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
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-owner">
                    @if(isset($data['owners']) && !empty(array_get($data, 'owners')))
                        @foreach(array_get($data, 'owners') as $key => $value)
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input owner_name"
                                           name="owners[{{ $key }}][name]"
                                           placeholder="{{ trans('main.name') }}"
                                           value="{{ array_get($value , 'name') }}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input owner_company"
                                           name="owners[{{ $key }}][company]"
                                           placeholder="{{ trans('main.company_name') }}"
                                           value="{{ array_get($value , 'company') }}">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input owner_tel"
                                           name="owners[{{ $key }}][tel]"
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
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input owner_name" name="owners[0][name]"
                                       placeholder="{{ trans('main.name') }}">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input owner_company" name="owners[0][company]"
                                       placeholder="{{ trans('main.company_name') }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input owner_tel" name="owners[0][tel]"
                                       placeholder="{{ trans('main.tel') }}">
                            </div>
                            <div class="col-lg-1">
                                <button type="button" class="btn btn-success btn-add-owner m-btn m-btn--icon
                            m-btn--icon-only">
                                    <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
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
                var count = $('.div-owner .form-group').length;
                var str = '<div class="form-group row">'
                    + '<input type="hidden" class="owner_id" value="">'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input owner_name" name="owners[' + count + '][name]" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input owner_company" name="owners[' + count + '][company]" placeholder="{{ trans('main.company_name') }}"></div>'
                    + '<div class="col-lg-3"><input type="text" class="form-control m-input owner_tel" name="owners[' + count + '][tel]" placeholder="{{ trans('main.tel') }}"></div>'
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-owner m-btn m-btn--icon m-btn--icon-only" onclick="remove_owner(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-owner").append(str);
            });

            $("#save-owner").click(function (e) {
                e.preventDefault();
                var i = 0;
                $("#owner").html("");
                $(".div-owner .form-group").each(function () {
                    var name = $(this).find(".owner_name").val();
                    var company = $(this).find(".owner_company").val();
                    var tel = $(this).find(".owner_tel").val();
                    if (name == '' || company == '' || tel == '') {
                        i++;
                    }
                    $("#owner").append(name + ' ' + company + ' ' + tel + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                }
                $("#m_modal_owner").modal("hide");
            });
        });

        function remove_owner(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
