<?php

/**
 * CTA Section
 */

$cta_query = new WP_Query(array(
    'post_type' => 'cta_block',
    'posts_per_page' => 1,
));

if ($cta_query->have_posts()) :
    while ($cta_query->have_posts()) : $cta_query->the_post();
        $cta_title = get_field('cta_title');
        $cta_subtitle = get_field('cta_subtitle');
        $cta_bg = get_field('cta_bg') ?: get_field('cta_background'); // Her iki alan adını kontrol et
        $cta_bg_url = is_array($cta_bg) ? $cta_bg['url'] : '';
        $cta_btn_1_text = get_field('cta_button_1_text');
        $cta_btn_1_link = get_field('cta_button_1_link');
        $cta_btn_2_text = get_field('cta_button_2_text');
        $cta_btn_2_link = get_field('cta_button_2_link');
?>

        <div class="cta-section cta-section-1 sec-hero-slider b-primary">
            <div class="cta-section-wrapper sec-hero-slider-wrapper section-wrapper" style="background-image: url('<?php echo esc_url($cta_bg_url); ?>');">
                <div class="container">
                    <div class="row">
                        <div class="cta-section-content sec-hero-slider-content txt-center">
                            <h4 class='c-white f-w-400 ln-ht-44'><?php echo esc_html($cta_title); ?></h4>
                            <h3 class="c-white f-w-400 heading-50 mg-center"><?php echo esc_html($cta_subtitle); ?></h3>
                            <div class="button-group">
                                <?php if ($cta_btn_1_link && $cta_btn_1_text): ?>
                                    <a href="<?php echo esc_url($cta_btn_1_link); ?>" class="button button-1 txt-upper">
                                        <div>
                                            <i class="far fa-headset"></i>
                                            <span><?php echo esc_html($cta_btn_1_text); ?></span>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <?php if ($cta_btn_2_link && $cta_btn_2_text): ?>
                                    <a href="<?php echo esc_url($cta_btn_2_link); ?>" class="button button-2 txt-upper">
                                        <div>
                                            <i class="fas fa-envelope"></i>
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