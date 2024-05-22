<?php
get_header();

//$categories = get_categories( [
//    'taxonomy'     => 'category',
//    'type'         => 'post',
//    'child_of'     => 0,
//    'parent'       => '',
//    'orderby'      => 'name',
//    'order'        => 'ASC',
//    'hide_empty'   => 1,
//    'hierarchical' => 1,
//    'exclude'      => '',
//    'include'      => '',
//    'number'       => 0,
//    'pad_counts'   => false,
//    // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
//] );
//
//if( $categories ) {
//    foreach ($categories as $cat) {
//        var_dump($cat->name);
//    }
//}

$category = get_the_category();
$catName = $category[0]->name;
$catSlug = $category[0]->slug; ?>


    <div class="container">
        <div class="page_wrapper">

            <?php if($category) : ?>
            <div class="post-container">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="<?php echo home_url(); ?>">Home</a></li>
                        <?php if ($catName != 'Others') : ?>
                            <li>
                                <a href="<?php echo home_url() . '/category/' . $catSlug; ?>"><?php echo $catName; ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <?php if($catName != 'Others') : ?>
                <div class="page-title">
                    <?php echo $catName; ?>
                </div>
                <?php endif; ?>

                <?php $query = new WP_Query(['category_name' => $catSlug]);
                while ($query->have_posts()) {
                    $query->the_post(); ?>

                        <div class="archive-block">
                            <a href="<?php echo  get_permalink(); ?>" class="link-page-title">
                                <?php echo the_title(); ?>
                            </a>
                            <div class="date"><?php echo _e('Submitted by editor on ', 'antiarnaques') . get_post_time( 'j F, Y - H:i', true); ?></div>
                            <div class="content">
                                <?php echo the_excerpt(); ?>
                                <?php the_post_thumbnail(); ?>
                            </div>
                            <ul class="link-btn">
                                <li class="item"><a href="#"><?php _e('Add new comment', 'antiarnaques'); ?></a></li>
                                <li class="item"><a href="<?php echo  get_permalink(); ?>"><?php _e('Read more', 'antiarnaques'); ?></a></li>
                            </ul>
                        </div>

                <?php } ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php get_footer();
