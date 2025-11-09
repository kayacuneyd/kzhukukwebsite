<?php get_header(); ?>

<!-- Page Header -->
<div class="page-header">
    <div class="page-header-wrapper" style="background-image: url('http://kzhukuk.com/wp-content/uploads/2025/04/afw1hht0nss.jpg">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-header-content">
                        <h1 class="c-dark"
                            style="background-color: #f0f8ffc9;
                                        width: fit-content;
                                        padding: 0 20px;">
                            Arama Sonuçları
                        </h1>
                        <p class="small ln-ht-auto c-dark">
                            “<?php echo esc_html(get_search_query()); ?>” için arama sonuçları aşağıda listelenmiştir.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Search Results -->
<div class="section-wrapper pattern-bg">
    <div class="container">
        <div class="row pt-4">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="search-result-card box-slide-inner">
                            <h4 class="f-w-500 heading-20">
                                <a href="<?php the_permalink(); ?>" class="link"><?php the_title(); ?></a>
                            </h4>
                            <p class="paragraph-sm c-grey"><?php echo get_the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="button button-1 txt-upper mt-2">Devamını Oku</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-12">
                    <div class="no-results">
                        <p class="c-dark">Üzgünüz, aradığınız “<?php echo esc_html(get_search_query()); ?>” ile ilgili içerik bulunamadı.</p>
                        <p>Belki farklı bir anahtar kelimeyle tekrar deneyebilirsiniz.</p>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="button button-1 txt-upper mt-3">
                            <div>
                                <i class="fas fa-home"></i>
                                <span>Anasayfaya Dön</span>
                            </div>
                        </a>
                        <!-- Geri Git -->
                        <a href="javascript:history.back()" class="button button-2 txt-upper">
                            <div class="c-dark">
                                <i class="fas fa-arrow-left"></i>
                                <span>Geri Git</span>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="blog-pagination">
            <ul>
                <?php
                global $wp_query;

                $pagination_links = paginate_links(array(
                    'total'        => $wp_query->max_num_pages,
                    'current'      => max(1, get_query_var('paged')),
                    'prev_text'    => '<i class="fas fa-angle-double-left"></i>',
                    'next_text'    => '<i class="fas fa-angle-double-right"></i>',
                    'type'         => 'array'
                ));

                if (!empty($pagination_links)) {
                    foreach ($pagination_links as $link) {
                        if (strpos($link, 'current') !== false) {
                            echo '<li class="active">' . strip_tags($link) . '</li>';
                        } else {
                            echo '<li>' . $link . '</li>';
                        }
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>