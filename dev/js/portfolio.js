$(function() {

    $('.tt-project-add').on('click', function(e){

        var $obj = $(this);
        $.post( "/members/portfolio/create", function( data ) {

            if ($( "div.tt-project-new > .tab-entry-box" ).length) {
                $( "div.tt-project-new > .tab-entry-box" ).html( data );
            } else{
                $( "div.tt-project-new" ).html( data );
            }

            $obj.closest('.tt-project-edit-wrapper').children('.tt-project-list').fadeOut(300, function(){
                $(this).siblings('.tt-project-new').fadeIn(300);
                for(var i = 0; i<$('.simple-datapicker').length; i++){
                    var $datepicker = $('.simple-datapicker').eq(i);
                        $datepicker.datepicker({
                        maxDate: '0'
                    });
                    $.datepicker.regional['uk'];
                }
            });
        });
        e.preventDefault();
    });


    $('.tt-project-img-edit').on('click', function(e){


        var $obj = $(this);
        $.post( "/members/portfolio/update/?id="+$(this).data('id'), function( data ) {

            if ($( "div.tt-project-new > .tab-entry-box" ).length) {
                $( "div.tt-project-new > .tab-entry-box" ).html( data );
            } else{
                $( "div.tt-project-new" ).html( data );
            }

            $obj.closest('.tt-project-edit-wrapper').children('.tt-project-list').fadeOut(300, function(){
                $(this).siblings('.tt-project-new').fadeIn(300);
                for(var i = 0; i<$('.simple-datapicker').length; i++){
                    var $datepicker = $('.simple-datapicker').eq(i);
                    $datepicker.datepicker({
                        maxDate: '0',
                        dateFormat: 'dd.mm.yyyy'
                    });
                    $.datepicker.regional['uk'];
                }
            });
        });

        e.preventDefault();
    });


    $(document).on("change", ".tt-img-upload input", function(e) {

        var $t = $(this);
        if (this.files && this.files[0]) {
            var image = this.files[0];
            var reader = new FileReader();
            reader.onload = function (e) {

                var Upload = function (file) { this.file = file;};
                Upload.prototype.getType = function() {return this.file.type;};
                Upload.prototype.getSize = function() {return this.file.size;};
                Upload.prototype.getName = function() {return this.file.name;};

                var upload = new Upload(image);
                if ((upload.getSize()/1024)/1024 > 3) {
                    _functions.Msg('Завеликий розмір зображення', 'для завантаження не більше 3 Мб');
                } else{

                    var clone = $t.clone();
                    var index_image = $(".tt-project-pic-loaded").length+1;
                    clone.css({'visibility': 'hidden'}).attr('name', $t.data('name')+'[image][]');
                    $t.closest('.tt-project-new-img').append('<div class="tt-project-pic-loaded" data-id="0" id="image_'+index_image+'">'+'<span style="background-image:url('+e.target.result+');"></span><div class="button-close small"></div>'+
                        '<div id="progress-wrp" style="width: 186px;position: absolute;top: 70px;height: 15px;box-shadow: none;margin-left: 10px;"><div class="progress-bar"></div></div></div>');
                    clone.appendTo("#image_"+$('.tt-project-pic-loaded').length);
                }
            };
            reader.readAsDataURL(image);
        }
    });

    $(document).on("click", "button.tt-project-new-close", function(e) {
        $(this).closest('.tt-project-edit-wrapper').children('.tt-project-new').fadeOut(300, function(){
            $(this).siblings('.tt-project-list').fadeIn(300);
        });
        e.preventDefault();
    });


    $(document).on("click", ".delete-portfolio", function(e) {
         $('.popup-wrapper-confirm').addClass('active');
         $('.popup-wrapper-confirm').find('.popup-content').addClass('active');

         var url = $(this).attr('href');
          _functions.dialog('Справді бажаєте видалити?', '',
               function() {
                    $('.popup-wrapper-confirm').removeClass('active');
                        window.location.href = url;
               },
               function() {
                    $('.popup-wrapper-confirm').removeClass('active');
              }
          );
         return false;
    });



    $(document).on("beforeSubmit", "form#edit_portfolio", function(e) {
        e.preventDefault();
        $(".tt-img-upload input[type=file]").remove();
        return true;
    });

    
    

});