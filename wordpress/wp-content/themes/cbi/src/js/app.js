import 'jquery';
import '../scss/style.scss';

import 'owl.carousel2/dist/owl.carousel.min';

//Custom
window.viewport = function () {
    var e = window, a = 'inner';
    if (!('innerWidth' in window)) {
        a = 'client';
        e = document.documentElement || document.body;
    }
    return {width: e[a + 'Width'], height: e[a + 'Height']};
};

import './components/trimTextContent';
import './components/cookies';
import './components/navigation';
//import './components/post_slider';
import './components/services_slider';
import './components/news_slider';
import './components/scrollto';

jQuery(document).ready(function ($) {
$(window).on('load', function() {
    var maxHeight = 0;
    // Находим все блоки .item и определяем максимальную высоту
    $('.news_item').each(function() {
    var height = $(this).outerHeight();
    if (height > maxHeight) {
    maxHeight = height;
    }
    });
    // Устанавливаем эту максимальную высоту для всех блоков .item
    $('.news_item').height(maxHeight);
    });
});