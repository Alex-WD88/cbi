<?php
/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
?>

<footer class="footer">
    <div class="container">
        <div class="blocks">

            <div class="block text">
                <img src="<?php echo get_template_directory_uri() . '/src/images/logo.png'; ?>" alt="logo">
            </div>

            <div class="block link">
                <div class="title">Контакты</div>
                <div class="content">
                    <div class="f_phone">
                        <a href="tel:+375333090983">+375 33 309-09-83</a>
                        <a href="tel:+375296810527">+375 29 681-05-27</a>
                    </div>
                    <div class="f_adress">
                        <span>Юридически адрес:<a href="#">246017, г.Гомель, ул. Гагарина, д.46, офис 2-1</a></span>
                        <span>Почтовый адрес:<a href="#">220070, г.Минск, ул. О.Кошевого, 17А-26</a></span>
                    </div>
                    <div class="footer-email">
                        <span>e-mail: <a class="f_mail" href="mailto:info.cbi.pr@gmail.com">info.cbi.pr@gmai.com</a></span>
                    </div>
                </div>
            </div>

            <div class="block social">
                <div class="title">Обратная связь</div>
                <div class="contact-form">
                  <?php 
                    //echo do_shortcode('[contact-form-7 id="45897bb" title="Contact us"]');
                    echo do_shortcode('[contact-form-7 id="20" title="Contact us"]');
                   ?>
                </div>
            </div>

        </div>
    </div>
</footer>
<div class="under-footer">ООО «Центр Белинвентаризация» © 2024</div>

<?php wp_footer(); ?>

<div id="cookiePopup" class="cookie-popup">
    <div class="cookie-content">
        <p>Для обеспечения удобства пользователей сайта используются cookies</p>
        <button id="acceptCookies" class="main-btn btn-success">Принять</button>
        <button id="closePopup" class="main-btn btn-secondary">Закрыть</button>
    </div>
</div>

</body>
</html>