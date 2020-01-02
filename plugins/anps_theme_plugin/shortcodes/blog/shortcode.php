<?php
if(!function_exists('anps_blog_func')) {
    function anps_blog_func($atts, $content) {
        extract( shortcode_atts( array(
            'category' => '',
            'orderby' => '',
            'order' => '',
            'columns' => '1'
        ), $atts ) );
        global $wp_rewrite;

        if(get_query_var('paged') > 1) {
            $current = get_query_var('paged');
        } elseif(get_query_var('page') > 1) {
            $current = get_query_var('page');
        } else {
            $current = 1;
        }
        $args = array(
            'posts_per_page'   => $content,
            'category_name'    => $category,
            'orderby'          => $orderby,
            'order'            => $order,
            'post_type'        => 'post',
            'post_status'      => 'publish',
            'paged'            => $current
        );

        $posts = new WP_Query( $args );

        $pagination = array(
            'base' => @esc_url(add_query_arg('page','%#%')),
            'format' => '',
            'total' => $posts->max_num_pages,
            'current' => $current,
            'show_all' => false,
            'prev_text' => '<i class="fa fa-angle-left"></i> ' . esc_html__( 'Previous ', 'anps_theme_plugin' ),
            'next_text' => esc_html__( 'Next', 'anps_theme_plugin' ) . ' <i class="fa fa-angle-right"></i>',
            'type' => 'list',
            );


        switch($columns) {
            case '1':
                $blog_type = 'col-md-12';
                break;
            case '2':
                $blog_type = 'col-md-6';
                break;
            case '3':
                $blog_type = 'col-md-4';
                break;
            case '4':
                $blog_type = 'col-md-3';
                break;
            default :
                $blog_type = 'col-md-12';
                break;
        }
        $post_text = "";
        if($posts->have_posts()) :
            $post_text .= "<div class='row anps-blog'>";
            global $counter_blog;
            $counter_blog = 1;
            while($posts->have_posts()) :
                $posts->the_post();
                ob_start();
                get_template_part('templates/content-blog', $blog_type);
                $counter_blog++;
                $post_text .= ob_get_clean();
            endwhile;
            if( $wp_rewrite->using_permalinks() ) {
                $pagination['base'] = user_trailingslashit( trailingslashit( esc_url(remove_query_arg('s',get_pagenum_link(1)) ) ) . 'page/%#%/', 'paged');
            }
            if( !empty($wp_query->query_vars['s']) ) {
                $pagination['add_args'] = array('s'=>get_query_var('s'));
            }
            $post_text .= "</div>";
            $post_text .= paginate_links( $pagination );
            wp_reset_postdata();
        else :
            $post_text .= "<h2>".esc_html__('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'anps_theme_plugin')."</h2>";
        endif;
        return $post_text;
    }
}
add_shortcode('blog', 'anps_blog_func');