<?php
$hero_slides = get_hero_slider_data();

if (!empty($hero_slides)) : ?>
    <div class="swiper-container hero-slider-container">
        <div class="swiper-wrapper">
            <?php foreach ($hero_slides as $slide) : ?>
                <div class="swiper-slide hero-slide">
                    <div class="hero-slide-inner" style="background-image: url('<?php echo esc_url($slide['bg_image']); ?>');">
                        <div class="hero-slide-content">
                            <h1 class="c-dark" style="background-color: #f0f8ffc9;
                                           width: fit-content;
                                           padding: 20px;"><?php echo esc_html($slide['heading']); ?></h1>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>