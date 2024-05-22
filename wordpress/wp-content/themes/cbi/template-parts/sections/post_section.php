<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'order' => 'DESC',
    'post_status' => 'publish',
);

$q = new WP_Query($args);
?>

<section class="post_section">

    <?php if ($q->have_posts()) { ?>
        <div class="container">
            <div class="top_post-slider">
                <div class="title"><?php _e('Active forum topics', 'antiarnaques'); ?></div>
                <div class="post_slider owl-carousel owl-theme">
                    <?php while ($q->have_posts()) {
                        $q->the_post(); ?>
                        <div class="item">
                            <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
                        </div>
                    <?php } ?>
                </div>
                <div class="main-btn">
                    <a href="#">more</a>
                </div>
            </div>
        </div>
    <?php } wp_reset_postdata(); ?>

    <div id="subscribe" class="subscribe_form">
        <div class="form-wrapper">
            <div class="title"><?php _e('Subscribe to our mailing list', 'antiarnaques'); ?></div>
            <div class="text">
                <?php _e('and get reports about new scammers, new scam schemes, tips on dating real Russian brides and links to verified profiles of real single Russian women.', 'antiarnaques'); ?>
            </div>
            <div class="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="45897bb" title="Contact us"]'); ?>
            </div>
        </div>
    </div>
</section>