<?php

require_once __DIR__ . '/functions/display_svg.php';
//require_once __DIR__ . '/widgets/stl_widget.php';

/**
 * Get current URL
 */
function current_url()
{
    global $wp;
    $current_slug = add_query_arg(array(), $wp->request);

    return home_url($current_slug);
}

/**
 * Changed wp_nonce_field
 */
function stl_wp_nonce_field($action = -1, $name = "_wpnonce", $referer = true, $echo = true)
{
    $name = esc_attr($name);
    $nonce_field = '<input type="hidden" name="' . $name . '" value="' . wp_create_nonce($action) . '" />';

    if ($referer)
        $nonce_field .= wp_referer_field(false);

    if ($echo)
        echo $nonce_field;

    return $nonce_field;
}

add_filter( 'embed_oembed_html', 'wrap_oembed_html', 99, 4 );

function wrap_oembed_html( $cached_html, $url, $attr, $post_id ) {
    if ( false !== strpos( $url, "youtu" ) ) {
        $cached_html = '<div class="video_container"><div class="embed-container">' . $cached_html . '</div></div>';
    }
    return $cached_html;
}