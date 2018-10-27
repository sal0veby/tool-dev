<div class="modal fade" id="m_modal_participants" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ trans('main.participants') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <div class="modal-body" style="height: 400px;overflow-y: auto;">
                <div class="col-12">
                    <div class="div-participants">
                        @if(isset($data['participants']) && !empty(array_get($data, 'participants')))
                            @foreach(array_get($data, 'participants') as $key => $value)
                                <div class="form-group row">
                                    <div class="col-10">
                                        <input type="text" class="form-control m-input participant_name"
                                               name="participants[{{ $key }}][name]"
                                               placeholder="{{ trans('main.name') }}"
                                               value="{{ array_get($value , 'name') }}">
                                    </div>
                                    @if($key == 0)
                                        <div class="col-lg-1">
                                            <button class="btn btn-success btn-add-participants m-btn m-btn--icon
                            m-btn--icon-only">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    @else
                                        <div class="col-lg-1">
                                            <button
                                                class="btn btn-danger btn-delete-owner m-btn m-btn--icon m-btn--icon-only"
                                                onclick="remove_participants(this)">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="form-group row">
                                <div class="col-10">
                                    <input type="text" class="form-control m-input participant_name"
                                           name="participants[0][name]"
                                           placeholder="{{ trans('main.name') }}">
                                </div>
                                <div class="col-1">
                                    <button class="btn btn-success btn-add-participants m-btn m-btn--icon
                            m-btn--icon-only">
                                        <i class="fa fa-plus"></i></button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="justify-content: center;">
                <button type="button" class="btn btn-primary" id="save-participants">
                    {{ trans('main.save') }}
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $(".btn-add-participants").click(function (e) {
                e.preventDefault();
                var count = $('.div-participants .form-group').length;
                var str = '<div class="form-group row">'
                    + '<input type="hidden" class="participants_id" value="">'
                    + '<div class="col-10"><input type="text" class="form-control m-input participant_name" name="participants[' + count + '][name]" placeholder="{{ trans('main.name') }}"></div>'
                    + '<div class="col-1"><button class="btn btn-danger btn-delete-participants m-btn m-btn--icon m-btn--icon-only" onclick="remove_participants(this)"><i class="fa fa-close"></i></button></div>'
                    + '</div>';
                $(".div-participants").append(str);
            });

            $("#save-participants").click(function (e) {
                e.preventDefault();
                var i = 0;
                $("#participants").html("");
                $(".div-participants .form-group").each(function () {
                    var name = $(this).find(".participant_name").val();
                    if (name == '') {
                        i++;
                    }
                    $("#participants").append(name + "\n");
                });
                if (i > 0) {
                    alert('{{ trans('error_message.not_fill') }}');
                    return false;
                }
                $("#m_modal_participants").modal("hide");
            });

        });

        function remove_participants(_this) {
            $(_this).closest("div .form-group").remove();
        }
    </script>
@endpush
