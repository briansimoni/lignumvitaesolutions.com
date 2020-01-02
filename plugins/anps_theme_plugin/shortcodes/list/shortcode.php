<?php
/* List */
if(!function_exists('anps_list_func')) {
    $list_number = 0;
    function anps_list_func($atts, $content) {
        extract( shortcode_atts( array(
            'class' => ''
        ), $atts ) );

        global $list_number;

        if( $class == "number" ) {
            $list_number = true;
            $return = "<ol class='list'>".do_shortcode($content)."</ol>";
            $list_number = false;
            return $return;
        }
        return "<ul class='list list-".$class."'>".do_shortcode($content)."</ul>";
    }
}
//list item
if(!function_exists('anps_list_item_func')) {
    function anps_list_item_func($atts, $content) {
        global $list_number;
        if($list_number) {
            return "<li><span>".$content."</span></li>";
        } else {
            return "<li>".$content."</li>";
        }
    }
}
/* END List */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('anps_list', array('WPBakeryShortCode_anps_list','anps_list_func'));
    add_shortcode('list_item', array('WPBakeryShortCode_anps_list_item','anps_list_item_func'));
} else {
    add_shortcode('anps_list', 'anps_list_func');
    add_shortcode('list_item', 'anps_list_item_func');
}