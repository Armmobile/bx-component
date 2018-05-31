$(document).ready(function () {

    insertTariffToForm();
    insertTitle();

    initFormHandler();

});

var form            = $('.bb-form_request'),
    errorPressCount = 1; //for SHAKE FORM

function insertTariffToForm() {

    var tariff         = $('.tariff-item__value'),
        form_input_box = $('.bb-form__input-box'),
        tariff_options = '<option class="tariff-option_placeholder" value="">Тариф</option>';

    if (tariff.length > 0) {

        tariff.each(function (i, target) {
            var value = $(target).text();

            tariff_options += '<option value="' + value + '"> ' + value + '</option>';
        });

        form_input_box.append('<div class="bb-form__input-item input-item__select_tariff"><select name="tariff">' + tariff_options + '</select></div>');

        initSelectric();

    }

}

function insertTitle() {
    var title = $('h1').text();
    $('.bb-form_request input[name=title]').attr('value', title);
}

function initSelectric() {
    var script = document.createElement('script'),
        style  = document.createElement('link');

    script.src   = '/local/distr/selectric/public/jquery.selectric.min.js';
    script.async = false;

    style.rel  = 'stylesheet';
    style.href = '/local/distr/selectric/public/selectric.css';

    document.head.appendChild(script);
    document.head.appendChild(style);

    script.onload = function () {
        $('select').selectric();
    }


}

function initFormHandler() {


    form.submit(function (e) {
        e.preventDefault();

        if (validateForm()) {

            $.ajax({
                url:     '/local/ajax/sendform_v1.php',
                type:    'POST',
                data:    form.serialize(),
                success: function () {
                    showSubmitSuccess();
                },
                error:   function () {
                    showSubmitError();
                }
            });
        }
        else {
            showFormValidateError();
        }
    });
}

function showSubmitSuccess() {
    $('.bb-form__screen_success').css({
        'top':     0,
        'opacity': 1,
        'z-index': 1
    });
}

function showSubmitError() {
    $('.bb-form__screen_error').css({
        'top':     0,
        'opacity': 1,
        'z-index': 1
    });
}

function validateForm() {

    // PHONE
    function validatePhone() {

        var value = form.find('input[name=phone]').val(),
            reg   = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/i;

        if (value) {
            return reg.test(value);
        }
        else return false;
    }

    // EMAIL
    function validateEmail() {
        var value = form.find('input[name=email]').val();
        reg       = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;

        if (value) {
            return reg.test(value);
        }
        else return false;
    }

    return !!(validatePhone() || validateEmail());

}

function showFormValidateError() {
    var errorClass = 'bb-form-request__validate-error',
        message    = 'Корректно укажите телефон или email',
        width      = form.width(),
        element    = '<div class="' + errorClass + '" style="max-width:' + width + 'px;">' + message + '</div>';

    // INSERT MESSAGE
    if (!$('.' + errorClass).length)
        form.append(element);

    // SHAKE FORM
    form.animate({left: errorPressCount++ + 'px'}, 300, 'easeOutElasticCrazy');

}