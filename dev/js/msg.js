$(function() {

    $(".tt-messages-text").animate({ scrollTop: $('.tt-messages-text').prop("scrollHeight")}, 500);

    $(document).on("click", 'div.tt-messages-user', function() {
        document.location.href = $(this).data('url');
    });




    $("div.tt-messages-user").each( function () {
        if ($(this).hasClass('active')) {
            $(this).find('.notification').hide();
        }
    });




    $(document).on("beforeSubmit", "form#send_msg", function(e) {
        e.preventDefault();

        var msg = $.trim($('#membermsg-msg').val().replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "<br>"));
        if (msg=='')  return false ;

        var form = $(this);
        jQuery.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serializeArray(),
            cache: false,
            dataType: 'json',
            async: false,
            success: function (data) {
                if (data.status==1){
                    $('#membermsg-msg').val('');
                    $('.tt-messages-text').append('<div class="tt-messages-item other simple-text"><p>'+data.msg+'</p></div>');
                    $(".tt-messages-text").animate({ scrollTop: $('.tt-messages-text').prop("scrollHeight")}, 500);
                }
            }
        });

        return false;

    });
});