<?php get_header(); ?>
<?php anps_left_sidebar(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php
        $num_of_sidebars = anps_num_sidebars();
        $class = '';

        if( $num_of_sidebars > 0 ) {
            $class = 'page-content';
        }
    ?>
    <div class="<?php echo esc_attr($class); ?> col-md-<?php echo 12-esc_attr($num_of_sidebars)*3; ?>">
        <a href="<?php echo wp_get_attachment_url(get_the_ID()); ?>"><?php echo wp_get_attachment_image(get_the_ID(), 'full'); ?></a>
    </div>
   <?php endwhile; // end of the loop. ?>
<?php anps_right_sidebar(); ?>
<?php get_footer();