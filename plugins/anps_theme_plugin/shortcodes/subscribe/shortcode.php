<?php
if(!function_exists('anps_subscribe_func')) {
    function anps_subscribe_func($atts, $content) {
        extract(shortcode_atts( array(
                'title' => '',
                'input_bg_color' => '',
                'title_color' => ''
            ), $atts ) );

        $input_colors = '';

        if($title_color != '') {
            $input_colors .= "color: $title_color;";
            $title_color = " style='color: $title_color;'";
        }

        if($input_bg_color != '') {
            $input_colors .= "background-color: $input_bg_color;";
            $input_bg_color = " style='background-color: $input_bg_color;'";
        }

        if($input_colors != '') {
            $input_colors = " style='$input_colors'";
        }

        $return = '<div class="subscribe">';
        $return .= do_shortcode("[newsletter_form default_css='false'$input_colors][newsletter_field name='email' label='Submit your email'][/newsletter_form]");
        $return .= '<div class="subscribe-content">';
        $return .= "<div class='subscribe-title'$title_color>$title</div>";
        $return .= "<div class='subscribe-description'>$content</div>";
        $return .= '</div>';
        $return .= '</div>';
        return $return;
    }
}
add_shortcode('anps_subscribe', 'anps_subscribe_func');