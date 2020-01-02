<?php
/* Contact info */
class WPBakeryShortCode_contact_info extends WPBakeryShortCodesContainer {
    static function contact_info_func($atts, $content) {
        return anps_contact_info_func($atts, $content);
    }
}
/* END Contact info */
/* Contact info item */
class WPBakeryShortCode_contact_info_item extends WPBakeryShortCode {
    static function contact_info_item($atts, $content) {
        return anps_contact_info_item_func($atts, $content);
    }
}
/* END contact info item */
/* VC contact info */
vc_map(array(
    'name' => esc_html__('Contact info', 'anps_theme_plugin'),
    'base' => 'contact_info',
    'as_parent' => array('only' => 'contact_info_item'),
    'content_element' => true,
    'show_settings_on_create' => false,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'js_view' => 'VcColumnView',
    'params' => array()
));
/* END VC contact info */
/* VC contact info item */
vc_map( array(
    'name' => esc_html__('Contact info item', 'anps_theme_plugin'),
    'base' => 'contact_info_item',
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'as_child' => array('only' => 'contact_info'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter text.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Url', 'anps_theme_plugin'),
            'param_name' => 'url',
            'description' => esc_html__('Enter url.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
         'type' => 'iconpicker',
         'heading' => esc_html__( 'Icon', 'js_composer' ),
         'param_name' => 'icon',
         'value' => 'fa fa-info-circle',
         'settings' => array(
            'emptyIcon' => true,
            'iconsPerPage' => 4000,
         ),
         'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
         'admin_label' => false
        ),
    )
) );
/* END VC contact info item */