$(function() {

/*
    if ($('#map-canvas').length) {

        var input = document.getElementById('tt-google-single-autocomplete');
        var options = {"types":["geocode"],"componentRestrictions":{"country":"ua"}};
        searchbox = new google.maps.places.Autocomplete(input, options);

    }
*/

    $(document).on("beforeSubmit", "form.form-edit-order-ajax", function(e) {
        e.preventDefault();
        var form = $(this);


        var data_post = form.serializeArray();

        console.log(data_post[1]['name']);




        jQuery.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: new FormData(form[0]),
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            async: false,
            success: function (data) {
                if (data.status==1){



                    switch(data_post[1]['name']){
                        case 'Orders[location]':


                            console.log(data_post[1]['value']);
                        form.find('.tt-editable-item').html(data_post[1]['value']);
                        break;
                        case 'Orders[budget]':
                            form.find('.tt-editable-item').html($("#orders-budget").find(":selected").text());
                        break;
                        case 'Orders[when_start]':


//                            console.log(new Date(Date.parse($("#orders-date_from").val())).format("%d-%m-%Y"));
                            var forma = $("#orders-when_start").find(":selected").text();
                            if (data_post[1]['value']==1) forma = 'В період від '+$("#orders-date_from").val()+' до '+ $("#orders-date_to").val();
                            if (data_post[1]['value']==2) forma = new Date().format("%d.%m.%Y");
                            if (data_post[1]['value']==3) {
                                var today = new Date();
                                forma = new Date(today.getTime()+1000*60*60*24).format("%d.%m.%Y");
                            }

                            if (data_post[1]['value']!=1) {
                                $("#orders-date_from").val('');
                                $("#orders-date_to").val('');
                            }

                            form.find('.tt-editable-item').html(forma);

                            break;
                        case 'Orders[descriptions]':
                                form.find('.tt-editable-item').html(data_post[1]['value'].replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "<br>"));


                                form.closest('.tt-editable-form').fadeOut(300,function(){
                                    //$(this).siblings('.tt-editable').html(data_post[1]['value'].replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "<br>"));
                                    $(this).siblings('.tt-editable').fadeIn();
                                });

                            break;



 /*                       case 'MemberEdit[busy]':

                            if ($("span.tt-heading-state").length) {

                                if (data_post[1]['value']==0) {
                                    $('span.tt-heading-state').removeClass('red').html('вільний для роботи');
                                } else {
                                    $("span.tt-heading-state").addClass('red').html('Зайнятий до ' + data_post[2]['value']);
                                }

                                $('.popup-wrapper, .popup-content').removeClass('active');
                                $('.tt-vote-selected').removeClass('tt-vote-selected');
                                return false;
                            }



                            if (data_post[1]['value']==0)
                                form.find('.tt-editable-item').html('Вільний до роботи');
                            else
                                form.find('.tt-editable-item').html('Зайнятий до '+data_post[2]['value']);
                            break;
                        case 'MemberEdit[surname]':
                            form.find('.tt-editable-item').html(data_post[1]['value']);
                            form.closest('.tt-editable-wrapper').find('.tt-preson-row-icon').show();
                            break;
                        case 'MemberEdit[first_name]':
                        case 'MemberEdit[last_name]':
                        case 'MemberEdit[email]':
                        case 'MemberEdit[place]':

                            // when edit plece in profile
                            if ($("div#profile-place").length) {
                                $("div#profile-place").html(data_post[1]['value']);
                                $('.popup-wrapper, .popup-content').removeClass('active');
                                $('.tt-vote-selected').removeClass('tt-vote-selected');
                                return false;
                            }

                            form.find('.tt-editable-item').html(data_post[1]['value']);
                            break;
                        case 'MemberEdit[budget_min]':
                            // when edit min_price on profile
                            $('#budget_min').html(data_post[1]['value']+ ' грн.');
                            $('.popup-wrapper, .popup-content').removeClass('active');
                            $('.tt-vote-selected').removeClass('tt-vote-selected');
                            return false;

                            break;
                        case 'MemberEdit[about]':
                            form.find('.tt-editable-item').html(data_post[1]['value'].replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "<br>"));

                            if (data_post[1]['value']!='')
                                form.closest('.tt-editable-wrapper').find('.tt-preson-row-icon').show();
                            else
                                form.closest('.tt-editable-wrapper').find('.tt-preson-row-icon').hide();
                            form.closest('.tt-editable-wrapper').find('.tt-preson-row-icon').hide();

                            if ($('#edit_about').hasClass('profile')) {

                                form.closest('.tt-editable-form').fadeOut(300,function(){
                                    $(this).siblings('.tt-editable').html(data_post[1]['value'].replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "<br>"));
                                    $(this).siblings('.tt-editable').fadeIn();
                                });


                            }

                            break;
                        case 'MemberEdit[regions]':
                            var region_list = '';

                            // when edit regions on profile
                            if ($("ul.simple-list.size-2.profile").length) {
                                $("input.checklist").each( function () {
                                    if($(this).is(':checked')){
                                        region_list +=  '<li><a href="javascript:">'+ $(this).next().html() + '</a></li>';
                                    }
                                });
                                $("ul.simple-list.size-2.profile").html(region_list);
                                $('.popup-wrapper, .popup-content').removeClass('active');
                                $('.tt-vote-selected').removeClass('tt-vote-selected');
                                return false;
                            }

                            $("input.checklist").each( function () {
                                if($(this).is(':checked')){
                                    region_list +=  '<p>'+ $(this).next().html() + '</p>';
                                }
                            });

                            form.find('.tt-editable-item').html(region_list);
                            break;
                        case 'MemberEdit[forma]':

                            var forma = $("#memberedit-forma").find(":selected").text();
                            if (data_post[1]['value']==2) forma += ' / '+$("#memberedit-brygada").find(":selected").text();
                            if (data_post[1]['value']==3) forma += ' / '+$("#memberedit-company").val();
                            // when edit forma on profile
                            if ($("span#profile_forma").length) {
                                if (data_post[1]['value']==3) forma = ' Юридична особа ';

                                $("span#profile_forma").html(forma);
                                $('.popup-wrapper, .popup-content').removeClass('active');
                                $('.tt-vote-selected').removeClass('tt-vote-selected');
                                return false;
                            }


                            form.find('.tt-editable-item').html(forma);

                            break;*/
                    }

                    form.find('.tt-editable-form').slideUp(300).siblings('.tt-editable').slideDown(300, function(){
                        $(this).closest('.tt-editable-wrapper').removeClass('opened');
                    });


                }
            }
        });
        return false;
    });


});