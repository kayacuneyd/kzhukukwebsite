<?php

/**
 * Template Name: Takım Sayfası
 */

get_header();
?>

<!-- Page Header -->
<?php get_template_part('template-parts/common/page-header'); ?>
<!----------------------------------------
page header - end
---------------------------------------->

<div class="team-single">
    <div class="team-wrapper">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-4">
                    <div class="team-member">
                        <?php
                            $photo = get_field('team_member_photo');
                            if (!empty($photo)) :
                            ?>
                                <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt'] ?: get_the_title()); ?>" class="img-fluid" />
                            <?php else : ?>
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', ['alt' => get_the_title(), 'class' => 'img-fluid']); ?>
                                <?php endif; ?>
                        <?php endif; ?>

                        <h4 class="heading-sm mt-3"><?php the_title(); ?></h4>

                        <?php if ($title_suffix = get_field('title_suffix')) : ?>
                            <p class="c-grey"><?php echo esc_html($title_suffix); ?></p>
                        <?php endif; ?>

                        <?php if ($email = get_field('email')) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="link">
                                <span><?php echo esc_html($email); ?></span>
                            </a>
                        <?php endif; ?>

                        <div class="team-social">
                            <ul>
                                <?php if ($facebook): ?>
                                    <li><a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php endif; ?>
                                <?php if ($linkedin): ?>
                                    <li><a href="<?php echo esc_url($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                <?php endif; ?>
                                <?php if ($twitter): ?>
                                    <li><a href="<?php echo esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="team-description">
                        <?php
                        $team_desc = get_field('member_description');
                        if ($team_desc) :
                        ?>
                            <article>
                                <?php echo wp_kses_post($team_desc); ?>
                            </article>
                        <?php else : ?>
                            <?php the_content(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
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