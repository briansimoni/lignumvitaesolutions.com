<?php
/* Social icons */
class WPBakeryShortCode_social_icons extends WPBakeryShortCodesContainer {
    static function social_icons_func($atts, $content) {
        return anps_social_icons_func($atts, $content);
    }
}
/* END Social icons */
/* Social icon */
class WPBakeryShortCode_social_icon extends WPBakeryShortCode {
    static function social_icon_item_func($atts, $content) {
        return anps_social_icon_item_func($atts, $content);
    }
}
/* END Social icon */
/* VC social icons */
vc_map( array(
    'name' => esc_html__('Social icons', 'anps_theme_plugin'),
    'base' => 'social_icons',
    'content_element' => true,
    'as_parent' => array('only' => 'social_icon_item'),
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'anps_theme_plugin'),
            'param_name' => 'class',
            'value' => array(
                esc_html__('Default', 'anps_theme_plugin') => '',
                esc_html__('Minimal', 'anps_theme_plugin') => 'minimal',
                esc_html__('Border', 'anps_theme_plugin')  => 'border'
            ),
            'description' => esc_html__('Select style.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => false
        )
    )
));
/* END VC social icons */
/* VC social icon */
vc_map( array(
    'name' => esc_html__('Social icon item', 'anps_theme_plugin'),
    'base' => 'social_icon_item',
    'content_element' => true,
    'is_container' => true,
    'category' => 'Anps Shortcodes',
    'as_child' => array('only' => 'social_icons'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Url', 'anps_theme_plugin'),
            'param_name' => 'url',
            'description' => esc_html__('Enter url.', 'anps_theme_plugin'),
            'value' => '#',
            'admin_label' => true
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon',
            'settings' => array(
               'emptyIcon' => true,
               'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Target', 'anps_theme_plugin'),
            'param_name' => 'target',
            'value' => '_blank',
            'description' => esc_html__('Enter target.', 'anps_theme_plugin'),
            'admin_label' => false
        )
    )
));
/* END VC social icon */