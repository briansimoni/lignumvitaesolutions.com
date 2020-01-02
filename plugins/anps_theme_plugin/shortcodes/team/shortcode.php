<?php
if(!function_exists('anps_team_func')) {
    function anps_team_func($atts, $content) {
        extract( shortcode_atts( array(
            'columns' => '4',
            'ids' => '',
            'number_items' => '-1'
        ), $atts ) );
        
        //team single page option
        $team_single_option = get_option('anps_team_single_page', '1');

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
            'showposts' => $number_items,
            'columns' => $columns,
            'post__in' => $array_ids,
            'orderby' => $order_by
        );

        $team_posts = new WP_Query( $args );
        $team_data = "<div class='team team-col-$columns'>";
        while($team_posts->have_posts()) :
            $team_posts->the_post();
            $subtitle = get_post_meta( get_the_ID(), $key = 'anps_team_subtitle', $single = true );
            $team_data .= "<div class='member'>";
            $team_data .= "<div class='member-wrap'>";
            $team_data .= "<div class='member-image'>";
            if($team_single_option == 1) :
                $team_data .= "<a href='".get_permalink()."'>";
            endif;
            $team_data .= get_the_post_thumbnail(get_the_ID(), 'anps-team');
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
            $team_data .= "<p class='member-desc'>".get_the_excerpt()."</p>";
            $team_data .= "</div></div>";
        endwhile;
        wp_reset_postdata();
        $team_data .= "</div>";
        return $team_data;
    }
}
add_shortcode('team', 'anps_team_func');