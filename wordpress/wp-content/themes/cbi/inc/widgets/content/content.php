<?php
$nav_menu = !empty($instance['nav_menu']) ? wp_get_nav_menu_object($instance['nav_menu']) : false;
if (!$nav_menu)
    return;

$languages = array(
    'fr' => 'fr_FR',
    'en' => 'en_US',
    'it' => 'it_IT',
    'es' => 'es_ES',
);
global $sitepress;
$current_language = $sitepress->get_current_language();
?>

<div class="stl_widget_wrapper">

    <div class="stl_widget_menu">
        <?php wp_nav_menu(array('menu' => $nav_menu)); ?>
    </div>

    <?php foreach ($languages as $key => $lang) :
        if ($current_language == $key && !empty($instance['image_uri_' . $key])) : ?>
            <a class="stl_widget_img" href="<?php echo $instance['link_' . $key]; ?>">
                <img src="<?php echo $instance['image_uri_' . $key]; ?>">
            </a>
        <?php endif;
    endforeach; ?>

</div>