<?php
vc_map( array(
    'name' => esc_html__('Error 404', 'anps_theme_plugin'),
    'base' => 'error_404',
    'icon' => plugin_dir_url(__FILE__).'vc_icon.png',
    'category' => 'Anps Shortcodes',
    'params' => array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Title', 'anps_theme_plugin'),
            'param_name' => 'title',
            'admin_label' => true
        ),
        array(
            'type' => 'textfield',
            'heading' => esc_html__('Subtitle', 'anps_theme_plugin'),
            'param_name' => 'content',
            'admin_label' => true
        ),
        array(
            'type' => 'attach_image',
            'heading' => esc_html__('Image', 'anps_theme_plugin'),
            'param_name' => 'image_u',
            'admin_label' => false
        )
    )
));