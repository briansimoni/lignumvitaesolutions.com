<?php
/* Contact info card */
class WPBakeryShortCode_contact_info_card extends WPBakeryShortCodesContainer {
    static function contact_info_card_func($atts, $content) {
        return anps_contact_info_card_func($atts, $content);
    }
}
/* END Contact info card */
/* Contact info item card */
class WPBakeryShortCode_contact_info_card_item extends WPBakeryShortCode {
    static function contact_info_card_item($atts, $content) {
        return anps_contact_info_card_item_func($atts, $content);
    }
}
/* END contact info item card */
/* VC contact info card */
vc_map(array(
    'name' => esc_html__('Contact info card', 'anps_theme_plugin'),
    'base' => 'contact_info_card',
    'as_parent' => array('only' => 'contact_info_card_item'),
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Number in row', 'anps_theme_plugin'),
            'param_name' => 'num_row',
            'value' => array(
                esc_html__('3', 'anps_theme_plugin')=>'3',
                esc_html__('2', 'anps_theme_plugin')=>'2',
            ),
            'std' => '3',
            'save_always' => true,
            'admin_label' => false
        )
    )
));
/* END VC contact info card */
/* VC contact info card item */
vc_map( array(
    'name' => esc_html__('Contact info card item', 'anps_theme_plugin'),
    'base' => 'contact_info_card_item',
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'as_child' => array('only' => 'contact_info_card'),
    'params' => array(
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
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'card_title',
            'description' => esc_html__('Enter card title.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Text', 'elderlycare'),
            'param_name' => 'content',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title color', 'anps_theme_plugin'),
            'param_name' => 'title_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Description color', 'anps_theme_plugin'),
            'param_name' => 'desc_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background color', 'anps_theme_plugin'),
            'param_name' => 'background_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon color', 'anps_theme_plugin'),
            'param_name' => 'icon_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Icon background color', 'anps_theme_plugin'),
            'param_name' => 'icon_back_color',
            'admin_label' => false
        ),
    )
));
/* END VC contact info card item */
