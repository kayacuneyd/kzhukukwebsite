<?php
function get_hero_slider_data()
{
    $data = [];
    $query = new WP_Query([
        'post_type' => 'hero_slider',
        'posts_per_page' => -1,
    ]);

    while ($query->have_posts()) {
        $query->the_post();
        $data[] = [
            'heading' => get_field('heading'),
            'video_link' => get_field('video_link'),
            'contact_text' => get_field('contact_text'),
            'contact_url' => get_field('contact_url'),
            'bg_image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
        ];
    }
    wp_reset_postdata();
    return $data;
}

function get_hero_pagination_data()
{
    $data = [];
    $query = new WP_Query([
        'post_type' => 'hero_slider',
        'posts_per_page' => -1,
    ]);

    while ($query->have_posts()) {
        $query->the_post();
        $data[] = [
            'icon' => get_field('pagination_icon')['url'],
            'name' => get_field('pagination_title'),
            'paragraph' => get_field('pagination_desc'),
        ];
    }
    wp_reset_postdata();
    return $data;
}
