<?php
/* Is hidden on page */
$is_hidden = get_post_meta(get_queried_object_id(), $key ='anps_disable_page_breadcrumbs', $single = true );
if( !is_front_page() && get_option('anps_breadcrumbs_status', '1') == '1' && $is_hidden != '1' ): ?>
    <div class="breadcrumb">
        <div class="container">
            <ol>
                <?php
                $allowed_html = array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'li' => array(),
                );

                echo '<li><a href="' . home_url() . '">' . esc_html__('Home', 'industrial') . '</a></li>';

                if (function_exists('is_product_category') && is_product_category()) {
                    $args = array(
                        'delimiter' => '',
                        'wrap_before' => '',
                        'wrap_after' => '',
                        'before' => '<li>',
                        'after' => '</li>',
                        'home' => false
                    );
                    echo woocommerce_breadcrumb($args);
                } if( is_category() ) {
                    $parents = explode('|', get_category_parents(get_queried_object_id(), true, '|'));
                    /* Remove empty item and the current category */
                    array_pop($parents);
                    array_pop($parents);

                    /* Display category parents */
                    if( count($parents) > 0 ) {
                            foreach ($parents as $parent) {
                                    echo '<li>' . wp_kses($parent, $allowed_html) . '</li>';
                            }
                    }
                    echo '<li>' . single_cat_title('', false) . '</li>';
                } else if( is_search() ) {
                    echo '<li>' . esc_html__('Search results', 'industrial') . '</li>';
                } else if( is_tag() ) {
                    echo '<li>' . esc_html__('Posts tagged', 'industrial') . ' ' . single_tag_title('', false) . '</li>';
                } else if( is_author() ) {
                    echo '<li>' . esc_html__('Articles posted by', 'industrial') . ' ' . get_the_author() . '</li>';
                } else if( is_404() ) {
                    echo '<li>' . esc_html__('Page not found', 'industrial') . '</li>';
                } else if( function_exists('is_shop') && is_shop() ) {
                    echo '<li>' . get_the_title(get_option( 'woocommerce_shop_page_id' )) . '</li>';
                } else if( is_page() ) {
                    $ancestors = array_reverse(get_post_ancestors(get_the_id()));
                    foreach( $ancestors as $ancestor ) {
                        echo '<li><a href="' . get_the_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    }
                    echo '<li>' . get_the_title() . '</li>';
                } else if( is_day() ) {
                    echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
                    echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
                    echo '<li>' . get_the_time('d') . '</li>';
                } else if( is_month() ) {
                    echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
                    echo '<li>' . get_the_time('F') . '</li>';
                } else if( is_year() ) {
                    echo '<li>' . get_the_time('Y') . '</li>';
                } else if( is_single() ) { 
                    if(function_exists('is_product') && is_product()) {
                        $args = array(
                            'delimiter' => '',
                            'wrap_before' => '',
                            'wrap_after' => '',
                            'before' => '<li>',
                            'after' => '</li>',
                            'home' => false
                        );
                        echo woocommerce_breadcrumb($args);
                    } elseif (get_post_type() != "portfolio" && get_post_type() != "post") {
                        $obj = get_post_type_object( get_post_type() );
                        if( $obj->has_archive ) {
                            echo '<li><a href="' . get_post_type_archive_link(get_post_type()) . '">' . esc_html($obj->labels->name) . '</a></li>';
                        }
                        echo '<li>' . get_the_title() . '</li>';
                    } else {
                        $custom_breadcrumbs = get_post_meta( get_the_ID(), $key = 'custom_breadcrumbs', $single = true );
                        if( $custom_breadcrumbs != ""  && $custom_breadcrumbs != '0' ) {
                            echo '<li><a href="' . get_permalink($custom_breadcrumbs).'">' . get_the_title($custom_breadcrumbs) . "</a></li>";
                        }
                        echo '<li>' . get_the_title() . '</li>';
                    }
                } else if( is_home() ) {
                    echo '<li>' . get_the_title(get_option('page_for_posts')) . '</li>';
                } elseif(is_archive()) {
                    post_type_archive_title('<li>');
                    echo "</li>";
                } else {
                    echo '<li>' . get_the_title() . '</li>';
                }
                ?>
            </ol>
        </div>
    </div>
<?php endif;