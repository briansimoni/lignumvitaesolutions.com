<?php
get_header();
while (have_posts()) : the_post();

$subtitle = get_post_meta(get_the_ID(), $key = 'anps_team_subtitle', $single = true);
?>
<div class="team-single section clearfix">
    <div class="col-sm-6 col-md-4">
        <div class="team">
            <div class="member member-full">
                <div class="member-wrap">
                    <div class="member-image"><?php the_post_thumbnail(get_the_ID()); ?></div>
                    <?php if(get_post_meta(get_the_ID(), $key = 'anps_team_social', $single = true)) : ?>
                    <ul class="social social-minimal">
                        <?php
                        $icons = explode('|', get_post_meta(get_the_ID(), $key = 'anps_team_social', $single = true));
                        foreach($icons as $item) :
                            $icon_item = explode(';', $item);
                        ?>
                        <li><a href="<?php echo esc_url($icon_item[1]); ?>"><i class="fa <?php echo esc_attr($icon_item[0]); ?>"></i></a></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php if( $subtitle != '' ): ?>
                        <span class="member-title"><?php echo $subtitle; ?></span>
                    <?php endif; ?>
                    <div class="member-desc"><?php the_excerpt(); ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-8"><?php the_content(); ?></div>
</div>
<?php endwhile; // end of the loop.
get_footer();
