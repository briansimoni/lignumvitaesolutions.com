<article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
    <header class="entry-header">
        <?php anps_header_media(get_the_id(), 'large'); ?>
        <h3 class="post-title entry-title text-uppercase"><?php the_title(); ?></h3>
        <?php anps_post_meta('single'); ?>
    </header>
    <div class="post-content entry-content">
        <div class="post-desc clearfix">
            <?php the_content(); ?>
        </div>
    </div>
    <footer class="post-footer entry-footer">
        <!-- Additional Post Information -->
        <table class="post-info">
            <tbody>
            <?php if (get_option('anps_post_meta_categories_single', '1') == '1' ) :?>
                <tr>
                    <th><?php esc_html_e( 'Categories', 'industrial' ); ?></th>
                    <td><?php echo get_the_category_list(', '); ?></td>
                </tr>
                <?php endif; ?>
                <?php if( has_tag() && get_option('anps_post_meta_tags_single', '1') == '1'): ?>
                <tr>
                    <th><?php esc_html_e( 'Tags', 'industrial' ); ?></th>
                    <td><?php echo get_the_tag_list('', ', ', ''); ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Post Author -->
        <?php if( get_the_author_meta('description') ): ?>
        <div class="post-author">
            <?php echo get_avatar(get_the_author_meta('ID'), 99); ?>
            <span class="post-author-title"><?php esc_html_e( 'Written by', 'industrial' ); ?> <strong><?php the_author(); ?></strong></span>
            <p class="post-author-desc"><?php the_author_meta('description'); ?></p>
        </div>
        <?php endif; ?>
    </footer>
</article>
