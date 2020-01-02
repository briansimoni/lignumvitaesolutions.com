<?php
vc_map( array(
    'name' => esc_html__('Call to Action', 'anps_theme_plugin'),
    'base' => 'anps_cta',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'value' => '',
            'description' => esc_html__('Enter content text.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Content color', 'anps_theme_plugin'),
            'param_name' => 'text_color',
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Url', 'anps_theme_plugin'),
            'param_name' => 'url',
            'value' => '',
            'description' => esc_html__('Enter url for button.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Target', 'anps_theme_plugin'),
            'param_name' => 'target',
            'value' => '_self',
            'description' => esc_html__('Enter target.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Button text', 'anps_theme_plugin'),
            'param_name' => 'button_text',
            'value' => '',
            'description' => esc_html__('Enter button text.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Button Type', 'anps_theme_plugin'),
            'param_name' => 'button_type',
            'value' => array(
                esc_html__('Normal', 'anps_theme_plugin') => 'btn-normal',
                esc_html__('Dark', 'anps_theme_plugin')   => 'btn-dark',
                esc_html__('Light', 'anps_theme_plugin')  => 'btn-light',
             ),
            'save_always' => true,
            'admin_label' => false
        ),
    )
));