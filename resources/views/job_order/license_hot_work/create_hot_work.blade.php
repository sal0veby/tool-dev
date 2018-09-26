<div class="modal fade" id="m_modal_hot_work" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width: 98%;height: 92%;padding: 0;">
        <div class="modal-content" style="height: 99%;">
            <div class="modal-header">
                <ul id="tab-hotwork" class="nav nav-tabs process-model more-icon-preocess"
                    role="tablist" style="pointer-events: none;margin-bottom:0px">
                    <li role="presentation" id="tab-discover" class="active">
                        <a href="#tab1" aria-controls="discover" role="tab" data-toggle="tab">
                            <h3>1</h3>
                        </a></li>
                    <li role="presentation" id="tab-strategy" style="pointer-events: none;">
                        <a href="#tab2" aria-controls="strategy" role="tab" data-toggle="tab">
                            <h3>2</h3>
                        </a></li>
                    <li role="presentation" id="tab-optimization" style="pointer-events: none;">
                        <a href="#tab3" aria-controls="optimization" role="tab"
                           data-toggle="tab">
                            <h3>3</h3>
                        </a></li>
                    <li role="presentation" id="tab-content" style="pointer-events: none;">
                        <a href="#tab4" aria-controls="content" role="tab" data-toggle="tab">
                            <h3>4</h3>
                        </a></li>
                </ul>


                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        &times;
                    </span>
                </button>
            </div>
            <input type="hidden" id="hot_work_list" name="hot_work_list">
            <div class="modal-body" style="overflow: auto;">
                <section class="design-process-section" id="process-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content">
                                    @include('job_order.license_hot_work.hot_work_tab1')
                                    @include('job_order.license_hot_work.hot_work_tab2')
                                    @include('job_order.license_hot_work.hot_work_tab3')
                                    @include('job_order.license_hot_work.hot_work_tab4')
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <div class="modal-footer" style="justify-content: center;">
                <div class="col-lg-6 col-md-6 text-left">
                    <button type="button" class="btn btn-warning" id="prevBtn-hotwork">
                        {{ trans('main.previous') }}
                    </button>
                </div>

                <div class="col-lg-6 col-md-6 text-right" id="div-next-hotwork">
                    <button type="button" class="btn btn-info" id="nextBtn-hotwork">
                        {{ trans('main.next') }}
                    </button>
                </div>

                <div class="col-lg-6 col-md-6 text-right" id="div-save-hotwork">
                    <button type="button" class="btn btn-primary" id="saveBtn-hotwork">
                        {{ trans('main.save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $('document').ready(function () {
            $('#btn_hot_work').click(function () {
                $('#prevBtn-hotwork').hide();
                $("#div-save-hotwork").hide();
                $("#div-next-hotwork").show();

                if ($('#tab-hotwork').find('.active').attr("id") == 'tab-content') {
                    $("#div-next-hotwork").hide();
                    $("#div-save-hotwork").show();
                    $('#prevBtn-hotwork').show();
                }
            });

            // script for tab steps
            $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                var href = $(e.target).attr('href');
                var $curr = $(".process-model  a[href='" + href + "']").parent();
                $('.process-model li').removeClass();
                $curr.addClass("active");
                $curr.prevAll().addClass("visited");
            });
            // end  script for tab steps

            $("#nextBtn-hotwork").click(function () {
                $('.nav-tabs > .active').next('li').find('a').trigger('click');
                $('.nav-tabs > .active').prev('li').find('a').removeClass("active");
                $("#div-next-hotwork").show();
                $('#prevBtn-hotwork').show();
                $("#div-save-hotwork").hide();

                if ($('#tab-hotwork').find('.active').attr("id") == 'tab-content') {
                    $("#div-next-hotwork").hide();
                    $("#div-save-hotwork").show();
                }
            });

            $("#prevBtn-hotwork").click(function () {
                $('.nav-tabs > .active').prev('li').find('a').trigger('click');
                $('.nav-tabs > .active').next('li').find('a').removeClass("active");
                $("#div-next-hotwork").show();
                $("#div-save-hotwork").hide();

                if ($('#tab-hotwork').find('.active').attr("id") == 'tab-discover') {
                    $("#div-next-hotwork").show();
                    $("#div-save-hotwork").hide();
                    $('#prevBtn-hotwork').hide();
                }
            })

            $("#check-hotwork-audit-3").change(function () {
                if ($(this).is(":checked"))
                    $("#input-count-hotwork").attr("disabled", false);
                else
                    $("#input-count-hotwork").attr("disabled", true);
            });

            $('#saveBtn-hotwork').click(function () {
                $('#m_modal_hot_work').modal('hide');
            })

        });
    </script>
@endpush
