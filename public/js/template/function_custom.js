var showErrorMsg = function (form, type, msg) {
    var alert = $('<div class="m-alert m-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
                        <span></span>\
                        </div>');

    form.find('.alert').remove();
    alert.prependTo(form);
    alert.animateClass('fadeIn animated');
    alert.find('span').html(msg);
}

function message_response(type, message) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    var title = "";
    if (type == "success") {
        title = "Success";
    } else if (type == "warning") {
        title = "Warning";
    } else if (type == "error") {
        title = "Failed";
    }

    toastr[type](message, title);
}

function validate_field(id_form) {
    var count_valid = 0;
    $(id_form + " :input").each(function () {
        var input = $(this); // This is the jquery object of the input, do what you will
        if (input.prop('type') == 'text') {
            if (input.val() == "") {
                input.closest("div").find(".form-control-feedback").remove();
                input.css("border", "1px solid red");
                input.after('<div class="form-control-feedback" style="color:red">Please fill input</div>');
                count_valid++;
            }
        }

        if (input.prop('type') == 'email') {
            if (input.val() == "") {
                input.closest("div").find(".form-control-feedback").remove();
                input.css("border", "1px solid red");
                input.after('<div class="form-control-feedback" style="color:red">Please fill email address</div>');
                count_valid++;
            } else {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if (!emailReg.test(input.val())) {
                    input.closest("div").find(".form-control-feedback").remove();
                    input.css("border", "1px solid red");
                    input.after('<div class="form-control-feedback" style="color:red">Please enter a valid email address</div>');
                    count_valid++;
                } else {
                    return true;
                }
            }
        }

        if (input.prop('type') == 'password') {
            if ($("#str_type").val() != "edit") {
                if (input.val() == "") {
                    input.css("border", "1px solid red");
                    input.closest("div").next().remove();
                    input.closest("div").after('<div class="form-control-feedback" style="color:red">Please fill password</div>');
                    count_valid++;
                }
            }
        }
    });
    return count_valid;
}

function keypess_valid(id_form) {
    $(id_form + " :input").each(function () {
        $(this).keyup(function () {
            if ($(this).prop('type') == 'password') {
                if ($("#str_type").val() != "edit") {
                    if ($(this).prop("style")["border"] != '') {
                        $(this).css("border", "");
                        $(this).closest("div").next().remove();
                    }
                }
            }

            if ($(this).prop("style")["border"] != '') {
                $(this).css("border", "");
                $(this).closest("div").find(".form-control-feedback").remove();
            }
        })
    })
}
