<?php if( have_rows('service_block') ) : ?>

<section class="services_section">
    <div class="container">
        <h2 class="title"><?php echo get_the_title(); ?></h2>
        <div class="cards_wrapper scrollto">

        <?php while( have_rows('service_block') ) : the_row(); ?>
        
            <a href='#<?php echo get_sub_field('tag'); ?>' class="sr_card">
                    <div class="img"><img src="<?php echo get_sub_field('service_block_img') ?>" alt=""></div>
                    <p class="text"><?php echo get_sub_field('service_block_content'); ?></p>
            </a>

        <?php endwhile; ?>

        </div>
        <div class="content_wrapper">
        <?php while( have_rows('service_block') ) : the_row(); ?>

            <div id="<?php echo get_sub_field('tag'); ?>" class="content">
                <h3><?php echo get_sub_field('service_block_content'); ?></h3>
                <p><?php echo get_sub_field('content'); ?></p>
            </div>

        <?php endwhile; ?>
        </div>

    </div>
</section>
<?php else: ?>
<?php endif ?>
