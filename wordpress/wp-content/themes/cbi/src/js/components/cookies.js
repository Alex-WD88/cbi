document.addEventListener('DOMContentLoaded', function () {
    var cookiePopup = document.getElementById('cookiePopup');
    var acceptCookies = document.getElementById('acceptCookies');
    var closePopup = document.getElementById('closePopup');
    
    var cookiesAccepted = document.cookie.split(';').some(function (item) {
        return item.trim().startsWith('cookiesAccepted=');
    });
    
    if (!cookiesAccepted) {
        cookiePopup.classList.add('show');
    }
    
    acceptCookies.addEventListener('click', function () {
        document.cookie = "cookiesAccepted=true; max-age=86400; path=/";
        cookiePopup.classList.remove('show');
    });
    
    closePopup.addEventListener('click', function () {
        cookiePopup.classList.remove('show');
    });
});