<?php
/* Logos */
if(!function_exists('anps_logos_func')) {
    function anps_logos_func($atts, $content) {
        extract( shortcode_atts( array(
        'in_row' => '6',
        'style' => 'style-1'
        ), $atts ) );

    $logos_array = explode("[/logo]", $content);
    foreach($logos_array as $key=>$item) {
        if($item=="") {
            unset($logos_array[$key]);
        }
    }
    $data_col = "";
    $logos_class = "";

    $count_logos = count($logos_array);
    if ($style == 'style-2') {
        if ($count_logos > $in_row ) {
           $data_col = "data-col=" . $in_row;
           $logos_class = 'owl-carousel general style-2';
        } else {
            $logos_class = 'style-2';
        }
    } else if ($style == 'style-1' || $style == 'style-3') {
        $logos_class = "clients-col-".$in_row;
    }

    $return = "<div class='logos-wrapper $style'>";
    $return .= "<ul class='clients ". $logos_class ."' ".$data_col.">";

    $i = 0;
    foreach($logos_array as $item) {
        if($i%$in_row==0 && $i!=0 && $style == 'style-1') {
                $return .= "</ul><ul class='clients ". $logos_class ."'>".do_shortcode($item."[/logo]");
        } else {
            $return .= do_shortcode($item."[/logo]");
        }
        $i++;
    }
    $return .= "</ul></div>";
    return $return;
    }
}
//single logo
if(!function_exists('anps_logo_func')) {
    function anps_logo_func($atts, $content) {
        extract( shortcode_atts( array(
            'url' => '',
            'alt' => '',
            'image_u' => ''
        ), $atts ) );
        if($image_u) {
            $content = wp_get_attachment_image_src($image_u, 'full');
            $content = $content[0];
        }
        if($url) {
            return "<li class='client'><a href='".esc_url($url)."' target='_blank'><img src='".$content."' alt='".$alt."'></a></li>";
        } else {
            return "<li class='client'><span><img src='".esc_url($content)."' alt='".$alt."'></span></li>";
        }
    }
}
/* END Logos */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('logos', array('WPBakeryShortCode_logos','anps_logos_func'));
    add_shortcode('logo', array('WPBakeryShortCode_anps_logo','anps_logo_func'));
} else {
    add_shortcode('logos', 'anps_logos_func');
    add_shortcode('logo', 'anps_logo_func');
}
