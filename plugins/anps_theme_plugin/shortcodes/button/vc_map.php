<?php
vc_map( array(
    'name' => esc_html__('Button', 'anps_theme_plugin'),
    'base' => 'button',
    'category' => 'Anps Shortcodes',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'description' => esc_html__('Enter button text.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Link', 'anps_theme_plugin'),
            'param_name' => 'link',
            'value' => '#',
            'description' => esc_html__('Enter button link.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Target', 'anps_theme_plugin'),
            'param_name' => 'target',
            'value' => '_self',
            'description' => esc_html__('Enter button target.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Size', 'anps_theme_plugin'),
            'param_name' => 'size',
            'value' => array(
                esc_html__('Small', 'anps_theme_plugin')  => 'small',
                esc_html__('Medium', 'anps_theme_plugin') => 'medium',
                esc_html__('Large', 'anps_theme_plugin')  => 'large'
            ),
            'description' => esc_html__('Enter button size.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => true
        ),
        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style', 'anps_theme_plugin'),
            'param_name' => 'style_button',
            'value' => array(
                esc_html__('Normal button', 'anps_theme_plugin')        => 'btn-normal',
                esc_html__('Button with gradient', 'anps_theme_plugin') => 'btn-gradient btn-shadow',
                esc_html__('Dark button', 'anps_theme_plugin')          => 'btn-dark btn-shadow',
                esc_html__('Light button', 'anps_theme_plugin')         => 'btn-light',
                esc_html__('Minimal button', 'anps_theme_plugin')       => 'btn-minimal'
            ),
            'description' => esc_html__('Enter button style.', 'anps_theme_plugin'),
            'save_always' => true,
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Color', 'anps_theme_plugin'),
            'param_name' => 'color',
            'description' => esc_html__('Enter button text color.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Background', 'anps_theme_plugin'),
            'param_name' => 'background',
            'description' => esc_html__('Enter button background color.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Hover color', 'anps_theme_plugin'),
            'param_name' => 'color_hover',
            'description' => esc_html__('Enter button text hover color.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Hover background', 'anps_theme_plugin'),
            'param_name' => 'background_hover',
            'description' => esc_html__('Enter button background hover color.', 'anps_theme_plugin'),
            'admin_label' => false
        ),
        array(
            'type' => 'iconpicker',
            'heading' => esc_html__( 'Icon', 'js_composer' ),
            'param_name' => 'icon',
            'value' => 'fa fa-info-circle',
            'settings' => array(
                'emptyIcon'    => true,
                'iconsPerPage' => 4000,
            ),
            'description' => esc_html__( 'Select icon from library.', 'js_composer' ),
            'admin_label' => false
        ),
    )
));