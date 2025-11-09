<?php

// Custom walker dosyasını dahil et
require_once get_template_directory() . '/inc/class-custom-walker.php';

// Menüleri kaydet
function kz_register_menus()
{
    register_nav_menus(array(
        'main_menu' => 'Ana Menü',
        'top_menu'  => 'Üst Menü',
    ));
}
add_action('after_setup_theme', 'kz_register_menus');

add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 100,
    'flex-height' => true,
    'flex-width'  => true,
));


// CSS & JS enqueue işlemleri
require_once get_template_directory() . '/inc/enqueue.php';

function kz_theme_feature()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // ACF Options Page ekle
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Tema Ayarları',
            'menu_title'    => 'Tema Ayarları',
            'menu_slug'     => 'theme-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false
        ));
    }

    // Özel logo desteği
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'kz_theme_feature');


// Hero Slider Custom Post Type
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

function ck_register_cta_cpt()
{
    $labels = array(
        'name'               => 'CTA Blokları',
        'singular_name'      => 'CTA Blok',
        'add_new'            => 'Yeni CTA Ekle',
        'add_new_item'       => 'Yeni CTA Blok Ekle',
        'edit_item'          => 'CTA Blok Düzenle',
        'new_item'           => 'Yeni CTA Blok',
        'all_items'          => 'Tüm CTA Blokları',
        'view_item'          => 'CTA Blok Gör',
        'search_items'       => 'CTA Ara',
        'not_found'          => 'CTA bulunamadı',
        'not_found_in_trash' => 'Çöp kutusunda CTA yok',
        'menu_name'          => 'CTA'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_in_rest'       => true,
        'supports'           => array('title'),
        'menu_icon'          => 'dashicons-megaphone',
    );

    register_post_type('cta_block', $args);
}
add_action('init', 'ck_register_cta_cpt');

function register_tab_section_cpt()
{
    $labels = array(
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
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => false,
        'rewrite' => array('slug' => 'tab_section'),
        'menu_icon' => 'dashicons-screenoptions',
        'supports' => array('title', 'editor'),
        'show_in_rest' => true
    );

    register_post_type('tab_section', $args);
}
add_action('init', 'register_tab_section_cpt');

function kz_register_testimonial_cpt()
{
    $labels = array(
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
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_rest' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-format-quote',
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'kz_register_testimonial_cpt');

function register_team_member_post_type()
{
    register_post_type(
        'team_member',
        array(
            'labels' => array(
                'name' => __('Team Members'),
                'singular_name' => __('Team Member')
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-groups',
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'register_team_member_post_type');

function create_service_post_type()
{
    register_post_type(
        'service',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'service'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_icon' => 'dashicons-admin-tools'
        )
    );
}
add_action('init', 'create_service_post_type');

add_action('admin_post_nopriv_handle_contact_form', 'kz_handle_contact_form');
add_action('admin_post_handle_contact_form', 'kz_handle_contact_form');

// Gönderen adı (From Name) ayarla
add_filter('wp_mail_from_name', function ($name) {
    return 'Kaplan & Zorer - Avukatlık ve Hukuk Bürosu';
});

// Gönderen e-posta adresi (From Email) ayarla
add_filter('wp_mail_from', function ($email) {
    return 'iletisim@kzhukuk.com'; // 
});


// İletişim formunu işle
function handle_contact_form_submission()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['kz_contact_form_nonce']) && wp_verify_nonce($_POST['kz_contact_form_nonce'], 'kz_contact_form')) {

        // Honeypot kontrolü
        if (!empty($_POST['honeypot_field'])) {
            return; // Bot!
        }

        // Alanları temizle
        $first_name = sanitize_text_field($_POST['first_name']);
        $last_name  = sanitize_text_field($_POST['last_name']);
        $email      = sanitize_email($_POST['email']);
        $message    = sanitize_textarea_field($_POST['message']);

        // E-posta ayarları
        $to      = get_option('admin_email'); // Değiştirilebilir
        $subject = '📩 Yeni İletişim Formu Mesajı';
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $body    = "
            <strong>İsim:</strong> $first_name<br>
            <strong>Soyisim:</strong> $last_name<br>
            <strong>Email:</strong> $email<br>
            <strong>Mesaj:</strong><br>$message
        ";

        wp_mail($to, $subject, $body, $headers);

        // Kullanıcıya yönlendirme veya mesaj göstermek için session veya GET parametreleri kullanılabilir
        wp_redirect(add_query_arg('contact_status', 'success', wp_get_referer()));
        exit;
    }
}
add_action('init', 'handle_contact_form_submission');

// Hero Slider verisini getir
function get_hero_slider_data()
{
    $slider_data = [];
    $query = new WP_Query([
        'post_type' => 'hero_slider',
        'posts_per_page' => -1,
    ]);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $slider_data[] = [
                'heading' => get_field('heading'),
                'video_link' => get_field('video_link'),
                'contact_text' => get_field('contact_text'),
                'contact_url' => get_field('contact_url'),
                'bg_image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
            ];
        }
        wp_reset_postdata();
    }

    return $slider_data;
}

// Hero Pagination verisini getir
function get_hero_pagination_data()
{
    $pagination_data = [];
    $query = new WP_Query([
        'post_type' => 'hero_slider',
        'posts_per_page' => -1,
    ]);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $pagination_data[] = [
                'icon' => get_field('pagination_icon')['url'],
                'title' => get_field('pagination_title'),
                'desc' => get_field('pagination_desc'),
            ];
        }
        wp_reset_postdata();
    }

    return $pagination_data;
}
