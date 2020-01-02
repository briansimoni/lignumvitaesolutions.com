<?php
vc_map( array(
    'name' => esc_html__('Download', 'anps_theme_plugin'),
    'base' => 'download',
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
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Content Icon', 'anps_theme_plugin' ),
            'param_name' => 'icon_c',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
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
            'type' => 'dropdown',
            'heading' => esc_html__('Target', 'anps_theme_plugin'),
            'param_name' => 'target',
            'value' => array(
                '_self' => '_self',
                '_blank' => '_blank',
                '_parent' => '_parent',
                '_top' => '_top'
            ),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Download text', 'anps_theme_plugin'),
            'param_name' => 'download_text',
            'value' => '',
            'description' => esc_html__('Enter download text for button.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon_d',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon' => true,
                'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
    )
));