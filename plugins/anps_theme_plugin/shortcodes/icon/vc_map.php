<?php
vc_map( array(
    'name' => esc_html__('Icon', 'anps_theme_plugin'),
    'base' => 'icon',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'title',
            'admin_label' => true,
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'admin_label' => false,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Link', 'anps_theme_plugin'),
            'param_name' => 'url',
            'admin_label' => true,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Target', 'anps_theme_plugin'),
            'param_name' => 'target',
            'value' => '_self',
            'admin_label' => false,
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
            'admin_label' => false,
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Custom image icon', 'anps_theme_plugin'),
            'param_name' => 'image',
            'description' => esc_html__('Upload a custom image icon.', 'anps_theme_plugin'),
            'admin_label' => true,
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Position', 'anps_theme_plugin'),
            'param_name' => 'position',
            'value' => array(
                esc_html__('Left', 'anps_theme_plugin') => 'icon-left',
                esc_html__('Right', 'anps_theme_plugin') => 'icon-right',
                esc_html__('Center', 'anps_theme_plugin') => 'icon-center'
            ),
            'save_always' => true,
            'admin_label' => false,
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Icon size', 'anps_theme_plugin'),
            'param_name' => 'icon_size',
            'admin_label' => true,
            'value' => '30',
        ),
    )
));
