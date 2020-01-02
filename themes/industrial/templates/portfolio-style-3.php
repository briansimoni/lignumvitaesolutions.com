<?php
$num_of_sidebars = anps_num_sidebars();
$class = '';

if( $num_of_sidebars > 0 ) {
    $class = 'page-content';
}
?>
<div class="<?php echo esc_attr($class); ?> col-md-<?php echo 12-esc_attr($num_of_sidebars)*3; ?>">
    <?php the_content(); ?>
</div>
