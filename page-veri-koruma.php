<?php

/**
 * Template Name: Gizlilik Politikası
 */

get_header();
get_template_part('template-parts/common/page-header');
?>

<div class="blog-detail page-bg">
    <div class="blog-detail-wrapper page-bg-wrapper">
        <div class="container page-bg-content">
            <div class="row">
                <div class="blog-detail-content row">
                    <div class="content col-lg-10">
                        <?php
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_template_part('template-parts/frontpage/cta'); ?>
<?php get_footer(); ?>