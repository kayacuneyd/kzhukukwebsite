<?php

/**
 * page-hakkimizda.php
 */


get_header();
?>

<!----------------------------------------
    page header - start
    ---------------------------------------->
<?php get_template_part('template-parts/common/page-header'); ?>
<!----------------------------------------
    page header - end
    ---------------------------------------->

<!----------------------------------------
    intro section - start
    ---------------------------------------->
<?php get_template_part('template-parts/about/about-intro'); ?>
<!----------------------------------------
    intro section - end
    ---------------------------------------->

<!----------------------------------------
    tab section - start
    ---------------------------------------->
<?php get_template_part('template-parts/about/tabs'); ?>
<!----------------------------------------
    tab section - end
    ---------------------------------------->

<!-------------------------------
cta start
--------------------------------->
<?php get_template_part('template-parts/frontpage/cta'); ?>
<!-------------------------------
cta end
--------------------------------->

<?php get_footer(); ?>