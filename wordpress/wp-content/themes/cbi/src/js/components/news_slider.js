jQuery(document).ready(function ($) {

    //$(window).on('load', function (){

        $('.news_slider').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            dots: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items:2,
                },
                992: {
                    nav:true,
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

    //});

});