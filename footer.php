<?php
wp_footer();

$footer_page_id = 169;

// Footer verilerini ACF'den tek seferde çekelim
$footer_contact = get_field('footer_contact', $footer_page_id);
$footer_location = get_field('footer_location', $footer_page_id);
$footer_menu_links = get_field('footer_menu_links', $footer_page_id);
$footer_social_links = get_field('footer_social_links', $footer_page_id);
?>

<footer class="footer" style="border-top: 1px solid black;">
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-content">
                        <h6 class="txt-sm c-primary f-w-500 txt-upper">İletişim</h6>
                        <ul class="txt-sm-1 c-grey number-list">
                            <?php if (!empty($footer_contact['phone'])) : ?>
                                <li>
                                    P
                                    <a href="tel:<?php echo esc_attr($footer_contact['phone']); ?>" class="link link-md link-grey">
                                        <span><?php echo esc_html($footer_contact['phone']); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if (!empty($footer_contact['fax'])) : ?>
                                <li>
                                    F
                                    <a href="tel:<?php echo esc_attr($footer_contact['fax']); ?>" class="link link-md link-grey">
                                        <span><?php echo esc_html($footer_contact['fax']); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer-content">
                        <h6 class="txt-sm c-primary f-w-500 txt-upper">Adres</h6>
                        <?php if (!empty($footer_location['address'])) : ?>
                            <p class="c-grey ln-ht-3"><?php echo nl2br(esc_html($footer_location['address'])); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer-content">
                        <h6 class="txt-sm c-primary f-w-500 txt-upper">Önemli Linkler</h6>
                        <ul class="txt-sm-1 c-grey">
                            <?php for ($i = 1; $i <= 5; $i++) :
                                $text = $footer_menu_links["menu_text_$i"] ?? '';
                                $url = $footer_menu_links["menu_url_$i"] ?? '';
                                if (!empty($text) && !empty($url)) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($url); ?>" class="link link-md link-grey">
                                            <span><?php echo esc_html($text); ?></span>
                                        </a>
                                    </li>
                            <?php endif;
                            endfor; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer-content">
                        <h6 class="txt-sm c-primary f-w-500 txt-upper">Sosyal Medya</h6>
                        <ul class="txt-sm-1 c-grey social-list">
                            <?php for ($i = 1; $i <= 3; $i++) :
                                $name = $footer_social_links["platform_name_$i"] ?? '';
                                $icon = $footer_social_links["platform_icon_class_$i"] ?? '';
                                $url_data = $footer_social_links["platform_url_$i"] ?? null;
                                $url = $url_data['url'] ?? '';
                                if (!empty($url)) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($url); ?>" class="link link-md link-grey" target="_blank">
                                            <i class="<?php echo esc_attr($icon); ?> c-light"></i>
                                            <span>
                                                <span><?php echo esc_html($name); ?></span>
                                            </span>
                                        </a>
                                    </li>
                            <?php endif;
                            endfor; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>
<div class="copyright">
    <div class="copyright-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6 class="copyright txt-sm c-grey text-center">
                        &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> | Tüm hakları saklıdır.
                
                        <br>
                
                        <span style="font-size: 13px;">
                            Web tasarım ve geliştirme: 
                            <a href="https://kayacuneyt.com" target="_blank" rel="noopener" style="color: inherit; text-decoration: underline;">
                                Cüneyt Kaya Web Design
                            </a>
                        </span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</body>

</html>