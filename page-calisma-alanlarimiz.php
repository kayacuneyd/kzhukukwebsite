<?php

/**
 * page-servis.php
 */

get_header(); // header.php'yi çağırır
?>
<!----------------------------------------
    page header - start
    ---------------------------------------->
<?php get_template_part('template-parts/common/page-header'); ?>
<!----------------------------------------
    page header - end
    ---------------------------------------->


<?php
$page_id = get_the_ID();
$service_title = get_field('service_title', $page_id);
$service_para_1 = get_field('service_para_1', $page_id);
$service_para_2 = get_field('service_para_2', $page_id);
$service_icon = get_field('service_icon', $page_id);
$service_bg = get_field('service_bg', $page_id);
?>

<div class="service-detail">
    <div class="service-detail-wrapper">
        <div class="container">
            <div class="row d-lg-flex align-items-lg-center">
                <div class="col-lg-12 order-2 order-lg-1">
                    <div class="service-detail-content">
                        <?php if ($service_title): ?>
                            <h2 class="ln-ht-44"><?php echo esc_html($service_title); ?></h2>
                        <?php endif; ?>

                        <?php if ($service_para_1): ?>
                            <p class="large c-grey"><?php echo esc_html($service_para_1); ?></p>
                        <?php endif; ?>

                        <?php if ($service_para_2): ?>
                            <p class="large c-grey"><?php echo esc_html($service_para_2); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
        <?php if ($service_bg): ?>
            <div class="image intro-bg">
                <img src="<?php echo esc_url($service_bg['url']); ?>" alt="<?php echo esc_attr($service_bg['alt']); ?>">
            </div>
        <?php endif; ?>
    </div>
</div>



<!----------------------------------------
    service - start
    ---------------------------------------->
<div class="service">
    <div class="service-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="service-header">
                        <h2 class="f-w-400 l-t-44">Hukuki Çözümler İçin Yanınızdayız</h2>
                        <p class="paragraph-lg c-grey">
                            İhtiyacınız olan her an,
                            doğru bilgi ve güçlü temsil için buradayız.
                            Tecrübemizi, şeffaflık ve güven ilkeleriyle birleştiriyor;
                            karşılaştığınız hukuki sorunlara kalıcı çözümler sunuyoruz.
                        </p>
                        <p class="paragraph-lg c-grey">Şirket kurulumu, ticari sözleşmeler, boşanma ve velayet davaları,
                            ceza yargılamaları, icra işlemleri ve sosyal güvenlik uyuşmazlıkları
                            başta olmak üzere çok çeşitli hukuk alanlarında danışmanlık ve avukatlık hizmeti sunuyoruz.</p>
                    </div>
                </div>
            </div>
            <div class="row service-list">
                <?php
                $service_query = new WP_Query(array(
                    'post_type' => 'service',
                    'posts_per_page' => -1
                ));
                if ($service_query->have_posts()) :
                    while ($service_query->have_posts()) : $service_query->the_post();
                        $icon = get_field('service_icon');
                        $desc = get_field('service_desc');
                        $link = get_field('service_link');
                ?>
                        <div class="col-lg-6">
                            <div class="service-single mg-center txt-center">
                                <div class="mg-center">
                                    <?php if ($icon): ?>
                                        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                                    <?php endif; ?>
                                </div>
                                <h3 class="ln-ht-3"><?php the_title(); ?></h3>
                                <p class="large c-grey"><?php echo esc_html($desc); ?></p>
                                <?php if ($link): ?>
                                    <a href="<?php echo esc_url($link['url']); ?>" class="link">
                                        <span class="txt-upper f-w-500"><?php echo esc_html($link['title']); ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

        </div>
    </div>

</div>
<!----------------------------------------
    service - end
    ---------------------------------------->

<!----------------------------------------
    cta - start
    ---------------------------------------->
<?php
$cta_query = new WP_Query(array(
    'post_type' => 'cta_block',
    'posts_per_page' => 1,
));

if ($cta_query->have_posts()) :
    while ($cta_query->have_posts()) : $cta_query->the_post();
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
<!----------------------------------------
    cta - end
    ---------------------------------------->

<?php get_footer(); ?>