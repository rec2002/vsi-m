$(function() {

        $(document).on("change", "select[name='MemberBilling[summa]']", function (e) {
            $('button[name="billing-add"]').text('Оплатити ' +$(this).find('option:selected').text());
            return false;
        });

});