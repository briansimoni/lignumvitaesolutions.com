<?php
/* Timeline */
if(!function_exists('anps_timeline_func')) {
    function anps_timeline_func($atts, $content) {
        extract( shortcode_atts( array(), $atts ) );
        return '<div class="timeline">' . do_shortcode($content) . '</div>';
    }
}
/* END Timeline */
/* Timeline Item */
if(!function_exists('anps_timeline_item_func')) {
    function anps_timeline_item_func($atts, $content) {
        extract( shortcode_atts( array(
            'title' => '',
            'year'  => '2017'
        ), $atts ) );

        $return = '<div class="timeline-item">';
            $return .= '<div class="timeline-year">' . $year . '</div>';
            $return .= '<div class="timeline-content">';
                $return .= '<h3 class="timeline-title">' . $title . '</h3>';
                $return .= '<div class="timeline-text">' . $content . '</div>';
            $return .= '</div>';
        $return .= '</div>';
        return $return;
    }
}
/* END Timeline Item */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('timeline', array('WPBakeryShortCode_timeline','anps_timeline_func'));
    add_shortcode('timeline_item', array('WPBakeryShortCode_timeline_item','anps_timeline_item_func'));
} else {
    add_shortcode('timeline', 'anps_timeline_func');
    add_shortcode('timeline_item', 'anps_timeline_item_func');
}