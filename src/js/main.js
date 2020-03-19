import 'jquery';
import 'bootstrap';

// Mobile menu slider
$('#woobitsMenuToggler').click(function() {
    const toggleWidth = $(".woobits-mobile-menu-container").width() == 250 ? '0px' : '250px';
    $('.woobits-mobile-menu-container').animate({ width: toggleWidth }, woobitsToggleMenu(toggleWidth));
});

function woobitsToggleMenu(toggleWidth) {
    if(toggleWidth == '250px') {
        $('#woobitsMenuToggler').removeClass('dashicons-menu-alt');
        $('#woobitsMenuToggler').addClass('dashicons-no');

        $(window).on('mousedown', function() {
            if(!$(event.target).is('.woobits-mobile-menu-container') && !$.contains('.woobits-mobile-menu-container', event.target)) {
                $('.woobits-mobile-menu-container').animate({ width: '0px' });
                toggleWidth = '0px;'
                $('#woobitsMenuToggler').removeClass('dashicons-no');
                $('#woobitsMenuToggler').addClass('dashicons-menu-alt');
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

// These classea re used to reduce width of main content on desktop when sidebar is active.
if($.contains(document, $('#secondary')[0])) {
    $('#primary').addClass('with-sidebar');
}

if($.contains(document, $('#secondary.shop')[0])) {
    $('#primary').addClass('with-sidebar-shop');
}