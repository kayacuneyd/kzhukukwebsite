<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Faviconlar -->
    <link rel="apple-touch-icon" sizes="180x180" href="http://kzhukuk.com/wp-content/uploads/2025/04/favicon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://kzhukuk.com/wp-content/uploads/2025/04/favicon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://kzhukuk.com/wp-content/uploads/2025/04/favicon.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/site.webmanifest">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Top Menu Start -->
    <div class="top-menu">
        <div class="top-menu-wrapper">
            <div class="tagline">
                <p>K&Z HUKUK</p>
            </div>
            <div class="menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'top_menu',
                    'container' => '',
                    'menu_class' => '',
                    'fallback_cb' => false
                ));
                ?>
            </div>
        </div>
    </div>
    <!-- Top Menu End -->

    <!-- Navigation Start -->
    <div class="navigation">
        <div class="navigation-wrapper">
            <div class="navigation-inner">
                <div class="navigation-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php
                        if (has_custom_logo()) {
                            the_custom_logo();
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="' . get_bloginfo('name') . '">';
                        }
                        ?>
                    </a>
                    
                    <div class="site-text">
                        <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                        <p class="site-description"><?php bloginfo('description'); ?></p>
                    </div>
                </div>
                
                <div class="navigation-menu">
                    <div class="mobile-header">
                        <div class="logo">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php
                                if (has_custom_logo()) {
                                    the_custom_logo();
                                } else {
                                    // Logo yüklenmemişse varsayılan görseli göster
                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/logo.png" alt="' . get_bloginfo('name') . '">';
                                }
                                ?>
                            </a>
                        </div>
                        <ul>
                            <li class="main-search">
                                <div>
                                    <i class="fas fa-search"></i>
                                </div>
                            </li>
                            <li class="close-button">
                                <i class="fas fa-times"></i>
                            </li>
                        </ul>
                    </div>

                    <?php
                    wp_nav_menu(array(
                        'theme_location'  => 'main_menu',
                        'container'       => '',
                        'menu_class'      => 'parent',
                        'depth'           => 2,
                        'fallback_cb'     => false,
                        'walker'          => new WP_Bootstrap_Navwalker_Custom(),
                    ));
                    ?>

                    <p class="tagline">K&Z Hukuk</p>
                </div>

                <div class="navigation-bar">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navigation End -->

    <div class="main-wrapper">
        <!-- Preloader -->
        <div class="preloader">
            <div class='sk-folding-cube'>
                <div class='sk-cube sk-cube-1'></div>
                <div class='sk-cube sk-cube-2'></div>
                <div class='sk-cube sk-cube-4'></div>
                <div class='sk-cube sk-cube-3'></div>
            </div>
        </div>