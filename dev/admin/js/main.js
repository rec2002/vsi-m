$(function () {

    $('#modalButton, .modalButton').click(function () {
        $('#modal').modal('show').find('#modalContent').load($(this).attr('href'));
        return false;
    });

    $('#SaveForm').click(function () {
        $('#form-custom').submit()
        return false;
    });


    $('#ResetForm').click(function () {
        $('#form-custom')[0].reset();
        $('#modal').modal('hide');
        return false;
    });

    $(document).on("change", "input.name_tag", function() {
        var str = $.trim($(this).val());
     //   var str = str.replace(/\s+/g, '-').toLowerCase();
        $("input.name_tag_value").val(slug(str));
    });


    var slug = function(str) {
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();

        // remove accents, swap ñ for n, etc
        var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
        var to   = "aaaaaeeeeeiiiiooooouuuunc------";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-zа-яії0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes

        return str;
    };


    $(document).on("click", ".set_action", function() {
        var obj = $(this);
        $.get({url: $(this).attr('href'), dataType:'json'}, function( data ) {
            data = JSON.parse(data);
            if (data.active==1) {
                obj.removeClass('btn-danger').addClass('btn-success').find("i.fa").removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                obj.removeClass('btn-success').addClass('btn-danger').find("i.fa").removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
        return false;
    });


    $(document).on("click", ".modalButton", function() {
       $('#modal').modal('show').find('#modalContent').load($(this).attr('href'));
       return false;
    });



});