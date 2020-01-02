<?php
/* Google maps */
class WPBakeryShortCode_google_maps extends WPBakeryShortCodesContainer {
    static function anps_google_maps_func($atts, $content) {
        return anps_google_maps_func($atts, $content);
    }
}
/* END Google maps */
/* Google maps advanced item */
class WPBakeryShortCode_google_maps_item extends WPBakeryShortCode {
    static function anps_google_maps_item_func($atts, $content) {
        return anps_google_maps_item_func($atts, $content);
    }
}
/* END Google maps item */
/* VC Google maps (as parent) */
vc_map( array(
    'name' => esc_html__('Google maps', 'anps_theme_plugin'),
    'base' => 'google_maps',
    'category' => 'Anps Shortcodes',
    'content_element' => true,
    'is_container' => true,
    'as_parent' => array('only' => 'google_maps_item'),
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'js_view' => 'VcColumnView',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Zoom', 'anps_theme_plugin'),
            'param_name' => 'zoom',
            'value' => '15',
            'description' => esc_html__('Enter zoom.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__('Map Type', 'anps_theme_plugin'),
            'param_name' => 'map_type',
            'value'      => array(
                esc_html__('Road map', 'anps_theme_plugin')  => 'ROADMAP',
                esc_html__('Satellite', 'anps_theme_plugin') => 'SATELLITE',
                esc_html__('Hybrid', 'anps_theme_plugin')    => 'HYBRID',
                esc_html__('Terrain', 'anps_theme_plugin')   => 'TERRAIN'
            ),
            'description' => esc_html__('Choose between four types of maps.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Height', 'anps_theme_plugin'),
            'param_name' => 'height',
            'value' => '550',
            'description' => esc_html__('Enter height in px.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Disable scrolling', 'anps_theme_plugin'),
            'param_name' => 'scroll',
            'description' => esc_html__('Disable scrolling and dragging (mobile).', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => false
        ),
        array(
            'type' => 'textarea',
            'heading' => esc_html__('Style', 'anps_theme_plugin'),
            'param_name' => 'style',
            'description' => esc_html__('Custom styles', 'anps_theme_plugin'),
            'admin_label' => false
        ),
    )
));
/* END VC Google maps advanced */
/* VC Google maps item (as child) */
vc_map(array(
    'name' => esc_html__('Google maps item', 'anps_theme_plugin'),
    'base' => 'google_maps_item',
    'content_element' => true,
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'as_child' => array('only' => 'google_maps'),
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Location', 'anps_theme_plugin'),
            'param_name' => 'location',
            'description' => esc_html__('Enter address.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'checkbox',
            'heading' => esc_html__('Show marker at center', 'anps_theme_plugin'),
            'param_name' => 'marker_center',
            'save_always' => true,
            'admin_label' => false
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Pin', 'anps_theme_plugin'),
            'param_name' => 'pin',
            'description' => esc_html__('Select or upload pin icon.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Info', 'anps_theme_plugin'),
            'param_name' => 'content',
            'value' => '',
            'description' => esc_html__('Enter info about location.', 'anps_theme_plugin'),
            'admin_label' => true
        )
    )
));
/* END VC Google maps advanced item */