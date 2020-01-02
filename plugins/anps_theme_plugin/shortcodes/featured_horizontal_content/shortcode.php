<?php
if(!function_exists('anps_featured_horizontal_content_func')) {
    function anps_featured_horizontal_content_func($atts, $content) {
        extract( shortcode_atts( array(
            'title' => '',
            'image_u' => '',
            'link' => '',
        ), $atts ) );

        $image = '';
        $link_el_start = '';
        $link_el_end = '';

        if($image_u) {
            $image = wp_get_attachment_image_src($image_u, 'full');
            $image = $image[0];
        }

        if( $link ) {
            $link_el_start = "<a href='$link'>";
            $link_el_end = "</a>";
        }

        $output = "<div class='featured-horizontal'>";
            $output .= "<div class='featured-horizontal-header'>";
                $output .= "$link_el_start<img alt='$title' src='$image'>$link_el_end";
            $output .= "</div>";
            $output .= "<div class='featured-horizontal-content'>";
                $output .= "$link_el_start<h3 class='featured-horizontal-title'>$title</h3>$link_el_end";
                $output .= "<p class='featured-horizontal-desc'>$content</p>";
            $output .= "</div>";
        $output .= "</div>";

        return $output;
    }
}
add_shortcode('anps_featured_horizontal', 'anps_featured_horizontal_content_func');