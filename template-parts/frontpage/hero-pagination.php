<?php
$pagination_items = get_hero_pagination_data();

if (!empty($pagination_items)) : ?>
    <div class="container hero-pagination-wrapper">
        <div class="hero-pagination swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($pagination_items as $item) : ?>
                    <div class="swiper-slide">
                        <div class="icon-box txt-center">
                            <div class="mg-center">
                                <img src="<?php echo esc_url($item['icon']); ?>" alt="icon">
                            </div>
                            <h4 class="f-w-500"><?php echo esc_html($item['title']); ?></h4>
                            <p class="c-grey"><?php echo esc_html($item['desc']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>