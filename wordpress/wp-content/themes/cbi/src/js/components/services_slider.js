jQuery(document).ready(function ($) {
    $(window).on('load', function (){
        $('.services_slider').owlCarousel({
            center: true,
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            responsive: {
                768: {
                    items:2,
                    nav: false,
                    dots: false,
                },
                992: {
                    items: 2,
                },
                1200: {
                    items: 3,
                },
                1620: {
                    items: 4,
                }
            }
        });
    });
});