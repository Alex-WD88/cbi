<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="antiarnaques.org"/>
    <meta name="author" content="antiarnaques.org"/>
    <title><?php bloginfo('name'); ?>-<?php echo get_the_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="header-wrapper">
    <div class="logo">
        <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri() . '/src/images/logo.png'; ?>" alt="logo">
        </a>
    </div>

    <div class="top-header">
        <div class="container">
            <div class="flex-wrap-haeder">
                <div class="adress">
                    <a href="#">246017, г. Гомель, ул. Гагарина, д. 46, офис 2-1</a>
                </div>
                <div class="email">
                    <a href="mailto:info.cbi.pr@gmail.com">info.cbi.pr@gmail.com</a>
                </div>
                <div class="soc-main">
                    <a href="#" target="_blank"></a>                          
                </div>
            </div>
        </div>
    </div>

    <header id="main-header">
        <div class="container">

            <div class="header-nav">

                <?php
                    $menu = 'primary';
                    $args = array(
                        'menu_id' => 'menu_main',
                        'theme_location' => $menu,
                        'container' => ''
                    );
                ?>
                    <?php wp_nav_menu($args); ?>

                </div>



                <div class="menu-content-mobile">
                    <a href="#" class="toggle_main_menu_link">
                        <?php echo_svg(get_stylesheet_directory() . '/src/images/svg/ic-menu.svg'); ?>
                    </a>
                    <div class="mobile-menu close">
                        <a href="#" class="close_main_menu_link">
                            <?php echo_svg(get_stylesheet_directory() . '/src/images/svg/ic-close.svg'); ?>
                        </a>
                        <?php
                        $menu = 'primary';
                        $args = array('menu_id' => 'menu_main',
                            'theme_location' => $menu,
                            'container' => ''
                        );
                        ?>
                        <?php wp_nav_menu($args); ?>
                    </div>
                </div>
                
            </div>
        </div>
    </header>

</div>
