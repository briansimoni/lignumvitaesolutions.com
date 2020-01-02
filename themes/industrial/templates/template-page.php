<?php
$meta = get_post_meta(get_the_ID());
?>

<?php
while (have_posts()) : the_post(); ?>
    <?php anps_left_sidebar(); ?>

    <?php anps_the_content(); ?>

    <?php anps_right_sidebar(); ?>
<?php endwhile; // end of the loop. 