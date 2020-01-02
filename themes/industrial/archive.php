<?php
/* force 404 for portfolio posts */
anps_portfolio_404();
?>

<?php get_header(); ?>

<?php anps_left_sidebar(); ?>
<?php
    $num_of_sidebars = anps_num_sidebars();
    $class = '';

    if( $num_of_sidebars > 0 ) {
        $class = 'page-content';
    }
?>
<div class="<?php echo esc_attr($class); ?> col-md-<?php echo 12-esc_attr($num_of_sidebars)*3; ?>">
	<div class="row anps-blog">
    	<?php $bloglayout = get_option('anps_blog_columns', 'col-md-12'); ?>
		<?php if( have_posts() ) {
        		while (have_posts()) : the_post(); ?>
            		<?php get_template_part( 'templates/content-blog', $bloglayout ); ?>
		        <?php endwhile; // end of the loop. ?>
	</div>
				<?php the_posts_pagination( array(
		            'prev_text' => '<i class="fa fa-angle-left"></i> ' . esc_html__( 'Previous ', 'industrial' ),
		            'next_text' => esc_html__( 'Next', 'industrial' ) . ' <i class="fa fa-angle-right"></i>',
				) );
			}
		?>
</div>
<?php anps_right_sidebar(); ?>
<?php get_footer();
