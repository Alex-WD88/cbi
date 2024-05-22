

jQuery(document).ready(function ($) {

    $('.scrollto a').on('click', function (e) {
        let href = $(this).attr('href'),
            id = '#' + href.split('#')[1];
        let section = $(id);
        console.log(section);

        if(section.length)
            e.preventDefault();

        scrollToEl(section);
    });
    window.scrollToEl = function (section) {
        if (section.length > 0) {
            let wpadminbar_height = jQuery('#wpadminbar').length ? jQuery('#wpadminbar').height() : 0;
            wpadminbar_height = viewport().width <= 600 ? 0 : wpadminbar_height;

            let header_height = $('header#main-header').height(),
                start_pos = wpadminbar_height + header_height + 20,
                start_to = section.offset().top - start_pos + 1;

            $('html,body').animate({scrollTop: start_to}, 500, 'swing');
        }
    };
})