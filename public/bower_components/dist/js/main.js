/**
 * Main JS
 * ------------------
 * You can write your globle methods and logic here
 */
$(function () {
    'use strict'

    /*
     * For Delete Item
     */

    $(document).on('submit', '#item_delete_form', function (e) {
        e.preventDefault();
        showFormSubmitting($(this));
        const form = $(this);
        var url = form.attr('action'), data = form.serialize();
        $.ajax({
            url: url,
            type: 'post',
            data: data,
            success: function (data) {
                hideFormSubmitting(form);
                $('#deleteAdvocateItemModal').modal('hide');
                toastr.success(data.success ? data.success : data.message, "Success!");
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            },
            error: function (data) {
                ajaxError(data, form);
                hideFormSubmitting(form);
            }
        });
    });
});

// All Methods
function showFormSubmitting(form) {
    'use strict'
    let submit = form.find('.submit');
    let submitting = form.find('.submitting');
    submit.hide();
    submitting.show();
}

function hideFormSubmitting(form) {
    'use strict'
    let submit = form.find('.submit');
    let submitting = form.find('.submitting');
    submitting.hide();
    submit.show();
}

function ajaxError(data, form) {
    'use strict'
    if (data.status === 404) {
        toastr.error(trans('What you are looking is not found'), trans('Opps'));
        return;
    } else if (data.status === 500) {
        toastr.error(trans('Something went wrong. If you are seeing this message multiple times, please contact Spondon IT authors.'), trans('Opps'));
        return;
    } else if (data.status === 200) {
        toastr.error(trans('Something is not right'), trans('Error'));
        return;
    }

    let jsonValue = data.responseJSON;
    let errors = jsonValue.errors;
    if (errors) {
        let i = 0;
        $.each(errors, function(key, value) {
            let first_item = Object.keys(errors)[i];
            let error_el = form.find(`[name="${first_item}"]`);
            if (error_el && error_el.length > 0) {
                error_el.parent('.form-group').addClass('has-error');
                error_el.parent('.form-group').append(`<span class="help-block">${value}</span>`);
            }

            toastr.error(value, trans('Validation Error'));
            i++;
        });
    } else {
        toastr.error(jsonValue.message, trans('Opps'));
    }
}

function trans(string, args) {
    'use strict'
    let value = _.get(window.jsi18n, string);
    _.eachRight(args, (paramVal, paramKey) => {
        value = paramVal.replace(`:${paramKey}`, value);
    });

    if(typeof value == 'undefined'){
        return string;
    }

    return value;
}
