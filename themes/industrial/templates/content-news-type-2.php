<div class="col-md-4">
    <article id="post-<?php the_ID(); ?>" <?php post_class('post type-2 '); ?>>
        <header class="entry-header">
            <?php anps_header_media(get_the_id(), 'large'); ?>
            <h3 class="post-title entry-title text-uppercase"><?php the_title(); ?></h3>
            <?php anps_post_meta(); ?>
        </header>
        <div class="post-content entry-content">
            <div class="post-desc clearfix">
                <?php the_excerpt(); ?>
            </div>

            <a href="<?php the_permalink(); ?>" class="btn btn-md btn-gradient btn-shadow"><?php esc_html_e( 'Read More', 'industrial' ); ?></a>
        </div>
    </article>
</div>
