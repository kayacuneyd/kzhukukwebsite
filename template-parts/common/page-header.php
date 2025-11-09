<?php

/**
 * Universal Page Header component
 */

$page_id = get_the_ID();

// Eğer tekil yazı (single) ise
if (is_single() && has_post_thumbnail()) {
    $bg_image = get_the_post_thumbnail_url($page_id, 'full');
    $title = get_the_title();
    $desc = get_the_excerpt();
    $cta_text = '';
    $cta_link = '';
}
// Eğer blog anasayfası (home.php) veya arşiv sayfasıysa
elseif (is_home() || is_archive()) {
    $bg_image = get_field('about_header_bg', get_option('page_for_posts')); // Blog sayfası ACF içeriği
    $title = get_the_archive_title();
    $desc = get_the_archive_description();
    $cta_text = '';
    $cta_link = '';
}
// Eğer arama sonuçları sayfasıysa
elseif (is_search()) {
    $bg_image = get_field('about_header_bg', get_option('page_for_posts'));
    $title = 'Arama Sonuçları';
    $desc = '“' . esc_html(get_search_query()) . '” için sonuçlar';
    $cta_text = '';
    $cta_link = '';
}
// Diğer sayfalarda (page.php gibi)
else {
    $bg_image = get_field('about_header_bg', $page_id) ?: get_field('team_header_bg', $page_id);
    $title = get_field('about_header_title', $page_id) ?: get_field('team_header_title', $page_id);
    $desc = get_field('about_header_desc', $page_id) ?: get_field('team_header_desc', $page_id);
    $cta_text = get_field('about_header_cta_text', $page_id);
    $cta_link = get_field('about_header_cta_link', $page_id);
}

// Varsayılan görsel yedeği
if (empty($bg_image)) {
    $bg_image = 'http://kzhukuk.com/wp-content/uploads/2025/04/blog-header.png';
}
?>

<?php if ($bg_image || $title) : ?>
    <div class="page-header">
        <div class="page-header-wrapper" style="background-image: url('<?php echo esc_url(is_array($bg_image) ? $bg_image['url'] : $bg_image); ?>');">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="page-header-content">
                            <?php if ($title) : ?>
                                <h1 class="c-dark"
                                    style="background-color: #f0f8ffc9;
                                           width: fit-content;
                                           padding: 20px;"><?php echo esc_html($title); ?></h1>
                            <?php endif; ?>

                            <?php if ($desc) : ?>
                                <p class="small ln-ht-auto c-dark"
                                    style="background-color: #f0f8ffc9;
                                           width: fit-content;
                                           padding: 0 20px;">
                                    <?php echo esc_html($desc); ?>
                                    <?php if ($cta_text && $cta_link): ?>
                                        <a href="<?php echo esc_url($cta_link['url']); ?>" class="link link-inherit">
                                            <span><?php echo esc_html($cta_text); ?></span>
                                        </a>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>