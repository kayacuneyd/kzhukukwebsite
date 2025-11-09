<?php

/**
 * Intro Section
 */
?>

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