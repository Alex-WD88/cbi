<?php
/**
 * Gets the current version of a file from the manifest.json file.
 *
 * @param String $filename The non-hashed filename (e.g. style.css).
 * @param String $manifestPath Full path to the manifest file. If not set,
 *                             assumes the file is located in
 *                             ../build/manifest.json.
 *
 * @return String|\WP_Error The path to the current corresonding file
 *                          (e.g. /wp-content/themes/your-theme/style.12345.css).
 *                          In the event of a failure, an instance of \WP_Error
 *                          will be returned with more details.
 */

require_once __DIR__ . '/inc/functions.php';

function get_assets_file($name, $type)
{

    $assetsPath = __DIR__ . '/build/assets.json';

    if (!file_exists($assetsPath)) {
        // return new \WP_Error( 'assets', 'The assets file can not be found.', $assetsPath );
        return;
    }

    $assets = (array)json_decode(file_get_contents('build/assets.json', true));
    //var_dump($assets);
    if (!array_key_exists($name, $assets)) {
        //  return new \WP_Error( 'assets', 'The requested file could not be matched.', $name );
        return;
    }

    if (!array_key_exists($type, (array)$assets[$name])) {
        //  return new \WP_Error( 'assets', 'The requested file could not be matched.', $type );
        return;
    }
    $assets = (array)$assets[$name];
    return get_template_directory_uri() . "/build" . $assets[$type];
}


/**
 * Include JavaScript and CSS files.
 */
function enqueue_js()
{
    wp_enqueue_style('theme', get_assets_file('app', 'css'), false, null);
    wp_enqueue_script('theme', get_assets_file('app', 'js'), ['jquery'], null, true);

    wp_localize_script('theme', 'theme', array(
        'url' => home_url(),
        'themeUrl' => get_template_directory_uri(),
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

/**
 * Add the enqueue functions to their respective actions.
 */
add_action('wp_enqueue_scripts', 'enqueue_js', 9999);

// Clean up wordpres <head>
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wp_oembed_add_host_js');


/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');
    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menu('primary', 'Primary Menu');
    register_nav_menu('footer', 'Footer Menu');
    register_nav_menu('sidebar_left', 'Left Sidebar Menu');
    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');
//    add_image_size('bundle', 758, 301, true);

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);
    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    // add_theme_support('customize-selective-refresh-widgets');
}, 20);

add_action('after_setup_theme', 'mfnch_textdomain');
function mfnch_textdomain() {
    load_child_theme_textdomain('antiarnaques', get_stylesheet_directory() . '/languages');
}

// Регистрация ACF блока для Gutenberg
function register_acf_block_types() {

    // Проверяем, что функция доступна.
    if (function_exists('acf_register_block_type')) {

        // Регистрируем блок рекомендаций.
        acf_register_block_type(array(
            'name'              => 'service_block',
            'title'             => __('Service Block'),
            'description'       => __('A custom block for services.'),
            'render_template'   => 'template-parts/blocks/service_block.php',
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'keywords'          => array('services'),
        ));
    }
}

add_action('acf/init', 'register_acf_block_types');