<?php

/**
 * Front Page – Intro Icon Box Slider Section
 */

$intro_boxes_heading = get_field('intro_boxes_heading');
?>

<div class="icon-box-section">
    <div class='icon-box-section-wrapper section-wrapper pattern-bg'>
        <div class="icon-box-section-inner pattern-bg-content">
            <div class="container">
                <div class="row">
                    <div class="icon-box-section-heading-content">
                        <h2 class="f-w-400 heading-40"><?php echo esc_html($intro_boxes_heading); ?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="slider icon-box-slider">
                        <div class="swiper-container icon-box-slider-container">
                            <div class="swiper-wrapper">
                                <?php for ($i = 1; $i <= 6; $i++): ?>
                                    <?php
                                    $icon = get_field("intro_box_icon_$i");
                                    $title = get_field("intro_box_title_$i");
                                    $text = get_field("intro_box_text_$i");
                                    ?>
                                    <?php if ($icon || $title || $text): ?>
                                        <div class="swiper-slide icon-box-slide">
                                            <a href="#">
                                                <div class="icon-box-slide-inner icon-box txt-center">
                                                    <div class="mg-center">
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