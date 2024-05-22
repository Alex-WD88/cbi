<?php
/**
 * Add sidebar
 */
function stl_post_widgets_init()
{
    register_sidebar(array(
        'name' => 'Left sidebar',
        'id' => 'left-sidebar',
        'description' => 'Widget Area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'stl_post_widgets_init');

/**
 * Register "Stl widget"
 */
add_action('widgets_init', 'stl_ads_widget');
function stl_ads_widget()
{
    register_widget('stl_widget');
}

/**
 *  Enqueue additional admin scripts
 */
add_action('admin_enqueue_scripts', 'stl_widget_script');
function stl_widget_script()
{
    wp_enqueue_media();
    wp_enqueue_script('ads_script', get_template_directory_uri() . '/inc/widgets/js/widget.js', false, '1.0.0', true);
}

/**
 * Widget
 */
class stl_widget extends WP_Widget
{

    function __construct()
    {
        parent::__construct(
            'stl_widget',
            'Stl Widget',
            array('description' => 'Left sidebar widget',)
        );
    }

    function form($instance)
    {
        $nav_menu = isset($instance['nav_menu']) ? $instance['nav_menu'] : '';
        $menus = get_terms('nav_menu', array('hide_empty' => false));
        if (!$menus) {
            echo '<p>' . sprintf(__('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php')) . '</p>';
            //return;
        } else { ?>
            <p>
                <label for="<?php echo $this->get_field_id('nav_menu'); ?>">Select Menu:</label>
                <select id="<?php echo $this->get_field_id('nav_menu'); ?>"
                        name="<?php echo $this->get_field_name('nav_menu'); ?>">
                    <?php
                    foreach ($menus as $menu) {
                        $selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
                        echo '<option' . $selected . ' value="' . $menu->term_id . '">' . $menu->name . '</option>';
                    }
                    ?>
                </select>
            </p>
        <?php }
        $languages = array(
            'fr' => 'fr_FR',
            'en' => 'en_US',
            'it' => 'it_IT',
            'es' => 'es_ES',
        ); ?>
        <?php global $sitepress;
        $current_language = $sitepress->get_current_language();
        $i = 0;
        foreach ($languages as $key => $lang) :
            $instance['image_uri_' . $key] = !empty($instance['image_uri_' . $key]) ? $instance['image_uri_' . $key] : '';
            $instance['link_' . $key] = !empty($instance['link_' . $key]) ? $instance['link_' . $key] : ''; ?>

            <input <?php echo $current_language == $key ? 'type="text"' : 'type="hidden"'; ?> name="<?php echo $this->get_field_name('link_' . $key); ?>" id="<?php echo $this->get_field_id('link_' . $key); ?>" value="<?php echo $instance['link_' . $key]; ?>" class="widefat"/>
            <input <?php echo $current_language == $key ? 'type="text"' : 'type="hidden"'; ?> class="widefat <?php echo $this->id . '_' . $i . '_url'; ?>" name="<?php echo $this->get_field_name('image_uri_' . $key); ?>" value="<?php echo $instance['image_uri_' . $key]; ?>" style="margin-top:5px;"/>

            <?php if ($current_language == $key) : ?>
                <img class="<?php echo $this->id . '_' . $i . '_img'; ?>" src="<?php echo $instance['image_uri_' . $key]; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
                <input type="button" id="<?php echo $this->id . '_' . $i; ?>" class="button button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;"/>
            <?php endif; ?>

            <?php $i++; ?>
        <?php endforeach;
    }

    function update($new_instance, $old_instance)
    {
        $languages = array(
            'fr' => 'fr_FR',
            'en' => 'en_US',
            'it' => 'it_IT',
            'es' => 'es_ES',
        );
        $instance = array();
        $instance['nav_menu'] = (int)$new_instance['nav_menu'];
        foreach ($languages as $key => $lang) :
            $instance['link_' . $key] = (!empty($new_instance['link_' . $key])) ? esc_url($new_instance['link_' . $key]) : '';
            $instance['image_uri_' . $key] = (!empty($new_instance['image_uri_' . $key])) ? esc_url($new_instance['image_uri_' . $key]) : '';
        endforeach;

        return $instance;
    }

    function widget($args, $instance)
    {
        require_once __DIR__ . '/content/content.php';
    }
}