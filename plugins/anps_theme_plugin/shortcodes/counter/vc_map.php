<?php
vc_map( array(
    'name' => esc_html__('Counter', 'anps_theme_plugin'),
    'base' => 'counter',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Text', 'anps_theme_plugin'),
            'param_name' => 'content',
            'value' => '',
            'description' => esc_html__('Enter counter text.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Max number', 'anps_theme_plugin'),
            'param_name' => 'max',
            'value' => '',
            'description' => esc_html__('Enter max number.', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Time', 'anps_theme_plugin'),
            'param_name' => 'time',
            'value' => '5000',
            'description' => esc_html__('The total duration of the count up animation', 'anps_theme_plugin'),
            'admin_label' => true
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Number color', 'anps_theme_plugin'),
            'param_name' => 'number_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Divider color', 'anps_theme_plugin'),
            'param_name' => 'divider_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title color', 'anps_theme_plugin'),
            'param_name' => 'title_color',
            'admin_label' => false
        ),
    )
));
