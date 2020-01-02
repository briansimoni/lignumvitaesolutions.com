<?php
/* List */
class WPBakeryShortCode_anps_list extends WPBakeryShortCodesContainer {
    static function anps_list_func($atts, $content) {
        return anps_list_func($atts, $content);
    }
}
/* END List */
/* List item */
class WPBakeryShortCode_anps_list_item extends WPBakeryShortCodesContainer {
    static function anps_list_item_func($atts, $content) {
        return anps_list_item_func($atts, $content);
    }
}
/* END List item */
/* VC list (as parent) */
vc_map( array(
    'name' => esc_html__('List', 'anps_theme_plugin'),
    'base' => 'anps_list',
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'as_parent' => array('only' => 'list_item'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('List icon', 'anps_theme_plugin'),
            'param_name' => 'class',
            'value' =>array(
                esc_html__('Default', 'anps_theme_plugin')      => 'default',
                esc_html__('Circle arrow', 'anps_theme_plugin') => 'circle-arrow',
                esc_html__('Triangle', 'anps_theme_plugin')     => 'triangle',
                esc_html__('Hand', 'anps_theme_plugin')         => 'hand',
                esc_html__('Square', 'anps_theme_plugin')       => 'square',
                esc_html__('Arrow', 'anps_theme_plugin')        => 'arrow',
                esc_html__('Circle', 'anps_theme_plugin')       => 'circle',
                esc_html__('Circle check', 'anps_theme_plugin') => 'circle-check'),
            'description' => esc_html__('Select type.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        )
    )
) );
/* END VC list */
/* VC list item (as child) */
vc_map( array(
    'name' => esc_html__('List item', 'anps_theme_plugin'),
    'base' => 'list_item',
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'as_child' => array('only' => 'anps_list'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter list text.', 'anps_theme_plugin'),
            'admin_label' => true
        )
    )
));
/* END VC list item */