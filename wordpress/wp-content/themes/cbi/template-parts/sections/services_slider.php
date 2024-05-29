<?php
$query = new WP_Query( array( 'category_name' => 'Main Slider' ) );
if( $query->have_posts() ){?>

    <section class="section_services-slider">
        <div class="services_slider owl-carousel">

        <?php
        while( $query->have_posts() ){
            $query->the_post();?>

            <div class="item">
                <div class="item-wrapper">

                    <div class="promo-text">
                        <div class="header-promo">
                            <p class="text-promo"><?php the_title(); ?></p>
                            <span class="desc-promo"><?php the_content(); ?></span>
                        </div>
                        <span id="popup-btn-sl" class="main-btn">Узнать больше</span>
                    </div>

                    <div class="promo-img">
                        <span>
                        <?php the_post_thumbnail(); ?>
                        </span>
                    </div>

                    <div class="content-promo">
                        <?php the_content(); ?>
                        <span id="popup-btn-sl" class="main-btn">Закрыть</span>
                    </div>

                </div>        
            </div>
            <?php
        }
        wp_reset_postdata();?>

        </div>
    </section>

<?php } ?>