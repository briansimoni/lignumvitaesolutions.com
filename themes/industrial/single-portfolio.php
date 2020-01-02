<?php get_header();?>
<?php anps_left_sidebar(); ?>
<?php
while (have_posts()) : the_post();
get_template_part( 'templates/portfolio', get_option('anps_portfolio_single', 'style-1'));
endwhile;
?>
<?php anps_right_sidebar(); ?>
<?php
get_footer();
