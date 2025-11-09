<?php
// Hero Slider CPT
function register_hero_slider_cpt()
{
    register_post_type('hero_slider', array(
        'label' => 'Hero Slider',
        'public' => true,
        'menu_icon' => 'dashicons-slides',
        'supports' => array('title', 'thumbnail'),
        'has_archive' => false,
        'rewrite' => array('slug' => 'hero-slider'),
        'show_in_rest' => true
    ));
}
add_action('init', 'register_hero_slider_cpt');

// CTA Blokları
function ck_register_cta_cpt()
{
    register_post_type('cta_block', array(
        'labels' => array(
            'name' => 'CTA Blokları',
            'singular_name' => 'CTA Blok',
            'add_new' => 'Yeni CTA Ekle',
            'add_new_item' => 'Yeni CTA Blok Ekle',
            'edit_item' => 'CTA Blok Düzenle',
            'new_item' => 'Yeni CTA Blok',
            'view_item' => 'CTA Blok Gör',
            'search_items' => 'CTA Ara',
            'not_found' => 'CTA bulunamadı',
            'menu_name' => 'CTA'
        ),
        'public' => true,
        'show_in_rest' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-megaphone',
    ));
}
add_action('init', 'ck_register_cta_cpt');

// Testimonials
function kz_register_testimonial_cpt()
{
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Testimonials',
            'singular_name' => 'Testimonial',
            'add_new' => 'Yeni Yorum Ekle',
            'add_new_item' => 'Yeni Testimonial Ekle',
            'edit_item' => 'Testimonialı Düzenle',
            'new_item' => 'Yeni Testimonial',
            'view_item' => 'Testimonialı Gör',
            'search_items' => 'Testimonial Ara',
            'not_found' => 'Testimonial bulunamadı',
            'menu_name' => 'Testimonials'
        ),
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-format-quote',
    ));
}
add_action('init', 'kz_register_testimonial_cpt');

// Team Member
function register_team_member_post_type()
{
    register_post_type('team_member', array(
        'labels' => array(
            'name' => 'Team Members',
            'singular_name' => 'Team Member'
        ),
        'public' => true,
        'rewrite' => array(
            'slug' => 'takimimiz'
        ),
        'has_archive' => false,
        'menu_icon' => 'dashicons-groups',
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}
add_action('init', 'register_team_member_post_type');

// Services
function create_service_post_type()
{
    register_post_type('service', array(
        'labels' => array(
            'name' => 'Services',
            'singular_name' => 'Service'
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'service'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-admin-tools'
    ));
}
add_action('init', 'create_service_post_type');

// Tab Sections
function register_tab_section_cpt()
{
    register_post_type('tab_section', array(
        'labels' => array(
            'name' => 'Tab Bölümleri',
            'singular_name' => 'Tab Bölümü',
            'add_new' => 'Yeni Tab Ekle',
            'add_new_item' => 'Yeni Tab Bölümü Ekle',
            'edit_item' => 'Tab Bölümünü Düzenle',
            'new_item' => 'Yeni Tab Bölümü',
            'view_item' => 'Tab Bölümünü Gör',
            'search_items' => 'Tab Ara',
            'not_found' => 'Hiç içerik bulunamadı',
            'menu_name' => 'Tab Bölümleri'
        ),
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'tab_section'),
        'menu_icon' => 'dashicons-screenoptions',
        'supports' => array('title', 'editor'),
        'show_in_rest' => true
    ));
}
add_action('init', 'register_tab_section_cpt');
