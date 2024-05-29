jQuery(document).ready(function ($) {
    $(window).on('load', function (){
        $('.services_slider').owlCarousel({
            //center: true,
            items:1,
            loop:true,
            //nav: false,
            dots:true,
            navText: ["<",">"],
            responsive: {
                768: {
                    nav:false,
                    margin:10,
                    center:false,
                    items:2,
                },
                992: {
                    items:2,
                },
                1200: {
                    items:3,
                },
                1620: {
                    center:true,
                    nav:true,
                    items:4,
                }
            }
        });
    });

    $('.item').on('click', '.main-btn', function(){
        // Получить ближайший блок .content-promo
        var contentPromo = $(this).closest('.item').find('.content-promo');
        
        // Проверить, виден ли блок .content-promo
        if (contentPromo.is(':visible')) {
        // Если виден, скрыть его
            contentPromo.hide();
        } else {
        // Если не виден, скрыть все открытые .content-promo и показать нужный
        $('.content-promo').hide();
            contentPromo.show();
        }
    });

});