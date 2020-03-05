import 'jquery';
import 'bootstrap';

// Adds dropdown menu to navbar on dektop devices.
window.addEventListener('load', function() {
    const vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

    if(vw >= 992) {
        addNavDropDown();
    }

    if(vw < 992) {
        removeNavDropDown();
    }
})

window.addEventListener('resize', function() {
    const vw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);

    if(vw >= 992) {
        addNavDropDown();
    }

    if(vw < 992) {
        removeNavDropDown();
    }
})

function addNavDropDown() {
    const el = document.querySelector('#woobits-main-menu > .menu-item');

    el.addEventListener('mouseover',
        () => el.querySelector('* > .sub-menu').style.display = 'block'
    )

    el.addEventListener('mouseleave',
        () => el.querySelector('* > .sub-menu').style.display = 'none'
    )
}

function removeNavDropDown() {
    const el = document.querySelector('#woobits-main-menu > .menu-item');

    el.removeEventListener('mouseover',
        () => el.querySelector('* > .sub-menu').style.display = 'block'
    )

    el.removeEventListener('mouseleave',
        () => el.querySelector('* > .sub-menu').style.display = 'none'
    )
}

// Variation readio buttons
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