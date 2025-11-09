<?php

/**
 * Template Name: Takım Sayfası
 */

get_header();
?>

<!-- Page Header -->
<?php get_template_part('template-parts/common/page-header'); ?>

<?php
$name        = get_field('contact_name');
$surname     = get_field('contact_surname');
$email       = get_field('contact_email');
$message     = get_field('contact_message');
$submit_text = get_field('contact_submit_label');
$bg_image    = get_field('contact_bg_image');
?>

<div class="form-page login">
    <div class="form-page-wrapper">
        <div class="form-page-content">
            <div class="form-page-content-wrapper">
                <h1 class="txt-center">Bizimle İletişime Geçin</h1>

                <?php if (isset($_GET['contact_status']) && $_GET['contact_status'] === 'success'): ?>
                    <div class="alert alert-success">Mesajınız başarıyla gönderildi!</div>
                <?php endif; ?>

                <form method="POST" action="">
                    <input type="text" name="first_name" placeholder="İsim" required>
                    <input type="text" name="last_name" placeholder="Soyisim" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" placeholder="Mesajınız" required></textarea>

                    <!-- Honeypot -->
                    <input type="text" name="honeypot_field" style="display:none">

                    <!-- Güvenlik: nonce -->
                    <?php wp_nonce_field('kz_contact_form', 'kz_contact_form_nonce'); ?>

                    <button class="button button-3 txt-upper" type="submit">
                        <div>
                            <i class="fas fa-envelope"></i>
                            <span>Gönder</span>
                        </div>
                    </button>
                </form>
            </div>
        </div>
        <?php if ($bg_image): ?>
            <div class="form-page-image">
                <img src="<?php echo esc_url($bg_image['url']); ?>" alt="<?php echo esc_attr($bg_image['alt']); ?>">
            </div>
        <?php endif; ?>
    </div>
</div>




<!-- CTA Section -->
<?php
$cta_query = new WP_Query(array(
    'post_type' => 'cta_block',
    'posts_per_page' => 1,
));
if ($cta_query->have_posts()):
    while ($cta_query->have_posts()): $cta_query->the_post();
        $cta_title = get_field('cta_title');
        $cta_subtitle = get_field('cta_subtitle');
        $cta_bg = get_field('cta_background');
        $cta_btn_1_text = get_field('cta_button_1_text');
        $cta_btn_1_link = get_field('cta_button_1_link');
        $cta_btn_2_text = get_field('cta_button_2_text');
        $cta_btn_2_link = get_field('cta_button_2_link');
?>
        <div class="cta-section cta-section-1 sec-hero-slider b-primary">
            <div class="cta-section-wrapper sec-hero-slider-wrapper section-wrapper" style="background-image: url('<?php echo esc_url($cta_bg); ?>');">
                <div class="container">
                    <div class="row">
                        <div class="cta-section-content sec-hero-slider-content txt-center">
                            <h4 class='c-white f-w-400 ln-ht-44'><?php echo esc_html($cta_title); ?></h4>
                            <h3 class="c-white f-w-400 heading-50 mg-center"><?php echo esc_html($cta_subtitle); ?></h3>
                            <div class="button-group">
                                <?php if ($cta_btn_1_link && $cta_btn_1_text): ?>
                                    <a href="<?php echo esc_url($cta_btn_1_link); ?>" class="button button-1 txt-upper">
                                        <div>
                                            <i class="far fa-envelope"></i>
                                            <span><?php echo esc_html($cta_btn_1_text); ?></span>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <?php if ($cta_btn_2_link && $cta_btn_2_text): ?>
                                    <a href="<?php echo esc_url($cta_btn_2_link); ?>" class="button button-2 txt-upper">
                                        <div>
                                            <i class="fas fa-headphones"></i>
                                            <span><?php echo esc_html($cta_btn_2_text); ?></span>
                                        </div>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>