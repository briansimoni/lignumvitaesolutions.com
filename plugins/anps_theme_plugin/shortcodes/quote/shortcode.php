<?php
if(!function_exists('anps_quote_func')) {
    function anps_quote_func( $atts,  $content ) {
        extract( shortcode_atts( array(
            'style' => "style-1"
        ), $atts ) );
        $style_class = '';
        if($style) {
            $style_class = " class='$style'";
        }
        return "<blockquote$style_class><p>$content</p></blockquote>";
    }
}
add_shortcode('quote', 'anps_quote_func');