<div class="intro">
    <div class="intro-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-content">
                        <?php if ($title = get_field('about_intro_title')) : ?>
                            <h2><?php echo esc_html($title); ?></h2>
                        <?php endif; ?>

                        <?php if ($para1 = get_field('about_intro_para_1')) : ?>
                            <p class="paragraph-lg c-grey"><?php echo esc_html($para1); ?></p>
                        <?php endif; ?>

                        <?php if ($para2 = get_field('about_intro_para_2')) : ?>
                            <p class="paragraph-lg c-grey"><?php echo esc_html($para2); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if ($bg = get_field('about_intro_bg_image')) : ?>
            <div class="image intro-bg" style="height: 750px; width: 100%;">
                <img src="<?php echo esc_url($bg['url']); ?>" alt="<?php echo esc_attr($bg['alt']); ?>">
            </div>
        <?php endif; ?>
    </div>
</div>