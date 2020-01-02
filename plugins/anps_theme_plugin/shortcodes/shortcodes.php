<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
anps_include_all_shortcodes('shortcode');

/* Shortcodes inside widget text */
add_filter('widget_text', 'do_shortcode');

/* Load VC shortcodes support */
if (is_plugin_active('js_composer/js_composer.php') && function_exists('vc_add_shortcode_param')) {
    include_once 'vc_params.php';
    anps_include_all_shortcodes('vc_map');
}
