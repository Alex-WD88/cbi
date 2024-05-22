<div class="container">
    <div class="page_wrapper">
        <?php 
        if (have_posts()) : get_post();
            while (have_posts()) : the_post(); ?>
                <?php $category = get_the_category(); ?>
                <?php $catName = $category[0]->name; ?>
                <?php $catSlug = $category[0]->slug; ?>
                <div class="post-container">
                    <div class="breadcrumb">
                        <ul>
                            <li><a href="<?php echo home_url(); ?>">Home</a></li>
                            <?php if (!empty($catName) && $catName != 'Others' && $catName != 'Main Slider') : ?>
                                <li>
                                    <a href="<?php echo home_url() . '/category/' . $catSlug; ?>"><?php echo $catName; ?></a>
                                </li>
                            <?php endif; ?>
                            <li><a href="<?php echo get_permalink(); ?>"><?php echo the_title(); ?></a></li>
                        </ul>
                    </div>
                    <div class="page-title">
                        <?php echo the_title(); ?>
                    </div>
                    <div class="page-content">
                        <?php echo the_content(); ?>
                    </div>
                </div>

            <?php endwhile; endif; ?>
    </div>
</div>
