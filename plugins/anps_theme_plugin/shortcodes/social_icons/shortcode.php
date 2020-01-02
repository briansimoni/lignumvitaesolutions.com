<?php
/* Social icons */
if(!function_exists('anps_social_icons_func')) {
    function anps_social_icons_func($atts, $content) {
        extract( shortcode_atts( array(
                'class' => ''
            ), $atts ) );
        $class_s = 'social';
        if($class=='minimal') {
            $class_s = 'social social-minimal';
        } elseif($class=='border') {
            $class_s = 'social social-border';
        }
        return "<ul class='$class_s'>".do_shortcode($content)."</ul>";
    }
}
//single social icon
if(!function_exists('anps_social_icon_item_func')) {
    function anps_social_icon_item_func($atts, $content) {
        extract( shortcode_atts( array(
                'url' => '#',
                'icon' => '',
                'target' => '_blank'
        ), $atts ) );
        return "<li><a href='".esc_url($url)."' target='".$target."'><i class='fa ".$icon."'></i></a></li>";
    }
}
/* END Social icons */
/* Load shortcodes */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    add_shortcode('social_icons', array('WPBakeryShortCode_social_icons','social_icons_func'));
    add_shortcode('social_icon_item', array('WPBakeryShortCode_social_icon','social_icon_item_func'));
} else {
    add_shortcode('social_icons', 'anps_social_icons_func');
    add_shortcode('social_icon_item', 'anps_social_icon_item_func');
}