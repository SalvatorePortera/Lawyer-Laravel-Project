 "use strict";
/*
 * Form Checkbox Uniform
 */
function bankOrCash(val){
    "use strict";
    var field =  $('#bank_account_id');
    let method_column = $('#method_column');
    if (val === 'bank'){

        if (method_column.length){
            method_column.removeClass(method_column.data('old_class')).addClass(method_column.data('new_class'))
        }

        $('#bank_column').show();
        $("label[for='bank_account_id']").addClass('required');
        field.attr('disabled', false).attr('required', true).select2({
            theme: 'bootstrap4'
        });
    } else{
        if (method_column.length){
            method_column.removeClass(method_column.data('new_class')).addClass(method_column.data('old_class'))
        }
        $('#bank_column').hide();
        $("label[for='bank_account_id']").removeClass('required');
        field.attr('disabled', true).attr('required', false).select2({
            theme: 'bootstrap4'
        });
    }
}

var _componentUniform = function () {

    if (!$().uniform) {
        console.warn('Warning - uniform.min.js is not loaded.');
        return;
    }
    $('.form-input-styled').uniform();
};

/*
 * Tooltip Custom Color
 */

var _componentTooltipCustomColor = function () {

    $('[data-popup=tooltip-custom]').tooltip({
        template: '<div class="tooltip"><div class="arrow border-teal"></div><div class="tooltip-inner bg-teal"></div></div>'
    });
};

/*
 * Form Datepicker Uniform
 */

if ($().summernote && $('.summernote').length) {
$('.summernote').summernote({
    toolbar: [
        [ 'style', [ 'style' ] ],
        [ 'font', [ 'bold', 'italic', 'underline'] ],
        [ 'fontname', [ 'fontname' ] ],
        [ 'fontsize', [ 'fontsize' ] ],
        [ 'color', [ 'color' ] ],
        [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
        [ 'table', [ 'table' ] ],
        [ 'insert', [ 'link'] ],
        [ 'view', [  'fullscreen', 'codeview' ] ],

    ],
    height : 200,
    tooltip : false

});
}


var _componentDatePicker = function (drops = 'down') {
    var locatDate = moment.utc().format('YYYY-MM-DD');
    var stillUtc = moment.utc(locatDate).toDate();
    var year = parseInt(moment(stillUtc).local().format('YYYY')) + 2;
    // $('.date').attr('readonly', true);

    $('.daterange').daterangepicker({
        "applyClass": 'bg-slate-600',
        "cancelClass": 'btn-light',
        'setDate': null,
        "singleDatePicker": true,
        "locale": {
            "format": 'YYYY-MM-DD'
        },
        "drops": drops,
        "showDropdowns": true,
        "minYear": 1900,
        "maxYear": year,
        "timePicker": false,
        "alwaysShowCalendars": true,
    });
};

/*
 * Form Select 2 For Modal
 */

var _componentSelect2Modal = function () {

    if (!$().select2) {
        console.warn('Warning - select2.min.js is not loaded.');
        return;
    }

    $('.select').select2({
        dropdownAutoWidth: true,
        dropdownParent: $("#modal_remote .modal-content"),
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        dropdownAutoWidth: true,
        width: 'auto'
    });
};

var _componentSelect2SelectModal = function () {
    "use strict";
    if (!$().select2) {
        console.warn('Warning - select2.min.js is not loaded.');
        return;
    }

    $('#select_form .select').select2({
        dropdownAutoWidth: true,
        dropdownParent: $("#modal_remote .modal-content"),
    });
};

/*
 * Form Select2
 */
var _componentSelect2Normal = function () {

    if (!$().select2) {
        console.warn('Warning - select2.min.js is not loaded.');
        return;
    }

    $('.select').select2({
        dropdownAutoWidth: true,
    });

    $('.dataTables_length select').select2({
        minimumResultsForSearch: Infinity,
        dropdownAutoWidth: true,
        width: 'auto'
    });

};

/*
 * For Switchery for Datatable Status
 */


/*
 * Form Validation
 */

var _formValidation = function (form_id = '#content_form', modal = false, modal_id = 'content_modal',) {

    let form = $(form_id);
    if (form.length > 0) {
        form.parsley().on('field:validated', function () {
            const ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        });

        form.on('submit', function (e) {
            e.preventDefault();
            form.find('.submit').hide();
            form.find('.submitting').show();
            const submit = $('#submit');
            const submit_val = submit.val();
            const submit_url = form.attr('action');
            //Start Ajax
            const formData = new FormData(form[0]);
            formData.append('submit', submit_val);
            $.ajax({
                url: submit_url,
                type: 'POST',
                data: formData,
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false,
                dataType: 'JSON',
                success: function (data) {

                    if(data.demo == true){
                        toastr.warning(trans('This feature is disabled for demo'));
                    }else{
                        toastr.success(data.message, trans('Success'));
                    }

                    form[0].reset();

                    if(data.appendTo){
                        let select = $('select'+ data.appendTo);
                        select.append(
                            $('<option>', {
                                value: data.model.id,
                                text: data.model.name
                            })
                        );

                        let multiple = select.attr('multiple');
                        if (typeof multiple !== "undefined"){
                            let select_val = select.val();
                            select_val.push(data.model.id);
                            console.log(select_val);
                            select.val(select_val)
                                .trigger('change').select2();
                        }else{
                            select.val(data.model.id)
                                .trigger('change').select2();
                        }
                    }

                    if (modal) {
                        $("." + modal_id).modal('hide');
                    }

                    if (data.window) {
                        window.open(data.window, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=auto,left=auto,width=700,height=400");
                    }

                    if (data.goto) {
                        setTimeout(function () {
                            window.location.href = data.goto;
                        }, 1500);
                    }

                    if (data.reload) {
                        setTimeout(function () {
                            window.location.href = '';
                        }, 1000);
                    }

                    form.find('.submit').show();
                    form.find('.submitting').hide();
                },
                error: function (data) {
                    form.find('.submit').show();
                    form.find('.submitting').hide();
                    let method = $('input[name="_method"]').val();
                    if (method.toLowerCase() == 'delete' && modal){
                        $("." + modal_id).modal('hide');
                    }
                    var jsonValue = $.parseJSON(data.responseText);
                    const errors = jsonValue.errors;
                    if (errors) {
                        var i = 0;
                        $.each(errors, function (key, value) {
                            let first_item = Object.keys(errors)[i];
                            $('.parsley-required').remove();
                            first_item = first_item.replace('.', '_');
                            if($('#' + first_item).length){

                                $('#' + first_item).parsley().addError('required', {
                                    message: value,
                                    updateClass: true
                                });
                            }
                            toastr.error(value, trans('Error'));

                            i++;
                        });
                    } else {
                        toastr.error(jsonValue.message, trans('Error'));

                    }
                }
            });
        });
    }
};
function hidePreloader() {
    "use strict";
    $('.preloader img').fadeOut();
    $('.preloader').fadeOut();
}
function startDataTable(){
    $("table.dt").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('.dataTables_wrapper .col-md-6:eq(0)');
}
function hideFormSubmitting(form) {
    "use strict";
    hidePreloader();
    let submit = form.find('.submit');
    let submitting = form.find('.submitting');
    submit.show();
    submitting.hide();
}
function showPreloader() {
    "use strict";
    $('.preloader img').fadeIn();
    $('.preloader').fadeIn();
}
function showFormSubmitting(form) {
    "use strict";
    let submit = form.find('.submit');
    let submitting = form.find('.submitting');
    submit.hide();
    submitting.show();
    showPreloader();
}
$(document).ready(function () {
    $(document).on('click', '.btn-modal', function(e) {
        e.preventDefault();
        $('.preloader').show();
            let depend = $(this).data('depend');
            let container = '.' + $(this).data('container');
            let url = $(this).data('href');
            if (typeof (url) == 'undefined'){
                url = $(this).attr('href');
            }
            var button = $(this);

            if (typeof depend !== 'undefined'){
                let depend_val = $(depend).val();
                if (!depend_val){
                    toastr.error($(this).data('depend_text'));
                    $('.preloader').hide();
                } else{
                    let data = {
                        "depend" : depend_val
                    }
                    open_btn_link(url, container,data, button);
                }
            } else{
                open_btn_link(url, container, {}, button);
            }


        });


        function open_btn_link(url, container, data, button){
            $.ajax({
                url: url,
                data: data,
                dataType: 'html',
                success: function(result) {
                    $(container)
                        .html(result)
                        .modal('show');

                    $(container).on('shown.bs.modal', function() {
                        $('input:text:visible:first', this).focus();
                    });

                    if ($().select2){
                        $(container).find('.primary_select').each(function() {
                            var dropdownParent = $(document.body);
                            if ($(this).parents('.modal:first').length !== 0)
                                dropdownParent = $(this).parents('.modal:first');
                            $(this).select2();
                        });
                    }

                    if ($().summernote){
                        if ($(container).find('.summernote').length){
                            $('.summernote').summernote({
                                height:200
                            });
                        }
                    }

                    if ($('.date').length > 0 && $().datetimepicker) {
                        $('.date').datetimepicker({
                            format: 'YYYY-MM-DD'
                        });
                        $(document).on('click', '.date-icon', function() {
                            $(this).parent().parent().find('.date').focus();
                        });
                    }

                    $('[data-toggle="tooltip"]').tooltip()

                    $('.preloader').hide();
                    var $btn = button;
                    var currentDialog = $btn.closest('.modal-dialog'),
                        targetDialog = $(container);
                    if (!currentDialog.length)
                        return;
                    targetDialog.data('previous-dialog', currentDialog);
                    currentDialog.addClass('d-none');
                    var stackedDialogCount = $('.modal.fade .modal-dialog.aside').length;
                    if (stackedDialogCount <= 5){
                        currentDialog.addClass('aside-' + stackedDialogCount);
                    }

                },
                error: function(data) {
                    $('.preloader').hide();
                    toastr.error('Something is not right!', 'Opps!');
                }
            });
        }

    /*
     * For Delete Item
     */
    $(document).on('click', 'a.delete_item', function (e) {
        e.preventDefault();
        var url = $(this).data('url');

        $('#deleteAdvocateItemModal').modal('show');
        $('#item_delete_form').attr('action', url);

    });
    $(document).on('change', '#payment_method', function(){
        let val = $(this).val();
        bankOrCash(val);
    });

    // $('.date').attr('readonly', true);
});


/*
 * For Uppercase Word first Letter
 */
function jsUcfirst(string) {
    "use strict";
    return string.charAt(0).toUpperCase() + string.slice(1);
}


function show_submit_loading(button = $('#submit')) {

    button.attr('disabled', true);
    const card = button.closest('.card');
    if (card.length > 0) {
        cardBlock(card);
    }

}

function hide_submit_loading(button = $('#submit')) {

    $('#submit').attr('disabled', false);
    const card = button.closest('.card');
    if (card.length > 0) {
        cardUnblock(card);
    }
    $('.loader').remove();
}

$(document).ready(function () {

    /*
     * For Logout
     */
    $(document).on('click', '#logout', function (e) {
        e.preventDefault();
        $('.preloader').show('fade');
        var url = $(this).attr('href');
        $.post({
            url: url,
            data: {'_token': $('meta[name="csrf-token"]').attr('content')}
            }).done(function (data) {
                toastr.success(data.message)
                setTimeout(function () {
                     window.location.href = data.goto;
                }, 2000);
          });
        // $.ajax({
        //     url: url,
        //     type: "POST",
        //     data: {aaaa:"sssss"},
        //     contentType: false, // The content type used when sending data to the server.
        //     cache: false, // To unable request pages to be cached
        //     processData: false,
        //     dataType: 'JSON',
        //     success: function (data) {
        //         toastr.success(data.message)
        //         setTimeout(function () {
        //             window.location.href = data.goto;
        //         }, 2000);
        //     },
        //     error: function (data) {
        //         var jsonValue = $.parseJSON(data.responseText);
        //         const errors = jsonValue.errors
        //         var i = 0;
        //         $.each(errors, function (key, value) {
        //             toastr.error(value)
        //             i++;
        //         });
        //     }
        // });
    });

});

function cardBlock(card) {

    card.block({
        message: '<i class="icon-spinner3 icon-3x text-danger spinner"></i>',
        overlayCSS: {
            backgroundColor: '#1B2024',
            opacity: 0.85,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'none',
            color: '#fff'
        }
    });
}

function cardUnblock(card) {

    card.unblock();
}


function _componentAjaxChildLoad(form_id = '#content_form', parent_id = '#country_id', child_id = '#state_id', module='state') {

    $(document).on('change', parent_id, function(e) {
        var content_id = form_id + ' ' + child_id;
        var value = $(this).val();
        $(content_id + '>option').remove();
        var child = $(form_id + ' select' + child_id);
        child.append(
            $('<option>', {
                value: '',
                text: trans('Select '+ ucword(module))
            })
        );
        $.post({
            url: SET_DOMAIN + '/select/'+module,
            data: {'_token': $('meta[name="csrf-token"]').attr('content'),value: value}
            }).done(function (data) {
                $.each(data, function(i, v) {
                    child.append(
                        $('<option>', {
                            value: v.id,
                            text: v.name
                        })
                    );
                })
                child.trigger('change');
                child.select2({
                    theme: 'bootstrap4'
                });
          }).fail(function(data) {
                toastr.error(trans('Something is not right'), trans('Error'))
            });
    });
}

function ucword(value){

    if(!value)
        return;

    return value.toLowerCase().replace(/\b[a-z]/g, function(value) {
        return value.toUpperCase();
    });
}



// new js

function ajax_error(data) {

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
    let jsonValue = $.parseJSON(data.responseText);
    let errors = jsonValue.errors;
    if (errors) {
        let i = 0;
        $.each(errors, function(key, value) {
            let first_item = Object.keys(errors)[i];
            let error_el_id = $('#' + first_item);
            if (error_el_id.length > 0) {
                error_el_id.parsley().addError('ajax', {
                    message: value,
                    updateClass: true
                });
            }

            toastr.error(value, trans('Validation Error'));
            i++;
        });
    } else {
        toastr.error(jsonValue.message, trans('Opps'));
    }
}

function jsUcfirst(string) {

    return string.charAt(0).toUpperCase() + string.slice(1);
}


function _formValidation2(form_id = 'content_form', modal = false, modal_id = 'content_modal', ajax_table = null) {

    const form = $('#' + form_id);

    if (!form.length) {
        return;
    }

    form.parsley().on('field:validated', function() {
        $('.parsley-ajax').remove();
        const ok = $('.parsley-error').length === 0;
        $('.bs-callout-info').toggleClass('hidden', !ok);
        $('.bs-callout-warning').toggleClass('hidden', ok);
    });
    form.on('submit', function(e) {
        e.preventDefault();
        $('.parsley-ajax').remove();
        form.find('.submit').hide();
        form.find('.submitting').show();
        const submit_url = form.attr('action');
        const method = form.attr('method');
        //Start Ajax
        const formData = new FormData(form[0]);
        $.ajax({
            url: submit_url,
            type: method,
            data: formData,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
                if(data.demo == true){
                    toastr.warning(trans('This feature is disabled for demo'));
                }else{
                    toastr.success(data.message, trans('Success'));
                }

                if (modal) {
                    $("." + modal_id).modal('hide');
                }
                if (ajax_table) {
                    ajax_table.ajax.reload();
                }

                if (data.goto) {
                    window.location.href = data.goto;
                }

                if (data.reload) {
                    window.location.href = '';
                }

                form.find('.submit').show();
                form.find('.submitting').hide();

            },
            error: function(data) {
                ajax_error(data);
                form.find('.submit').show();
                form.find('.submitting').hide();
            }
        });
    });
}


function change_status(button, ajax_table = null, change_status = false) {

    $(document).on('click', '#' + button, function(e) {
        e.preventDefault();
        var url = $(this).data('href');
        var status = $(this).data('status');
        var msg = '';
        if (status === 1) {
            msg = trans('Change status from active to inactive');
        } else {
            msg = trans('Change status from inactive to active');
        }

        if (!change_status) {
            msg = $(this).data('msg');
            if (!msg) {
                msg = trans('Once deleted, it will delete all related data also');
            }
        } else {
            url = url + '?action=change_status';
        }

        swal({
                title: trans('Are you sure?'),
                text: msg,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#66cc99',
                cancelButtonColor: '#ff6666',
                confirmButtonText: trans('Yes, Do it!'),
                cancelButtonText: trans('No, cancel!'),
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger'
            })
            .then((result) => {
                if (result.value) {
                    $.ajax({
                        url: url,
                        method: 'Delete',
                        contentType: false, // The content type used when sending data to the server.
                        cache: false, // To unable request pages to be cached
                        processData: false,
                        dataType: 'JSON',
                        success: function(data) {
                            toastr.success(data.message, trans('Success'));
                            if (ajax_table) {
                                ajax_table.ajax.reload();
                            }
                        },
                        error: function(data) {
                            ajax_error(data);
                        }
                    });
                }
            });
    });
}


function convertNumber(number) {

    var number = parseFloat(number);
    if (isNaN(number)) {
        return 0;
    }

    return number;
}

function imageChangeWithFile(input, srcId) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(srcId)
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

 var index = 0;
 $(document).on('click','#file_add',function(){
     index = $('.attach-item').length
     addNewFileAddItem(index)
 });

 $(document).on('click','.case-attach',function(){
     $(this).parent().remove();
 });

 $(document).on('change','.file-upload-multi',function(e){
     let fileName = e.target.files[0].name;
     $(this).parent().parent().find('#placeholderStaffsName').attr('placeholder',fileName);
 });

 function addNewFileAddItem(index){
     "use strict";

     var attachFile = '<div class="attach-file-section d-flex align-items-center">\n' +
         '        <div class="primary_input flex-grow-1">\n' +
         '            <div class="primary_file_uploader">\n' +
         '                <input class="primary-input" type="text" id="placeholderStaffsName" placeholder="'+trans('Browse File')+'" readonly>\n' +
         '                <button class="" type="button">\n' +
         '                    <label class="primary-btn small fix-gr-bg"\n' +
         '                           for="attach_file_'+index+'">'+trans('Browse')+'</label>\n' +
         '                    <input type="file" class="d-none file-upload-multi" name="file[]" id="attach_file_'+index+'">\n' +
         '                </button>\n' +
         '            </div>\n' +
         '        </div>\n' +
         '        <span style="cursor:pointer;" class="primary-btn small fix-gr-bg icon-only case-attach" type="button" > <i class="ti-trash"></i> </span>\n' +
         '    </div>';

     $('.attach-file-row').append(attachFile);
 }


 function getFileName(value, placeholder){
     "use strict";
     if (value) {
         var startIndex = (value.indexOf('\\') >= 0 ? value.lastIndexOf('\\') : value.lastIndexOf('/'));
         var filename = value.substring(startIndex);
         if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
             filename = filename.substring(1);
         }
         $(placeholder).attr('placeholder', '');
         $(placeholder).attr('placeholder', filename);
     }
 }

 $(document).on('keyup', '#payment_add #paid', function (){
     console.log('tariq')
     let paid = parseFloat($(this).val());
     if (isNaN(paid)){
         paid = 0;
     }
     let payable = parseFloat($(this).attr('max'));
     if (isNaN(payable)){
         payable = 0;
     }

     if (paid > payable){
         toastr.error(trans('You can not pay more than payable amount'), trans('Error'));
         paid = payable;
         $(this).val(payable);
     }

     $('#due').val(parseFloat(payable - paid).toFixed(2));
 })
