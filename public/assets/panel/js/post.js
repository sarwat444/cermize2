var form = $('#form');
var save_btn = $('#btn_submit');
window.is_all_images_uploaded = true;
form.validate({

    rules: {
    },
    messages: {
    },
    submitHandler: function (f, e) {
        e.preventDefault();
        $('.summernote').each(function () {
            $(this).summernote("code", $(this).summernote('code').replace(/(<div)/igm, '<p').replace(/<\/div>/igm, '</p>').replace(/<p><\/p>/igm, ''));
        });


      //  if (window.is_all_images_uploaded) {
            $(save_btn).attr("disabled", true);
            $(save_btn).find('.spinner-border').show();
            var formData = new FormData(form[0]);
            var url = form.attr('action');
            var redirectUrl = form.attr('to');
            var _method = form.attr('method');
            // $('#load').show();
            $.ajax({
                url: url,
                method: _method,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#load').hide();
                    $(save_btn).attr("disabled", false);
                    $(save_btn).find('.spinner-border').hide();
                    if (response.status) {
                        $('#form')[0].reset();
                        customSweetAlert(
                            'success',
                            response.message,
                            response.item,
                            function (event) {
                                 if(response.redirect_url) {
                                    $('#load').show();
                                    window.location = response.redirect_url;
                                }else {
                                    $('#load').show();
                                    window.location = redirectUrl;
                                }
                            }
                        );
                    } else {
                        customSweetAlert(
                            'error',
                            response.message,
                            response.errors_object
                        );
                    }
                },
                error: function (jqXhr) {
                    console.log('jqXhr');
                    $(save_btn).attr("disabled", false);
                    $(save_btn).find('.spinner-border').hide();
                    getErrors(jqXhr, '/login');
                }
            });
       /* } else {
            customSweetAlert(
                'warning',
                'الرجاء الإنتظار حتى يتم رفع الصور',
                ''
            );
        }*/
    }
});



function getErrors(jqXhr, path) {
    //    hideLoader();
        switch (jqXhr.status) {
            case 401:
                $(location).prop('pathname', path);
                break;
            case 400:
                customSweetAlert(
                    'error',
                    jqXhr.responseJSON.message,
                    ''
                );
                break;
            case 422:
                (function ($) {
                    var $errors = jqXhr.responseJSON.errors;
                    var errorsHtml = '<ul style="list-style-type: none">';
                    $.each($errors, function (key, value) {
                        errorsHtml += '<li style="font-family: \'Droid.Arabic.Kufi\' !important">' + value[0] + '</li>';
                    });
                    errorsHtml += '</ul>';
                    customSweetAlert(
                        'error',
                        'Irgendwas ist falsch passiert',
                        errorsHtml
                    );
                })(jQuery);

                break;
            default:
                errorCustomSweet();
                break;
        }
        return false;
}
