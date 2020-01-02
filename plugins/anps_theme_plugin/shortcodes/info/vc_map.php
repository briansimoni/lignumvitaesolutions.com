<?php
/* Info element */
class WPBakeryShortCode_info_element extends WPBakeryShortCodesContainer {
    static function anps_info_element($atts, $content) {
        return anps_info_element($atts, $content);
    }
}
/* END Info element */
/* Info element phone */
class WPBakeryShortCode_info_element_icon_text extends WPBakeryShortCode {
    static function anps_info_element_icon_text($atts, $content) {
        return anps_info_element_icon_text($atts, $content);
    }
}
/* END Info element phone */
/* Info element icon */
class WPBakeryShortCode_info_element_icon extends WPBakeryShortCode {
    static function anps_info_element_icon($atts, $content) {
        return anps_info_element_icon($atts, $content);
    }
}
/* END Info element icon */
/* Info element button */
class WPBakeryShortCode_info_element_button extends WPBakeryShortCode {
    static function anps_info_element_button($atts, $content) {
        return anps_info_element_button($atts, $content);
    }
}
/* END Info element button */
/* VC info element (as parent) */
vc_map( array(
   'name' => esc_html__('Info', 'anps_theme_plugin'),
   'base' => 'info_element',
   'category' => 'Anps Shortcodes',
   'content_element' => true,
   'is_container' => true,
   'as_parent' => array('only' => 'info_element_icon_text, info_element_icon, info_element_button'),
   'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
   'js_view' => 'VcColumnView',
   'params' => array(
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Heading color', 'anps_theme_plugin'),
            'param_name' => 'heading_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Text color', 'anps_theme_plugin'),
            'param_name' => 'text_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Primary color', 'anps_theme_plugin'),
            'param_name' => 'primary_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Hover color', 'anps_theme_plugin'),
            'param_name' => 'hover_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Divider color', 'anps_theme_plugin'),
            'param_name' => 'divider_color',
            'admin_label' => false
        ),
    )
) );
/* END VC info element */
/* VC info element icon with text */
vc_map( array(
    'name' => esc_html__('Icon with text', 'anps_theme_plugin'),
    'base' => 'info_element_icon_text',
    'content_element' => true,
    'is_container' => true,
    'category' => 'Anps Shortcodes',
    'as_child' => array('only' => 'info_element'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Heading', 'anps_theme_plugin'),
            'param_name' => 'heading',
            'description' => esc_html__('Enter heading.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter text', 'anps_theme_plugin'),
            'admin_label' => false
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
            'heading' => esc_html__('Icon text', 'anps_theme_plugin'),
            'param_name' => 'icon_text',
            'description' => esc_html__('Enter icon text (eg. phone number).', 'anps_theme_plugin'),
            'admin_label' => true
        ),
    )
));
/* END VC info element icon with text */
/* VC info element icon */
vc_map( array(
    'name' => esc_html__('Icon', 'anps_theme_plugin'),
    'base' => 'info_element_icon',
    'content_element' => true,
    'is_container' => true,
    'category' => 'Anps Shortcodes',
    'as_child' => array('only' => 'info_element'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Heading', 'anps_theme_plugin'),
            'param_name' => 'heading',
            'description' => esc_html__('Enter heading.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter text', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon1',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon2',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon3',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon4',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon5',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
    )
));
/* END VC info element icon */
/* VC info element button */
vc_map( array(
    'name' => esc_html__('Button', 'anps_theme_plugin'),
    'base' => 'info_element_button',
    'content_element' => true,
    'is_container' => true,
    'category' => 'Anps Shortcodes',
    'as_child' => array('only' => 'info_element'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Heading', 'anps_theme_plugin'),
            'param_name' => 'heading',
            'description' => esc_html__('Enter heading.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter text', 'anps_theme_plugin'),
            'admin_label' => false
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
            'heading' => esc_html__('Button text', 'anps_theme_plugin'),
            'param_name' => 'button_text',
            'description' => esc_html__('Enter button text.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Url', 'anps_theme_plugin'),
            'param_name' => 'url',
            'description' => esc_html__('Enter url.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Target', 'anps_theme_plugin'),
            'param_name' => 'target',
            'value' => '_blank',
            'description' => esc_html__('Enter target.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Button text color', 'anps_theme_plugin'),
            'param_name' => 'button_text_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Button text hover color', 'anps_theme_plugin'),
            'param_name' => 'button_text_hover_color',
            'admin_label' => false
        ),
    )
));
/* END VC info element button */