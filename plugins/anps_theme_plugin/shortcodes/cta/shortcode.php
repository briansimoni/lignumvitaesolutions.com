<?php
if(!function_exists('anps_cta_func')) {
    function anps_cta_func($atts, $content) {
        extract( shortcode_atts( array(
            'text_color' => '#242424',
            'url' => '',
            'button_text' => 'Button',
            'button_type' => 'btn-normal',
            'target' => '_self'
        ), $atts ) );

        $data = '';
        $data .= '<div class="anps_cta">';
        $data .= "<div class='cta-content font1' style='color: $text_color'>$content</div>";
        if($url) {
            $data .= "<a href='$url' target='$target' class='btn btn-lg $button_type '>$button_text</a>";
        }
        $data .= '</div>';
        return $data;
    }
}
add_shortcode('anps_cta', 'anps_cta_func');