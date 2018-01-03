$(function() {

    $('.tt-rating-stars.wth-hover span').on('click', function(){
        $(this).closest('.tt-rating-stars').addClass('selected');
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        var field = $(this).closest('.tt-rating-stars').data('field');
        var rating =$('.tt-rating-stars.wth-hover.selected.'+field+' span').index($(this))+1;
        $('#memberresponse-'+field).val(rating);
    });

    $('.tt-underheading-show').on('click', function(e){
        $('.tt-underheading-item').addClass('active');
    });


    $('#cancel_response').on('click', function(){
        var form = $(this).closest('form');
        if ($(this).val()=='cancel' && $(this).attr('name')=='step-1') {
            form.yiiActiveForm('remove', 'memberresponse-connected');
            form.yiiActiveForm('remove', 'memberresponse-devotion');
            form.yiiActiveForm('remove', 'memberresponse-meeting');
        }

        console.log(111);


        if ($(this).val()=='cancel' && $(this).attr('name')=='step-2') {
            form.yiiActiveForm('remove', 'memberresponse-punctuality');
            form.yiiActiveForm('remove', 'memberresponse-price');
            form.yiiActiveForm('remove', 'memberresponse-meeting_result');
        }

        return true;
    });


    $('input[name="MemberResponse[meeting_result]"]').on('change', function(){
        $('.tt-radio-switch-item').siblings('.active').removeClass('active');
        if ($(this).val()==3) {
            $('.tt-radio-switch-item.not_start').addClass('active');
        } else if($(this).val()==2){
            $('.tt-radio-switch-item.dalay').addClass('active');
        } else {
            $('.tt-radio-switch-item.start').addClass('active');
        }
    });

    $('input[name="MemberResponse[stage]"]').on('change', function(){
        $('.tt-radio-switch-item').siblings('.active').removeClass('active');
        if ($(this).val()==1) {
            $('#cancel_response').show();
            $('#submit_response').text('ПРОДОВЖИТИ');
            $('.tt-radio-switch-item.in_progress').addClass('active');
        } else if($(this).val()==2){

            $('#cancel_response').hide();
            $('#submit_response').text('ЗАВЕРШИТИ');
            $('.tt-radio-switch-item.finish').addClass('active');
        }
    });


    $('input[name="MemberResponse[come_personality]"]').on('change', function(){
        if ($(this).val()==1) {
            $('.tt-radio-switch-item.personally').addClass('active');
        } else if($(this).val()==2){
            $('.tt-radio-switch-item.personally').removeClass('active');
        }
    });


});