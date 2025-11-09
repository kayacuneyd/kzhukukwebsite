<?php

/**
 * home.php 
 */
get_header();

get_template_part('template-parts/common/page-header'); ?>
<div class="sidebar-page page-bg">
    <div class="sidebar-page-wrapper page-bg-wrapper">
        <div class="container page-bg-content">
            <div class="row gx-5">
                <div class="col-lg-8">
                    <!----------------------------------------
                            blog list section - start
                            ---------------------------------------->
                    <div class="blog-list">
                        <div class="blog-list-wrapper">

                            <?php
                            $blog_query = new WP_Query(array(
                                'post_type' => 'post',
                                'posts_per_page' => 5,
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                            ));

                            if ($blog_query->have_posts()) :
                                while ($blog_query->have_posts()) : $blog_query->the_post();
                            ?>
                                    <div class="blog-single">

                                        <div class="post">
                                            <a href="<?php the_permalink(); ?>">
                                                <figure>
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                                                    <?php else : ?>
                                                        <img src="http://kzhukuk.com/wp-content/uploads/2025/04/blog-header.png" alt="default image">
                                                    <?php endif; ?>
                                                    <div class="hover">
                                                        <div class="circle">
                                                            <i class="fas fa-link"></i>
                                                        </div>
                                                    </div>
                                                </figure>
                                            </a> - <span><?php echo date_i18n('j F Y', strtotime(get_the_date())); ?></span> -
                                            <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            <p class="excerpt"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
                                            <a class="read-more link" href="<?php the_permalink(); ?>">
                                                <span>Devamını oku</span>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>No blog posts found.</p>';
                            endif;
                            ?>

                        </div>

                        <div class="blog-pagination">
                            <ul>
                                <?php
                                $pagination_links = paginate_links(array(
                                    'total'        => $blog_query->max_num_pages,
                                    'current'      => max(1, get_query_var('paged')),
                                    'prev_text'    => '<i class="fas fa-angle-double-left"></i>',
                                    'next_text'    => '<i class="fas fa-angle-double-right"></i>',
                                    'type'         => 'array' // Dizi olarak al
                                ));

                                if (!empty($pagination_links)) {
                                    foreach ($pagination_links as $link) {
                                        // Aktif sayfa mı kontrolü
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
                    <!----------------------------------------
                            blog list section - end
                            ---------------------------------------->
                </div>

                <div class="col-xxl-3 offset-xxl-1 col-lg-4">
                    <!----------------------------------------
                            sidebar section - start
                            ---------------------------------------->
                    <div class="sidebar">
                        <div class="search">
                            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="text" name="s" placeholder="Ara">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="category">
                            <div class="category-wrapper">
                                <h4>Kategoriler</h4>
                                <ul>
                                    <?php
                                    $categories = get_categories();
                                    foreach ($categories as $category) {
                                        echo '<li><a href="' . get_category_link($category->term_id) . '">' . esc_html($category->name) . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!----------------------------------------
                            sidebar section - end
                            ---------------------------------------->
                </div>
            </div>
        </div>
    </div>
</div>

<!-------------------------------
cta start
--------------------------------->
<?php get_template_part('template-parts/frontpage/cta'); ?>
<!-------------------------------
cta end
--------------------------------->

<?php get_footer(); ?>