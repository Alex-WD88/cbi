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

    // $('.item').on('click', '.main-btn', function(){
    //     // Закрыть все открытые .content-promo
    //     $('.content-promo').hide();
        
    //     // Открыть .content-promo внутри того же .item
    //     $(this).closest('.item').find('.content-promo').show();
    // });

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