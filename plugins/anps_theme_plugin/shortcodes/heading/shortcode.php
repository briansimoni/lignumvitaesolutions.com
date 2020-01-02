<?php
if(!function_exists('anps_heading_func')) {
    function anps_heading_func( $atts,  $content ) {
        extract( shortcode_atts( array(
            'size' => '1',
            'heading_class' => "heading",
            'subtitle' => '',
            'h_class' => '',
            'h_id' => '',
            'heading_style' => 'style-1',
            'color' => '',
            'subtitle_color' => ''
        ), $atts ) );
        $id = '';
        if($h_id) {
            $id = " id='".$h_id."'";
        }
        switch($heading_class) {
            case "content_heading" : $head_class = " class='heading-content $h_class $heading_style'"; break;
            case "heading" : $head_class = " class='heading-middle $h_class $heading_style'"; break;
            case "style-3" : $head_class = " class='heading-left $h_class $heading_style'"; break;
        }
        /* heading color */
        $color_h = '';
        if(isset($color)&&$color!='') {
            $color_h = " style='color: $color'";
        }

        /* Subtitle color */
        if(isset($subtitle_color)&&$subtitle_color!='') {
            $subtitle_color = " style='color: $subtitle_color'";
        }

        /* Subtitle */
        if( $subtitle != '' ) {
            $subtitle = '<em class="heading-subtitle"' . $subtitle_color . '>' . $subtitle . '</em>';
        }

        if( $heading_style == 'divider-modern' ) {
            return '<h'.$size.$head_class.' '.$id.$color_h.'><span>' . $subtitle . $content . '</span></h'.$size.'>';
        } else {
            return '<h'.$size.$head_class.' '.$id.$color_h.'><span>' . $content . $subtitle . '</span></h'.$size.'>';
        }
    }
}
add_shortcode('heading', 'anps_heading_func');