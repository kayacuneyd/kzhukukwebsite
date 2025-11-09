<?php

/**
 * single.php 
 */
get_header();
?>

<?php get_template_part('template-parts/common/page-header'); ?>
<div class="blog-detail page-bg mb-5">
    <div class="blog-detail-wrapper page-bg-wrapper">
        <div class="container page-bg-content">
            <div class="row">
                <div class="blog-detail-content row">

                    <div class="content col-lg-10">


                        <h2 class="title"><?php the_title(); ?> | <?php echo date_i18n('j F Y', strtotime(get_the_date())); ?></span></h2>

                        <div class="post-content">
                            <?php the_content(); ?>
                            <br>
                            <span style="font-size: large; padding-top: 0; text-decoration: underline;">Diğerleriyle paylaş:</span>
                            <?php get_template_part('template-parts/common/share'); ?>
                        </div>

                        <?php
                        // Şu anki yazı ID'si
                        $current_post_id = get_the_ID();

                        // WP_Query: En son yazılar (bu yazı hariç)
                        $recent_args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 4,
                            'post__not_in'   => array($current_post_id),
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                        );

                        $recent_query = new WP_Query($recent_args); ?>

                        <?php if ($recent_query->have_posts()) : ?>
                            <div class="recent-articles mt-5">
                                <h3 class="mb-4">Beğenebileceğiniz diğer makaleler</h3>
                                <div class="row row-cols-1 row-cols-md-2 g-4">
                                    <?php while ($recent_query->have_posts()) : $recent_query->the_post(); ?>
                                        <div class="col">
                                            <div class="p-4 d-flex flex-column position-static border rounded h-100">
                                                <strong class="d-inline-block mb-2">
                                                    <?php
                                                    // İlk kategori adı
                                                    $categories = get_the_category();
                                                    echo !empty($categories) ? esc_html($categories[0]->name) : 'Blog';
                                                    ?>
                                                </strong>

                                                <h3 class="mb-0"><?php the_title(); ?></h3>
                                                <p class="mb-auto">
                                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                                </p>
                                                <a href="<?php the_permalink(); ?>"
                                                    class="read-more-btn"
                                                    style="position: relative; z-index: 1; font-weight: bold;">
                                                    Devamını oku
                                                </a>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif;
                        wp_reset_postdata(); ?>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>