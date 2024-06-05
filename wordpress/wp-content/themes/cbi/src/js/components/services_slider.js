jQuery(document).ready(function ($) {
    $(window).on('load', function (){
        $('.services_slider').owlCarousel({
            //center: true,
            items:1,
            loop:true,
            //nav: false,
            dots:true,
            navText: ["",""],
            responsive: {
                768: {
                    nav:false,
                    margin:10,
                    items:2,
                },
                992: {
                    nav:false,
                    center:false,
                    items:2,
                },
                1200: {
                    nav:true,
                    center:true,
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
        
        // Проверить, есть ли у блока .content-promo класс content-show
        if (contentPromo.hasClass('content-show')) {
        // Если есть, удалить его
            contentPromo.removeClass('content-show');
        } else {
        // Если нет, удалить класс content-show у всех открытых .content-promo и добавить его к нужному
            $('.content-promo').removeClass('content-show');
            contentPromo.addClass('content-show');
        }
    });
    

});