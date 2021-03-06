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
                        case 'Orders[title]':
                                $('div.tt-task-feature-entry.tt-editable h5.h5 span:first').html(data_post[1]['value']);
                                $('.popup-wrapper, .popup-content').removeClass('active');
                            break;
                        case 'Orders[location]':
                            form.find('.tt-editable-item').html(data_post[1]['value']);
                        break;
                        case 'Orders[budget]':
                            form.find('.tt-editable-item').html($("#orders-budget").find(":selected").text());
                        break;
                        case 'Orders[date_from]':
                            if (data_post[1]['value']=='') {
                                data_post[1]['value'] = '(не вказано)';
                            }
                            form.find('.tt-editable-item').html(data_post[1]['value']);
                            break;
                        case 'Orders[descriptions]':
                                form.find('.tt-editable-item').html(data_post[1]['value'].replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, "<br>"));
                                form.closest('.tt-editable-form').fadeOut(300,function(){
                                    $(this).siblings('.tt-editable').fadeIn();
                                });

                            break;
                    }

                    form.find('.tt-editable-form').slideUp(300).siblings('.tt-editable').slideDown(300, function(){
                        $(this).closest('.tt-editable-wrapper').removeClass('opened');
                    });


                }
            }
        });
        return false;
    });

    if ($('.simple-select select').length) {
       // $('.simple-select:not(.multy) select').SumoSelect();
        $('.simple-select.multy.region select').SumoSelect({
            placeholder: 'Виберіть область',
            selectAll: false,
            captionFormat: '{0} Вибрано',
            captionFormatAllSelected: 'Вся Україна',
            locale: ['OK', 'Відмінити ', 'Вся Україна'],
        });


        var budget = $("select[name='budgets']").SumoSelect({
            placeholder: 'Виберіть бюджет',
            selectAll: false,
            captionFormat: '{0} Вибрано',
            captionFormatAllSelected: 'Будь який бюджет',
            locale: ['OK', 'Відмінити ', 'Будь який бюджет'],
        });
    }



    if ($('#items_body').length) {

        InitTypes();


        $(document).on("click", "select[name='regions'], select[name='budgets'], input[name='filter-types']", function (e) {
             $('form#orders-filter').submit();
        });





        $(document).on("submit", "form#orders-filter", function (e) {


            var types = [];
            var budgets =  ($("select[name='budgets']").val()) ? ($("select[name='budgets']").val()).join() : '';
            var regions =  ($("select[name='regions']").val()) ? ($("select[name='regions']").val()).join() : '';

            $("input[name='types[]']:checked").each( function () {
              types.push($(this).val());
            });

        //    var query = '';

        //    var url_level_1 = window.location.href.split('?')[1];

        //    console.log(url_level_1);


            var query = jQuery.param(_functions.QueryStringToHash(window.location.href.split('?')[1]));

            console.log(query);

            $.post('/orders'+'?ajax=true'+((query!='') ? '&'+query : ''), {'budgets':budgets, 'regions':regions, 'types':(types).join()}).done(function(data ) {
                if (data!= '') {
                    window.history.pushState({}, document.title, "/orders" );
                    $('#pagination').prev('.empty-space').remove();
                    $('#pagination').next('.empty-space').remove();
                    $('#pagination').remove();
                    $(document).find('div#items_body').html(data);
                }   else alert('Bad request');
            });


            return false;

        });


        /*tt-order-filter*/
        $('.checkbox-entry.check-all input').on('change', function(){
            if($(this).is(':checked')){
                $(this).closest('li').find('.checkbox-entry:not(.check-all) input').prop('checked', true);
            } else{
                $(this).closest('li').find('.checkbox-entry:not(.check-all) input').prop('checked', false);
            }
            setOrderFilter();
        });
        $('.tt-order-filter .checkbox-entry:not(.check-all) input').on('change', function(){
            setOrderFilter();
        });

        function setOrderFilter(){
            var count = $('.tt-order-filter .checkbox-entry:not(.check-all) input:checked').length;
            $('.tt-order-filter .button i').text(count);
        }

        $('.tt-order-filter form').on('submit', function(e){
            InitTypes();
            setOrderFilter();
            e.preventDefault();
            return false;
        });

        function InitTypes() {

            var count = $('.tt-order-filter .checkbox-entry:not(.check-all) input:checked').length;
            if(count){
                $('.tt-order-filter-select').addClass('selected').find('span:first-child').text(count+' видів робіт');
            }
            else{
                $('.tt-order-filter-select').removeClass('selected').find('span:first-child').text('Виберіть типи робіт');
            }
            $('.popup-wrapper, .popup-content').removeClass('active');


            var count = $('.tt-order-filter .checkbox-entry:not(.check-all) input:checked').length;
            $('.tt-order-filter .button i').text(count);

            orderFilterMessage();

        }



        $('a.filter-types-reset').on('click', function(){
            $("input[name='types[]']:checked").each( function () {
                $(this).prop('checked', false);
            });
            $('form#orders-filter').submit();
            InitTypes();
        });

        $('.simple-select.multy.region select').on('change', function(){
            var count = $(this).find('option:selected').length;
            if(count){
                $(this).closest('.simple-select').addClass('selected');
            } else{
                $(this).closest('.simple-select').removeClass('selected');
            }
            orderFilterMessage();
        });
        function orderFilterMessage(){
            var $filterWork = $('.tt-order-filter-select').is('.selected'),
                $filterPlace = $('.simple-select.multy.region').is('.selected');
            if($filterWork&&!$filterPlace){
                $('.tt-order-message-all:visible').fadeOut();
                $('.tt-order-message-place:visible').fadeOut();
                $('.tt-order-message-work:hidden').fadeIn();
            } else if(!$filterWork&&$filterPlace){
                $('.tt-order-message-all:visible').fadeOut();
                $('.tt-order-message-work:visible').fadeOut();
                $('.tt-order-message-place:hidden').fadeIn();
            } else if($filterWork&&$filterPlace){
                $('.tt-order-message-place:visible').fadeOut();
                $('.tt-order-message-work:visible').fadeOut();
                $('.tt-order-message-all:hidden').fadeIn();
            } else{
                $('.tt-order-message-place:visible').fadeOut();
                $('.tt-order-message-work:visible').fadeOut();
                $('.tt-order-message-all:visible').fadeOut();
            }
        }



    }

// SUGGESTED USERS

    /*tt-user-card*/
    $('.tt-user-card-remove').on('click', function(e){
        $(this).closest('.tt-user-card').remove();
        var count = $('.tt-user-card').length,
            lastDigit = count%10,
            countText = '';
        if(!count){
            $('.tt-news-task').remove();
            $('.popup-wrapper .button-close').trigger('click');
        }
        if(lastDigit==1&&count!=11){
            countText = 'майстра';
        }
        else if(lastDigit==2||lastDigit==3||lastDigit==4||lastDigit==5){
            countText = 'майстри';
        }
        else{
            countText = 'майстрів';
        }
        $.post("/professionals/default/suggestremove?id="+$(this).attr('data-id'), function( data ) {});
        $('.tt-news-task-count span').text(count+' '+countText);
        e.preventDefault();
    });

    $(document).on('click', '.open-suggest', function(e){
        var $t = $(this);
        $('.popup-content').removeClass('active');
        $('.popup-wrapper, .popup-content[data-rel="'+$t.data('rel')+'"]').addClass('active');
        return false;
    });


    //  member suggestion
    $('.tt-fadein-link').on('click', function(e){
        $(this).closest('.tt-fadein-top').fadeOut(300, function(){
            $(this).siblings('.tt-fadein-bottom').fadeIn(300);
        });
        e.preventDefault();
    });


    $('.tt-fadein-close').on('click', function(e){
        $(this).closest('.tt-fadein-bottom').fadeOut(300, function(){
            $(this).siblings('.tt-fadein-top').fadeIn(300);
        });
        e.preventDefault();
    });

    $(document).on("click", "button#close_order", function(e) {

        var obj = $(this);
        $('.popup-wrapper-confirm').addClass('active');

        _functions.dialog('Ви дійсно хочете скасувати замовлення?', 'Скасування замовлення означає, що тепер Ви не будете отримувати на нього нові пропозиції. Дія не зворотня.',
            function() {
                $('.popup-wrapper-confirm').removeClass('active');
                obj.closest('form').submit();
            },
            function() {
                $('.popup-wrapper-confirm').removeClass('active');
            }
        );
        return false;
    });

    $(document).on('click', '.tt-editable-close', function(){
        $(this).closest('form')[0].reset();
        return false;
    });


    if ($('.suggestion-list').length) {
        $('.simple-select:not(.multy) select').SumoSelect();


        $(document).on("change", "select[name='disregast']", function (e) {
             var obj = $(this);
            $('.popup-wrapper-confirm').addClass('active');

            _functions.dialog('Справді бажаєте перемістити в корзину?', 'Надалі буде можливість відновити пропозицію з корзини. Власник пропозиції буде проінфомований про відмову.',
                function() {
                    $('.popup-wrapper-confirm').removeClass('active');
                    obj.closest('form').submit();
                },
                function() {
                    $('.popup-wrapper-confirm').removeClass('active');
                }
            );
            return false;
        });

        $(document).on("click", ".restore_suggestion", function (e) {
            $(this).closest('form').submit();
            return false;
        });

        $('.phone-number-show').on("click", function (e) {

            var obj = $(this);
            $('.popup-wrapper-confirm').addClass('active');

            _functions.dialog('Показати телефон', 'Ваш контактний номер телефону буде доступний для вибраного майстра.',
                function() {
                    console.log(1);
                    $.ajax({type: "POST",  url: '/orders/default/approovesuggestion',  data: {id:obj.data('id')},  dataType: 'json',  async :false,
                        success: function( data ) {
                            var data = JSON.parse(data);
                            $('.popup-wrapper-confirm').removeClass('active');
                            location.reload();
                        }
                    });

                },
                function() {
                    $('.popup-wrapper-confirm').removeClass('active');
                }
            );
            return false;

        });



    }

});