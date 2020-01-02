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
		<?php get_template_part( 'templates/content-single', get_post_format() ); ?>
	
		<?php
			if( comments_open() || get_comments_number() ){
				comments_template();
			}
		?>
	</div>
   <?php endwhile; // end of the loop. ?>
<?php anps_right_sidebar(); ?>
<?php get_footer();