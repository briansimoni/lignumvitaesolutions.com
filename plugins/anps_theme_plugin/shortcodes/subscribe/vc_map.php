<?php
vc_map( array(
   'name' => esc_html__('Subscribe', 'anps_theme_plugin'),
   'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
   'base' => 'anps_subscribe',
   'category' => 'Anps Shortcodes',
   'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'title',
            'admin_label' => true
        ),
        array(
            'type' => 'textarea_html',
            'heading' => esc_html__('Description', 'anps_theme_plugin'),
            'param_name' => 'content',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Title & placeholder color', 'anps_theme_plugin'),
            'param_name' => 'title_color',
            'admin_label' => false
        ),
        array(
            'type' => 'colorpicker',
            'heading' => esc_html__('Input field background color', 'anps_theme_plugin'),
            'param_name' => 'input_bg_color',
            'admin_label' => false
        ),
    )
));