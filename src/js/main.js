import '../css/main.scss';
import 'jquery';
import 'bootstrap';

// Mobile menu slider
$('#woobitsMenuToggler').click(function() {
    // Remove close event listener
    $(window).off('mousedown.woobitsCloseMenu');

    // Toggle mobile menu
    const toggleWidth = $(".woobits-mobile-menu-container").width() == 250 ? '0px' : '250px';
    $('.woobits-mobile-menu-container').animate({ width: toggleWidth });

    // Toggle icons
    if($('#woobitsMenuToggler').hasClass('dashicons-menu-alt')) {
        $('#woobitsMenuToggler').removeClass('dashicons-menu-alt').addClass('dashicons-no');

        // Add close event listener to window
        $(window).on('mousedown.woobitsCloseMenu', function(event) {
            const woobitsMobileMenuContainer = document.getElementById( 'woobitsMobileMenuContainer');
            const woobitsMobileMenuToggler = document.getElementById( 'woobitsMenuToggler');
            if(woobitsMobileMenuToggler !== event.target && woobitsMobileMenuContainer !== event.target && !woobitsMobileMenuContainer.contains(event.target)) {
                $('#woobitsMenuToggler').trigger('click');
            }
        })

    } else {
        $('#woobitsMenuToggler').removeClass('dashicons-no').addClass('dashicons-menu-alt');
    }

});

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