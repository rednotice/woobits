import 'jquery';
import 'bootstrap';

// Mobile menu slider
$('#woobitsMenuToggler').click(function() {
    const toggleWidth = $(".woobits-mobile-menu-container").width() == 250 ? '0px' : '250px';
    $('.woobits-mobile-menu-container').animate({ width: toggleWidth }, closeMenuSlider(toggleWidth));
    $('#woobitsMenuToggler').toggleClass('dashicons-menu-alt dashicons-no');
});

function closeMenuSlider(toggleWidth) {
    if(toggleWidth == '250px') {
        $(window).on('mousedown', function() {
            if(!$(event.target).is('.woobits-mobile-menu-container') && !$.contains('.woobits-mobile-menu-container', event.target)) {
                $('.woobits-mobile-menu-container').animate({ width: '0px' });
                $('#woobitsMenuToggler').toggleClass('dashicons-menu-alt dashicons-no');
            }
        })
    }
}

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
        console.log($(this).is(':checked'));
        if($(this).is(':checked')) {
            $(this).parent().addClass('active');
        } else {
            $(this).parent().removeClass('active');
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