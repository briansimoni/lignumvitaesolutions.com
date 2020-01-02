<?php
/* Logos */
class WPBakeryShortCode_logos extends WPBakeryShortCodesContainer {
    static function anps_logos_func($atts, $content) {
        return anps_logos_func($atts, $content);
    }
}
/* END Logos */
/* Logo */
class WPBakeryShortCode_anps_logo extends WPBakeryShortCode {
    static function anps_logo_func($atts, $content) {
        return anps_logo_func($atts, $content);
    }
}
/* END Logo */
/* VC logos (as parent) */
vc_map(array(
    'name' => esc_html__('Logos', 'anps_theme_plugin'),
    'base' => 'logos',
    'as_parent' => array('only' => 'logo'),
    'content_element' => true,
    'is_container' => true,
    'show_settings_on_create' => false,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Logos in row', 'anps_theme_plugin'),
            'param_name' => 'in_row',
            'description' => esc_html__('Logos in one row.', 'anps_theme_plugin'),
            'value' => '6',
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'anps_theme_plugin'),
            'param_name' => 'style',
            'value' => array(
                esc_html__('Style 1', 'anps_theme_plugin') => 'style-1',
                esc_html__('Style 2', 'anps_theme_plugin') => 'style-2',
                esc_html__('Style 3', 'anps_theme_plugin') => 'style-3'
            ),
            'description' => esc_html__('Select logos style.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        )
    )
));
/* END VC logos*/
/* VC logo (as child) */
vc_map(array(
    'name' => esc_html__('Logo', 'anps_theme_plugin'),
    'base' => 'logo',
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'as_child' => array('only' => 'logos'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Image url', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter image url.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Image', 'anps_theme_plugin'),
            'param_name' => 'image_u',
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Url', 'anps_theme_plugin'),
            'param_name' => 'url',
            'description' => esc_html__('Logo url.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Alt', 'anps_theme_plugin'),
            'param_name' => 'alt',
            'description' => esc_html__('Logo alt.', 'anps_theme_plugin'),
            'admin_label' => false
        )
    )
));
/* END VC logo */
