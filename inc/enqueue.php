<?php

function kz_enqueue_assets()
{
    // CSS
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600;900&display=swap', false);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/css/all.min.css');
    wp_enqueue_style('glightbox', get_template_directory_uri() . '/assets/css/glightbox.min.css');
    wp_enqueue_style('overlay-scrollbars', get_template_directory_uri() . '/assets/css/overlay-scrollbars.min.css');
    wp_enqueue_style('swiper', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css', [], null, 'all');
    wp_enqueue_style('theme-style', get_stylesheet_uri(), ['main-style'], null, 'all');

    // JS
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', [], null, true);
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', [], null, true);
    wp_enqueue_script('glightbox', get_template_directory_uri() . '/assets/js/glightbox.min.js', [], null, true);
    wp_enqueue_script('overlay-scrollbars', get_template_directory_uri() . '/assets/js/overlay-scrollbars.min.js', [], null, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', [], null, true);

    // ACF verisini JS'e aktar
    $pagination_data = get_hero_pagination_data();
    wp_localize_script('main-js', 'hero_pagination', $pagination_data);
}
add_action('wp_enqueue_scripts', 'kz_enqueue_assets');
