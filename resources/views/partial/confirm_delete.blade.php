@push('scripts')
    <script>
        $(document).on('click', '.btn-delete', function () {
            /* get data by id for delete */
            var param = $(this).data('url');
            var method_type = 'DELETE';

            if ($(this).data('method-type')) {
                method_type = $(this).data('method-type');
            }

            swal({
                    title: "ยืนยันการลบข้อมูล",
                    type: "warning",
                    showCancelButton: true,
                    cancelButtonColor: "#f22d4e",
                    cancelButtonText: "{{ trans('main.cancel') }}",
                    confirmButtonColor: "#384ad7",
                    confirmButtonText: "{{ trans('main.ok') }}",
                    closeOnConfirm: false
                },
                function () {
                    $.ajax({
                        dataType: 'json',
                        url: param,
                        type: method_type,
                    }).done(function (res) {
                        swal({
                            title: "ลบข้อมูลสำเร็จ",
                            timer: 1000,
                            type: "success",
                            showConfirmButton: false
                        });
                        $(".buttons-reload").trigger("click");
                    }).fail(function (jqXHR, textStatus, errorThrown) {
                        swal({
                            title: "ไม่สามารถลบข้อมูลได้",
                            text: "เนื่องจากมีการใช้งานข้อมูลนี้อยู่",
                            type: "error"
                        });
                    });
                });
        });
    </script>
@endpush
