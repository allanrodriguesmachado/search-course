$(function () {
    let ajaxResponseBaseTime = 3;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('form[name="login"]').submit(function (event) {
        event.preventDefault();

        const form = $(this);
        const action = form.attr('action')
        const email = $('#email').val();
        const password = $('#password_check').val();

        $.post(action, {
            email: email, password: password
        }, function (response) {
            if (response.message) {
                ajaxMessage(response.message, 3)
            }

            if (response.redirect) {
                window.location.href = response.redirect;
            }
        }, 'json');
    });

    function ajaxMessage(message, time) {
        let ajaxMessage = $(message);

        ajaxMessage.append("<div class='message_time'></div>");
        ajaxMessage.find(".message_time").animate({"width": "100%"}, time * 1000, function () {
            $(this).parents(".message").fadeOut(200);
        });

        $(".ajax_response").append(ajaxMessage);
    }

    $(".ajax_response .message").each(function (e, m) {
        ajaxMessage(m, ajaxResponseBaseTime += 1);
    });

    $(".ajax_response").on("click", ".message", function (e) {
        $(this).effect("bounce").fadeOut(1);
    });
})
