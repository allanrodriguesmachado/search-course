$(function () {
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
            email: email,
            password: password
        }, function (request) {
            console.log(request)
            if (request.message) {
                alert("Mensagem de erro:" + request.message)
            }
        }, 'json');
    })
})
