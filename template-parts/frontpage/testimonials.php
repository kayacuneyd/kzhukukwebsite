<?php

/**
 * Front Page – Testimonials Section
 */
?>

<div class="testimonial testimonial-1">
    <div class="testimonial-wrapper">
        <div class="container">
            <div class="row">
                <div class="testimonial-heading-content">
                    <h2 class="f-w-400 heading-40">!!!Referanslarımız!!!!</h2>
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
                                            <p class="c-grey" style="font-size: 6rem;">"</p><?php the_content(); ?>
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