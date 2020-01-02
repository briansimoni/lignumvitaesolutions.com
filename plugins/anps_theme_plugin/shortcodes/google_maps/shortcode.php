<?php
/* Google maps */
if(!function_exists('anps_google_maps_func')) {
    $google_maps_counter = 0;
    function anps_google_maps_func( $atts,  $content ) {
        global $google_maps_counter;
        $google_maps_counter++;
        extract( shortcode_atts( array(
            'zoom'     => '15',
            'scroll'   => '',
            'height'   => '550',
            'map_type' => 'ROADMAP',
            'style'   => ''
        ), $atts ) );

        if(isset($style) && $style!='') {
            $style = str_replace('``', '"', $style);
            $style = str_replace('`{`', '[', $style);
            $style = str_replace('`}`', ']', $style);
            $style = str_replace('`', '', $style);
            $style = str_replace('<br />', '', $style);
        } else {
            $style = '[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]';
        }
        $scroll_option = "true";
        if($scroll==true) {
            $scroll_option = "false";
        }
        wp_enqueue_script('gmap3_link');
        wp_enqueue_script('gmap3');

        return "<div data-styles='{$style}' class='map' id='map$google_maps_counter' style='height: {$height}px;' data-type='$map_type' data-zoom='$zoom' data-scroll='{$scroll_option}' data-markers='" . do_shortcode($content) . "'></div>";
    }
}
//google maps item
if(!function_exists('anps_google_maps_item_func')) {
    function anps_google_maps_item_func($atts, $content) {
        extract( shortcode_atts( array(
            'location'      => '',
            'pin'           => '',
            'pin_url'           => '',
            'marker_center' => '',
        ), $atts) );

        $content = preg_replace('/[\n\r]+/', "", $content);
        $content = str_replace('"', '\"', $content);
        if(isset($pin) && $pin!="") {
            $pin_icon = wp_get_attachment_image_src($pin, 'full');
            $pin_icon = $pin_icon[0];
        } else if(isset($pin_url) && $pin_url!="") {
            $pin_icon = $pin_url;
        } else {
            $pin_icon = get_template_directory_uri()."/images/marker.png";
        }

        return '{ "address": "' . $location . '",  "center": "' . $marker_center . '", "data": "' . $content . '", "options": { "icon": "' . $pin_icon . '" } }|';
    }
}
/* END Google maps */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('google_maps', array('WPBakeryShortCode_google_maps','anps_google_maps_func'));
    add_shortcode('google_maps_item', array('WPBakeryShortCode_google_maps_item','anps_google_maps_item_func'));
} else {
    add_shortcode('google_maps', 'anps_google_maps_func');
    add_shortcode('google_maps_item', 'anps_google_maps_item_func');
}