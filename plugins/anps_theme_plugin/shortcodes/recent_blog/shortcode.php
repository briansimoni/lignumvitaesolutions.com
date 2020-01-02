<?php
if(!function_exists('anps_recent_blog_func')) {
    function anps_recent_blog_func($atts, $content) {
        extract( shortcode_atts( array(
            'recent_title' => "",
            'number' => '',
            'number_in_row' => "3",
            'slider' => '1',
            'content_length' => '130',
            'cat_ids' => '',
            'style' => 'default'
        ), $atts ) );

        $recent_new_class = 'recent-news';

        if( $style == 'minimal-light' ) {
            $recent_new_class .= ' recent-news-light';
        }

        $args = array(
            'posts_per_page'   => $number,
            'cat'              => $cat_ids,
            'orderby'          => "date",
            'order'            => "DESC",
            'post_type'        => 'post',
            'post_status'      => 'publish',
        );
        $posts = new WP_Query( $args );

        if($posts->post_count <= intval($number_in_row)) {
            $slider = 0;
        }

        if($slider=='1') {
            if($number_in_row=='4') {
                $owl_att = "class='$recent_new_class recent-news-$style' data-owlcolumns='4'";
            } else {
                $owl_att = "class='$recent_new_class' data-owlcolumns='3'";
            }
        } else {
            $owl_att = "class='$recent_new_class row'";
            if($number_in_row=='4') {
                $columns_class = 'col-md-3';
            } else {
                $columns_class = 'col-md-4';
            }
        }


     $recent_post_text = '';

     $icon_prev_class = 'fa-angle-left';
     $icon_next_class = 'fa-angle-right';
     $owl_class = 'owl-nav';

     if($style == 'minimal-dark' || $style == 'minimal-light') {
         $icon_prev_class = 'fa-chevron-left';
         $icon_next_class = 'fa-chevron-right';
         $owl_class = 'owl-nav-style-2';
     }

     if($posts->have_posts()) :
        $recent_post_text .= "<div $owl_att>";
        if($style == 'default' || $recent_title != '') {
            if($slider=='1') :
                $recent_post_text .= '<div class="row">';
            endif;
            $recent_post_text .= '<div class="col-md-12">';
            if($recent_title != '') {
                $recent_post_text .= "<h2 class='title'>$recent_title</h2>";
            }
            $recent_post_text .= '</div>';
        }
        if($slider=='1') :
            if($style == 'default' || $recent_title != '') {
                $recent_post_text .= '</div>';
            }
            if($style == 'minimal-dark' || $style == 'minimal-light') {
                $recent_post_text .= "<div class='owl-wrap'>";
            }
            $recent_post_text .= "<div class='owl-carousel'>";
        endif;
        while($posts->have_posts()) :
            $posts->the_post();
            if($slider=='0') :
                $recent_post_text .= "<div class='$columns_class'>";
            endif;

            if($style == 'minimal-dark' || $style == 'minimal-light') {
                $recent_post_text .= "<article class='post-minimal post-$style'>";
                if(get_the_post_thumbnail(get_the_ID())!="") {
                    $recent_post_text .= "<header>";
                    $recent_post_text .= get_the_post_thumbnail(get_the_ID(), 'post-thumb');
                    $recent_post_text .= "</header>";
                }
                $recent_post_text .= '<div class="post-minimal-wrap">';
                $recent_post_text .= "<a href='".get_permalink()."'><h3 class='post-minimal-title'>".get_the_title()."</h3></a>";
                $recent_post_text .= '<ul class="post-minimal-meta">';
                $recent_post_text .= "<li><i class='fa fa-calendar'></i><time datetime='".get_the_time('Y-m-d h:s')."'>".get_the_date()."</time></li>";
                $recent_post_text .= '</ul>';
                $recent_post_text .= '</div>';
                $recent_post_text .= "</article>";
            } else {
                $recent_post_text .= "<article class='post'>";
                if(get_the_post_thumbnail(get_the_ID())!="") {
                    $recent_post_text .= "<header>";
                    $recent_post_text .= get_the_post_thumbnail(get_the_ID(), 'post-thumb');
                    $recent_post_text .= "</header>";
                }
                $recent_post_text .= "<a href='".get_permalink()."'><h3 class='post-title'>".get_the_title()."</h3></a>";
                $recent_post_text .= '<ul class="post-meta">';
                $recent_post_text .= "<li><i class='fa fa-calendar'></i><time datetime='".get_the_time('Y-m-d h:s')."'>".get_the_date()."</time></li>";
                $recent_post_text .= "<li><i class='fa fa-commenting-o'></i>".get_comments_number()." ".esc_html__("comments", 'anps_theme_plugin')."</li>";
                $recent_post_text .= '</ul>';
                $recent_post_text .= '<div class="post-content">';
                $recent_post_text .= "<div>".apply_filters('the_excerpt', mb_substr(get_the_excerpt(), 0, $content_length))."</div>";
                $recent_post_text .= "<a href='".get_permalink()."' class='btn btn-md btn-gradient btn-shadow'>".esc_html__('Read More', 'anps_theme_plugin')."</a>";
                $recent_post_text .= '</div>';
                $recent_post_text .= "</article>";
            }
            if($slider=='0') :
                $recent_post_text .= '</div>';
            endif;
        endwhile;
        if($slider=='1') :
            $recent_post_text .= "</div>";
            $recent_post_text .= "<div class='$owl_class text-right'>";
            $recent_post_text .= "<button class='owlprev'><i class='fa $icon_prev_class'></i></button>";
            $recent_post_text .= "<button class='owlnext'><i class='fa $icon_next_class'></i></button>";
            if($style == 'minimal-dark' || $style == 'minimal-light') {
                $recent_post_text .= '</div>';
            }
            $recent_post_text .= "</div>";
        endif;
        $recent_post_text .= "</div>";
     endif;
     wp_reset_postdata();
     return $recent_post_text;
    }
}
add_shortcode('recent_blog', 'anps_recent_blog_func');