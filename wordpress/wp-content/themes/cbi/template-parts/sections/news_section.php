<?php
$query = new WP_Query( array( 'category_name' => 'News' ) );
if( $query->have_posts() ){?>

    <section class="section_news-slider">
        <div class='container'>
            <h2 class='title'>Новости</h2>
            <div class="news_slider owl-carousel">

            <?php
            while( $query->have_posts() ){
                $query->the_post();?>

                <div class="news_item">
                    <div class="news_item-wrapper">

                        <div class="promo-img">
                            <?php the_post_thumbnail(); ?>
                        </div>

                        <div class="promo-text">
                            <p class="title"><?php the_title(); ?></p>
                            <span class="desc"><?php the_content(); ?></span>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="main-btn">Читать далее</a>

                    </div>        
                </div>
                <?php
            }
            wp_reset_postdata();?>

            </div>
        </div>
    </section>

<?php } ?>