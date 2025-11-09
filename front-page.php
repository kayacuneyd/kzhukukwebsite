<?php

/**
 * front-page.php – custom front page template
 */

get_header();
?>

<!-- hero slider section -->
<div class="hero">
    <div class="hero-wrapper">
        <div class="hero-slider">
            <?php get_template_part('template-parts/frontpage/hero-slider'); ?>
        </div>
        <?php get_template_part('template-parts/frontpage/hero-pagination'); ?>
    </div>
</div>
<!-------------------------------
 hero slider section end
--------------------------------->
<div class="bigbreaker"></div>
<!-- Intro section - start -->
<?php get_template_part('template-parts/frontpage/intro'); ?>
<!-- Intro section - end -->

<!-- Intro box section - start -->
<?php get_template_part('template-parts/frontpage/intro-boxes'); ?>
<!-- Intro box section - end -->

<!-- testimonials - start -->
<?php get_template_part('template-parts/frontpage/testimonials'); ?>
<!-- testimonials - end -->

<!-------------------------------
cta start
--------------------------------->
<?php get_template_part('template-parts/frontpage/cta'); ?>
<!-------------------------------
cta end
--------------------------------->
<?php get_footer(); ?>