$(function() {
    $('.hidden_item').hide();
    $("input[name='is_buynow']").change(function() {
        if ($("#buynow_no").prop('checked') == true) {
            $('.auction_item').show();
            $('.buynow').hide();
        } else if ($("#buynow_yes").prop('checked') == true) {
            $('.buynow').show();
            $('.auction_item').hide();
        }
    });
});