    <?php
    /**
     * front-page.php – custom front page template
     */

    // Hero slider için query
    $args = array(
        'post_type' => 'hero_slider',
        'posts_per_page' => -1,
    );
    $hero_query = new WP_Query($args);
    $bullet_query = new WP_Query($args);

    get_header();
    ?>


    <!-------------------------------
    hero start
    --------------------------------->
    <div class="hero">
        <div class="hero-wrapper">
            <?php
            $hero_query = new WP_Query(array(
                'post_type' => 'hero_slider',
                'posts_per_page' => -1,
            ));
            ?>
            <?php if ($hero_query->have_posts()) : ?>
                <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php
                        $slide_index = 0;
                        while ($hero_query->have_posts()) : $hero_query->the_post(); ?>
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $slide_index; ?>" class="<?php echo ($slide_index === 0) ? 'active' : ''; ?>" aria-current="<?php echo ($slide_index === 0) ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $slide_index + 1; ?>"></button>
                        <?php $slide_index++;
                        endwhile; ?>
                        <?php $hero_query->rewind_posts(); ?>
                    </div>

                    <div class="carousel-inner">
                        <?php
                        $slide_index = 0;
                        while ($hero_query->have_posts()) : $hero_query->the_post();
                            $slider_image = get_field('slider_image');
                            $bullet_icon = get_field('bullet_icon');
                            $bullet_name = get_field('bullet_name');
                            $bullet_paragraph = get_field('bullet_paragraph');
                        ?>
                            <div class="carousel-item <?php echo ($slide_index === 0) ? 'active' : ''; ?>">
                                <div class="hero-slide-inner" style="background-image: url('<?php echo esc_url($slider_image); ?>'); max-height: 750px; background-size: cover; background-position: center;">
                                    <div class="hero-slide-content text-white text-center py-5">
                                        <h1 class="c-dark"><?php the_title(); ?></h1>
                                        <div class="button-group my-3">
                                            <a href="#" class="btn btn-light me-2">
                                                <i class="far fa-play-circle"></i> Watch our video
                                            </a>
                                            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-outline-light">
                                                Talk to an Expert
                                            </a>
                                        </div>

                                        <?php if ($bullet_icon || $bullet_name || $bullet_paragraph) : ?>
                                            <div class="hero-bullet mt-4">
                                                <?php if (!empty($bullet_icon) && isset($bullet_icon['url'])) : ?>
                                                    <div class="icon-circle icon-circle-lg mg-center mb-3">
                                                        <img src="<?php echo esc_url($bullet_icon['url']); ?>" alt="<?php echo esc_attr($bullet_name); ?>">
                                                    </div>
                                                <?php endif; ?>
                                                <h4 class="f-w-500"><?php echo esc_html($bullet_name); ?></h4>
                                                <p class="c-grey"><?php echo esc_html($bullet_paragraph); ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php $slide_index++;
                        endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!----------------------------------
    hero end
    ----------------------------------->


    <!-------------------------------
    cta start
    --------------------------------->
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
    <!-------------------------------
    cta end
    --------------------------------->

    <!-- Intro section - start -->
    <div class="intro">
        <div class="intro-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="intro-content">
                            <h2><?php the_field('intro_title'); ?></h2>
                            <p class="paragraph-lg c-grey"><?php the_field('intro_paragraph_1'); ?></p>
                            <p class="paragraph-lg c-grey"><?php the_field('intro_paragraph_2'); ?></p>
                            <?php $signature_image = get_field('intro_signature_image'); ?>
                            <?php if ($signature_image): ?>
                                <img src="<?php echo esc_url($signature_image['url']); ?>" alt="signature" style="max-width: 200px;">
                            <?php endif; ?>
                            <p class="paragraph-sm c-grey"><?php the_field('intro_signature_position'); ?></p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="vertical-txt-wrapper right-align">
                            <h1 class="vertical-txt"><?php the_field('intro_vertical_text'); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image intro-bg">
                <?php $intro_bg = get_field('intro_bg_image'); ?>
                <?php if ($intro_bg): ?>
                    <img src="<?php echo esc_url($intro_bg['url']); ?>" alt="image">
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Intro section - end -->

    <!-- Intro box section - start -->
    <div class="icon-box-section">
        <div class='icon-box-section-wrapper section-wrapper pattern-bg'>
            <div class="icon-box-section-inner pattern-bg-content">
                <div class="container">
                    <div class="row">
                        <div class="icon-box-section-heading-content">
                            <h2 class="f-w-400 heading-40"><?php the_field('intro_boxes_heading'); ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="slider icon-box-slider">
                            <div class="swiper-container icon-box-slider-container">
                                <div class="swiper-wrapper">
                                    <?php for ($i = 1; $i <= 6; $i++): ?>
                                        <?php
                                        $icon = get_field('intro_box_icon_' . $i);
                                        $title = get_field('intro_box_title_' . $i);
                                        $text = get_field('intro_box_text_' . $i);
                                        ?>
                                        <?php if ($icon || $title || $text): ?>
                                            <div class="swiper-slide icon-box-slide">
                                                <a href="#">
                                                    <div class="icon-box-slide-inner icon-box txt-center">
                                                        <div class="icon-circle icon-circle-sm mg-center">
                                                            <?php if ($icon): ?>
                                                                <img src="<?php echo esc_url($icon['url']); ?>" alt="icon">
                                                            <?php endif; ?>
                                                        </div>
                                                        <h4 class="f-w-500"><?php echo esc_html($title); ?></h4>
                                                        <p class="c-grey"><?php echo esc_html($text); ?></p>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="icon-box-slider-pagination bullet-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Intro box section - end -->

    <!-- testimonials - start -->
    <div class="testimonial testimonial-1">
        <div class="testimonial-wrapper">
            <div class="container">
                <div class="row">
                    <div class="testimonial-heading-content">
                        <h2 class="f-w-400 heading-40">Hear from what others say about our company</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="slider box-slider">
                        <div class="swiper-container box-slider-container">
                            <div class="swiper-wrapper">
                                <?php
                                $testimonial_query = new WP_Query(array(
                                    'post_type' => 'testimonial',
                                    'posts_per_page' => -1,
                                ));

                                if ($testimonial_query->have_posts()) :
                                    while ($testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>
                                        <div class="swiper-slide box-slide testimonial-slide">
                                            <div class="box-slide-inner">
                                                <p class="c-grey">"<?php the_content(); ?>"</p>
                                                <h5 class="txt-sm txt-upper lt-1 c-primary"><?php the_title(); ?></h5>
                                            </div>
                                        </div>
                                <?php endwhile;
                                    wp_reset_postdata();
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="box-slider-pagination bullet-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonials - end -->

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