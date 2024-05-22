jQuery(document).ready(function ($) {

    $('.ajax_login .input-col').wrapInner('<div class="input"></div>');
    $('.ajax_login .input-col .input').append('<div class="error_message"></div>');

    function field_validation(field) {
        let parent = field.closest('.input');
        if (field.val() == '') {
            parent.addClass('wrong');
            parent.find('.error_message').text(field.attr('data-empty'));
        }
    }

    function clear(form) {
        form.find('.input').each(function () {
            $(this).removeClass('wrong');
            $(this).find('.error_message').text('');
        });
    }

    $('.ajax_login').submit(function (e) {
        e.preventDefault();

        let form = $(this);

        if (form.data('requestRunning')) {
            return;
        }
        form.data('requestRunning', true);

        clear(form);

        let email = $(this).find('input[type="email"]').first();
        let password = $(this).find('input[type="password"]').first();
        let all = $(this).find('input[type="email"], input[type="password"]');

        field_validation(email);
        field_validation(password);

        let emptyInputs = all.filter(function () {
            return this.value == "";
        });
        let errors = $(this).find('.input.wrong');
        if (emptyInputs.length > 0 || errors.length > 0) {
            form.data('requestRunning', false);
            return false;
        }

        let form_data = $(this).serializeArray();

        form_data.push({name: 'action', value: 'ajax_login'});

        $.ajax({
            type: 'post',
            url: theme.ajaxurl,
            dataType: 'json',
            data: form_data,
            beforeSend: function () {

            },
            success: function (response) {
                if (response.loggedin == true) {
                    location.reload();
                } else {
                    // alert(response.message);
                    form.find('input[type="email"], input[type="password"]').closest('.input').addClass('wrong');
                    form.find('input[type="password"]').closest('.input').find('.error_message').html(response.message);
                }

            },
            error: function (response) {
                console.log(response);
            },
            complete: function() {
                form.data('requestRunning', false);
            }
        });

        return false;
    });

});
