<?php
/* Timeline */
class WPBakeryShortCode_timeline extends WPBakeryShortCodesContainer {
    static function anps_timeline_func($atts, $content) {
        return anps_timeline_func($atts, $content);
    }
}
/* END Timeline */
/* Timeline item */
class WPBakeryShortCode_timeline_item extends WPBakeryShortCode {
    static function anps_timeline_item_func($atts, $content) {
        return anps_timeline_item_func($atts, $content);
    }
}
/* END Timeline item */
/* VC Timeline (as parent) */
vc_map(array(
    'name' => esc_html__('Timeline', 'anps_theme_plugin'),
    'base' => 'timeline',
    'category' => 'Anps Shortcodes',
    'content_element' => true,
    'is_container' => true,
    'show_settings_on_create' => false,
    'as_parent' => array('only' => 'timeline_item'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'js_view' => 'VcColumnView',
    'params' => array()
));
/* END VC Timeline */
/* VC Timeline item (as child) */
vc_map( array(
    'name' => esc_html__('Timeline item', 'anps_theme_plugin'),
    'base' => 'timeline_item',
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'as_child' => array('only' => 'timeline'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Year', 'anps_theme_plugin'),
            'param_name' => 'year',
            'value' => '2017',
            'description' => esc_html__('Enter year number.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'title',
            'description' => esc_html__('Enter title.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Content', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter content.', 'anps_theme_plugin'),
            'admin_label' => false
        )
    )
));
/* END VC Timeline item */