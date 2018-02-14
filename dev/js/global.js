/*-------------------------------------------------------------------------------------------------------------------------------*/
/*This is main JS file that contains custom style rules used in this template*/
/*-------------------------------------------------------------------------------------------------------------------------------*/
/* Template Name: "Title"*/
/* Version: 1.0 Initial Release*/
/* Build Date: 06-02-2016*/
/* Author: Title*/
/* Copyright: (C) 2016 */
/*-------------------------------------------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------*/
/* TABLE OF CONTENTS: */
/*--------------------------------------------------------*/
/* 01 - VARIABLES */
/* 02 - page calculations */
/* 03 - function on document ready */
/* 04 - function on page load */
/* 05 - function on page resize */
/* 06 - function on page scroll */
/* 07 - swiper sliders */
/* 08 - buttons, clicks, hovers */

var _functions = {};

$(function() {

	"use strict";

	/*================*/
	/* 01 - VARIABLES */
	/*================*/
	var swipers = [], winW, winH, winScr, footerTop, _isresponsive, _ismobile = navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i);



    _functions.Msg = function(title, subtitle){
         if (title!='') title = '<div class="empty-space marg-lg-b35"></div><h4 class="h4 text-center">'+title+'</h4><div class="empty-space marg-lg-b5"></div>';
         if (subtitle!='') subtitle = '<p class="text-center h5">'+subtitle+'</p><div class=" empty-space marg-lg-b35"></div>';
         $('div.popup-wrapper_ div.popup-content div.popup-container.size-2 div.popup-align').html(title + subtitle);
         $('div.popup-wrapper_, div.popup-wrapper_ div.popup-content').addClass('active');
    };



    _functions.dialog = function(title, subtitle,  yesCallback, noCallback) {

        if (title!='') $('div.popup-wrapper-confirm').find('h3').html(title);
        if (subtitle!='') $('div.popup-wrapper-confirm').find('.simple-text p').html(subtitle);

        $('#btnYes').click(function() {
            yesCallback();
            return false;
        });
        $('#btnNo').click(function() {
            noCallback();
            return false;
        });
        return false;
    }

    _functions.QueryStringToHash = function (query) {

    	if (query=="" || typeof query === 'undefined' ) return false;
        var query_string = {};
        var vars = query.split("&");
        for (var i=0;i<vars.length;i++) {
            var pair = vars[i].split("=");
            pair[0] = decodeURIComponent(pair[0]);
            pair[1] = decodeURIComponent(pair[1]);
            // If first entry with this name
            if (typeof query_string[pair[0]] === "undefined") {
                query_string[pair[0]] = pair[1];
                // If second entry with this name
            } else if (typeof query_string[pair[0]] === "string") {
                var arr = [ query_string[pair[0]], pair[1] ];
                query_string[pair[0]] = arr;
                // If third or later entry with this name
            } else {
                query_string[pair[0]].push(pair[1]);
            }
        }
        return query_string;
    }

	/*========================*/
	/* 02 - page calculations */
	/*========================*/
	_functions.pageCalculations = function(){
		winW = $(window).width();
		winH = $(window).height();
	};

	/*=================================*/
	/* 03 - function on document ready */
	/*=================================*/
	if(_ismobile) $('body').addClass('mobile');
	_functions.pageCalculations();
	setTimeout(function() {
		$('body').addClass('loaded');
		$('#loader-wrapper').fadeOut();
	}, 300);


	/*============================*/
	/* 04 - function on page load */
	/*============================*/
	$(window).load(function(){
		_functions.initSwiper();
		_functions.pageformCalculate();
	});

	/*==============================*/
	/* 05 - function on page resize */
	/*==============================*/
	_functions.resizeCall = function(){
		_functions.pageCalculations();
		_functions.pageformCalculate();
		_functions.rangeSkew();
	};
	if(!_ismobile){
		$(window).resize(function(){
			_functions.resizeCall();
		});
	} else{
		window.addEventListener("orientationchange", function() {
			_functions.resizeCall();
		}, false);
	}

	/*==============================*/
	/* 06 - function on page scroll */
	/*==============================*/
	$(window).scroll(function(){
		_functions.scrollCall();
		loadThemes();
	});

	_functions.scrollCall = function(){
		winScr = $(window).scrollTop();
		_functions.menuScroll();
	};

	_functions.menuScroll = function(){
		var $banner = $('.tt-target-scroll');
		if ($banner.length){			
			if(winScr>$banner.offset().top+$banner.outerHeight()){
				$('.tt-header').addClass('scroll');
			} else{
				$('.tt-header').removeClass('scroll');
			}
		} else{
			$('.tt-header').removeClass('scroll');
		}
	};

	/*=====================*/
	/* 07 - swiper sliders */
	/*=====================*/
	var initIterator = 0;
	_functions.initSwiper = function(){
		$('.swiper-container').not('.initialized').each(function(){								  
			var $t = $(this);								  

			var index = 'swiper-unique-id-'+initIterator;

			$t.addClass('swiper-'+index+' initialized').attr('id', index);
			$t.find('.swiper-pagination').addClass('swiper-pagination-'+index);
			$t.find('.swiper-button-prev').addClass('swiper-button-prev-'+index);
			$t.find('.swiper-button-next').addClass('swiper-button-next-'+index);

			var slidesPerViewVar = ($t.data('slides-per-view'))?$t.data('slides-per-view'):1;
			if(slidesPerViewVar!='auto') slidesPerViewVar = parseInt(slidesPerViewVar, 10);

			swipers['swiper-'+index] = new Swiper('.swiper-'+index,{
				pagination: '.swiper-pagination-'+index,
		        paginationClickable: true,
		        nextButton: '.swiper-button-next-'+index,
		        prevButton: '.swiper-button-prev-'+index,
		        slidesPerView: slidesPerViewVar,
		        autoHeight:($t.is('[data-auto-height]'))?parseInt($t.data('auto-height'), 10):0,
		        loop: ($t.is('[data-loop]'))?parseInt($t.data('loop'), 10):0,
				autoplay: ($t.is('[data-autoplay]'))?parseInt($t.data('autoplay'), 10):0,
		        breakpoints: ($t.is('[data-breakpoints]'))? { 767: { slidesPerView: parseInt($t.attr('data-xs-slides'), 10) }, 991: { slidesPerView: parseInt($t.attr('data-sm-slides'), 10) }, 1199: { slidesPerView: parseInt($t.attr('data-md-slides'), 10) } } : {},
		        initialSlide: ($t.is('[data-ini]'))?parseInt($t.data('ini'), 10):0,
		        speed: ($t.is('[data-speed]'))?parseInt($t.data('speed'), 10):500,
		        keyboardControl: true,
		        mousewheelControl: ($t.is('[data-mousewheel]'))?parseInt($t.data('mousewheel'), 10):0,
		        mousewheelReleaseOnEdges: true,
		        direction: ($t.is('[data-direction]'))?$t.data('direction'):'horizontal',
		        spaceBetween: ($t.is('[data-space-between]'))?parseInt($t.data('space-between'), 10):0,
		        centeredSlides: ($t.is('[data-center]'))?parseInt($t.data('center'), 10):0,
		        preloadImages: !($t.is('[data-lazy]'))?parseInt($t.data('lazy'), 10):0,
		        lazyLoading: ($t.is('[data-lazy]'))?parseInt($t.data('lazy'), 10):0,
		        watchSlidesVisibility: ($t.is('[data-lazy]'))?parseInt($t.data('lazy'), 10):0,
		        slideToClickedSlide : ($t.is('[data-clicked-slide]'))?parseInt($t.data('clicked-slide'), 10):0
			});
			swipers['swiper-'+index].update();
			initIterator++;
		});
		$('.swiper-container.swiper-control-top').each(function(){
			swipers['swiper-'+$(this).attr('id')].params.control = swipers['swiper-'+$(this).closest('.tt-two-slider').find('.swiper-control-bottom').attr('id')];
		});
		$('.swiper-container.swiper-control-bottom').each(function(){
			swipers['swiper-'+$(this).attr('id')].params.control = swipers['swiper-'+$(this).closest('.tt-two-slider').find('.swiper-control-top').attr('id')];
		});
		$('.custom-arrows-prev').on('click', function(){
			swipers['swiper-'+$(this).siblings('.swiper-container').attr('id')].slidePrev();
		});
		$('.custom-arrows-next').on('click', function(){
			swipers['swiper-'+$(this).siblings('.swiper-container').attr('id')].slideNext();
		});		
	};


	
	function validateNumber(event) {
		var key = window.event ? event.keyCode : event.which;
		if (event.keyCode === 8 || event.keyCode === 46) {
			return true;
		} else if ( key < 48 || key > 57 ) {
			return false;
		} else {
			return true;
		}
	};
 
   $('.numberic').keypress(validateNumber);
   
   $('.numberic').change(function(){
		$(this).val($(this).val().replace(/[^\d]+/g,''));
   });
	
	/*==============================*/
	/* Load Time Left              */
	/*==============================*/

    if($("time.timeago").length) $.each($("time.timeago"), function (index) {
        $(this).html($.timeago($(this)));
    });

	/*==============================*/
	/* 08 - buttons, clicks, hovers */
	/*==============================*/
	//menu
	$('.cmn-toggle-switch').on('click', function(e){
		$(this).toggleClass('active');
		$(this).parents('header').find('.toggle-block').toggleClass('active');
		e.preventDefault();
	});
	$('.main-nav .menu-toggle').on('click', function(e){
		$(this).closest('li').addClass('select').siblings('.select').removeClass('select');
		$(this).closest('li').siblings('.parent').find('ul').slideUp();
		$(this).parent().siblings('ul').slideToggle();
		e.preventDefault();
	});

	/*simple-select*/

	/*
	if($('.simple-select select').length){
		$('.simple-select:not(.multy) select').SumoSelect();
		$('.simple-select.multy.region select').SumoSelect({
			placeholder: 'Виберіть область',
			selectAll: true,
			captionFormat: '{0} Вибрано',
    		captionFormatAllSelected: 'Вся Україна',
    		locale :  ['OK', 'Відмінити ', 'Вся Україна'],		
		});
		$('.simple-select.multy.budget select').SumoSelect({
			placeholder: 'Виберіть бюджет',
			selectAll: true,
			captionFormat: '{0} Вибрано',
    		captionFormatAllSelected: 'Будь який бюджет',
    		locale :  ['OK', 'Відмінити ', 'Будь який бюджет'],		
		});		
	}

	*/
	$('.simple-select select').on('change', function(){
		var $selected = $(this).find('option:selected');
		if($selected.data('link')){
			window.location.href = location.protocol+'//'+location.host+'/'+$selected.data('link');
		}
	});

	/*checkbox-list*/
	$('.checkbox-list ul input').on('change', function(){
		var $t = $(this);
		if($t.is(':checked')){
			$t.closest('ul').closest('li').find('.checkbox-toggle input').prop('checked', true);
		} else{
			var checkbox = $t.closest('ul').find('input'),
				checkedCount = 0;
			for(var i = 0; i< checkbox.length; i++){
				if($(checkbox[i]).is(':checked')){checkedCount+=1;}
			}
			if(checkedCount==0){
				$t.closest('ul').closest('li').find('.checkbox-toggle input').prop('checked', false);
			}
		}
	});
	$('.checkbox-toggle input').on('click', function(){
		return false;
	});
	$('.checkbox-toggle a').on('click', function(e){
		$(this).closest('.checkbox-toggle').toggleClass('active').siblings('ul').slideToggle();
		e.preventDefault();
	});

	/*simple-input.max-count*/
	for(var i = 0; i < $('.simple-input-max').length; i++){
		simpleInputLimit($('.simple-input-max').eq(i).find('.simple-input'));
	}
	$('.simple-input-max .simple-input').on('input', function(){
		simpleInputLimit($(this));
	});	
	function simpleInputLimit($input) {
		var maxlength = parseInt($input.attr("maxlength"),10),
			currentLength = $input.val().length;
	    if( currentLength >= maxlength ){
	        $input.closest('.simple-input-max').find('.simple-input-max-count').text("Залишилося 0 символів");
	    }else{
	    	$input.closest('.simple-input-max').find('.simple-input-max-count').text('Залишилося ' + (maxlength - currentLength) + " символів");
	    }
	}



	/*simple-datapicker*/
	
    $('div.simple-input-icon img').on('click', function() {
		$(this).parent().find('.hasDatepicker').datepicker("show");
	});

	

	for(var i = 0; i<$('.simple-datapicker').length; i++){

		var $datepicker = $('.simple-datapicker').eq(i),
			minDateVal = ($datepicker.is('[data-min-date]'))?parseInt($datepicker.data('min-date'), 10):null;
		$datepicker.datepicker({
			minDate: minDateVal
		});
	    $.datepicker.regional['uk'];
    }
	for(var i = 0; i<$('.simple-datapicker-multi').length; i++){
		var $multiDatepicker = $('.simple-datapicker-multi').eq(i),
			minDateVal = ($multiDatepicker.is('[data-min-date]'))?parseInt($multiDatepicker.data('min-date'), 10):null;
		$multiDatepicker.multiDatesPicker({
			minDate: minDateVal,
			maxPicks: 10
		});
	    $.datepicker.regional['uk'];
	    $.datepicker._selectDateOverload = $.datepicker._selectDate;
		$.datepicker._selectDate = function (id, dateStr) {
			var target = $(id);
			var inst = this._getInst(target[0]);
			if (target[0].multiDatesPicker != null) {
				inst.inline = true;
				$.datepicker._selectDateOverload(id, dateStr);
				inst.inline = false;	        	
				target[0].multiDatesPicker.changed = false;
			} else {
				$.datepicker._selectDateOverload(id, dateStr);
				target.multiDatesPicker.changed = false;
			}
			this._updateDatepicker(inst);
		};	    
    }


    if ($("#sdate,#edate").length) {

        $("#sdate,#edate").datepicker({
            dateFormat: "dd.mm.yy",
            minDate: 0,
            changeMonth: false,
            changeYear: false
        }).change(function () {
            var sdate = $('#sdate').datepicker("getDate");
            var edate = $('#edate').datepicker("getDate");
            if (this.id == 'sdate') {
                if (sdate > edate) {
                    $('#edate').datepicker("setDate", sdate);
                }
            } else {
                if (edate < sdate) {
                    $('#sdate').datepicker("setDate", edate);
                }
            }
        });
        $("#sdate,#edate").datepicker();
    }

	/*tabs*/
	var tabsFinish = 0;
	$('div.tab-menu:not(.redirect)').on('click', function() {
		if($(this).hasClass('active') || tabsFinish) return false;
		tabsFinish = 1;
        var tabsWrapper = $(this).closest('.tabs-block'),
        	tabsMenu = tabsWrapper.children('.tab-nav').children('.tab-menu'),
        	tabsItem = tabsWrapper.children('.tab-entry'),
        	index = tabsMenu.index(this);
        
        tabsItem.filter(':visible').fadeOut(function(){
        	tabsItem.eq(index).fadeIn(function(){
        		tabsFinish = 0;
        	});
        });
        tabsMenu.removeClass('active');
        $(this).addClass('active');
    });


    $('div.review_list').on('click', function() {
		var value = $(this).data('value');
        $(".tt-review" ).each(function() {
        	if ($(this).data('review') == value || value==0)  {
                $(this).css({'display':'block'});
                $(this).next().css({'display':'block'});
			} else {
                $(this).css({'display':'none'});
                $(this).next().css({'display':'none'});
            }
		});
        $('div.review_list').removeClass('active');
        $(this).addClass('active');
    });


/*
    $('.tab-menu').on('click', function() {

    	if ($(this).hasClass('tab-fadeout')) {
	        $(this).closest('.tab-nav').next().filter(':visible').fadeOut(function(){
    		    return true;
            });
		}

	});
*/
	//tabs from hash
	var hash = location.hash.replace('#', '');
	if(hash){
		hashTab();
	}
	function hashTab(){
		$('div.tab-menu[data-tab="'+hash+'"]').trigger( "click" );
	}
	$(window).on("hashchange", function() {
	    if(window.location.hash) {
	        hash = location.hash.replace('#', '');
	        hashTab();
	    }		
	});	
	


	/*accordeon*/
	$('.accordeon-title').on('click', function(){
		$(this).closest('.accordeon').find('.accordeon-title').not(this).removeClass('active').next().slideUp();
		$(this).addClass('active').next().slideDown();
	});       
    
	//open and close popup
	$(document).on('click', '.open-popup', function(e){
		if($(this).hasClass('disabled')){return false;}
		if($(this).hasClass('tt-vote')){voteMaster($(this));}

		var $t = $(this);
		$('body, html').addClass('overflow-body');
		$('.popup-content').removeClass('active');
		$('.popup-wrapper, .popup-content[data-rel="'+$t.data('rel')+'"]').addClass('active');
		return false;
	});



	function showprogress() {
   if (document.images.length == 0) {return false;}
   var loaded = 0;
   for (var i=0; i<document.images.length; i++) {
    if (document.images[i].complete) {
  loaded++;
    }
   }
   percentage  = (loaded / document.images.length);
  }
     
	var ID, percentage, ajaxFinish = 0;
	
	

    $(document).on('click', '.open-popup-big', function(e){
        $('body, html').addClass('overflow-body');
    	var url =  "/members/portfolio/detail/?id="+$(this).data('id');
    	if ($('.map-order-view').length) url =  "/orders/default/gallery/?id="+$(this).data('id');

        if ($(this).hasClass('response-image')) {
            url =  "/professionals/default/responsegallery/?id="+$(this).data('id');
		}

		
		
		
		
        $.post(url, function( data ) {
            $("#popup-wrapper-big-content").html(data);

            setTimeout(function(){

			
			ID = window.setInterval(function(){
      showprogress();
      if (percentage == 1) {
       window.clearInterval(ID);
       percentage = 0;
          _functions.initSwiper();
      }
     });
			
			

                _functions.pageformCalculate();
				
				
				
                $('.popup-wrapper-big, .popup-content').addClass('active');
            }, 300);
        });
		
        return false;
    });


    $(document).on('click', 'div.popup-container.size-5.gallery div.button-close', function(){
        $('.popup-wrapper-big, .popup-content').removeClass('active');
        $('body, html').removeClass('overflow-body');
        return false;
    });


	$(document).on('click', '.popup-wrapper .button-close, .popup-wrapper .popup-close, .popup-wrapper .layer-close', function(){
		$('.popup-wrapper, .popup-content').removeClass('active');
		$('body, html').removeClass('overflow-body');
		$('.tt-vote-selected').removeClass('tt-vote-selected');
		return false;
	});

    $(document).on('click', '.popup-close', function(){
		$(this).closest('form')[0].reset();
        return false;
    });

    $(document).on('click', '.popup-wrapper_ .button-close', function(){
        $('.popup-wrapper_, div.popup-wrapper_ div.popup-content').removeClass('active');
        return false;
    });


    function GetMessage(title, subtitle){
        if (title!='') title = '<div class="empty-space marg-lg-b35"></div><h4 class="h4 text-center">'+title+'</h4><div class="empty-space marg-lg-b5"></div>';
        if (subtitle!='') subtitle = '<p class="text-center h5">'+subtitle+'</p><div class=" empty-space marg-lg-b35"></div>';
        $('div.popup-wrapper_ div.popup-content div.popup-container.size-2 div.popup-align').html(title + subtitle);
        $('div.popup-wrapper_, div.popup-wrapper_ div.popup-content').addClass('active');
    }


	$('.simple-toggle-title').on('click', function(e){
		$(this).siblings('.simple-toggle-content').slideToggle();
		e.preventDefault();
	}); 

    /*tooltip*/
    $('.tt-tooltip').on({
	    mouseenter: function () {
	    	var position = $(this).offset(),
	    		top = position.top,
	    		infoClass = '';
	    	if($(this).hasClass('bottom')){
	    		top+=45;
	    		infoClass += ' bottom';
	    	}
	    	if ($(this).attr('data-tooltip-color')=='white'){infoClass += ' white';}
	    	$('body').append( "<div class='tt-tooltip-info"+infoClass+"' style='top:"+top+"px;left:"+position.left+"px;'><div class='simple-text size-2 light'><p>"+$(this).attr('data-tooltip')+"</p></div></div>" );
	    	$('.tt-tooltip-info').animate({opacity: 1,top: "-=10"},300);
	    },
	    mouseleave: function () {
	    	$('.tt-tooltip-info').remove();
	    }    	
    });

    /*checkbox-editable*/
    $('.checkbox-entry-input input').on('focus', function(){
    	$(this).closest('.checkbox-entry-editable').find('input[type="radio"]').prop('checked', true);
    });
    $('.checkbox-entry-toggle .checkbox-entry input').on('change', function(){
    	var $wrapper = $(this).closest('.checkbox-entry-toggle');
    	if($(this).prop('checked')){
    		$wrapper.find('.checkbox-entry-unchecked').fadeOut(300, function(){
    			$wrapper.find('.checkbox-entry-checked').fadeIn(300);
    		});
    	} else{
    		$wrapper.find('.checkbox-entry-checked').fadeOut(300, function(){
    			$wrapper.find('.checkbox-entry-unchecked').fadeIn(300);
    		});
    	}
    });    

    /*informer*/
    $(document).on('click', '.add-to-informer', function(e){
    	var $countBlock = $('.tt-informer-nubmer'),
    		count =  parseInt($countBlock.text(), 10);    	
    	if($(this).hasClass('active')) {
    		$(this).text('Замовити послугу').removeClass('active');

            $.post("/professionals/default/suggestremove?id="+$(this).attr('data-user-id'), function( data ) {
                data = JSON.parse(data);
                console.log(data);

                if (data.total==0)  $('.tt-informer').removeClass('active');
                if (data.total>=0) {
                    $countBlock.text(data.total);
                    $('.tt-informer-img').html('');
                    $.each( data.data, function( key, value ) {
                        $('.tt-informer-img').append('<img data-user-id="'+value['id']+'" src="'+value['avatar']+'" style="height: 60px;" alt="">');
                    });
                }
            });

    		//$('.tt-informer-img img[data-user-id="'+$(this).attr('data-user-id')+'"]').remove();
    		//$countBlock.text(count-1);
    	} else{
	    	$(this).text('Скасувати послугу').addClass('active');

            $.post("/professionals/default/suggest?id="+$(this).attr('data-user-id'), function( data ) {
                data = JSON.parse(data);
            	console.log(data);
            	if (data.total>0) {
                    $countBlock.text(data.total);
                    $('.tt-informer-img').html('');
                    $.each( data.data, function( key, value ) {
                        $('.tt-informer-img').append('<img data-user-id="'+value['id']+'" src="'+value['avatar']+'" style="height: 60px;" alt="">');
                    });
				}
            });

	    	//$('.tt-informer-img').append('<img data-user-id="'+$(this).attr('data-user-id')+'" src="'+$(this).attr('data-img')+'" alt="">');
	    	//$countBlock.text(count+1);

	    	$('.tt-informer').addClass('active');    		
    	}
    	e.preventDefault();
    });
    $('.tt-informer-close').on('click', function(e){
    	var $informer = $(this).closest('.tt-informer');
    	$informer.removeClass('active');
    	$informer.find('.tt-informer-nubmer').text('0'); 
    	$informer.find('.tt-informer-img').empty();
        $.post("/professionals/default/suggestedreset", function( data ) {console.log(data);});


    	$('.add-to-informer.active').text('Замовити послугу').removeClass('active');
    	e.preventDefault();
    });



    /*rating*/

/*
    $('.tt-rating-stars.wth-hover span').on('click', function(){
    	$(this).closest('.tt-rating-stars').addClass('selected');
    	$(this).siblings('.active').removeClass('active');
    	$(this).addClass('active');

		var field = $(this).closest('.tt-rating-stars').data('field');
		var rating =$('.tt-rating-stars.wth-hover.selected.'+field+' span').index($(this))+1;
		console.log(rating);



        $('#memberresponse-'+field).val(rating);


    });
    $('.tt-underheading-show').on('click', function(e){
    	$('.tt-underheading-item').addClass('active');
        console.log(2);
    });


    $('#cancel_response').on('click', function(){

		var form = $(this).closest('form');
//    	console.log(form.yiiActiveForm('data'));


    	if ($(this).val()=='step-1') {

            form.yiiActiveForm('remove', 'memberresponse-connected');
            form.yiiActiveForm('remove', 'memberresponse-devotion');
            form.yiiActiveForm('remove', 'memberresponse-meeting');

        }






	});

*/
/*

	$('.tt-contact-form form, .tt-send-question-form form').on('submit',function(e){
	   submitFrom($(this),$(this).data('rel'));
	   e.preventDefault();
	});
    function submitFrom($form,popup) {
        $.ajax({type:'POST', url:'email-action.php', data:$form.serialize(), success: function(response) {
			$('.popup-content').removeClass('active');
			$('.popup-wrapper, .popup-content[data-rel="'+popup+'"]').addClass('active');
			$('html').addClass('overflow-hidden');        	
           	$form[0].reset();                               
        }});                
        return false;
    }      
*/

    _functions.pageformCalculate = function(){
    	if(!$('.tt-pageform-wrapper').length) return false;
		var footerH = $('.tt-footer').outerHeight();
		$('.tt-pageform-wrapper').css('height',winH-70-footerH+'px');
	};

	/*tt-dropdown*/
/*
	$('.tt-dropdown-link').on('click', function(e){
		$(this).closest('.tt-dropdown').toggleClass('active').find('.tt-dropdown-entry').slideToggle();
		e.preventDefault();
	});
	$('.tt-dropdown-close,.tt-dropdown-overlay').on('click', function(e){
		$(this).closest('.tt-dropdown-entry').slideUp().closest('.tt-dropdown').removeClass('active');
	});
*/
	/*tt-editable slide animation*/
	$('.tt-editable-wrapper.slide-anim .tt-editable-click').on('click', function(e){
		if(!$(this).closest('.tt-editable-wrapper').hasClass('opened')){
			$(this).closest('.tt-editable-wrapper').addClass('opened').find('.tt-editable').slideUp(300).siblings('.tt-editable-form').slideDown(300);
		}
	});
	$('.tt-editable-wrapper.slide-anim .tt-editable-close').on('click',function(e){
		$(this).closest('.tt-editable-form').slideUp(300).siblings('.tt-editable').slideDown(300, function(){
			$(this).closest('.tt-editable-wrapper').removeClass('opened');
		});
		e.preventDefault();
	});

	/*tt-editable fade animation*/
	$('.tt-editable-wrapper.fade-anim .tt-editable-click').on('click', function(e){
		$(this).closest('.tt-editable-wrapper').find('.tt-editable').fadeOut(300,function(){
        	$(this).siblings('.tt-editable-form').fadeIn();
        });
	});
	$('.tt-editable-wrapper.fade-anim .tt-editable-close').on('click',function(e){
		$(this).closest('.tt-editable-form').fadeOut(300,function(){
        	$(this).siblings('.tt-editable').fadeIn();
        });		
		e.preventDefault();
	});
/*
	$('.tt-editable-form form').on('submit',function(e){

		console.log(11);
		var dataArray = $(this).serializeArray(),
			$wrapper = $(this).closest('.tt-editable-wrapper');

		if($(this).closest('.tt-editable-form').hasClass('has-checkbox')){
			var $content = $wrapper.find('.tt-editable-item').empty();
			for(var i=0;i<dataArray.length;i++){
				if(dataArray[i].name.indexOf('parent') !== -1){
					$content.append('<p><b>'+dataArray[i].value+'</b></p>');
				} else {
					$content.append('<div>'+dataArray[i].value+'</div>');
				}
			}
		} else {
			for(var i=0;i<dataArray.length;i++){
				$wrapper.find('.tt-editable-item[data-rel="'+dataArray[i].name+'"]').html(dataArray[i].value.replace(/\n|\r\n|\r/g, "<br>"));
			}
		}

	    $(this).closest('.tt-editable-form').slideUp(300).siblings('.tt-editable').slideDown(300, function(){
			$(this).closest('.tt-editable-wrapper').removeClass('opened');
		});
	   	e.preventDefault();
	});

*/
	/*tt-reply-write*/
	$('.tt-reply-write-info textarea').on("focus", function(){
		$(this).closest('.tt-reply-write-info').addClass('active');
        $(this).closest('.tt-reply-write-info').siblings('.tt-buttons-block').slideDown(300);
	});

	$('.tt-reply-write-close').on('click', function(e){
		$(this).closest('.tt-buttons-block').slideUp(300).closest('.tt-reply-write-info').removeClass('active');
	});


	/*project new upload image*/
	$('.tt-img-upload input').on('change', function(e){
		var $t = $(this);





		if (this.files && this.files[0]) {
			var image = this.files[0];

/*

            var realWidth = image.naturalWidth;

            var realHeight = image.naturalHeight;

            alert("Original width=" + realWidth + ", " + "Original height=" + realHeight);
*/
	        var reader = new FileReader();
	        reader.onload = function (e) {








                var Upload = function (file) { this.file = file;



                	var img = new Image;
                    img.onload = function() {
                  //      var Width = img.naturalWidth;
                  //      var Height = img.naturalHeight;
                    };


                    img.src = reader.result;

                    this.file.width = img.naturalWidth;
                    this.file.height = img.naturalHeight;


                };
                //var obj= $(this);
                Upload.prototype.getType = function() {return this.file.type;};
                Upload.prototype.getSize = function() {return this.file.size;};
                Upload.prototype.getName = function() {return this.file.name;};
                Upload.prototype.width = function() {return this.file.width;};
                Upload.prototype.height = function() {return this.file.height;};


                Upload.prototype.doUpload = function () {
                    var that = this;
                    var formData = new FormData();
                    formData.append("file", this.file, this.getName());
                    formData.append("upload_file", true);
                    $.ajax({
                        type: "POST",
                        url: $t.data('source'),
                        xhr: function () {
                            var myXhr = $.ajaxSettings.xhr();
                            if (myXhr.upload) {
                                $('#progress-wrp').fadeIn(500, function(){
                                    $(this).css({'visibility':'visible'});
                                    $("#progress-wrp .progress-bar").css("width", "0%");
                                });
                                myXhr.upload.addEventListener('progress', that.progressHandling, false);
                            }
                            return myXhr;
                        },
                        success: function (data) {
                            var data = JSON.parse(data);
                            if (data.status==1){
                                $('div#image_'+index_image).data('id', data.id);

                                setTimeout(function(){
									$('#progress-wrp').fadeOut(300, function(){
										$(this).remove();
									});
								}, 1500);
                            }
                            // your callback here
                        },
                        error: function (error) {
                            console.log('Error uploading file');
                            // handle error
                        },
                        async: true, data: formData, cache: false, contentType: false, processData: false, dataType: 'json', timeout: 60000
                    });

                };

                Upload.prototype.progressHandling = function (event) {
                    var percent = 0;
                    var position = event.loaded || event.position;
                    var total = event.total;
                    var progress_bar_id = "#progress-wrp";
                    if (event.lengthComputable) {
                        percent = Math.ceil(position / total * 100);
                    }
                    // update progressbars classes so it fits your code
                    $(progress_bar_id + " .progress-bar").css("width", +percent + "%");

                };


	            var upload = new Upload(image);


console.log(upload.width());
 console.log(upload.height());

				if ((upload.getSize()/1024)/1024 > 3) {
                    GetMessage('Завеликий розмір зображення', 'для завантаження не більше 3 Мб');
				} else{

                    var clone = $t.clone();

                    var index_image = $(".tt-project-pic-loaded").length+1;
                    clone.css({'visibility': 'hidden'}).attr('name', $t.data('name')+'[image][]');
                    $t.closest('.tt-project-new-img').append('<div class="tt-project-pic-loaded" data-id="0" id="image_'+index_image+'">'+'<span style="background-image:url('+e.target.result+');"></span><div class="button-close small"></div>'+
                        '<div id="progress-wrp" style="width: 186px;position: absolute;top: 70px;height: 15px;box-shadow: none;margin-left: 10px;"><div class="progress-bar"></div></div></div>');
                    clone.appendTo("#image_"+$('.tt-project-pic-loaded').length);

                    if ($(".tt-task-gal-edit").length){
						upload.doUpload();
					}

				}


            };
	        reader.readAsDataURL(image);
        }
	});



	$(document).on('click', '.tt-project-pic-loaded .button-close', function(){
		var obj = $(this).closest('.tt-project-pic-loaded');

		if (obj.data('id')==0) {

            $(this).closest('.tt-project-pic-loaded').remove();
            if ($(".tt-project-pic-loaded").length==0){
                $(".tt-img-upload input[type=file]").val('');
			}

		} else {


            $.post("/orders/default/imagedelete?id="+obj.data('id'), function( data ) {
                var data = JSON.parse(data);
                if (data.status==1) {
                    obj.fadeOut(500, function(){
                        $(this).remove();
                    });
                }
            });
		}
        return true;

	});

	/*tt-file-upload*/
/*	$('.tt-file-upload input[type="file"]').on('change', function(e){
		$(this).closest('.tt-file-upload').siblings('.tt-file-info').text($(this).val().split( '\\' ).pop()); 
	});
*/
	/*tt-project-new*/
/*
	$('.tt-project-add,.tt-project-img-edit').on('click', function(e){
		$(this).closest('.tt-project-edit-wrapper').children('.tt-project-list').fadeOut(300, function(){
			$(this).siblings('.tt-project-new').fadeIn(300);
		});
		e.preventDefault();
	});

*/
	//slider range
	var trueValues = [1000, 5000, 10000, 50000, 100000];
    var simValues =  [1, 2, 3, 4, 5];
  	$(".slider-range" ).each(function(index) {
     	var $t = $(this),
     		valueVal = parseInt($t.data('value'),10),   	     	
     		minVal = parseInt($t.data('min'),10),     	     	
     		maxVal = parseInt($t.data('max'),10);     	     	
     	$t.find(".range").attr("id","slider-range-"+index);
     	$t.find(".amount-value").attr("id","amount-value-"+index);     	   	
	  	$("#slider-range-"+index).slider({
			range: 'min',
			min: 0,
			max: maxVal,
			value: valueVal,
			slide: function( event, ui ) {
		        var includeLeft = event.keyCode != $.ui.keyCode.RIGHT;
		        var includeRight = event.keyCode != $.ui.keyCode.LEFT;
		        var value = findNearest(includeLeft, includeRight, ui.value);
	            $("#slider-range-"+index).slider('value',value);
	            var realValue = getRealValue(value);
				$("#amount-value-"+index).val(realValue);
				$(".amount-value-id").val(ui.value);
				rangeGroup($t,realValue);
				return false;
			}
	    });
		rangeGroup($t,valueVal);
    });
    function findNearest(includeLeft, includeRight, value) {
        var nearest = null;
        var diff = null;
        for (var i = 0; i < simValues.length; i++) {
            if ((includeLeft && simValues[i] <= value) || (includeRight && simValues[i] >= value)) {
                var newDiff = Math.abs(value - simValues[i]);
                if (diff == null || newDiff <= diff) {
                    nearest = simValues[i];
                    diff = newDiff;
                }
            }
        }
        return nearest;
    } 
    function getRealValue(sliderValue) {
        for (var i = 0; i < simValues.length; i++) {
            if (simValues[i] >= sliderValue) {
                return trueValues[i];
            }
        }
        return 0;
    } 
    function rangeGroup($slider,value){
    	var $target = $slider.find('.slider-range-group');
		if(value==trueValues[1]){$target.addClass('active1').text('Мілкий');}
		else if(value==trueValues[2]){$target.addClass('active2').text('Невеликий');}
		else if(value==trueValues[3]){$target.addClass('active2').text('Середній');}
		else if(value==trueValues[4]){$target.addClass('active2').text('Великий');}
        else if(value==trueValues[4]){$target.addClass('active2').text('Дуже великий');}
    }

    _functions.rangeSkew = function(){
    	for (var i = 0; i < $('.slider-range').length; i++){
	    	var $range = $('.slider-range').eq(i),
	    		$slider = $range.find('.ui-slider-horizontal'),
	    		third = Math.tan($slider.height()/$slider.width()) * (180/Math.PI);
	    	third *= 0.90;
	    	$range.find('.slider-range-skew span').addClass('active').css('transform', 'rotate(-'+third+'deg)');
		}	    	
    };
	_functions.rangeSkew();


	/*.tt-toggle-list*/

    $(document).on('click', '.tt-toggle-list > li > a', function(e){
		var $t = $(this);
		$t.closest('.tt-toggle-list').find('.active ul').slideUp(300, function(){
			$(this).parent().removeClass('active');
		});
		$t.siblings('ul').slideToggle(300).parent().addClass('active');
		e.preventDefault();
	});



    $(document).on('change', 'select#profsearch-region', function(e){
        var $t = $(this);
        $.each(region, function( index, value ) {
        	if (value['id']==$t.val())  {
				var url = '?region='+value['url_tag']+($t.data('cat')=='' ? '' : '&cat='+$t.data('cat'))
                $('a#hidden-region-regirect').attr('href', url).click();
				return;
			}
        });
        e.preventDefault();
    });



	/*tt-fadein-link*/
	/*
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
    */
/*
    $('input.simple-input[type="tel"]').mask("+38 (099) 999-9999", {completed:function(){
      //  $('input.simple-input[type="tel"]').next().html('1111');


    //	alert("completed!");
    }});
*/
    $('.tt-phone-submit').on('click', function(e){

		var obj = $(this);
		if (obj.is(":disabled")) { return false; }


		var number = obj.closest('.tt-fadein-top').find('.simple-input').val();
		var RegX = /([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/;
        if (RegX.test(number)) {
            $.post( "/site/sendphonecode", {'phone' : number},  function( data ) {
                var data = JSON.parse(data);
                if (data.status==1){
                    obj.closest('.tt-fadein-top').siblings('.tt-fadein-bottom').find('.simple-text span:first').text(number);
                    obj.closest('.tt-fadein-top').fadeOut(300, function(){
                        $(this).siblings('.tt-fadein-bottom').fadeIn(300);
						$('input#confirm_sms').val('');
						$('input.simple-input[type="tel"]').data('phone', number);

                    });
				} else {
                	console.log('Wrong phone number');
				}
            });
		}

		e.preventDefault();
		return false;
	});


    $('body').on('keyup','input.simple-input[type="tel"]', function(event) {
        var number = $(this).val();
        var RegX = /([+]?\d[ ]?[(]?\d{3}[)]?[ ]?\d{2,3}[- ]?\d{2}[- ]?\d{2})/;
        if (RegX.test(number)) {
            $(".tt-phone-submit").removeClass('disabled');
            number.next().html('');
			if ($('input#confirm_sms').val()=='' && number.data('phone')!=number && number.next().html()=='') number.next().html('Підтвердіть контактний телефон через SMS.');
			
			if (number.data('phone')!='' && number.data('phone')!=number) {
				$('input#confirm_sms').val('');
                number.next().html('Була спроба зміни номеру телефону, прошу підтвердити через SMS');
			}	
		} else{
            $(".tt-phone-submit").addClass('disabled');
            number.next().html('Невірний номер мобільного телефону');
		}
    });

	
    $('.tt-phone-code-submit').on("click", function(){
        var obj= $(this);
        $.post( "/site/sendcheckcode", 
		{'confirm_sms' : $('input#confirm_sms').val(), 'phone': $('input.simple-input[type="tel"]').val()},  
		function( data ) {
            var data = JSON.parse(data);
            if (data.status==1){
			    $('.tt-phone-code-submit').closest('.tt-fadein-bottom').fadeOut(300, function(){
                    $('input.simple-input[type="tel"]').next().html('');
					$(".phone-reg-block").fadeIn(300);



                    if ($('input.simple-input[type="tel"]').parent().parent().hasClass("col-sm-8"))
                    	$('input.simple-input[type="tel"]').parent().parent().removeClass('col-sm-8').removeClass('col-md-9').addClass('col-md-12').next('div').hide();
                    else
                        $('input.simple-input[type="tel"]').parent().parent().removeClass('col-sm-7').removeClass('col-md-8').addClass('col-md-12').next('div').hide();

                    $('input.simple-input[type="tel"]').closest('.phone-reg-block').prev('.tt-input-label').text('Телефон підтверджено').css({'color':'#5cca47'});
                    if (!$("form#edit_phone").length) {
                        $('input.simple-input[type="tel"]').addClass('disabled').css({'background-color':'#e3e6e8'}).attr('readonly', true);
					}
				});
			} else {
				$('input#confirm_sms').next('p').html('Код з SMS невірний.');
			}
		});
    })

    $('span.remove_added_file.remove').on("click", function(){
        $(this).closest('.tt-fadein-bottom').fadeOut(300, function() {
        	$("#confirm_sms").val('');
            $(".phone-reg-block").fadeIn(300);
        });
	});


	/*phone mask*/
/*
	$('input.simple-input[type="tel"]').on('focus', function(){
        $(this).inputmask({"mask": "+38 (099) 999-9999"});
    });
*/
    /*tt-terms-checkbox*/
/*

    $('.tt-terms-checkbox input').on('change', function(){
    	if($(this).is(':checked')){
    		$(this).closest('form').find('.button.disabled').removeClass('disabled').addClass('enable');
    	} else{
    		$(this).closest('form').find('.button.enable').removeClass('enable').addClass('disabled');
    	}
    });
*/
	/*tt-order-filter*/
/*

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
    	var count = $('.tt-order-filter .checkbox-entry:not(.check-all) input:checked').length;
    	if(count){
    		$('.tt-order-filter-select').addClass('selected').find('span:first-child').text(count+' видів робіт');
    	}
    	else{
    		$('.tt-order-filter-select').removeClass('selected').find('span:first-child').text('Оберіть типи робіт');
    	}
    	$('.popup-wrapper, .popup-content').removeClass('active');
    	e.preventDefault();
    	orderFilterMessage();
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



*/


    /*tt-user-card*/
 /*   $('.tt-user-card-remove').on('click', function(e){
    	$(this).closest('.tt-user-card').remove();
    	var count = $('.tt-user-card').length,
    		lastDigit = count%10,
    		countText = '';
    	if(!count){
    		$('.tt-news-task').remove();
    		$('.popup-wrapper .button-close').trigger('click');
    	}
    	if(lastDigit==1&&count!=11){
    		countText = 'майстер';
    	}
    	else if(lastDigit==2||lastDigit==3||lastDigit==4||lastDigit==5){
    		countText = 'майстри';
    	}
    	else{
    		countText = 'майстрів';
    	}
    	$('.tt-news-task-count span').text(count+' '+countText);
    	e.preventDefault();
    });
*/
    /*tt-vote*/
    $(document).on('click', '.tt-vote', function(){
    	$(this).closest('.tt-vote-wrapper').addClass('tt-vote-selected');
    });
    $('.tt-vote-btn').on('click', function(){
    	$('.tt-vote-wrapper').addClass('tt-vote-selected');
    });  
    function voteMaster($btn){
    	if($btn.hasClass('like')){
    		$('.popup-content[data-rel="'+$btn.data('rel')+'"] .checkbox-entry.like input').prop("checked",true);
    	} else{
    		$('.popup-content[data-rel="'+$btn.data('rel')+'"] .checkbox-entry.dislike input').prop("checked",true);
    	}
    }

	/*tt-response-form*/
	$('.tt-response-form form').on('submit',function(e){
		var rating = this.checked_rating.value,
			$btnWrapper = $('.tt-vote-selected'),
			btnCount,
			$btnSelected;
			
		if(rating=='like'){
			$btnSelected = $btnWrapper.find('.tt-vote.like');
			btnCount = parseInt($btnSelected.find('.tt-vote-count').text(),10);
			btnCount+=1;
		} else{
			$btnSelected = $btnWrapper.find('.tt-vote.dislike');
			btnCount = parseInt($btnSelected.find('.tt-vote-count').text(),10);
			btnCount-=1;
		}
		$btnSelected.find('.tt-vote-count').text(btnCount);
		$btnWrapper.removeClass('tt-vote-selected');
		if(btnCount){
			$btnSelected.addClass('active');
		} else{
			$btnSelected.removeClass('active');
		}
		$('.popup-wrapper .button-close').trigger('click');
		this.reset();
	   	e.preventDefault();
	});


	/*tt-select-swither*/
	$('.tt-select-swither select').on('change', function(){
		var optionSelected = $(this).find("option:selected").val();
		$('.tt-select-swither-item').fadeOut(0);
		$('.tt-select-swither-item[data-rel="'+optionSelected+'"]').fadeIn(300);
	});

	/*tt-add-price*/
	$('.tt-add-price').on('click', function(e){
		$(this).before('<div class="list-dotted-item"><div class="list-dotted-left editable"><span><input type="text" value=""></span></div><div class="list-dotted-right"><span>від <input class="simple-input single" type="text"> грн./шт.</span></div></div><div class="empty-space marg-lg-b10"></div>');
		e.preventDefault();
	});

	/*slider change*/
	if($('.tt-banner-qoute-wrapper').length){
		bannerQoute();
	}

	function bannerQoute(){
		setTimeout(function() {
			$('.tt-banner-qoute.active').fadeOut(300, function(){
				var $t = $(this),
					$next;

				if($t.is(':last-child')){
					$next = $t.parent().children('.tt-banner-qoute:first-child');
				} else{
					$next = $t.next();
				}
				$(this).removeClass('active');
				$next.fadeIn().addClass('active');
			});
			bannerQoute();
		}, 5000);		
	}

	$('.task-duration select').on('change', function(){
		var optionSelected = $(this).find("option:selected").val();
	    if(optionSelected=='1'){
	    	$('.task-duration-dates').fadeIn(300);
	    } else {
	    	$('.task-duration-dates').fadeOut(300);
	    }
	});


    $(document).on('click','.tt-widget-dropdown', function(){
		$(this).next().slideToggle();
	});



	/*checkVisible*/
	function checkVisible(elm) {
	  var rect = elm[0].getBoundingClientRect();
	  var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);
	  return !(rect.bottom < 0 || rect.top - viewHeight >= 0);
	}

	var $masterboxLoad = $('.tt-masterbox-load-btn');
	function loadThemes(){
		if(!$masterboxLoad.length){return false;}
		var result = checkVisible($masterboxLoad);
		if(result){
			transitionAjax($masterboxLoad.data('ajax'));
		}
	}

	/*Ajax demo
	only for demo*/
	var demoCount = 0,
		maxDemoCount = 1;
	function showprogress() {
	    if (document.images.length == 0) {
	        return false;
	    }
	    var loaded = 0;
	    for (var i = 0; i < document.images.length; i++) {
	        if (document.images[i].complete) {
	            loaded++;
	        }
	    }
	    percentage = (loaded / document.images.length);
	}	
	var ID, percentage, ajaxFinish = 0;
	var _if_state = (typeof(history.replaceState) !== "undefined") ? true : false;
	function transitionAjax(foo) {
		/* only for demo*/
		if(demoCount>=maxDemoCount){return false;}
		/* *** */

	    if (ajaxFinish) return false;
	    ajaxFinish = 1;
	    var ajaxUrl = foo;

	    $('.preloader-spin').show();

	    $.ajax({
	        type: "GET",
	        async: true,
	        url: ajaxUrl,
	        success: function(response) {
					var responseObject = $($.parseHTML(response));
					var rers= responseObject.html();
					$('.tt-masterbox-ajax').append(rers);

	                ID = window.setInterval(function() {
	                    showprogress();
	                    if (percentage == 1) {
	                        window.clearInterval(ID);
	                        percentage = 0;
                            ajaxFinish = 0;

							/* only for demo*/
                            demoCount++;
                            if(demoCount==maxDemoCount){$('.preloader-spin').hide();}
                           	/* *** */

                            _functions.resizeCall();		                        
	                    }
	                });


	        }
	    });
	}

  	//enable autocomplete

/*
  	if($('#tt-google-single-autocomplete').length){
  		var input = (document.getElementById('tt-google-single-autocomplete')),
  			contentstr = $(input).val(),
			autocomplete = new google.maps.places.Autocomplete(input);	
  	}
*/
  	/*tt-proposition-show*/



    $('.tt-proposition-pause-btn').on('click', function(){
        $('div.popup-wrapper_').addClass('active');
        setTimeout("$('div.popup-wrapper_ div.popup-content').addClass('active');", 500);
    });


  	$('.tt-proposition-show').on('click', function(){
  		$(this).closest('.tt-task-request').fadeOut();
  		$('.tt-proposition-wrapper').fadeIn(300);
  	});
/*
    $('.tt-freeze-btn-pause, .tt-freeze-btn-remove').on('click', function(e){
    	//alert(1);
    	//e.preventDefault();
    });

    */
  	/*
  	$('.tt-freeze-btn-pause').on('click', function(e){
        alert(2);
  		$('.tt-proposition-pause').fadeOut(300, function(e){
  			$('.tt-proposition-continue').fadeIn(300);
  		});
  		e.preventDefault();
  	});
  	*/
	/*
  	$('.tt-proposition-continue-btn').on('click', function(e){
  		$('.tt-proposition-continue').fadeOut(300, function(e){
  			$('.tt-proposition-pause').fadeIn(300);
  		});
  		e.preventDefault();
  	});

  	$('.tt-freeze-btn-remove').on('click', function(e){

  		alert(1);
  		$('.tt-proposition-wrapper').fadeOut(300);
  		e.preventDefault();
  	});
*/
  	$('.tt-freeze-checkbox').on('change', function(){
		$(this).closest('.tt-freeze').toggleClass('active');
  	});

  	/*phone-number-show*/
 /* 	$('.phone-number-show').on('click', function(e){
  		$(this).closest('.tt-proposition').addClass('selected');
  	});
  	$('.tt-proposition-show-number').on('click', function(e){
  		var $proposition = $('.tt-proposition.selected');
  		$proposition.find('.phoneNumber').addClass('showPhone');
  		$proposition.find('.phone-number-show').remove();
  		e.preventDefault();
  	});
*/
  	/*tt-give-response*/

  	/*
  	$('.tt-give-response form').on('submit', function(e){

  		var link,
  			step = $(this).find('input[name="tt-give-response-meeting"]:checked').data('step');
  		if(step=="next"){
  			link = $(this).data('next');
  		} else{
  			link = $(this).data('finish');
  		}
  		window.location.href = location.protocol+'//'+location.host+'/'+link;
  		e.preventDefault();

  	});


  	$('.tt-radio-switch-top input').on('change', function(){
  		var rel = $(this).data('switch');
  		$(this).closest('.tt-radio-switch').children().children('.tt-radio-switch-item.active').fadeOut(0, function(){
  				$(this).removeClass('active').siblings('.tt-radio-switch-item[data-switch="'+rel+'"]').fadeIn(0, function(){
  						$(this).addClass('active');
  				});
  			}
  		);
  	});
    */
	/*tt-messages*/
	$('.tt-messages-user:not(.active)').on('click', function(e){
		messageAjax($(this));
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		if(winW<992){
			$(this).closest('.tt-messages-nav').fadeOut(300, function(){
				$(this).siblings('.tt-messages-content').fadeIn(300);
			});			
		}
		e.preventDefault();
	});
/*	$(document).on('click','.tt-messages-back', function(e){
		if(winW<992){
			$(this).closest('.tt-messages-content').fadeOut(300, function(){
				$(this).siblings('.tt-messages-nav').fadeIn(300);
			});
		}
		e.preventDefault();
	});	
*/

	function showMessageProgress() {
	    if (document.images.length == 0) {
	        return false;
	    }
	    var loaded = 0;
	    for (var i = 0; i < document.images.length; i++) {
	        if (document.images[i].complete) {
	            loaded++;
	        }
	    }
	    percentageMessage = (loaded / document.images.length);
	}	
	var idMessage, percentageMessage, ajaxMessageFinish = 0;
	function messageAjax($foo) {

	    if (ajaxMessageFinish) return false;
	    ajaxMessageFinish = 1;
	    var ajaxUrl = $foo.data('ajax');

	    $.ajax({
	        type: "GET",
	        async: true,
	        url: ajaxUrl,
	        success: function(response) {
					var responseObject = $($.parseHTML(response));
					var rers = responseObject.html();
					$foo.closest('.tt-messages').find('.tt-messages-content').html(rers);

	                idMessage = window.setInterval(function() {
	                    showMessageProgress();
	                    if (percentageMessage == 1) {
	                        window.clearInterval(idMessage);
	                        percentageMessage = 0;
                            ajaxMessageFinish = 0;

                            _functions.resizeCall();		                        
	                    }
	                });


	        }
	    });
	}
/*
    $('#modalButton, .modalButton').click(function () {
        $('#modal').modal('show').find('#modalContent').load($(this).attr('href'));
        return false;
    });

    $(document).on("click", "div.button-close", function() {
        if ($('#modal').length) $('#modal').modal('hide');
        return false;
	});
*/


    $('.upload_avatar').on("change", function(e) {

        var Upload = function (file) { this.file = file;};
		var obj= $(this);
        Upload.prototype.getType = function() {return this.file.type;};
        Upload.prototype.getSize = function() {return this.file.size;};
        Upload.prototype.getName = function() {return this.file.name;};
        Upload.prototype.doUpload = function () {
            var that = this;
            var formData = new FormData();

            // add assoc key values, this will be posts values
            formData.append("file", this.file, this.getName());
            formData.append("upload_file", true);


            console.log(obj.data('source'));
            $.ajax({
                type: "POST",
                url: obj.data('source'),
                xhr: function () {
                    var myXhr = $.ajaxSettings.xhr();
                    if (myXhr.upload) {
	                   	$('#progress-wrp').css({'visibility':'visible'});
                        $("#progress-wrp .progress-bar").css("width", "0%");
                        myXhr.upload.addEventListener('progress', that.progressHandling, false);
                    }
                    return myXhr;
                },
                success: function (data) {
                    var data = JSON.parse(data);
                    if (data.status==1){
                        if ($("img.tt-profile-img").length) {  $("img.tt-profile-img").attr('src', data.avatar_image); }
						$(".img-responsive").attr('src', data.avatar_image);
                        setTimeout( function() { $('#progress-wrp').css({'visibility':'hidden'}); } , 700)
					}
                    // your callback here
                },
                error: function (error) {
                    console.log('Error uploading file');
                    // handle error
                },
                async: true,
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                timeout: 60000
            });
        };

        Upload.prototype.progressHandling = function (event) {
            var percent = 0;
            var position = event.loaded || event.position;
            var total = event.total;
            var progress_bar_id = "#progress-wrp";
            if (event.lengthComputable) {
                percent = Math.ceil(position / total * 100);
            }
            // update progressbars classes so it fits your code
            $(progress_bar_id + " .progress-bar").css("width", +percent + "%");
            $(progress_bar_id + " .status").text(percent + "%");
        };


        var file = $(this)[0].files[0];
        var upload = new Upload(file);

        // maby check size or type here with upload.getSize() and upload.getType()

        // execute upload
        upload.doUpload();


    });




    $('div#progress-wrp').on("click", function(e) {
        $(this).css("visibility", "hidden");
	});



    $(document).on("submit", "form.form-ajax", function(e) {

        e.preventDefault();
        var form = $(this);


        if ($("input[name='MemberEdit[types][]']").length && $("input[name='MemberEdit[types][]']").is(':checked')==false) return false;

        jQuery.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serializeArray(),
            cache: false,
            dataType: 'json',
            async: false,
            success: function (data) {
                if (data.status==1){

					// when edit prices on profile
                    if ($('#price_list').length) {
                        $.get( "/members/member/priceslist", function( data ) {
                            $('#price_list').html(data);
                            form.parent().closest('.tt-editable-form').fadeOut(300,function(){
                                $(this).siblings('.tt-editable').fadeIn();
                            });
                        });
                    	return false;
                    }

                   	if (form.hasClass('reset-form')) { form.get(0).reset();  }
                   	if (form.attr('id')=='types') { $('div#prices_table').empty().html(data.prices); }
                    _functions.Msg(data.msg, '');

                }
            }
        });

        return false;
    });



    $('.notices_action').on('change', function(){
        var checkbox = $(this);
        var status = (checkbox.is(':checked')) ? 1 : 0;
        jQuery.ajax({
            url: ($(this).data('type')==2) ? '/members/member/notices' : '/members/customer/notices',
            type: 'POST',
            data: {name : checkbox.data('name'), id:checkbox.data('id'), 'status':status},
            cache: false,
            async: false,
            success: function (data) {
                if (data.status==1){
                    GetMessage(data.msg, '');
                }
            }
        });
	});


    $(document).on("beforeSubmit", "form.form-edit-ajax", function(e) {
        e.preventDefault();
        var form = $(this);


        var data_post = form.serializeArray();

        console.log(data_post[1]['name']);

		if ($('div.popup-wrapper_').hasClass('active')) return false;

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
                        case 'MemberEdit[busy]':

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
                        case 'MemberEdit[last_name]':

                            // when edit plece in profile
                            if ($("div#profile-place").length) {
                                $("div#profile-place").html(data_post[1]['value']);
                                $('.popup-wrapper, .popup-content').removeClass('active');
                                $('.tt-vote-selected').removeClass('tt-vote-selected');
                                return false;
                            }

                            form.find('.tt-editable-item').html(data_post[1]['value']);
                            form.closest('.tt-editable-wrapper').find('.tt-preson-row-icon').show();
                            break;
                        case 'MemberEdit[first_name]':
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

							if (data_post[1]['value']=='') $('#budget_min').html('(не вказано)');
                            else $('#budget_min').html(data_post[1]['value']+ ' грн.');
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

                        break;
                        case 'MemberEdit[phone]':

                            $('input#memberedit-phone').data('phone', data_post[1]['value']);
                            $('input#memberedit-phone').data('value', data_post[1]['value']);
                            $('input#memberedit-phone').val(data_post[1]['value']);
                            $("#confirm_sms").val('');

                            $('#edit_phone').find('.tt-fadein-top').show();
                            $('#edit_phone').find('.tt-fadein-bottom').hide();
                            $('input.simple-input[type="tel"]').parent().parent().removeClass('col-sm-8').removeClass('col-md-9').addClass('col-md-12').next('div').hide();
                            $('input.simple-input[type="tel"]').closest('.phone-reg-block').prev('.tt-input-label').text('').css({'color':'#5cca47'});

							if (form.hasClass('profile')) {
                                $('div.tt-underheading-phone div.tt-underheading-item a:first').html(data_post[1]['value']);
                                $('div.tt-underheading-phone div.tt-underheading-item a:first').attr('href', 'tel:' + data_post[1]['value'].replace(/[^0-9]/g, ''));
                                $('.popup-wrapper, .popup-content').removeClass('active');
                                return false;
                            }
                            form.find('.tt-editable-item').html(data_post[1]['value']);
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

    $(document).on("click", "button.tt-editable-close", function(e) {
       $(this).closest('.tt-editable-form').slideUp(300).siblings('.tt-editable').slideDown(300, function(){
            $(this).closest('.tt-editable-wrapper').removeClass('opened');
       });
	});

	/* Isotope PLugin */

    function izotopInit() {
        if ($('.izotope-container').length) {
            var $container = $('.izotope-container');
            $container.isotope({
                itemSelector: '.item',
                layoutMode: 'masonry',
                transitionDuration: 0,
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
            $('.filter-mob-list').on('click', 'li', function() {
                $('.izotope-container').each(function(){
                    $(this).find('.item').removeClass('animated');
                });
                $('.filter-mob-list li').removeClass('active');
                $(this).addClass('active');
                var filterValue = $(this).attr('data-filter');
                $container.isotope({filter: filterValue});
            });
        }
    }

    $(window).load(function(){
        izotopInit();
    });


	/* SPpINER */
    $(document).on('click','.spinner-left', function(e){
        var th = $(this);
        addLoad(th);
        return false;
    });

    function addLoad(elem){
        elem.addClass('loads');
        if (elem.hasClass('loads')) {
            setTimeout(function(){
                elem.removeClass('loads');
            },2500);
        }
    };

    if ($('.list-dotted-item-ckeckbox').length) {
        var countChecked = function () {
            var n = $('.list-dotted-item-ckeckbox input[type=checkbox]:checked').length;
            if (n > 3) {
                return false;
            }
        };
        countChecked();
        $('.list-dotted-item-ckeckbox input[type=checkbox]').on('click', countChecked);

        $('.list-dotted-item-ckeckbox input[type=checkbox]').on('click', function(){
        	if ($('.list-dotted-item-ckeckbox input[type=checkbox]:checked').length>3) {
                _functions.Msg('Дозволено вибрати не більше 3-х пунктів', '');
			}
		});
    }




    $(document).on('click','.tt-project-thumb', function(){
        var swichIndex = $(this).parent().index();
        swipers['swiper-'+$(this).closest('.tt-two-slider').find('.swiper-control-top').attr('id')].slideTo(swichIndex);

    });

    $('.input-place').focus(function(){
	  $(this).parents('.form-group').addClass('focused');
	});

	$('.input-place').blur(function(){
	  var inputValue = $(this).val();
	  if ( inputValue == "" ) {
		$(this).removeClass('filled');
		$(this).parents('.form-group').removeClass('focused');  
	  } else {
		$(this).addClass('filled');
	  }
	}) 

});