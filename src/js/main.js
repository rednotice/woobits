import 'jquery';
import 'bootstrap';

// Adds hover dropdown menu to navbar on desktop devices.
$(window).on('resize', function() {

    if($(window).width() > 991) {
        $(document).on('mouseenter mouseleave', '.menu-item', function() {
            $(this).find('.sub-menu-0').toggle();
        });
    } else {
        $(document).off('mouseenter mouseleave', '.menu-item');
    }

}).resize();

// Variation radio buttons
$(document).on('change', '.variation-radios input', function() {
    $('select[name="'+$(this).attr('name')+'"]').val($(this).val()).trigger('change');
});

$('.variation-radios input').click(function () {
    $('.variation-radios input').each(function() {
        if ($(this).is(':checked')) {
            $('.form-' + $(this).attr('id')).addClass('active');
        } else {
            $('.form-' + $(this).attr('id')).removeClass('active');
        }
    });
});

// Toggle search form in main menu
$('.woobits-search-icon').click(function() {
    $('.woobits-searchform').toggle();
});

$(document).keyup(function(e) {
    if (e.key == 'Escape') {
        $('.wpbsearchform').hide();
    }
});