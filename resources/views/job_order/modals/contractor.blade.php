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
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="div-contractor">
                    @if(isset($data['contractors']) && !empty(array_get($data, 'contractors')))
                        @foreach(array_get($data, 'contractors') as $key => $value)
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input contractor_name"
                                           name="contractors[{{ $key }}][name]"
                                           placeholder="{{ trans('main.name') }}"
                                           value="{{ array_get($value , 'name') }}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control m-input contractor_company"
                                           name="contractors[{{ $key }}][company]"
                                           placeholder="{{ trans('main.company_name') }}"
                                           value="{{ array_get($value , 'company') }}">
                                </div>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control m-input contractor_tel"
                                           name="contractors[{{ $key }}][tel]"
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
                                       name="contractors[0][name]"
                                       placeholder="{{ trans('main.name') }}">
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control m-input contractor_company"
                                       name="contractors[0][company]"
                                       placeholder="{{ trans('main.company_name') }}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control m-input company_tel" name="contractors[0][tel]"
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
                var count = $('.div-contractor .form-group').length;
                var str = '<div class="form-group row">'
                    + '<input type="hidden" class="contractor_id" value="">'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input contractor_name" name="contractors[' + count + '][name]" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-lg-4"><input type="text" class="form-control m-input contractor_company" name="contractors[' + count + '][company]" placeholder="{{ trans('main.company_name') }}"></div>'
                    + '<div class="col-lg-3"><input type="text" class="form-control m-input contractor_tel" name="contractors[' + count + '][tel]" placeholder="{{ trans('main.tel') }}"></div>'
                    + '<div class="col-lg-1"><button class="btn btn-danger btn-delete-contractor m-btn m-btn--icon m-btn--icon-only" onclick="remove_contractor(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-contractor").append(str);
            });

            $("#save-contractor").click(function (e) {
                e.preventDefault();
                var i = 0;
                $("#contractor").html("");
                $(".div-contractor .form-group").each(function () {
                    var name = $(this).find(".contractor_name").val();
                    var company = $(this).find(".contractor_company").val();
                    var tel = $(this).find(".contractor_tel").val();
                    if (name == '' || company == '' || tel == '') {
                        i++;
                    }
                    $("#contractor").append(name + ' ' + company + ' ' + tel + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                }
                $("#m_modal_contractor").modal("hide");
            });

        });

        function remove_contractor(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
