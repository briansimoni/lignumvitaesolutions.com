<?php
if(!function_exists('anps_team_with_description_func')) {
    function anps_team_with_description_func($atts, $content) {
        extract(shortcode_atts(array(
            'ids' => '',
            'content_title' => '',
            'button_text' => '',
            'button_url' => '#',
            'target' => '_self',
            'title_color' => '',
            'desc_color' => '',
        ), $atts));
        
        //team single page option
        $team_single_option = get_option('anps_team_single_page', '1');

        /* Colors */
        if($title_color != '') {
            $title_color = " style='color: $title_color;'";
        }

        if($desc_color != '') {
            $desc_color = " style='color: $desc_color;'";
        }

        /* Select team by member id */
        $array_ids = '';
        $order_by = 'date';
        if($ids) {
            $array_ids = explode(',', $ids);
            $array_ids = array_map('trim', $array_ids);
            $order_by = 'post__in';
        }

        $args = array(
            'post_type' => 'team',
            'post__in' => $array_ids,
            'posts_per_page' => '3',
            'orderby' => $order_by
        );

        $team_posts = new WP_Query( $args );
        $team_data = '<div class="team-desc team-desc-size-' . count($team_posts->posts) . '">';
        $team_data .= '<div class="team-desc-main">';
        $team_data .= "<div class='team'>";
        while($team_posts->have_posts()):
            $team_posts->the_post();
            $subtitle = get_post_meta( get_the_ID(), $key = 'anps_team_subtitle', $single = true );
            $team_data .= "<div class='member'>";
            $team_data .= "<div class='member-wrap'>";
            $team_data .= "<div class='member-image'>";
            if($team_single_option == 1) :
                $team_data .= "<a href='".get_permalink()."'>";
            endif;
            $team_data .= get_the_post_thumbnail(get_the_ID(), 'anps-team-desc');
            if($team_single_option == 1) :
                $team_data .= '</a>';
            endif;
            $team_data .= "</div>";
            if($team_single_option == 1) :
                $team_data .= "<a href='".get_permalink()."'>";
            endif;
            $team_data .= "<h3 class='member-name'>".get_the_title()."</h3>";
            if($team_single_option == 1) :
                $team_data .= '</a>';
            endif;
            if( $subtitle != '' ) {
                $team_data .= "<span class='member-title'>".$subtitle."</span>";
            }
            $team_data .= "</div></div>";
        endwhile;
        wp_reset_postdata();
        $team_data .= "</div>";
        $team_data .= "</div>";
        $team_data .= '<div class="team-desc-side">';
        if( $content_title != '' ) {
            $team_data .= "<h3 class='team-desc-title'$title_color>$content_title</h3>";
        }
        if( $content != '' ) {
            $team_data .= "<div class='team-desc-description'$desc_color>$content</div>";
        }
        if( $button_text != '' ) {
            $team_data .= "<a href='$button_url' target='$target' class='btn team-desc-btn'>$button_text</a>";
        }
        $team_data .= "</div>";
        $team_data .= "</div>";
        return $team_data;
    }
}
add_shortcode('team_with_description', 'anps_team_with_description_func');