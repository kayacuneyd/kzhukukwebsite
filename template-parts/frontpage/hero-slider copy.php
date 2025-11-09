<?php
$hero_slides = get_hero_slider_data();

if (!empty($hero_slides)) : ?>
    <div class="swiper-container hero-slider-container">
        <div class="swiper-wrapper">
            <?php foreach ($hero_slides as $slide) : ?>
                <div class="swiper-slide hero-slide">
                    <div class="hero-slide-inner" style="background-image: url('<?php echo esc_url($slide['bg_image']); ?>');">
                        <div class="hero-slide-content">
                            <h1 class="c-dark"><?php echo esc_html($slide['heading']); ?></h1>
                            <div class="button-group">
                                <?php if ($slide['video_link']) : ?>
                                    <a href="<?php echo esc_url($slide['video_link']); ?>" class="button glightbox button-3 txt-upper">
                                        <div>
                                            <i class="far fa-play-circle"></i>
                                            <span>watch our video</span>
                                        </div>
                                    </a>
                                <?php endif; ?>
                                <p>Got questions?
                                    <a href="<?php echo esc_url($slide['contact_url']); ?>" class="link">
                                        <span class="txt-upper f-w-500"><?php echo esc_html($slide['contact_text']); ?></span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>