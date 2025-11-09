<?php
$tab_items = get_field('tab_items');
if ($tab_items) :
?>
    <div class="tab-section">
        <div class="tab-section-wrapper pattern-bg">
            <div class="container pattern-bg-content">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-5 order-lg-1 order-2">
                        <div class="tab-content" id="nav-tabContent">
                            <?php for ($i = 1; $i <= 4; $i++) :
                                $heading = $tab_items["tab_{$i}_heading"] ?? '';
                                $content = $tab_items["tab_{$i}_content"] ?? '';
                            ?>
                                <div class="tab-pane fade <?php echo $i === 1 ? 'show active' : ''; ?>" id="nav-<?php echo $i; ?>" role="tabpanel">
                                    <h2 class="c-dark-2"><?php echo esc_html($heading); ?></h2>
                                    <p class="large c-grey"><?php echo esc_html($content); ?></p>
                                    <?php
                                    // Hedef sayfa ID'si
                                    $about_page_id = 230; // ya da get_queried_object_id() gibi bir şey kullanabilirsin
                                    // Verileri çekiyoruz
                                    $contact_text         = get_field('contact_text', $about_page_id);
                                    $contact_url_array    = get_field('contact_url', $about_page_id);
                                    $contact_url          = $contact_url_array['url'] ?? '#';

                                    $question_text        = get_field('question_text', $about_page_id);
                                    $question_link_text   = get_field('question_link_text', $about_page_id);
                                    $question_link_array  = get_field('question_link_url', $about_page_id);
                                    $question_link_url    = $question_link_array['url'] ?? '#';
                                    ?>
                                    <div class="button-group">
                                        <a href="<?php echo esc_url($contact_url); ?>" class="button button-3 txt-upper">
                                            <div>
                                                <i class="far fa-envelope"></i>
                                                <span><?php echo esc_html($contact_text); ?></span>
                                            </div>
                                        </a>
                                        <p><?php echo esc_html($question_text); ?>
                                            <a href="<?php echo esc_url($question_link_url); ?>" class="link">
                                                <span class="txt-upper f-w-500"><?php echo esc_html($question_link_text); ?></span>
                                            </a>
                                        </p>
                                    </div>

                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1 order-lg-2 order-1 tab-row swiper-container">
                        <div class="nav nav-tabs swiper-wrapper" id="nav-tab" role="tablist">
                            <?php for ($i = 1; $i <= 4; $i++) :
                                $title = $tab_items["tab_{$i}_title"] ?? '';
                                $text = $tab_items["tab_{$i}_text"] ?? '';
                            ?>
                                <div class="nav-link <?php echo $i === 1 ? 'active' : ''; ?> swiper-slide" id="nav-<?php echo $i; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?php echo $i; ?>" role="tab" aria-controls="nav-<?php echo $i; ?>" aria-selected="<?php echo $i === 1 ? 'true' : 'false'; ?>">
                                    <div>
                                        <h3><?php echo esc_html($title); ?></h3>
                                        <p><?php echo esc_html($text); ?></p>
                                    </div>
                                </div>
                            <?php endfor; ?>

                            <div class="nav-link swiper-slide nav-link-placeholder"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>