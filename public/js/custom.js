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


/**
 * Below writen JS code is to add dashes in cnic field
 *
 */

$(".cnic").keydown(function() {
    //allow  backspace, tab, ctrl+A, escape, carriage return
    if (
        event.keyCode == 8 ||
        event.keyCode == 9 ||
        event.keyCode == 27 ||
        event.keyCode == 13 ||
        (event.keyCode == 65 && event.ctrlKey === true)
    )
        return;
    if (
        (event.keyCode < 48 || event.keyCode > 57) &&
        (event.keyCode > 106 || event.keyCode < 95)
    ) {
        event.preventDefault();
    }

    var length = $(this).val().length;

    if (length == 5 || length == 13) $(this).val($(this).val() + "-");
});


/**
 * Enable Country Code Dropdown
 * 
 */

var phone_input = document.querySelector(".phone");
var iti = window.intlTelInput(phone_input, {
    customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
        return "e.g. " + selectedCountryPlaceholder;
    },
});
phone_input.addEventListener("countrychange", function() {
    this.value = '';
    var code = iti.getSelectedCountryData().dialCode;
    this.value = "+" + code;
});