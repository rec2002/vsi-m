$(function() {

    $(document).on("beforeSubmit", "form#faq-form", function(e) {

        e.preventDefault();
        var form =jQuery('form#faq-form');
        jQuery.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: new FormData(form[0]),
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            success: function (data) {
                if (data.status==1){
                    //      $('div.popup-wrapper_').removeClass('active');
                    form[0].reset();
                    _functions.Msg('Ваше питання надісланно адміністрації сайту.', '');
                }
            }
        });
        return false;
    });


    $(document).on("click", ".tt-faq-btn", function(e) {
        e.preventDefault();
        $.get( "/site/faqform", function( data ) {
            $('div.popup-wrapper_').addClass('active');
            $("div.popup-wrapper_ div.popup-content").addClass('active');
            $("div.popup-wrapper_ div.popup-content.active div.popup-container.size-2 div.popup-align" ).html( data );

        });
    });

});